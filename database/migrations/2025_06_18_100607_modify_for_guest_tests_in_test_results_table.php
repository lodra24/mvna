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
            // user_id sütununu nullable yap
            $table->foreignId('user_id')->nullable()->change();
            
            // user_id sütunundan sonra guest_name sütunu ekle
            $table->string('guest_name')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_results', function (Blueprint $table) {
            // guest_name sütununu kaldır
            $table->dropColumn('guest_name');
            
            // NOT: user_id'yi tekrar nullable(false) yapmıyoruz
            // Çünkü tabloda user_id'si null olan kayıtlar varsa hata verir
        });
    }
};
