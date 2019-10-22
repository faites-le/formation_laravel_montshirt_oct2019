<?php

use App\Produit;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        //
//        $produit = new Produit();
//        $produit->nom = "T-Shirt Goonies";
//        $produit->prix_ht = 25;
//        $produit->description = "T-Shirt du film les Goonies";
//        $produit->photo_principale = "goonies.jpg";
//        $produit->categorie_id = 1;
//        $produit->save();
//
//        $produit = new Produit();
//        $produit->nom = "T-Shirt Star Trek";
//        $produit->prix_ht = 23;
//        $produit->description = "T-Shirt du film Star Trek";
//        $produit->photo_principale = "star_trek_kirk.jpg";
//        $produit->categorie_id = 1;
//        $produit->save();
//
//        $produit = new Produit();
//        $produit->nom = "T-Shirt Hulk";
//        $produit->prix_ht = 29;
//        $produit->description = "T-Shirt Hulk";
//        $produit->photo_principale = "hulk.jpg";
//        $produit->categorie_id = 2;
//        $produit->save();
//
//        $produit = new Produit();
//        $produit->nom = "T-Shirt Wonder Woman";
//        $produit->prix_ht = 19;
//        $produit->description = "T-Shirt Wonder Woman";
//        $produit->photo_principale = "wonder_woman.jpg";
//        $produit->categorie_id = 2;
//        $produit->save();

        $produit = new Produit();
        $produit->nom = "T-Shirt Les Simpsons";
        $produit->prix_ht = 22;
        $produit->description = "T-Shirt Les Simpsons";
        $produit->photo_principale = "simpsons.jpg";
        $produit->categorie_id = 2;
        $produit->save();

    }
}
