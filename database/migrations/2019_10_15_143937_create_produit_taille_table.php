<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitTailleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_taille', function (Blueprint $table) {
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');

            $table->unsignedBigInteger('taille_id');
            $table->foreign('taille_id')->references('id')->on('tailles')->onDelete('cascade');

            $table->integer('qte');

            $table->primary(['produit_id','taille_id']);

            $table->timestamps();
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_taille');
    }
}
