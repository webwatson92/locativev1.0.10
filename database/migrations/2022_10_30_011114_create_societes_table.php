<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("libelle");
            $table->string("reg_commerce");
            $table->string("numero_taxe");
            $table->string("numero_tel");
            $table->string("adresse");
            $table->string("email");
            $table->foreignId('quartier_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('ville_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('pays_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->longText("note");
            $table->string("url");
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
        Schema::dropIfExists('societes');
    }
};
