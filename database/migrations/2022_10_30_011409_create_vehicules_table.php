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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();

            $table->string("code", 100);
            $table->string("libelle", 100);
            $table->date("date_acquisition");
            $table->date("date_cession");            
            $table->double("valeur");
            $table->string("puissance");
            $table->foreignId('type_vehicule_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('type_energie_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('boite_vitesse_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('societe_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('gerant_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // $table->longText("note", 100);

            $table->integer("pu_journalier");
            $table->string("kmc");
            $table->date("dkmc");
            $table->string("pvd");
            $table->date("dkmc2");

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
        Schema::dropIfExists('vehicules');
    }
};
