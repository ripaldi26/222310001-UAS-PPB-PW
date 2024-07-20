<?php

use App\Models\banks;
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
        Schema::create('nama_skema', function (Blueprint $table) {
            $table->id();
            $table->string('namaSkema',100);
            // $table->foreignId('id_skema')->constrained(
            //     table: 'banks',
            //     indexName: 'nama_skema_banks'
            // );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nama_skema');
    }
};
