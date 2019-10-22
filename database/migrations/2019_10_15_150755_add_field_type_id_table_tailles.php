<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTypeIdTableTailles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tailles', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("type_id");
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade');

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
        Schema::table('tailles', function (Blueprint $table) {
            //
        });
    }
}
