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
        Schema::create('gerants', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("nom", 100);
            $table->string("prenom", 100);
            $table->string("email", 100);
            $table->string("password", 100);
            $table->string("numero_tel", 100);
            $table->string("adresse", 100);
            $table->foreignId('societe_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('gerants');
    }
};
