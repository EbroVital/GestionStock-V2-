<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'prix', 'nom', 'quantite', 'categorie_id'
    ];

    protected $table = "produits";

    public function category() {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
