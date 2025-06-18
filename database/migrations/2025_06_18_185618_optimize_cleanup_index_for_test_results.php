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
        Schema::table('test_results', function (Blueprint $table) {
            // Eski, verimsiz indeksi kaldır
            $table->dropIndex('test_results_cleanup_index');
            
            // Yeni, optimize edilmiş indeks ekle
            // CleanupOrphanedTests sorgusu: whereNull('user_id')->where('updated_at', '<=', ...)
            // Bu indeks sırası MySQL'de NULL değerleri ve tarih filtresi için optimal
            $table->index(['user_id', 'updated_at'], 'test_results_cleanup_optimized_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_results', function (Blueprint $table) {
            // Optimize edilmiş indeksi kaldır
            $table->dropIndex('test_results_cleanup_optimized_index');
            
            // Eski indeksi geri ekle
            $table->index(['status', 'user_id', 'updated_at'], 'test_results_cleanup_index');
        });
    }
};