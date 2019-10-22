<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{

    use SoftDeletes;

    // Récupérer les produits d'une catégorie
    public function produits() {
        return $this->hasMany('App\Produit');
    }

    // Récupérer la catégorie parente d'une catégorie
    public function parent() {
        return $this->belongsTo('App\Categorie');
    }

    // Récupérer les catégories enfant d'une catégorie
    public function enfants() {
        return $this->hasMany('App\Categorie','parent_id');
    }



}
