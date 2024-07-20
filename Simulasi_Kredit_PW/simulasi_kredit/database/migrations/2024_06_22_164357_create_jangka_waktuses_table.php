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
        Schema::create('jangka_waktuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bank')->unsigned();
            // $table->integer('batas_awal');
            // $table->integer('batas_akhir');
            $table->integer('rentang_waktu');
            $table->timestamps();
        });

        Schema::table('jangka_waktuses', function(Blueprint $table){
            $table->foreign('id_bank')->references('id')->on('banks')->onDelete('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jangka_waktuses');
    }
};
