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
        Schema::create('fournitures', function (Blueprint $table) {
            $table->id();
            $table->string("code", 100);
            $table->date("date");
            $table->string("periode", 100);
            table->foreignId('piece_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            table->foreignId('type_fourniture_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string("libelle", 100);
            $table->integer("pu");
            $table->integer("qte");
            $table->integer("total")->default(0);
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
        Schema::dropIfExists('fournitures');
    }
};
