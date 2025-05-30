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
        Schema::table('user_answers', function (Blueprint $table) {
            // 1. Mevcut user_id foreign key kısıtlamasını kaldır
            $table->dropForeign(['user_id']);
            
            // 2. Mevcut user_id ve question_id üzerindeki unique index'i kaldır
            $table->dropUnique(['user_id', 'question_id']);
            
            // 3. test_result_id sütununu id'den sonra ekle
            $table->foreignId('test_result_id')
                  ->after('id')
                  ->constrained('test_results')
                  ->onDelete('cascade');
            
            // 4. Mevcut user_id sütununu kaldır
            $table->dropColumn('user_id');
            
            // 5. test_result_id ve question_id üzerinde yeni unique index oluştur
            $table->unique(['test_result_id', 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_answers', function (Blueprint $table) {
            // 1. test_result_id ve question_id üzerindeki unique index'i kaldır
            $table->dropUnique(['test_result_id', 'question_id']);
            
            // 2. test_result_id foreign key kısıtlamasını ve sütununu kaldır
            $table->dropForeign(['test_result_id']);
            $table->dropColumn('test_result_id');
            
            // 3. Eski user_id sütununu geri ekle
            $table->foreignId('user_id')
                  ->after('id')
                  ->constrained('users')
                  ->onDelete('cascade');
            
            // 4. Eski user_id ve question_id üzerindeki unique index'i geri ekle
            $table->unique(['user_id', 'question_id']);
        });
    }
};
