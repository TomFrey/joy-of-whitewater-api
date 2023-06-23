<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->integer('state_id'); 
            $table->string('name');
            $table->string('beschreibung');
            $table->string('treffpunkt');
            $table->string('preis_kurs');
            $table->string('preis_material');
            $table->dateTime('von_datum');
            $table->dateTime('bis_datum');
            $table->string('ort');
            $table->string('land');
            $table->string('fluss');
            $table->string('kurs_stufe');   //B, F, K, alle
            $table->string('sport_art');    //Kajak, Kanader, Packraft, alle
            $table->string('typ');          //Paddelreise, Kanukurs, Eskimotieren, Packraft Kurs
            $table->string('guide');
            $table->integer('wird_angezeigt');
            $table->string('paddelreise_gruppe')->nullable();  //Korsika, Piemont ...
            $table->integer('anzahl_pausentage')->nullable();
            $table->dateTime('anmelde_schluss')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
