<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Taille extends Model
{    
     protected $fillable = ['produit_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }
}
