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
            // Önce mevcut string tipindeki payment_id sütununu kaldır
            $table->dropColumn('payment_id');
        });

        Schema::table('test_results', function (Blueprint $table) {
            // report_path sütunundan sonra yeni payment_id foreign key sütunu ekle
            $table->foreignId('payment_id')
                  ->after('report_path')
                  ->nullable()
                  ->constrained('payments')
                  ->onDelete('set null');
            
            // payment_id'den sonra status sütunu ekle
            $table->string('status')
                  ->after('payment_id')
                  ->default('pending_payment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_results', function (Blueprint $table) {
            // Foreign key kısıtlamasını ve payment_id sütununu kaldır
            $table->dropForeign(['payment_id']);
            $table->dropColumn('payment_id');
            
            // status sütununu kaldır
            $table->dropColumn('status');
        });

        Schema::table('test_results', function (Blueprint $table) {
            // Eski string tipindeki payment_id sütununu geri ekle
            $table->string('payment_id')->nullable()->after('report_path');
        });
    }
};
