<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
            $table->primary(['tag_id','produit_id']);

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
        Schema::dropIfExists('produit_tag');
    }
}
