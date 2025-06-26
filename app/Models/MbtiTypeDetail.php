<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiTypeDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mbti_type',
        'type_name',
        'profile_summary_for_employer',
        'key_strengths_in_workplace',
        'potential_development_areas_for_workplace_effectiveness',
        'communication_style_and_tips_for_employer',
        'task_management_approach_and_tips_for_employer',
        'feedback_receptivity_and_guidance_for_employer',
        'work_environment_preferences_for_employer',
        'motivators_for_employer_to_leverage',
        'team_collaboration_style_for_employer',
        'leadership_potential_or_style_notes_for_employer',
        'cognitive_functions',
        'career_suggestions',
        'famous_examples',
        'how_to_handle_stress',
        'relationships_with_other_types',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'key_strengths_in_workplace' => 'array',
        'potential_development_areas_for_workplace_effectiveness' => 'array',
        'motivators_for_employer_to_leverage' => 'array',
        'cognitive_functions' => 'array',
        'career_suggestions' => 'array',
        'famous_examples' => 'array',
    ];

}
