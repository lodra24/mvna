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
            // Temizleme sorgusu için birleşik index ekleme
            // Bu index status, user_id, updated_at sütunlarını içerir
            $table->index(['status', 'user_id', 'updated_at'], 'test_results_cleanup_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_results', function (Blueprint $table) {
            // Eklenen index'i geri alma
            $table->dropIndex('test_results_cleanup_index');
        });
    }
};
