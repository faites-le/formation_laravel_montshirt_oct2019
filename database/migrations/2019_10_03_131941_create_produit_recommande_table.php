<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitRecommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_recommande', function (Blueprint $table) {
            $table->unsignedBigInteger('produit_recommande_id');
            $table->foreign('produit_recommande_id')
                   ->references('id')->on('produits')->onDelete('cascade');

            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')
                ->references('id')->on('produits')->onDelete('cascade');

            $table->timestamps();
            $table->primary(['produit_recommande_id','produit_id']);

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
        Schema::dropIfExists('produit_recommande');
    }
}
