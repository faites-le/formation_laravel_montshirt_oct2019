<?php

namespace App\Http\Controllers\Shop;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //Afficher la page d'accueil du shop
    public function index() {
//        echo "salut c'est la homepage";
        $produits = Produit::all();

//        dd($produits);
        return view('shop.index',
            ['produits'=>$produits]);
    }

    // Voir les produits d'une catégorie
    public function viewByCategorie(Request $request) {
        $cat= Categorie::find($request->id);
        $produits = $cat->produits;
        return view('shop.categorie',['produits'=>$produits,'cat'=>$cat]);
    }

    public function viewProduct(Request $request) {

        $p= Produit::find($request->id);

//        dd($p);
        return view('shop.produit',["p"=>$p,]);

    }

    public function changeSizeAjax(Request $request) {
        // Récupération de l'id de taille choisie
        $taille_id = $request->taille_id;
        $produit_id = $request->produit_id;

        $produit_taille = DB::table('produit_taille')
            ->where('taille_id',$taille_id)
            ->where('produit_id',$produit_id)
            ->first();

//        dd($produit_taille);
        return view('shop.qte_ajax',['qte'=>$produit_taille->qte]);
    }
}
