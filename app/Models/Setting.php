<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'telephone',
        'email',
    ];

    public static function instance(): static
    {
        return static::firstOrCreate(['id' => 1]);
    }

    public function logoUrl(): string
    {
        return $this->logo
            ? Storage::disk('public')->url($this->logo)
            : asset('logov2.jpeg');
    }

    public function telephone(): string
    {
        return $this->telephone ?: '+242 06 931 74 77';
    }

    public function email(): string
    {
        return $this->email ?: 'supports@kiznetshop.frenchcercle.com';
    }
}
