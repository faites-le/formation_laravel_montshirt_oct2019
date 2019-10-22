<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Produit extends Model
{
    use SoftDeletes;

//    protected $guarded = ['id','created_at'];


    // Afficher le prix TTC
    public function prixTTC() {
       return number_format($this->prix_ht * 1.2,2);
    }

    public function prixTTCPanier() {
        return $this->prix_ht * 1.2;
    }

    // Récupérer la catégorie liée à un produit
    public function categorie() {
        return $this->belongsTo('App\Categorie');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    // Récupérer les produits recommandés
    public function recommandations() {
        return $this->belongsToMany('App\Produit','produit_recommande','produit_id','produit_recommande_id')->withTimestamps();
    }

    // Récupérer les tailles disponibles pour un produit
    public function tailles() {
        return $this->belongsToMany('App\Taille')
            ->withTimestamps()->withPivot('qte');
    }


}
