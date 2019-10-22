<?php

use App\Taille;
use Illuminate\Database\Seeder;

class TaillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        $tailles = ['XS','S','M','L','XL','XXL'];
//        $tailles = ['36','38','40','42','44','46'];
        $tailles = ['54','55','56','57','58','59','60','61'];
        foreach($tailles as $t) {
            $taille = new Taille();
            $taille->nom = $t;
            $taille->type_id =4;
            $taille->save();
        }
    }
}
