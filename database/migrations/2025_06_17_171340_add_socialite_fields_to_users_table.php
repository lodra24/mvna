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
        Schema::table('users', function (Blueprint $table) {
            // Google ID sütunu - unique ve nullable
            $table->string('google_id')->unique()->nullable();
            
            // Avatar sütunu - nullable
            $table->string('avatar')->nullable();
            
            // Password sütununu nullable yapma
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eklenen sütunları kaldır
            $table->dropColumn(['google_id', 'avatar']);
            
            // Password sütununu tekrar zorunlu hale getir
            $table->string('password')->nullable(false)->change();
        });
    }
};
