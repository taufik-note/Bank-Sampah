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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('drop_point_id')->constrained('drop_points')->cascadeOnDelete();
        $table->date('tanggal');
        $table->string('jenis_sampah');
        $table->float('berat'); // kg
        $table->integer('poin');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
