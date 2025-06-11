<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MbtiTypeDetail;

class MbtiTypeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // INTJ (Architect) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'INTJ',
            'type_name' => 'Architect',
            'profile_summary_for_employer' => 'INTJ employees are valuable team members who stand out with their strategic thinking abilities and long-term vision. They demonstrate superior performance in analyzing complex problems, developing systematic solutions, and working independently. They produce quality results through their high standards and perfectionist approaches.',
            'key_strengths_in_workplace' => [
                'Strategic planning and long-term vision development',
                'Analyzing complex problems and creating systematic solutions',
                'Independent work and self-management skills',
                'Developing innovative approaches and creative solutions'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Improving team communication skills',
                'Sharing details and making processes transparent',
                'Controlling impatience tendencies',
                'Showing tolerance for different work styles'
            ],
            'communication_style_and_tips_for_employer' => 'INTJ employees prefer direct, concise, and logical communication. When communicating with them, provide concrete data and logical justifications. Avoid unnecessary meetings and prefer to communicate important matters in writing. Criticisms are better received when presented constructively and objectively.',
            'task_management_approach_and_tips_for_employer' => 'Provide autonomy and flexibility in task management. Set clear goals and deadlines, but trust them on how they manage the process. Avoid micro-management and make result-oriented evaluations. Give complex and intellectually challenging projects.',
            'feedback_receptivity_and_guidance_for_employer' => 'Use objective data and concrete examples when giving feedback. Conduct performance evaluations based on logical criteria and clearly express your development suggestions. They prefer analytical and constructive feedback rather than emotional approaches.',
            'work_environment_preferences_for_employer' => 'They prefer quiet, organized, and uninterrupted work environments. Try to provide private workspaces rather than open office layouts. Flexible working hours and remote work opportunities increase their motivation. They work more efficiently in environments with strong technological infrastructure.',
            'motivators_for_employer_to_leverage' => [
                'Intellectually challenging and complex projects',
                'Autonomy and independent decision-making authority',
                'Long-term goals and strategic projects',
                'Continuous learning and development opportunities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a quality and efficiency-focused approach in teamwork. They work more effectively in small, talented teams. They succeed in environments where roles and responsibilities are clearly defined. They provide valuable contributions in brainstorming sessions but may be reluctant to participate in social activities.',
            'leadership_potential_or_style_notes_for_employer' => 'They have natural leadership potential and adopt a visionary leadership style. They are successful in making strategic decisions, developing long-term plans, and directing the team towards goals. They perform best in leadership positions when given independence and decision-making authority.'
        ]);

        // INTP (Thinker) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'INTP',
            'type_name' => 'Thinker',
            'profile_summary_for_employer' => 'INTP employees are team members who add value with their analytical thinking power and theoretical problem-solving abilities. They demonstrate extraordinary performance in understanding complex systems, developing innovative solutions, and conducting in-depth research. They produce quality results through their objective approaches and logical analyses.',
            'key_strengths_in_workplace' => [
                'Analyzing complex theoretical problems and developing solutions',
                'System optimization with innovative and original approaches',
                'In-depth research and data analysis skills',
                'Objective evaluation and logic-based decision making'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Focusing on project deadlines and time management',
                'Regular team communication and update sharing',
                'Developing result-orientation for practical applications',
                'Maintaining motivation for routine tasks'
            ],
            'communication_style_and_tips_for_employer' => 'INTP employees prefer logical, analytical, and in-depth communication. When communicating with them, provide theoretical foundations and logical explanations. Give them time to develop their ideas and allow them to express their thoughts. Criticisms are more constructively received when supported with objective data.',
            'task_management_approach_and_tips_for_employer' => 'Provide space for flexibility and creativity in task management. Define clear results but give them freedom on how they manage the process. Give research and development-focused projects. Minimize routine tasks and prioritize intellectually challenging work.',
            'feedback_receptivity_and_guidance_for_employer' => 'Use logical justifications and objective criteria when giving feedback. Conduct performance evaluations with an analytical approach and support your development suggestions with theoretical foundations. They prefer work-focused, constructive feedback rather than personal criticism.',
            'work_environment_preferences_for_employer' => 'They prefer quiet, contemplative, and uninterrupted work environments. Try to provide individual workspaces and flexible work arrangements. Easy access to research resources and strong technological infrastructure increases their motivation. They work more efficiently in environments with low social pressure.',
            'motivators_for_employer_to_leverage' => [
                'Theoretically and analytically challenging projects',
                'Research and development opportunities',
                'Opportunity to develop original solutions',
                'Continuous learning and exploration opportunities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate an idea development and problem-solving focused approach in teamwork. They provide valuable contributions in brainstorming and analytical discussions. They work more effectively in small, expertise-focused teams. They prefer collaboration-based work environments rather than social interaction.',
            'leadership_potential_or_style_notes_for_employer' => 'They demonstrate expertise-based leadership rather than traditional leadership style. They are successful in providing guidance on technical matters, developing innovative solutions, and directing the team with analytical approaches. They perform best in leadership positions when given technical autonomy and research authority.'
        ]);

        // ENTJ (Commander) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ENTJ',
            'type_name' => 'Commander',
            'profile_summary_for_employer' => 'ENTJ employees are strong team members who stand out with their natural leadership abilities and strategic vision. They demonstrate superior performance in organizational management, goal-oriented work, and team motivation. They successfully complete projects through their results-focused approaches and decisive stance.',
            'key_strengths_in_workplace' => [
                'Natural leadership and team management abilities',
                'Strategic planning and goal-setting skills',
                'Quick decision-making and effective implementation power',
                'Organizational efficiency and process optimization'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing patient listening and empathy skills',
                'Focusing on details and increasing thoroughness',
                'Showing openness and tolerance to different viewpoints',
                'Adapting to team members\' development pace'
            ],
            'communication_style_and_tips_for_employer' => 'ENTJ employees prefer direct, clear, and results-oriented communication. When communicating with them, set clear goals and concrete expectations. Support quick decision-making processes and avoid unnecessary details. Criticisms are more effective when presented with a performance-focused and development-oriented approach.',
            'task_management_approach_and_tips_for_employer' => 'Provide leadership authority and decision-making power in task management. Set clear goals, measurable results, and deadlines. Give team management responsibilities and grant authority to optimize processes. Assign challenging and strategically important projects.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a direct, clear, and results-oriented approach when giving feedback. Conduct performance evaluations based on measurable criteria and relate your development suggestions to strategic goals. They accept constructive criticism but expect logical justifications.',
            'work_environment_preferences_for_employer' => 'They prefer dynamic, fast-paced, and results-oriented work environments. Leadership positions and decision-making authority increase their motivation. They work more efficiently in collaborative environments with intensive team interaction. Try to provide technological tools and efficiency systems.',
            'motivators_for_employer_to_leverage' => [
                'Leadership responsibilities and team management opportunities',
                'Strategically important and challenging projects',
                'Organizational development and change management',
                'Recognition of success and career development opportunities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a leadership and coordination-focused approach in teamwork. They work effectively in increasing team motivation, setting goals, and managing processes. They can display effective leadership even in large teams. They prefer results-oriented collaboration and performance-based work environments.',
            'leadership_potential_or_style_notes_for_employer' => 'They have strong natural leadership potential and adopt a directive leadership style. They are successful in setting strategic goals, motivating the team, and tracking results. They perform best in leadership positions when given broad authority and responsibility. They effectively manage organizational change and growth processes.'
        ]);

        // ENTP (Debater) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ENTP',
            'type_name' => 'Debater',
            'profile_summary_for_employer' => 'ENTP employees are dynamic team members who add value with their innovative thinking structures and creative problem-solving abilities. They demonstrate superior performance in brainstorming, developing new ideas, and change management. They produce successful results in challenging projects through their adaptation abilities and energetic approaches.',
            'key_strengths_in_workplace' => [
                'Creative problem solving and innovative approaches',
                'Quick adaptation and change management skills',
                'Effective communication and persuasion abilities',
                'Multi-dimensional thinking and developing alternative solutions'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing detail-focus and thoroughness',
                'Maintaining focus on long-term projects',
                'Increasing motivation for routine tasks',
                'Strengthening patient implementation and follow-up skills'
            ],
            'communication_style_and_tips_for_employer' => 'ENTP employees prefer energetic, interactive, and idea-focused communication. When communicating with them, provide open discussion environments and allow them to develop their ideas. Support brainstorming sessions and evaluate their creative suggestions. Criticisms are more constructively received when presented with a development-focused and idea-based approach.',
            'task_management_approach_and_tips_for_employer' => 'Provide space for flexibility and creativity in task management. Give various projects and variable tasks. Minimize routine work and prioritize projects requiring innovative approaches. Offer team collaboration and idea-sharing opportunities. Try to balance short-term goals with long-term vision.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt an interactive and discussion-open approach when giving feedback. Conduct performance evaluations with a development focus and relate them to new opportunities. Recognize their creative contributions and present your development suggestions as idea development opportunities. Encourage constructive discussions.',
            'work_environment_preferences_for_employer' => 'They prefer dynamic, interactive, and variable work environments. Open communication channels and collaboration opportunities increase their motivation. Try to provide flexible work arrangements and various project opportunities. They work more efficiently in energetic environments with intensive social interaction.',
            'motivators_for_employer_to_leverage' => [
                'Innovative and creative projects',
                'Various tasks and variable responsibilities',
                'Team collaboration and idea-sharing opportunities',
                'Continuous learning and development opportunities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate an energy and creativity-focused approach in teamwork. They provide valuable contributions in brainstorming sessions and increase team motivation. They work effectively in cross-functional teams and are successful in bringing different perspectives together. They prefer collaboration-based and dynamic work environments.',
            'leadership_potential_or_style_notes_for_employer' => 'They have innovative and inspiring leadership potential. They demonstrate effective leadership in change management, team motivation, and developing creative solutions. They perform best in leadership positions when given flexibility and innovation authority. They adopt a collaboration-based leadership style rather than traditional hierarchy.'
        ]);

        // INFJ (Advocate) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'INFJ',
            'type_name' => 'Advocate',
            'profile_summary_for_employer' => 'INFJ employees are valuable team members who stand out with their deep empathy abilities and strong value systems. They demonstrate superior performance in developing human-centered solutions, creating long-term vision, and executing meaningful projects. They produce quality and sustainable results through their quiet determination and perfectionist approaches.',
            'key_strengths_in_workplace' => [
                'Deep empathy and ability to understand human psychology',
                'Long-term vision and strategic thinking skills',
                'High quality standards and detail-focused work',
                'Value-based decision making and ethical approaches'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Being more assertive in conflict situations',
                'Developing skills to not take criticism personally',
                'Preventing delays due to perfectionism',
                'Increasing ability to express oneself in large groups'
            ],
            'communication_style_and_tips_for_employer' => 'INFJ employees prefer deep, meaningful, and empathy-based communication. When communicating with them, understand their values and motivations. Conduct individual meetings and give them time to develop their ideas. Criticisms are more effective when presented with a constructive and supportive tone. Emphasize the human impact of projects.',
            'task_management_approach_and_tips_for_employer' => 'Provide meaningful and value-based projects in task management. Set clear goals but give freedom in managing creative processes. Conduct quality-focused evaluations and support their perfectionist tendencies. Prioritize human-centered and socially beneficial projects.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a supportive and constructive approach when giving feedback. Conduct performance evaluations with value-based criteria and offer personal development opportunities. Appreciate their achievements and present your development suggestions with a mentoring approach. They prefer work-focused feedback rather than personal criticism.',
            'work_environment_preferences_for_employer' => 'They prefer quiet, peaceful, and uninterrupted work environments. Positive team dynamics and value-aligned environments increase their motivation. Try to provide flexible work arrangements and individual workspaces. They work more efficiently in environments where meaningful projects are executed and ethical values are prioritized.',
            'motivators_for_employer_to_leverage' => [
                'Meaningful and socially beneficial projects',
                'Personal development and mentoring opportunities',
                'Creative freedom and quality-focused work',
                'Value-aligned team and organizational culture'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate an empathy and harmony-focused approach in teamwork. They work effectively in discovering and supporting team members\' strengths. They work more comfortably in small, intimate teams. They provide valuable contributions in conflict resolution and ensuring team harmony.',
            'leadership_potential_or_style_notes_for_employer' => 'They have quiet and inspiring leadership potential. They demonstrate effective leadership in vision setting, team motivation, and value-based decision making. They perform best in leadership positions when given empathy and understanding authority. They adopt a servant leadership style and prioritize team members\' development.'
        ]);

        // INFP (Mediator) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'INFP',
            'type_name' => 'Mediator',
            'profile_summary_for_employer' => 'INFP employees are unique team members who stand out with their strong value systems and creative approaches. They demonstrate superior performance in individual motivation, creative problem solving, and executing value-based projects. They produce innovative and sustainable solutions through their pursuit of authenticity and flexible approaches.',
            'key_strengths_in_workplace' => [
                'Strong value system and ethical decision making',
                'Creative thinking and developing original solutions',
                'Individual motivation and self-direction skills',
                'Empathy and respect for differences'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing time management and deadline focus',
                'Adapting to structured processes',
                'Objectively evaluating criticism and feedback',
                'Regular team communication and update sharing'
            ],
            'communication_style_and_tips_for_employer' => 'INFP employees prefer sincere, value-based, and individual communication. When communicating with them, understand their personal values and motivations. Conduct one-on-one meetings and provide an environment where they can express their ideas comfortably. Criticisms are more constructively received when presented supportively and development-focused.',
            'task_management_approach_and_tips_for_employer' => 'Provide flexibility and creative freedom in task management. Give value-aligned projects and set meaningful goals. Avoid micro-management and conduct results-oriented evaluations. Support individual work styles and allow time for creative processes.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt an empathetic and supportive approach when giving feedback. Conduct performance evaluations with a personal development focus and emphasize their strengths. Present constructive criticism within a value-based framework and relate it to development opportunities. Give objective feedback that won\'t create a perception of personal attack.',
            'work_environment_preferences_for_employer' => 'They prefer flexible, creative, and value-aligned work environments. Individual workspaces and flexible working hours increase their motivation. Try to provide positive team culture and environments that respect differences. They work more efficiently in environments where creative projects are supported and authenticity is valued.',
            'motivators_for_employer_to_leverage' => [
                'Value-aligned meaningful projects',
                'Creative freedom and individual expression opportunities',
                'Flexible work arrangements and autonomy',
                'Personal development and self-actualization opportunities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a harmony and empathy-focused approach in teamwork. They work effectively in understanding and supporting different perspectives. They feel more comfortable in small, intimate teams. They can take on mediation roles in conflict resolution and ensuring team harmony.',
            'leadership_potential_or_style_notes_for_employer' => 'They have value-based and inspiring leadership potential. They demonstrate effective leadership in discovering and supporting team members\' individual strengths. They perform best in leadership positions when given authenticity and value alignment authority. They adopt a democratic and participative leadership style.'
        ]);

        // ENFJ (Protagonist) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ENFJ',
            'type_name' => 'Protagonist',
            'profile_summary_for_employer' => 'ENFJ employees are valuable team members who stand out with their charismatic leadership abilities and strong human-centered approaches. They demonstrate superior performance in team motivation, organizational development, and human resources management. They create high-performing teams through their inspiring approaches and empathy abilities.',
            'key_strengths_in_workplace' => [
                'Charismatic leadership and providing team motivation',
                'Human resources development and mentoring skills',
                'Effective communication and persuasion abilities',
                'Organizational culture creation and change management'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Objective decision making and maintaining emotional distance',
                'Prioritizing their own needs as well',
                'Developing critical feedback giving skills',
                'Controlling tendency to take excessive responsibility'
            ],
            'communication_style_and_tips_for_employer' => 'ENFJ employees prefer warm, inspiring, and person-focused communication. When communicating with them, emphasize team and organizational vision. Give open and supportive feedback. They become more motivated when you highlight human-centered goals and social benefits. Support their active participation in team meetings.',
            'task_management_approach_and_tips_for_employer' => 'Provide leadership responsibilities and team coordination in task management. Assign human resources-focused projects and provide mentoring opportunities. Prioritize organizational development and culture creation tasks. Make team success measurable and set collective goals.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a supportive and development-focused approach when giving feedback. Conduct performance evaluations to include team success and human development criteria. Recognize their leadership skills and offer development opportunities. Constructive criticism is more effective when presented within the framework of organizational benefit.',
            'work_environment_preferences_for_employer' => 'They prefer collaboration-focused, dynamic, and human-centered work environments. Open communication channels and team interaction increase their motivation. Try to provide leadership opportunities and mentoring possibilities. They work more efficiently in value-based work environments where positive organizational culture is supported.',
            'motivators_for_employer_to_leverage' => [
                'Leadership responsibilities and team development opportunities',
                'Human-centered and socially beneficial projects',
                'Mentoring and personal development programs',
                'Organizational culture creation and change management'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a leadership and coordination-focused approach in teamwork. They work effectively in discovering and developing team members\' strengths. They can create harmonious work environments even in large teams. They provide valuable contributions in team motivation and performance improvement.',
            'leadership_potential_or_style_notes_for_employer' => 'They have strong natural leadership potential and adopt a transformational leadership style. They are successful in vision creation, team inspiration, and organizational change management. They perform best in leadership positions when given human resources authority and mentoring responsibility. They adopt a participative leadership approach that prioritizes human values.'
        ]);

        // ENFP (Campaigner) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ENFP',
            'type_name' => 'Campaigner',
            'profile_summary_for_employer' => 'ENFP employees are dynamic team members who stand out with their enthusiastic energy and creative approaches. They demonstrate superior performance in innovation management, team motivation, and creative problem solving. They create positive work environments through their inspiring approaches and human-centered solutions.',
            'key_strengths_in_workplace' => [
                'Creative thinking and developing innovative solutions',
                'Strong communication skills and team motivation',
                'Quick adaptation and change management abilities',
                'Empathy and connection building in human relationships'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing detail focus and thoroughness',
                'Maintaining focus on long-term projects',
                'Improving time management and prioritization skills',
                'Sustaining motivation for routine tasks'
            ],
            'communication_style_and_tips_for_employer' => 'ENFP employees prefer energetic, interactive, and inspiring communication. When communicating with them, support their enthusiasm and listen to their creative ideas. Organize brainstorming sessions and encourage team interaction. Criticisms are more constructively received when presented as development opportunities and given with a positive tone.',
            'task_management_approach_and_tips_for_employer' => 'Provide variety and creative freedom in task management. Give innovation-focused projects and offer team collaboration opportunities. Minimize routine tasks and prioritize human-centered, meaningful projects. Try to balance short-term goals with long-term vision.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a positive and supportive approach when giving feedback. Conduct performance evaluations based on creative contributions and team impact. Emphasize their strengths and relate your development suggestions to new opportunities. Criticisms are more effective when presented in a constructive discussion environment.',
            'work_environment_preferences_for_employer' => 'They prefer dynamic, interactive, and creative work environments. Open communication channels and collaboration opportunities increase their motivation. Try to provide flexible work arrangements and various project opportunities. They work more efficiently in environments where positive energy and innovation are supported.',
            'motivators_for_employer_to_leverage' => [
                'Creative and innovative projects',
                'Team collaboration and human-centered work',
                'Various tasks and variable responsibilities',
                'Personal development and inspiring leadership opportunities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate an energy and motivation-focused approach in teamwork. They work effectively in bringing team members together and creating positive atmosphere. They provide valuable contributions in cross-functional teams. They enhance team performance in brainstorming and creative problem-solving sessions.',
            'leadership_potential_or_style_notes_for_employer' => 'They have inspiring and participative leadership potential. They demonstrate effective leadership in team motivation, creative vision creation, and change management. They perform best in leadership positions when given creative freedom and human-centered approach authority. They adopt a democratic and interactive leadership style, focusing on bringing out team members\' potential.'
        ]);

        // ISTJ (Logistician) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ISTJ',
            'type_name' => 'Logistician',
            'profile_summary_for_employer' => 'ISTJ employees are valuable team members who bring stability to the organization with their reliability and systematic approaches. They demonstrate superior performance in detail-focused work, process management, and quality control. They produce consistent and reliable results through their methodical approaches and sense of responsibility.',
            'key_strengths_in_workplace' => [
                'Detail-focused and meticulous work approach',
                'Reliable process management and quality control',
                'Systematic planning and organizing skills',
                'Sense of responsibility and commitment to obligations'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Increasing adaptation speed to change and innovations',
                'Developing openness to creative and flexible solutions',
                'Making team communication more proactive',
                'Showing tolerance for risk-taking and experimental approaches'
            ],
            'communication_style_and_tips_for_employer' => 'ISTJ employees prefer clear, structured, and fact-based communication. When communicating with them, provide concrete data and clear instructions. Support written communication and announce changes in advance. Criticisms are more constructively received when presented through objective criteria.',
            'task_management_approach_and_tips_for_employer' => 'Set clear processes and explicit expectations in task management. Provide detailed project plans and timelines. Clearly define quality standards and establish regular checkpoints. Allow them to specialize in routine and repetitive tasks.',
            'feedback_receptivity_and_guidance_for_employer' => 'Use objective criteria and concrete examples when giving feedback. Conduct performance evaluations based on measurable standards and present your development suggestions with a structured plan. Appreciate their achievements and emphasize their reliability.',
            'work_environment_preferences_for_employer' => 'They prefer organized, quiet, and predictable work environments. Clear job descriptions and regular routines increase their motivation. Try to provide individual workspaces and minimal interruption environments. They work more efficiently in environments with traditional office layout and structured processes.',
            'motivators_for_employer_to_leverage' => [
                'Clear responsibilities and measurable goals',
                'Quality and excellence-focused projects',
                'Regular routines and predictable processes',
                'Recognition of success and emphasis on reliability'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a reliability and stability-focused approach in teamwork. They work effectively in organized teams with clear role definitions. They provide valuable contributions in process-focused collaboration and quality control. They prefer small, stable team structures.',
            'leadership_potential_or_style_notes_for_employer' => 'They have reliable and process-focused leadership potential. They demonstrate effective leadership in operational management, quality control, and team organization. They perform best in leadership positions when given clear authority and responsibility definitions. They adopt a traditional and stability-focused leadership style.'
        ]);

        // ISFJ (Defender) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ISFJ',
            'type_name' => 'Defender',
            'profile_summary_for_employer' => 'ISFJ employees are valuable team members who bring harmony and stability to the organization with their selfless approaches and strong support abilities. They demonstrate superior performance in human resources support, customer service, and team harmony. They create positive work environments through their protective approaches and empathy abilities.',
            'key_strengths_in_workplace' => [
                'Strong empathy and providing human-centered support',
                'Detail-focused and meticulous service quality',
                'Team harmony and conflict resolution skills',
                'Selfless work and prioritizing others\' needs'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing skills to express their own needs as well',
                'Increasing courage in giving critical feedback',
                'Increasing adaptation speed to change and innovations',
                'Balancing tendency to take excessive responsibility'
            ],
            'communication_style_and_tips_for_employer' => 'ISFJ employees prefer warm, supportive, and person-focused communication. When communicating with them, show empathy and understand their personal values. Support one-on-one meetings and provide an environment where they can express their ideas comfortably. Criticisms are more effective when presented with a constructive and supportive tone.',
            'task_management_approach_and_tips_for_employer' => 'Prioritize human-centered projects and support roles in task management. Set clear goals but allow flexibility in implementation. Give customer service, team support, and organizational harmony tasks. Assign projects that offer opportunities to help others.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a supportive and personal approach when giving feedback. Conduct performance evaluations based on team contribution and human relationships. Appreciate their selfless work and present your development suggestions with a mentoring approach. Avoid personal criticism and give constructive feedback.',
            'work_environment_preferences_for_employer' => 'They prefer harmonious, supportive, and positive work environments. Team collaboration and intimate relationships increase their motivation. Try to provide conflict-free and stress-free environments. They work more efficiently in environments where human-centered values are prioritized and empathy and understanding prevail.',
            'motivators_for_employer_to_leverage' => [
                'Human-centered and supportive projects',
                'Team harmony and organizational culture development',
                'Customer satisfaction and service quality-focused tasks',
                'Being appreciated and having their contributions recognized'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a support and harmony-focused approach in teamwork. They work effectively in meeting team members\' needs and conflict resolution. They feel more comfortable in intimate, small teams. They provide valuable contributions in maintaining team morale and creating positive atmosphere.',
            'leadership_potential_or_style_notes_for_employer' => 'They have supportive and servant leadership potential. They demonstrate effective leadership in team development, human resources management, and organizational culture creation. They perform best in leadership positions when given empathy and support authority. They adopt a protective and team-focused leadership style.'
        ]);

        // ESTJ (Executive) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ESTJ',
            'type_name' => 'Executive',
            'profile_summary_for_employer' => 'ESTJ employees are valuable team members who bring order and efficiency to the business with their strong organizational abilities and systematic approaches. They demonstrate superior performance in project management, operational efficiency, and team coordination. They produce effective results in achieving goals through their leadership abilities and results-oriented approaches.',
            'key_strengths_in_workplace' => [
                'Strong organization and project management skills',
                'Systematic approach and providing operational efficiency',
                'Natural leadership and team coordination abilities',
                'Results-oriented work and goal focus'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing flexibility and openness to creative solutions',
                'Patient listening and increasing tolerance for different viewpoints',
                'Focusing on details and balancing micro-management tendency',
                'Adapting to team members\' individual work styles'
            ],
            'communication_style_and_tips_for_employer' => 'ESTJ employees prefer direct, clear, and results-oriented communication. When communicating with them, set clear goals and concrete expectations. Support quick decision-making processes and appreciate efficiency-focused approaches. Criticisms are more effective when presented with a performance and results-focused approach.',
            'task_management_approach_and_tips_for_employer' => 'Provide leadership responsibilities and organizational tasks in task management. Set clear goals, measurable results, and timelines. Grant project management and team coordination responsibility. Prioritize operational efficiency and system improvement projects.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a direct, clear, and results-oriented approach when giving feedback. Conduct performance evaluations based on measurable criteria and success metrics. Appreciate their leadership skills and relate your development suggestions to organizational goals. They accept objective and constructive criticism.',
            'work_environment_preferences_for_employer' => 'They prefer organized, efficient, and goal-oriented work environments. Clear hierarchy and responsibility definitions increase their motivation. Try to provide leadership opportunities and decision-making authority. They work more efficiently in environments where results-oriented and performance-based evaluations are conducted.',
            'motivators_for_employer_to_leverage' => [
                'Leadership responsibilities and management opportunities',
                'Organizational efficiency and system improvement projects',
                'Clear goals and measurable success criteria',
                'Recognition of success and career development opportunities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a leadership and coordination-focused approach in teamwork. They work effectively in team organization, task distribution, and process management. They can provide order and efficiency even in large teams. They prefer results-oriented collaboration and performance-based work environments.',
            'leadership_potential_or_style_notes_for_employer' => 'They have strong natural leadership potential and adopt a directive leadership style. They are successful in operational management, team coordination, and organizational efficiency. They perform best in leadership positions when given broad authority and organizational responsibility. They adopt a traditional and results-oriented leadership approach.'
        ]);

        // ESFJ (Consul) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ESFJ',
            'type_name' => 'Consul',
            'profile_summary_for_employer' => 'ESFJ employees are valuable team members who bring harmony and positive energy to the organization with their strong social abilities and service-oriented approaches. They demonstrate superior performance in customer relations, team coordination, and organizational culture development. They build strong business relationships through their humanistic approaches and community-focused work styles.',
            'key_strengths_in_workplace' => [
                'Strong social skills and customer-focused service',
                'Team harmony and creating positive work environment',
                'Organizational culture development and community building',
                'Detail-focused and providing meticulous service quality'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Increasing courage in giving critical feedback',
                'Expressing their own views more assertively',
                'Increasing adaptation speed to change and innovations',
                'Developing more objective approach in conflict situations'
            ],
            'communication_style_and_tips_for_employer' => 'ESFJ employees prefer warm, supportive, and community-focused communication. When communicating with them, show personal interest and emphasize team dynamics. Give open appreciation and positive feedback. They become more motivated when you highlight organizational values and social benefits.',
            'task_management_approach_and_tips_for_employer' => 'Prioritize human-centered projects and customer service roles in task management. Set clear goals and offer team collaboration opportunities. Give organizational events, culture development, and customer relations tasks. Assign projects that require social interaction.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a supportive and positive approach when giving feedback. Conduct performance evaluations based on team contribution and customer satisfaction. Appreciate their social skills and team-focused work. Your development suggestions are more effective when presented as personal development opportunities.',
            'work_environment_preferences_for_employer' => 'They prefer social, collaboration-focused, and positive work environments. Team interaction and open communication channels increase their motivation. Try to provide customer contact and service-oriented roles. They work more efficiently in environments where human values are prioritized and community spirit is strong.',
            'motivators_for_employer_to_leverage' => [
                'Customer service and human-centered projects',
                'Team activities and organizational culture development',
                'Social responsibility and socially beneficial tasks',
                'Being appreciated and emphasizing their valuable role in the team'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a harmony and social connection-focused approach in teamwork. They work effectively in maintaining team morale and creating positive atmosphere. They can ensure social harmony even in large teams. They provide valuable contributions in team activities and collaboration projects.',
            'leadership_potential_or_style_notes_for_employer' => 'They have social and supportive leadership potential. They demonstrate effective leadership in team motivation, organizational culture creation, and customer relations management. They perform best in leadership positions when given human resources and community building authority. They adopt a participative and service-oriented leadership style.'
        ]);

        // ISTP (Virtuoso) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ISTP',
            'type_name' => 'Virtuoso',
            'profile_summary_for_employer' => 'ISTP employees are dynamic team members who add concrete value to the organization with their practical problem-solving abilities and technical expertise. They demonstrate superior performance in instant solution development, system optimization, and hands-on approaches. They produce effective results in complex technical problems through their flexible adaptation abilities and analytical thinking structures.',
            'key_strengths_in_workplace' => [
                'Superior ability in practical and technical problem solving',
                'Master-level work with tools, systems, and technologies',
                'Instant adaptation and crisis management skills',
                'Independent work and self-direction capacity'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing long-term planning and strategic thinking skills',
                'Regular team communication and update sharing',
                'Increasing tolerance for theoretical and conceptual work',
                'Developing routine reporting and documentation habits'
            ],
            'communication_style_and_tips_for_employer' => 'ISTP employees prefer short, clear, and results-oriented communication. When communicating with them, provide concrete examples and practical applications. Avoid unnecessary meetings and emphasize technical details. Criticisms are more constructively received when supported with objective data and presented solution-focused.',
            'task_management_approach_and_tips_for_employer' => 'Provide autonomy and technical freedom in task management. Give hands-on projects and conduct results-oriented evaluations. Avoid micro-management and trust them in tasks requiring emergency intervention. Prioritize technical research and development projects.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a direct, technically-based, and solution-focused approach when giving feedback. Conduct performance evaluations based on concrete results and support your development suggestions with practical applications. Appreciate their technical achievements and offer opportunities to learn new tools/technologies.',
            'work_environment_preferences_for_employer' => 'They prefer flexible, uninterrupted work environments with abundant technical tools. Individual workspaces and hands-on experience opportunities increase their motivation. Try to provide remote work options and flexible hours. They work more efficiently in technical laboratory and workshop-like environments.',
            'motivators_for_employer_to_leverage' => [
                'Technical challenges and hands-on problem-solving projects',
                'Opportunities to work with new tools and technologies',
                'Autonomy and independent decision-making authority',
                'Emergency intervention and crisis resolution responsibilities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a practical contribution and technical support-focused approach in teamwork. They work more effectively in small, technically-focused teams. They offer applicable solutions in brainstorming sessions. They prefer work-focused collaboration rather than social activities.',
            'leadership_potential_or_style_notes_for_employer' => 'They have technical expertise-based leadership potential. They demonstrate effective leadership in crisis management, technical project leadership, and problem solving. They perform best in leadership positions when given technical autonomy and hands-on approach authority. They adopt a pragmatic and results-oriented leadership style.'
        ]);

        // ISFP (Adventurer) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ISFP',
            'type_name' => 'Adventurer',
            'profile_summary_for_employer' => 'ISFP employees are valuable team members who bring authenticity and innovation to the organization with their creative approaches and strong aesthetic sensibilities. They demonstrate superior performance in creative projects, individual expression, and value-based work. They produce human-centered solutions through their flexible adaptation abilities and empathy-focused approaches.',
            'key_strengths_in_workplace' => [
                'Creative thinking and developing original solutions',
                'Strong aesthetic sensibility and design skills',
                'Individual motivation and self-direction capacity',
                'Empathy and ability to respect differences'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing time management and deadline focus',
                'Improving ability to adapt to structured processes',
                'Proactive team communication and update sharing',
                'Objectively evaluating criticism and feedback'
            ],
            'communication_style_and_tips_for_employer' => 'ISFP employees prefer sincere, value-based, and individual communication. When communicating with them, understand their personal values and creative visions. Conduct one-on-one meetings and give them time to develop their ideas. Criticisms are more constructively received when presented supportively and development-focused.',
            'task_management_approach_and_tips_for_employer' => 'Provide creative freedom and flexible processes in task management. Give meaningful and value-aligned projects. Avoid micro-management and support individual work styles. Prioritize creative and aesthetically-focused projects.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt an empathetic and supportive approach when giving feedback. Conduct performance evaluations based on creative contributions and individual development. Emphasize their strengths and present your development suggestions within the framework of personal values. Constructive criticism is more effective when presented as creative opportunities.',
            'work_environment_preferences_for_employer' => 'They prefer flexible, creative, and aesthetically pleasant work environments. Individual workspaces and creative expression opportunities increase their motivation. Try to provide natural light and comfortable atmosphere. They work more efficiently in environments where authenticity is valued and differences are supported.',
            'motivators_for_employer_to_leverage' => [
                'Creative and aesthetically-focused projects',
                'Individual expression and authenticity opportunities',
                'Value-aligned meaningful work',
                'Flexible work arrangements and autonomy'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate a creativity and empathy-focused approach in teamwork. They work effectively in understanding different perspectives and developing creative solutions. They feel more comfortable in small, intimate teams. They provide valuable contributions in brainstorming and creative problem-solving sessions.',
            'leadership_potential_or_style_notes_for_employer' => 'They have inspiring and value-based leadership potential. They demonstrate effective leadership in creative vision creation, discovering team members\' individual strengths, and developing original solutions. They perform best in leadership positions when given creative freedom and value alignment authority. They adopt a democratic and inspiring leadership style.'
        ]);

        // ESTP (Entrepreneur) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ESTP',
            'type_name' => 'Entrepreneur',
            'profile_summary_for_employer' => 'ESTP employees are valuable team members who bring speed and adaptation to the organization with their dynamic energy and instant opportunity evaluation abilities. They demonstrate superior performance in sales, negotiation, and situations requiring quick decisions. They produce effective results in competitive environments through their risk-taking courage and pragmatic approaches.',
            'key_strengths_in_workplace' => [
                'Quick decision making and instant opportunity evaluation',
                'Strong social skills and persuasion abilities',
                'Risk-taking courage and entrepreneurial approaches',
                'High energy and dynamic work capacity'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing long-term planning and strategic thinking skills',
                'Improving detail focus and thoroughness',
                'Patient analysis and in-depth research habits',
                'Sustaining motivation for routine tasks'
            ],
            'communication_style_and_tips_for_employer' => 'ESTP employees prefer energetic, direct, and interactive communication. When communicating with them, adopt a fast-paced and results-oriented approach. Support face-to-face meetings and provide dynamic discussion environments. Criticisms are more constructively received when presented quickly and action-focused.',
            'task_management_approach_and_tips_for_employer' => 'Provide variety and fast pace in task management. Give sales, negotiation, and customer relations-focused projects. Minimize routine tasks and set competitive goals. Grant instant decision-making authority and conduct results-oriented evaluations.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a direct, quick, and action-focused approach when giving feedback. Conduct performance evaluations based on concrete results and success metrics. Appreciate their entrepreneurial approaches and relate them to new opportunities. Emphasize competitive achievements.',
            'work_environment_preferences_for_employer' => 'They prefer dynamic, fast-paced work environments with intensive social interaction. Customer contact and field work increase their motivation. Try to provide flexible work arrangements and freedom of movement. They work more efficiently in competitive and success-oriented environments.',
            'motivators_for_employer_to_leverage' => [
                'Competitive goals and success-oriented projects',
                'Sales, negotiation, and customer relations opportunities',
                'Quick decision-making authority and autonomy',
                'Various tasks and variable responsibilities'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate an energy and motivation-focused approach in teamwork. They work effectively in increasing team dynamism and developing quick solutions. They succeed in competitive team environments. They provide valuable contributions in brainstorming and situations requiring quick decisions.',
            'leadership_potential_or_style_notes_for_employer' => 'They have dynamic and results-oriented leadership potential. They demonstrate effective leadership in sales team leadership, crisis management, and rapid growth periods. They perform best in leadership positions when given quick decision-making and risk-taking authority. They adopt a pragmatic and entrepreneurial leadership style.'
        ]);

        // ESFP (Entertainer) personality type detailed work profile
        MbtiTypeDetail::create([
            'mbti_type' => 'ESFP',
            'type_name' => 'Entertainer',
            'profile_summary_for_employer' => 'ESFP employees are valuable team members who bring positive atmosphere and human-centered approach to the organization with their enthusiastic energy and strong social abilities. They demonstrate superior performance in customer service, team motivation, and creative presentation. They produce effective results in dynamic work environments through their spontaneous adaptation abilities and empathy-focused approaches.',
            'key_strengths_in_workplace' => [
                'Strong social skills and customer-focused service',
                'Providing positive energy and team motivation',
                'Spontaneous adaptation and instant problem solving',
                'Creative presentation and interactive communication abilities'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Developing long-term planning and strategic thinking skills',
                'Detail focus and documentation habits',
                'Improving time management and prioritization skills',
                'Critical analysis and objective evaluation capacity'
            ],
            'communication_style_and_tips_for_employer' => 'ESFP employees prefer energetic, warm, and interactive communication. When communicating with them, support their enthusiasm and show personal interest. Encourage face-to-face meetings and team gatherings. Criticisms are more constructively received when presented with a positive tone and as development opportunities.',
            'task_management_approach_and_tips_for_employer' => 'Provide variety and social interaction in task management. Give customer-focused, creative, and team collaboration-requiring projects. Minimize routine tasks and prioritize situations requiring spontaneous solutions. Maintain motivation with short-term goals.',
            'feedback_receptivity_and_guidance_for_employer' => 'Adopt a positive, supportive, and personal approach when giving feedback. Conduct performance evaluations based on team contribution and customer satisfaction. Appreciate their social skills and positive impacts. Your development suggestions are more effective when presented as new experiences and opportunities.',
            'work_environment_preferences_for_employer' => 'They prefer dynamic, social, and interactive work environments. Customer contact and team collaboration increase their motivation. Try to provide flexible work arrangements and creative expression opportunities. They work more efficiently in environments where positive energy and fun atmosphere are supported.',
            'motivators_for_employer_to_leverage' => [
                'Customer-focused and social interaction-requiring projects',
                'Creative presentation and event organization opportunities',
                'Team motivation and positive atmosphere creation tasks',
                'Various experiences and opportunities to meet new people'
            ],
            'team_collaboration_style_for_employer' => 'They demonstrate an energy and positive atmosphere-focused approach in teamwork. They work effectively in maintaining team morale and strengthening social connections. They can create harmonious work environments even in large teams. They provide valuable contributions in team activities and creative projects.',
            'leadership_potential_or_style_notes_for_employer' => 'They have inspiring and human-centered leadership potential. They demonstrate effective leadership in team motivation, customer relations management, and positive culture creation. They perform best in leadership positions when given social interaction and creative approach authority. They adopt a participative and fun leadership style, focusing on bringing out team members\' potential.'
        ]);
    }
}
