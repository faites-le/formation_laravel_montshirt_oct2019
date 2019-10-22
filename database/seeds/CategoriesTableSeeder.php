<?php

use App\Categorie;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categorie = new Categorie();
        $categorie->nom = "Films";
        $categorie->save();

        $categorie2 = new Categorie();
        $categorie2->nom = "Séries TV";
        $categorie2->save();

        $categorie3 = new Categorie();
        $categorie3->nom = "Musique";
        $categorie3->save();

        $categorie4 = new Categorie();
        $categorie4->nom = "Jeux-Vidéos";
        $categorie4->save();

        $categorie5 = new Categorie();
        $categorie5->nom = "Sport";
        $categorie5->save();
    }
}
