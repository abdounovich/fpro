<?php

namespace App;

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
}
