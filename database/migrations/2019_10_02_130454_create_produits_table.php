<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->float('prix_ht');
            $table->text('description')->nullable();
            $table->string('photo_principale');
            // Ajout de la clé étrangère avec la table catégorie.
            // Un produit a au minimum une catégorie et au maximum 1 catégorie
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
