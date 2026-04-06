<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $realisations = Realisation::where('visible', true)
            ->orderBy('ordre')
            ->get();

        return view('pages.home', compact('realisations'));
    }
}
