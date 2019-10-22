<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Produit;
use App\Taille;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use \Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Ajouter un produit au panier
    public function add(Request $request) {
//        dd($request->prix);
        $produit = Produit::find($request->id);
        $taille = Taille::find($request->size);
        if($request->size == null) {
            $qte_maxi = $produit->qte;
        } else {
            // Récupérer la qte maxi pour ce produit et cette taille
            $produit_taille = DB::table('produit_taille')
                ->where('produit_id',$produit->id)
                ->where('taille_id',$taille->id)
                ->first();
            $qte_maxi = $produit_taille->qte;
        }
        Cart::add(array(
            'id' => $produit->id.$request->size,
            'name' => $produit->nom,
            'price' => $produit->prix_ht,
            'quantity' => $request->qte,
            'attributes' => array(
                'id'=>$produit->id,
                'qte_maxi'=>$qte_maxi,
                'size'=>$taille,
                'photo'=>$produit->photo_principale,
                'prix_ttc'=>$produit->prixTTCPanier()
            )
        ));
        return redirect(route('cart_index'))
            ->with('notice','Le produit <strong>'.$produit->nom.'</strong> a été ajouté au panier');
    }

    // Lister les produits du panier
    public function index() {
        $content = Cart::getContent();

//        ddd($content);
        // On crée une "condition" pour effectuer le calcul de la TVA à 20% sur le total du panier
        $condition = new CartCondition(array(
            'name'=>'TVA 20%',
            'type'=>'tax',
            'target'=>'total',
            'value'=>'20.0%'
        ));
        // On applique la "condition" au panier afin d' ajouter la TVA
        Cart::condition($condition);
        $total_ht_panier = Cart::getSubTotal();
        $total_ttc_panier = Cart::getTotal();
//        dd($total_ht_panier,$total_ttc_panier);

        $tva = $total_ttc_panier - $total_ht_panier;

        return view('shop.process.panier',[
            'content'=>$content,
            'total_ht_panier'=>$total_ht_panier,
            'total_ttc_panier'=>$total_ttc_panier,
            'tva'=>$tva
        ]);
    }


    // Mettre à jour la quantité d'un produit dans le panier
    public function update(Request $request) {

        if($request->qte <=0) {
            \Cart::remove($request->id);
        }
        else {
            \Cart::update($request->id,array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->qte
                ),
            ));
        }

        return redirect()->route('cart_index')->with('notice','La quantité a été modifiée');
    }

    public function remove(Request $request) {
        \Cart::remove($request->id);
        return redirect()->route('cart_index')
            ->with('notice','Le produit a été supprimé du panier');
    }

}
