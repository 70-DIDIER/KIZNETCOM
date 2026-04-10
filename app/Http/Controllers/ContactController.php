<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nom'       => ['required', 'string', 'max:100'],
            'email'     => ['required', 'email', 'max:150'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'service'   => ['nullable', 'string', 'max:100'],
            'message'   => ['required', 'string', 'max:3000'],
        ]);

        $destinataire = Setting::instance()->email();

        Mail::to($destinataire)->send(new ContactMail(
            nom:         $data['nom'],
            emailClient: $data['email'],
            telephone:   $data['telephone'] ?? null,
            service:     $data['service'] ?? null,
            corps:       $data['message'],
        ));

        return response()->json(['message' => 'Votre message a été envoyé avec succès.']);
    }
}
