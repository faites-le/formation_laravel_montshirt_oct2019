<?php

namespace App\Http\Controllers\Shop;

use App\Adresse;
use App\Commande;
use App\CommandeProduit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{

    public function __construct() {
        $this->middleware('guest')->only('identification');
        $this->middleware('auth')->except('identification');
    }

    // Identification de l'acheteur
    public function identification() {
        return view('shop.process.identification');
    }

    // Redirection vers la page adresse
    public function adresse() {
        $user =Auth::user();
        $adresse = $user->adresse;
//        dd($adresse);
        $pays = ['FR'=>'France','BE'=>'Belgique','CH'=>'Suisse'];
        return view('shop.process.adresse',['adresse'=>$adresse,'pays'=>$pays]);
    }

    // Stocker l'adresse saisie
    public function adresseStore(Request $request) {
        $request->validate([
            'nom'=> 'required',
            'telephone'=> 'required',
            'email'=> 'required',
            'adresse'=> 'required',
            'code_postal'=> 'required',
            'ville'=> 'required',
            'pays'=> 'required',
        ]);
        $adresse = new Adresse();
        $adresse->nom = $request->nom;
        $adresse->prenom = $request->prenom;
        $adresse->telephone = $request->telephone;
        $adresse->email = $request->email;
        $adresse->adresse = $request->adresse;
        $adresse->adresse2 = $request->adresse2;
        $adresse->code_postal = $request->code_postal;
        $adresse->ville = $request->ville;
        $adresse->pays = $request->pays;
        $adresse->save();

        // Associer l'adresse créée à l'utilisateur qui est loggé
        $user = Auth::user();
        $user->adresse_id = $adresse->id;
        $user->save();

        return redirect()->route('commande_paiement');
    }

    public function paiement() {
        $total_a_payer = \Cart::getTotal();
        $user = Auth::user();
        if($total_a_payer ==0 || $user->adresse_id == null) {
            return redirect()->route('homepage');
        }
        return view('shop.process.paiement',['total_a_payer'=>$total_a_payer]);
    }

    public function commandeStore(Request $request) {
        $total_ht = \Cart::getSubTotal();
        $total_ttc = \Cart::getTotal();
//        dd($total_ht,$total_ttc);
        $commande = new Commande();
        $commande->total_ht = $total_ht;
        $commande->total_ttc = $total_ttc;
        $tva = $total_ttc - $total_ht;
        $commande->tva = $tva;
        $commande->taux_tva = 20;
        $commande->user_id = Auth::user()->id;
        $commande->adresse_id = Auth::user()->adresse->id;
        $commande->save();

        // Récupération des produits du panier
        $produits = \Cart::getContent();
        foreach($produits as $produit) {
            $commande_produit = new CommandeProduit();
            $commande_produit->commande_id = $commande->id;
            $commande_produit->produit_id = $produit['attributes']['id'];
            if($produit['attributes']['size']) {
                $commande_produit->taille_id = $produit['attributes']['size']->id;
            }
            $commande_produit->qte = $produit['quantity'];
            $commande_produit->prix_unitaire_ht = $produit['price'];
            $commande_produit->prix_unitaire_ttc = $produit['attributes']['prix_ttc'];
            $prix_total_ht = $produit['quantity'] * $produit['price'];
            $prix_total_ttc = $produit['quantity'] * $produit['attributes']['prix_ttc'];
            $commande_produit->prix_total_ht = $prix_total_ht;
            $commande_produit->prix_total_ttc = $prix_total_ttc;
            $commande_produit->save();
        }
        \Cart::clear();
        return redirect()->route('commande_merci');
    }

    public function merci() {
        return view('shop.process.merci');
    }

}
