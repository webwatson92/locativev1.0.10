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
        Schema::create('entretiens', function (Blueprint $table) {
            $table->id();
            $table->string("code", 100);
            $table->date("date_acquisition");
            $table->date("date_cession");
            table->foreignId('type_entretien_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string("libelle", 100);
            $table->string("kilometrage", 100);
            $table->string("kilometrage_p_v", 100);
            table->foreignId('service_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string("valeur_service", 100);
            $table->string("valeur_fourniture", 100);
            $table->string("valeur_total", 100);
            table->foreignId('fourniture_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('vehicule_id')
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
            $table->string("note", 100);
            $table->string("url", 100);


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
        Schema::dropIfExists('entretiens');
    }
};
