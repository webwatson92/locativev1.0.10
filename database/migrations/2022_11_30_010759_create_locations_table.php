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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string("code", 100);
            table->foreignId('client_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            table->foreignId('vehicule_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            table->foreignId('chauffeur_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date("date_debut", 100);
            $table->date("date_fin");
            $table->integer("pu_journalier");
            $table->integer("qte");
            $table->integer("prix_total");
            $table->integer("va_payer");
            $table->integer("va_rester_a_payer");
            $table->foreignId('tarification_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean("option_tarification");
            $table->boolean("option_validation");
            $table->foreignId('societe_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('reservation_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean("statut_reservations");
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
        Schema::dropIfExists('locations');
    }
};
