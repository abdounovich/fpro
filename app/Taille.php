<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Taille extends Model
{    public $timestamps = false;
     protected $fillable = ['produit_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}