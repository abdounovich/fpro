<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'type', 'facebook'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
