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
        Schema::create('mbti_type_details', function (Blueprint $table) {
            $table->id();
            $table->string('mbti_type', 4)->unique();
            $table->string('type_name')->nullable();
            $table->text('profile_summary_for_employer')->nullable();
            $table->json('key_strengths_in_workplace')->nullable();
            $table->json('potential_development_areas_for_workplace_effectiveness')->nullable();
            $table->text('communication_style_and_tips_for_employer')->nullable();
            $table->text('task_management_approach_and_tips_for_employer')->nullable();
            $table->text('feedback_receptivity_and_guidance_for_employer')->nullable();
            $table->text('work_environment_preferences_for_employer')->nullable();
            $table->json('motivators_for_employer_to_leverage')->nullable();
            $table->text('team_collaboration_style_for_employer')->nullable();
            $table->text('leadership_potential_or_style_notes_for_employer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbti_type_details');
    }
};
