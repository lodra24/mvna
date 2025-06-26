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
        Schema::table('mbti_type_details', function (Blueprint $table) {
            $table->json('cognitive_functions')->nullable();
            $table->json('career_suggestions')->nullable();
            $table->json('famous_examples')->nullable();
            $table->text('how_to_handle_stress')->nullable();
            $table->text('relationships_with_other_types')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mbti_type_details', function (Blueprint $table) {
            $table->dropColumn([
                'cognitive_functions',
                'career_suggestions',
                'famous_examples',
                'how_to_handle_stress',
                'relationships_with_other_types'
            ]);
        });
    }
};
