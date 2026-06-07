<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    protected $fillable = [
        'id', 'produit_id', 'user_id', 'type', 'quantite', 'user_name'
    ];

    // un mouvement concerne un utilisateur
    public function user() {
        return $this->belongsTo(User::class);
    }

    // un mouvement concerne un produit

    public function product(){
        return $this->belongsTo(Product::class, 'produit_id');
    }
}
