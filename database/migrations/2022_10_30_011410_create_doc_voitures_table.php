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
        Schema::create('doc_voitures', function (Blueprint $table) {
            $table->id();
            $table->string("code", 100);
            $table->date("date_etablissement", 100);
            $table->string("nom_document", 100);
            $table->date("date_validation", 100);
            $table->string("valeur", 100);
            $table->date("date_fin", 100);
            table->foreignId('societe_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            table->foreignId('vehicule_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            table->foreignId('gerant_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string("document", 100);
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
        Schema::dropIfExists('doc_voitures');
    }
};
