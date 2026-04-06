<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
     protected $fillable = [
          'titre',
          'categorie',
          'couleur_categorie',
          'description',
          'lien',
          'image_principale',
          'images',
          'visible',
          'ordre',
      ];

      protected $casts = [
          'images'  => 'array',
          'visible' => 'boolean',
      ];
}
