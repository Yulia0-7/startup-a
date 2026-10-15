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
    Schema::create('pinjamans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('anggota_id')->constrained('anggotas')->cascadeOnDelete();
        $table->date('tanggal_pinjaman');
        $table->decimal('jumlah_pinjaman', 15, 2);
        $table->decimal('bunga', 5, 2)->default(0);
        $table->unsignedInteger('tenor_bulan');
        $table->enum('status', ['diajukan', 'disetujui', 'lunas'])->default('diajukan');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamans');
    }
};
