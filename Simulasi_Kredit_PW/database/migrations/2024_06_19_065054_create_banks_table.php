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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('skema_id')->unsigned();
            $table->string('nama_bank', 15);
            $table->integer('presentase_bunga');
            // $table->foreignId('id_skema')->reference('id')->on('nama_skema');
            $table->timestamps();
        });

        // Schema::table('banks', function(Blueprint $table){
        //     $table->foreign('skema_id')->references('id')->on('nama_skema')->onDelete('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
