<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CommandeProduit extends Pivot
{
    // récupérer la taille du produit commandé
    public function taille() {
        return $this->belongsTo('App\Taille');
    }
}
