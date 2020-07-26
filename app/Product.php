<?php

namespace App;

use App\Taille;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $casts=[

        'taille'=>'array'
    ];

    public function commande()
    {

        return $this->hasMany(Commande::class);
    }

    public function taille()
    {

        return $this->hasMany(Taille::class);
    }
}
