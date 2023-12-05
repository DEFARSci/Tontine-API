<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("adress");
            $table->string('email')->unique();
            $table->integer("telephone");
            $table->float("nombre_main");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membres');
    }
};