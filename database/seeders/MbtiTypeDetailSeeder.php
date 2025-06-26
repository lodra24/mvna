<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MbtiTypeDetail;

class MbtiTypeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesData = [
            //================ INTJ - The Architect ================
            [
                'mbti_type' => 'INTJ',
                'type_name' => 'The Architect',
                'profile_summary_for_employer' => "The INTJ, known as 'The Architect,' is one of the most strategically capable and independent personality types. They possess a powerful combination of Introverted Intuition (Ni) and Extraverted Thinking (Te), allowing them to both envision long-term possibilities and execute logical, step-by-step plans to achieve them. In the workplace, an INTJ is a formidable asset. They are not content with maintaining the status quo; they are driven to understand complex systems, identify inefficiencies, and redesign them for optimal performance. They approach challenges with a cool, rational mindset, often seeing patterns and connections that others miss. Their high standards for competence, both for themselves and others, ensure that their work is consistently thorough, well-reasoned, and of high quality. They are the natural strategists and long-range planners of any organization.",
                'key_strengths_in_workplace' => [
                    'Superior Strategic Vision: INTJs excel at forecasting future trends and developing comprehensive, long-term plans to navigate complex challenges. They see the entire chessboard, not just the next move.',
                    'Unwavering Logic and Objectivity: They make decisions based on impartial analysis and empirical data, filtering out emotional bias and irrationality to arrive at the most effective solution.',
                    'Efficiency and System Optimization: They have an innate talent for identifying bottlenecks, redundancies, and inefficiencies in any system or process and are driven to create more streamlined, effective alternatives.',
                    'Extreme Independence and Self-Direction: INTJs are highly autonomous and require minimal supervision. Once they understand a goal, they can be trusted to manage their own process and deliver results.',
                    'Commitment to Competence: They hold a deep respect for knowledge and competence. They are constantly learning and honing their own skills, and they expect a similar level of dedication from those they work with.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Developing Interpersonal Tact: Their direct, logic-driven communication can sometimes be perceived as blunt or dismissive of others\' feelings. Practicing empathy can improve collaboration.',
                    'Valuing Others\' Input: Their confidence in their own vision can sometimes lead them to dismiss input from others prematurely. Learning to actively listen to alternative perspectives can lead to even better outcomes.',
                    'Patience with Process and People: INTJs can become impatient with processes or individuals they deem inefficient. Developing tolerance for different working styles and paces is a key growth area.',
                    'Avoiding "Analysis Paralysis": While strategic, they can sometimes get so caught up in perfecting a plan that they delay action. Learning to balance planning with timely execution is crucial.'
                ],
                'communication_style_and_tips_for_employer' => "Communication with an INTJ should be direct, logical, and purposeful. They have little patience for small talk, office politics, or emotionally-laden arguments. To engage them effectively, present your ideas with clear reasoning and supporting data. Respect their time by keeping meetings focused and on-topic. They often prefer written communication, like email or detailed documents, as it allows them time to process information thoroughly before responding. When giving instructions, focus on the 'what' and 'why'—the strategic objective—and trust them to figure out the 'how'.",
                'task_management_approach_and_tips_for_employer' => "INTJs are not task-doers; they are system-builders. They thrive when given complex, long-term problems to solve. Granting them a high degree of autonomy is the single most effective way to manage them. Avoid micromanagement at all costs, as it undermines their competence and stifles their strategic thinking. They are highly motivated by challenges that stretch their intellectual capabilities. Assign them to projects involving R&D, strategic planning, system architecture, or process re-engineering. Their performance should be judged on the quality and effectiveness of the final outcome, not on their adherence to a prescribed method.",
                'feedback_receptivity_and_guidance_for_employer' => "INTJs see feedback as a critical tool for improvement and are remarkably receptive to it, provided it is delivered correctly. They are not looking for emotional validation; they are looking for ways to become more competent. Deliver feedback directly, privately, and logically. Base your critique on objective facts and performance metrics. Vague compliments like 'good job' are less impactful than specific praise such as, 'Your analysis of the market data uncovered a key risk we had overlooked.' Frame criticism as a logical problem to be solved, and they will eagerly work to fix it.",
                'work_environment_preferences_for_employer' => "The ideal work environment for an INTJ is one that values intelligence, competence, and efficiency. They require a quiet, private, or semi-private space that allows for periods of deep, uninterrupted concentration. An open-plan office can be a significant source of distraction and frustration. They are drawn to a culture of intellectual curiosity and respect, where ideas are judged on their merit, not on the status of the person who proposed them. An environment free from excessive bureaucracy and social obligations is where they will be most productive and content.",
                'motivators_for_employer_to_leverage' => [
                    'Autonomy and the freedom to execute their own vision.',
                    'Solving complex, intellectually stimulating problems.',
                    'Opportunities to design and implement new, efficient systems.',
                    'Working alongside other highly competent and intelligent individuals.',
                    'A clear path for growth based on merit and achievement.',
                    'Seeing their long-term strategies come to fruition and have a tangible impact.'
                ],
                'team_collaboration_style_for_employer' => "In a team setting, an INTJ is the natural strategist and architect. They will often take the lead in developing the plan and ensuring it is logically sound. They are not naturally focused on group harmony, but on group effectiveness. They work best in small, specialized teams where each member is competent and responsible. They contribute by providing a clear vision, identifying potential obstacles, and ensuring the project remains on a logical track.",
                'leadership_potential_or_style_notes_for_employer' => "As leaders, INTJs are visionary and decisive 'systems-builders'. They lead with strategy and logic, setting high standards and architecting the path to success. They are excellent at creating long-term plans and guiding organizations through complex changes. Their primary challenge as leaders is to remember the human element—to consciously practice empathy and provide positive reinforcement to motivate their teams, rather than assuming competence is its own reward.",
                'cognitive_functions' => ['Dominant: Introverted Intuition (Ni)', 'Auxiliary: Extraverted Thinking (Te)', 'Tertiary: Introverted Feeling (Fi)', 'Inferior: Extraverted Sensing (Se)'],
                'career_suggestions' => ['Strategic Planner', 'Systems Analyst', 'Scientist/Researcher', 'Management Consultant', 'Engineer', 'University Professor', 'Judge'],
                'famous_examples' => ['Elon Musk', 'Arnold Schwarzenegger', 'Friedrich Nietzsche', 'Michelle Obama'],
                'how_to_handle_stress' => "Under prolonged stress, an INTJ may fall into the grip of their inferior function, Extraverted Sensing (Se). This can manifest as uncharacteristic impulsiveness, such as binge-watching TV, overeating, or becoming obsessed with sensory details they normally ignore. They may feel a loss of their usual foresight and become stuck in the present moment. To help, give them space to retreat and recharge their introverted nature. Engaging their logical side (Te) to systematically analyze the source of the stress can also be highly effective.",
                'relationships_with_other_types' => "INTJs form strong intellectual bonds with other intuitive types (N), especially those who can appreciate and debate their complex ideas, like INTPs and ENTPs. They form powerful, effective partnerships with ENTJs, sharing a drive for efficiency and strategy. They can provide valuable structure and long-term vision for more spontaneous Perceptive (P) types, although they may sometimes clash over the need for a plan."
            ],

            //================ INTP - The Logician ================
            [
                'mbti_type' => 'INTP',
                'type_name' => 'The Logician',
                'profile_summary_for_employer' => "The INTP, or 'The Logician,' possesses a profoundly analytical mind, driven by a relentless desire to understand the underlying principles of everything. They are architects of ideas and systems, constantly deconstructing and reconstructing concepts in their minds to achieve logical purity. In the workplace, they are unparalleled troubleshooters and innovators. When faced with a complex, seemingly unsolvable problem, the INTP shines by spotting inconsistencies and logical fallacies that others miss, then proposing entirely new frameworks for a solution. They are less concerned with practical application and more with theoretical correctness and elegance.",
                'key_strengths_in_workplace' => [
                    'Profound Analytical Skills: Their ability to analyze complex problems from a detached, logical perspective is second to none.',
                    'Innovative Problem-Solving: They don\'t just solve problems; they redefine them, often leading to groundbreaking and unconventional solutions.',
                    'Intellectual Honesty: INTPs are committed to the truth above all else and are not swayed by emotion, tradition, or office politics.',
                    'Adaptability: Their focus on principles over plans makes them highly adaptable to new information and changing circumstances.',
                    'Deep Expertise: When a subject captures their interest, they can become a walking encyclopedia, mastering its every nuance.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Practical Application: They can sometimes struggle to translate their brilliant theories into real-world, practical steps.',
                    'Project Follow-Through: INTPs may lose interest in a project once the core intellectual challenge has been solved, leaving the "boring" implementation details to others.',
                    'Interpersonal Sensitivity: Their focus on logic can make them seem insensitive or dismissive of others\' feelings and perspectives.',
                    'Organization and Time Management: Their non-linear thinking style can clash with traditional deadlines and structured project plans.'
                ],
                'communication_style_and_tips_for_employer' => "Communicating with an INTP is an intellectual exercise. They value precision, clarity, and logical consistency. They enjoy exploring ideas and playing devil's advocate to test the strength of an argument. To communicate effectively, give them your full, uninterrupted attention, be prepared for your ideas to be challenged, and allow them ample time to think before responding. They are more interested in the 'why' and 'how' than the 'who' or 'when'. Avoid emotional appeals and focus on the intellectual merit of the conversation.",
                'task_management_approach_and_tips_for_employer' => "Do not give an INTP a list of instructions; give them a problem to solve. They are at their best when they have the autonomy to explore, research, and theorize. Rigid structures, tight deadlines, and routine tasks are deeply demotivating. They are perfect for roles in research and development, systems analysis, troubleshooting complex bugs, or any position that requires deep, innovative thinking. Trust their process, even if it seems chaotic from the outside.",
                'feedback_receptivity_and_guidance_for_employer' => "INTPs are remarkably open to criticism as long as it is logical and well-founded. They do not take it personally; to them, a critique of their idea is not a critique of them. The fastest way to lose their respect is to give feedback that is emotionally biased or factually incorrect. Acknowledge their intelligence and frame feedback as a new piece of data to incorporate into their logical framework. They want to be correct, and they will appreciate any information that helps them achieve that.",
                'work_environment_preferences_for_employer' => "An INTP's ideal environment is a sanctuary for thought. It should be quiet, flexible, and non-intrusive, allowing for long periods of uninterrupted concentration. They also value being surrounded by other intelligent, competent people with whom they can exchange and debate ideas. A culture that prioritizes intellectual freedom and innovation over bureaucracy and social rituals is essential for their well-being and productivity.",
                'motivators_for_employer_to_leverage' => [
                    'The freedom to explore complex and novel ideas without constraint.',
                    'Solving a problem that no one else can figure out.',
                    'Achieving a new level of understanding or mastery in a chosen field.',
                    'A flexible, unstructured environment with minimal rules.',
                    'Intellectual sparring with peers they respect.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the INTP is the resident analyst and truth-seeker. They may be quiet, but they are constantly processing the discussion, looking for logical inconsistencies or unexplored possibilities. They are invaluable during the brainstorming and problem-definition stages. They may be less engaged during social team-building activities, preferring to focus on the intellectual task at hand.",
                'leadership_potential_or_style_notes_for_employer' => "INTPs are reluctant leaders who lead with their expertise and intellect, not their charisma. They are best suited to lead small teams of highly skilled specialists. As leaders, they create an environment of intellectual freedom, encouraging their team to question everything and find the best possible solution. They can struggle with the more people-oriented aspects of management, like providing emotional support and managing interpersonal conflicts.",
                'cognitive_functions' => ['Dominant: Introverted Thinking (Ti)', 'Auxiliary: Extraverted Intuition (Ne)', 'Tertiary: Introverted Sensing (Si)', 'Inferior: Extraverted Feeling (Fe)'],
                'career_suggestions' => ['Software Architect', 'Data Scientist', 'Philosopher', 'Physicist', 'University Researcher', 'Strategic Analyst', 'System Designer'],
                'famous_examples' => ['Albert Einstein', 'Bill Gates', 'Kristen Stewart', 'René Descartes'],
                'how_to_handle_stress' => "Under severe stress, an INTP may experience the grip of their inferior function, Extraverted Feeling (Fe). This can manifest as uncharacteristic emotional outbursts, a sudden and intense concern with what others think of them, and a feeling of being overwhelmed by social demands. They may feel illogical and out of control. The best way to help is to remove them from the socially or emotionally charged situation and give them quiet time and space to process things with their dominant logic (Ti).",
                'relationships_with_other_types' => "They thrive on intellectual connection and are often drawn to other intuitive types (N) who can engage with their abstract ideas, such as ENTJs and ENFPs. They can find the practicality of Sensing (S) types to be limiting, but can also benefit from their ability to turn abstract ideas into reality."
            ],

            //================ ENTJ - The Commander ================
            [
                'mbti_type' => 'ENTJ',
                'type_name' => 'The Commander',
                'profile_summary_for_employer' => "The ENTJ, or 'The Commander,' is a natural-born leader, defined by their decisiveness, strategic prowess, and an unstoppable drive to achieve their goals. They are energized by challenges and view obstacles as opportunities to prove their competence. Possessing a powerful combination of Extraverted Thinking (Te) and Introverted Intuition (Ni), they can not only devise brilliant long-term plans but also organize the people and resources necessary to execute them with ruthless efficiency. They are the architects and generals of the corporate world, constantly driving for growth and improvement.",
                'key_strengths_in_workplace' => [
                    'Assertive and Charismatic Leadership: They naturally take charge and can inspire and mobilize teams to action.',
                    'Long-Range Strategic Planning: They excel at seeing future possibilities and creating robust, step-by-step plans to get there.',
                    'Unparalleled Efficiency: ENTJs have a gift for identifying inefficiencies and creating streamlined systems and processes to improve productivity.',
                    'Decisive Action-Taking: They are not afraid to make tough decisions quickly and confidently based on logical analysis.',
                    'High Ambition and Drive: They are incredibly goal-oriented and will work tirelessly to achieve their objectives.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Patience and Empathy: Their focus on efficiency can make them seem impatient or insensitive to the personal or emotional needs of their team members.',
                    'Active Listening: In their drive to execute, they may sometimes fail to listen fully to alternative viewpoints, especially from those who are less assertive.',
                    'Avoiding a \'Steamroller\' Approach: They need to be mindful of their powerful presence and ensure they are not intimidating others into silence.',
                    'Appreciating the Process: They can be so focused on the end goal that they devalue the contributions and processes that lead to it.'
                ],
                'communication_style_and_tips_for_employer' => "ENTJs communicate with directness, clarity, and confidence. They are logical, articulate, and expect competence in conversation. To communicate with them, be prepared, get to the point, and focus on the objective. Present your arguments logically and be ready for a healthy debate. They respect those who can challenge their thinking with sound reasoning. Small talk is a means to an end, not an activity they enjoy for its own sake.",
                'task_management_approach_and_tips_for_employer' => "The best way to manage an ENTJ is to give them a clear, ambitious goal and get out of their way. They excel in leadership positions where they have the authority to make decisions, delegate tasks, and build systems. They are motivated by challenges and the opportunity to lead. Micromanagement is the quickest way to demotivate them. Judge them by their results, which are often impressive.",
                'feedback_receptivity_and_guidance_for_employer' => "ENTJs see feedback as essential for growth and are surprisingly receptive to it, even when it's critical. However, it must be delivered with confidence and based on logic and objective performance. They have little respect for feedback based on feelings or vague impressions. Be direct, be honest, and focus on how the feedback can help them achieve their goals more effectively. They will respect you for it.",
                'work_environment_preferences_for_employer' => "ENTJs thrive in a fast-paced, competitive, and goal-oriented environment. They enjoy a setting where they can take on challenges, make an impact, and see a clear path for advancement. A culture that values competence, efficiency, and ambition is a perfect fit. They are comfortable with pressure and high-stakes situations.",
                'motivators_for_employer_to_leverage' => [
                    'Leadership and the ability to influence outcomes.',
                    'Solving complex, large-scale strategic challenges.',
                    'Building and leading efficient, high-performing teams.',
                    'Competition and the opportunity to win.',
                    'Tangible rewards and recognition for their achievements.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ENTJ is the de facto leader. They will quickly move to organize the group, define roles, set goals, and create a plan. They hold themselves and others to high standards of competence and can be demanding. While not always focused on social harmony, their leadership is often what drives a team to achieve extraordinary results.",
                'leadership_potential_or_style_notes_for_employer' => "ENTJs are not just potential leaders; they are leadership personified. Their style is strategic, directive, and results-driven. They excel at turning a disorganized group into a high-performing machine. Their challenge is to temper their drive with empathy, ensuring they bring their team along with them not just through force of will, but also through inspiration and mutual respect.",
                'cognitive_functions' => ['Dominant: Extraverted Thinking (Te)', 'Auxiliary: Introverted Intuition (Ni)', 'Tertiary: Extraverted Sensing (Se)', 'Inferior: Introverted Feeling (Fi)'],
                'career_suggestions' => ['CEO / Executive', 'Entrepreneur', 'Management Consultant', 'Attorney / Judge', 'Project Manager', 'Military Officer', 'University President'],
                'famous_examples' => ['Steve Jobs', 'Margaret Thatcher', 'Gordon Ramsay', 'Franklin D. Roosevelt'],
                'how_to_handle_stress' => "Under intense, prolonged stress, ENTJs can fall into the grip of their inferior function, Introverted Feeling (Fi). This is a stark contrast to their usual self, manifesting as being hypersensitive, taking things personally, and becoming overwhelmed by emotions they can't control. They may feel isolated and misunderstood. To help, give them space and privacy to process their feelings, and avoid trying to solve their problem with logic until they are ready.",
                'relationships_with_other_types' => "They form powerful alliances with types who can keep up with their strategic minds, like INTJs and ENTPs. They also value the loyalty and practical skills of ISTJs. They can benefit greatly from the influence of strong Feeling (F) types, who can help them connect with the human side of their ambitious plans."
            ],

            //================ ENTP - The Debater ================
            [
                'mbti_type' => 'ENTP',
                'type_name' => 'The Debater',
                'profile_summary_for_employer' => "The ENTP, or 'The Debater,' is a quick-witted, charismatic, and endlessly curious innovator. They are energized by the world of ideas and possibilities, and they love nothing more than to verbally spar, challenge conventions, and deconstruct arguments. With their dominant Extraverted Intuition (Ne), they see connections and possibilities everywhere, making them incredible brainstormers and creative problem-solvers. They are adaptable, resourceful, and thrive in dynamic environments where they can juggle multiple intellectual interests at once.",
                'key_strengths_in_workplace' => [
                    'Exceptional Brainstorming and Ideation: They can generate an incredible volume and variety of new ideas for any problem.',
                    'Intellectual Agility: They can grasp complex concepts and arguments with remarkable speed and enjoy debating them from multiple perspectives.',
                    'Persuasive and Charismatic Communication: Their quick wit and confidence make them highly engaging and effective at winning others over to their viewpoint.',
                    'Adaptability and Resourcefulness: They are excellent at thinking on their feet and can pivot quickly when a situation changes.',
                    'Challenging the Status Quo: They are not afraid to question \'the way things have always been done\' in pursuit of a better, more innovative solution.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Focus and Follow-Through: Their love for new ideas can make it difficult for them to focus on a single project through to the mundane final stages.',
                    'Attention to Detail: They are big-picture thinkers and may neglect important details in their rush to the next exciting concept.',
                    'Practicality: Sometimes their ideas can be more theoretical than practical, and they may need help grounding them in reality.',
                    'Sensitivity to Others: In their love for debate, they can sometimes forget that not everyone enjoys having their ideas torn apart, and may inadvertently hurt feelings.'
                ],
                'communication_style_and_tips_for_employer' => "Communicating with an ENTP is a dynamic and often non-linear experience. They jump from idea to idea, making connections that may not be immediately obvious. To communicate with them effectively, embrace the intellectual exploration. Be open to having your assumptions challenged. Don't be offended by their 'devil's advocate' stance; it's how they test and refine ideas. They respect intelligence and a good argument above all.",
                'task_management_approach_and_tips_for_employer' => "The worst thing you can do to an ENTP is give them a routine, repetitive job. They need novelty and intellectual stimulation. They are at their best at the beginning of the project life cycle: brainstorming, strategy, and initial design. They can lose interest during the implementation phase. To keep them engaged, give them a variety of problems to work on, involve them in strategic discussions, and pair them with a detail-oriented implementer (like an ISTJ) to bring their ideas to life.",
                'feedback_receptivity_and_guidance_for_employer' => "ENTPs are generally thick-skinned and open to feedback, as long as it's delivered logically and isn't perceived as an arbitrary rule or an attempt to stifle their creativity. They see feedback as another interesting data point. Challenge them intellectually. Instead of saying 'Your idea won't work,' ask, 'How would you overcome this specific logistical challenge with your idea?' This engages their problem-solving mind rather than shutting it down.",
                'work_environment_preferences_for_employer' => "An ENTP needs a dynamic, flexible, and intellectually vibrant environment. A culture that encourages debate, innovation, and autonomy is perfect. They suffocate in a rigid, bureaucratic hierarchy. They enjoy being surrounded by other smart, quick-witted people who can keep up with them. Give them a whiteboard, a challenging problem, and the freedom to solve it.",
                'motivators_for_employer_to_leverage' => [
                    'The thrill of a new idea or a new project.',
                    'Intellectual debate and the chance to prove their mental agility.',
                    'Solving complex, seemingly impossible problems.',
                    'A flexible work environment with minimal rules.',
                    'The opportunity to innovate and challenge the status quo.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ENTP is the catalyst and innovator. They will challenge every assumption and push the group to think outside the box. They are fantastic in brainstorming sessions and can energize a stagnant project. Their role is to generate possibilities; they rely on others to vet them for practicality and to execute the details.",
                'leadership_potential_or_style_notes_for_employer' => "As leaders, ENTPs are inspiring visionaries and agents of change. They lead by getting people excited about a new direction and empowering them to think creatively. They are excellent at leading innovation initiatives and navigating complex, changing industries. Their challenge is to provide enough structure and follow-through to ensure their brilliant visions don't just remain ideas.",
                'cognitive_functions' => ['Dominant: Extraverted Intuition (Ne)', 'Auxiliary: Introverted Thinking (Ti)', 'Tertiary: Extraverted Feeling (Fe)', 'Inferior: Introverted Sensing (Si)'],
                'career_suggestions' => ['Entrepreneur', 'Consultant', 'Lawyer', 'Venture Capitalist', 'Marketing Strategist', 'Political Analyst', 'Inventor'],
                'famous_examples' => ['Socrates', 'Leonardo da Vinci', 'Tom Hanks', 'Robert Downey Jr.'],
                'how_to_handle_stress' => "Under severe or prolonged stress, an ENTP can fall into the grip of their inferior function, Introverted Sensing (Si). This can cause them to become uncharacteristically obsessed with small, irrelevant details, fixated on past negative experiences, or overly concerned with their physical health. They can feel stuck in a loop of negative data. To help, engage their dominant function (Ne) by presenting them with a new, interesting, low-stakes problem to solve, which helps pull them out of the detail-oriented rut.",
                'relationships_with_other_types' => "They are intellectually stimulated by the depth of INTJs and the human-centric vision of INFJs. They enjoy the logical sparring with INTPs. They can form a dynamic 'idea-and-action' pair with ESTPs. They might sometimes frustrate more structured Judging (J) types, but they also push them to be more innovative."
            ],

            //================ INFJ - The Advocate ================
            [
                'mbti_type' => 'INFJ',
                'type_name' => 'The Advocate',
                'profile_summary_for_employer' => "The INFJ, or 'The Advocate,' is a rare and complex type, driven by a deep-seated idealism and a desire to make a meaningful, positive impact on the world. They combine Introverted Intuition (Ni) with Extraverted Feeling (Fe), giving them a unique ability to grasp deep human needs and motivations and to act on them with compassion and organization. In the workplace, they are the quiet visionaries, the ones who champion causes and people. They aren't just looking for a job; they are looking for a calling. They thrive in roles where they can connect their daily tasks to a larger, humanitarian purpose. They are thoughtful, conscientious, and possess a quiet strength that can inspire and mobilize others towards a common good.",
                'key_strengths_in_workplace' => [
                    'Deep Insight into People: They have an uncanny ability to understand the motivations, feelings, and unspoken needs of colleagues and clients.',
                    'Mission-Driven and Dedicated: When they believe in the purpose of their work, their dedication and work ethic are virtually unmatched.',
                    'Inspiring and Persuasive Communication: They can articulate a vision with conviction and warmth, inspiring others to action not through force, but through shared ideals.',
                    'Conscientious and Organized: They are J-types who prefer structure and planning, ensuring their idealistic visions are followed by concrete, thoughtful action.',
                    'Strong Ethical Compass: They are guided by a firm set of values and bring a sense of integrity and purpose to their teams.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Extreme Sensitivity to Criticism: They can take professional feedback very personally, viewing it as a critique of their values or character.',
                    'Avoiding Conflict: Their desire for harmony can lead them to avoid necessary confrontations or difficult conversations, sometimes to the detriment of the project or team.',
                    'Risk of Burnout: They invest so much of themselves emotionally in their work that they are highly susceptible to burnout, especially in cynical or conflict-ridden environments.',
                    'Perfectionism: Their high ideals can translate into an unrealistic perfectionism that makes it hard for them to delegate or accept "good enough" solutions.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an INFJ with authenticity and purpose. They value deep, meaningful conversations over superficial small talk. When discussing tasks, connect the work to the larger mission or its positive impact on people. Be gentle and considerate in your language, especially when giving feedback. They appreciate being listened to and having their insights into human dynamics valued. Create a safe space for them to share their ideas, as they may be hesitant to speak up in a highly critical or aggressive environment.",
                'task_management_approach_and_tips_for_employer' => "To manage an INFJ effectively, give them meaningful work and the autonomy to pursue it. They are highly independent and responsible when they are passionate about the goal. They are not motivated by competition or bonuses as much as they are by purpose. Assign them to roles that involve mentoring, counseling, strategic communication, or developing programs that help others. They need to see the \"why\" behind the \"what.\" Acknowledge their contributions and the positive impact they have.",
                'feedback_receptivity_and_guidance_for_employer' => "INFJs are highly sensitive to feedback because their work is so closely tied to their identity. Deliver feedback privately, gently, and with plenty of reassurance about their overall value to the team. Frame criticism constructively, focusing on how changes can better serve the mission or help people more effectively. Start with positive reinforcement. They will internalize criticism deeply, so ensure it is balanced and aimed at growth, not just pointing out flaws.",
                'work_environment_preferences_for_employer' => "The ideal work environment for an INFJ is harmonious, supportive, and mission-driven. They thrive in a culture of collaboration and mutual respect, free from office politics and interpersonal conflict. They need a quiet, private space to recharge and process their thoughts. An organization with a clear, positive mission and strong ethical principles is where an INFJ will truly flourish and commit for the long term.",
                'motivators_for_employer_to_leverage' => [
                    'Working for a cause or mission they deeply believe in.',
                    'The ability to help and develop others.',
                    'A harmonious and supportive team environment.',
                    'Recognition for their unique insights and contributions.',
                    'Autonomy and trust to carry out their vision.',
                    'Seeing their work have a real, positive impact on people\'s lives.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the INFJ is the counselor and the conscience. They work to ensure harmony and that everyone feels included and valued. They are the ones who will notice when a team member is struggling and will often take on the role of mediator. They contribute by keeping the team aligned with its values and focusing on the human element of any project.",
                'leadership_potential_or_style_notes_for_employer' => "INFJs are quiet, transformational leaders. They lead not with loud commands but with quiet integrity and an inspiring vision. They are 'servant leaders' who are deeply committed to the growth and well-being of their team members. They excel at leading cause-driven organizations and teams that require a high degree of empathy and understanding.",
                'cognitive_functions' => ['Dominant: Introverted Intuition (Ni)', 'Auxiliary: Extraverted Feeling (Fe)', 'Tertiary: Introverted Thinking (Ti)', 'Inferior: Extraverted Sensing (Se)'],
                'career_suggestions' => ['Counselor / Therapist', 'HR Manager', 'Non-profit Leader', 'Writer / Author', 'Doctor / Healthcare Professional', 'UX Designer', 'Organizational Development Consultant'],
                'famous_examples' => ['Martin Luther King Jr.', 'Nelson Mandela', 'Lady Gaga', 'Carl Jung'],
                'how_to_handle_stress' => "Under severe stress, INFJs can fall into the grip of their inferior function, Extraverted Sensing (Se). This manifests as uncharacteristically impulsive or obsessive sensory-seeking behavior: binge-eating junk food, obsessive cleaning, reckless spending, or watching hours of mindless television. They lose their future-oriented vision and become trapped in a messy, overwhelming present. To help, give them space and a calm environment. Gently encourage them to talk about their vision or feelings (Ni/Fe) to pull them out of the sensory overload.",
                'relationships_with_other_types' => "They often form deep connections with types who appreciate their vision and idealism, like ENFPs and ENTPs. They can form a powerful 'vision-and-action' partnership with INTJs. They may find the practicality of Sensor (S) types grounding, but can also feel misunderstood by their focus on the concrete here-and-now."
            ],
            
            //================ INFP - The Mediator ================
            [
                'mbti_type' => 'INFP',
                'type_name' => 'The Mediator',
                'profile_summary_for_employer' => "The INFP, known as 'The Mediator,' is a creative, idealistic, and deeply empathetic individual, driven by a strong inner core of personal values (Introverted Feeling - Fi). They are passionate about helping others and making the world a more authentic and compassionate place. In the workplace, an INFP is the keeper of values and the champion of possibility. They are not motivated by money or status, but by the opportunity to do work that is meaningful and aligns with their convictions. They bring a creative, human-centric perspective to their work, often excelling in roles that require imagination and a deep understanding of human nature.",
                'key_strengths_in_workplace' => [
                    'Deeply Held Values: They are guided by a powerful internal moral compass, bringing integrity and purpose to their work.',
                    'Creativity and Imagination: Their minds are rich with ideas and possibilities (Extraverted Intuition - Ne), making them excellent at brainstorming and creative problem-solving.',
                    'Empathy and Compassion: They are genuinely attuned to the feelings of others and strive to create a supportive and inclusive environment.',
                    'Flexibility and Adaptability: They are open-minded and adaptable, willing to consider new ideas and possibilities.',
                    'Passionate Communication: When speaking about something they truly believe in, they can be incredibly passionate and persuasive communicators.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Overly Sensitive to Criticism: They can perceive any critique of their work as a personal attack on their values.',
                    'Difficulty with Data-Driven Decisions: They may struggle with tasks that are highly impersonal, analytical, or require cold, hard logic, preferring to decide based on feeling.',
                    'Dislike of Bureaucracy and Mundane Tasks: They can become easily demotivated by routine, paperwork, and rigid corporate structures.',
                    'Procrastination: If a task doesn\'t resonate with their values, they may struggle with motivation and procrastinate until the last minute.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an INFP with authenticity and encouragement. They value genuine connection and appreciate when you take the time to understand their perspective. Frame conversations around values, purpose, and possibility. Avoid overly critical or harsh language. When giving feedback, focus on the future and how they can grow, rather than dwelling on past mistakes. Acknowledge their creativity and their commitment to doing what's right.",
                'task_management_approach_and_tips_for_employer' => "INFPs are not motivated by checklists but by inspiration. Give them projects that allow for creative expression and align with a positive purpose. Provide them with flexibility in how they complete their work. Micromanagement and rigid deadlines for uninspiring tasks will crush their spirit. They thrive in roles like writing, graphic design, counseling, or working for a cause-based organization. Their best work emerges when they feel emotionally and ethically connected to the project.",
                'feedback_receptivity_and_guidance_for_employer' => "Feedback for an INFP must be handled with extreme care and empathy. They have a fragile exterior when it comes to their work because it is so personal to them. Always deliver feedback one-on-one. Use a 'feedback sandwich' (praise, critique, praise) and focus on the positive intent. Instead of saying, 'This report is wrong,' try, 'I love the passion in this report. How can we incorporate some of these data points to make your argument even stronger for the leadership team?'",
                'work_environment_preferences_for_employer' => "An INFP needs a supportive, collaborative, and non-competitive work environment. A culture that values authenticity, creativity, and individual contribution is ideal. They feel suffocated by corporate politics, rigid hierarchies, and a focus on bottom-line results at the expense of people. A flexible workspace where they can work quietly and independently is highly beneficial.",
                'motivators_for_employer_to_leverage' => [
                    'Doing work that is personally meaningful and makes a difference.',
                    'Opportunities for creative self-expression.',
                    'A supportive, harmonious environment free of conflict.',
                    'Feeling understood and appreciated for their unique perspective.',
                    'Flexibility and autonomy in how they work.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the INFP is the harmonizer and the idealist. They will work to ensure everyone's voice is heard and that the team's goals are ethical. They are excellent listeners and provide emotional support to their colleagues. They bring a wealth of creative ideas to brainstorming sessions, though they may need encouragement to share them.",
                'leadership_potential_or_style_notes_for_employer' => "INFPs are reluctant but deeply inspiring 'servant leaders.' They lead by example, guided by their values. They create a democratic and supportive environment where every team member feels empowered and valued. They are best at leading creative teams or value-driven organizations where their primary role is to inspire and nurture talent.",
                'cognitive_functions' => ['Dominant: Introverted Feeling (Fi)', 'Auxiliary: Extraverted Intuition (Ne)', 'Tertiary: Introverted Sensing (Si)', 'Inferior: Extraverted Thinking (Te)'],
                'career_suggestions' => ['Writer / Editor', 'Graphic Designer', 'Therapist / Counselor', 'Social Worker', 'HR Development Specialist', 'Artist', 'Researcher (in humanities)'],
                'famous_examples' => ['William Shakespeare', 'J.R.R. Tolkien', 'Princess Diana', 'Johnny Depp'],
                'how_to_handle_stress' => "Under extreme stress, an INFP can fall into the grip of their inferior function, Extraverted Thinking (Te). This can manifest as uncharacteristically critical, nit-picky, and harshly logical behavior. They might become obsessed with finding flaws in everything and everyone, including themselves, or try to over-organize their life in a rigid, unhealthy way. To help, encourage them to reconnect with their values (Fi) and creative side (Ne), perhaps through journaling or a creative hobby, and remove them from the source of the pressure.",
                'relationships_with_other_types' => "They are drawn to the energy and warmth of ENFJs and the intellectual curiosity of ENTPs. They appreciate the depth of INFJs. They can be balanced by the practicality of Judging (J) types, who can help them bring their many ideas to life, but they may feel constrained by overly rigid structures."
            ],

            //================ ENFJ - The Protagonist ================
            [
                'mbti_type' => 'ENFJ',
                'type_name' => 'The Protagonist',
                'profile_summary_for_employer' => "The ENFJ, or 'The Protagonist,' is a charismatic, empathetic, and natural-born leader who is energized by helping others grow and reach their full potential. They are driven by their Extraverted Feeling (Fe), which gives them an innate ability to connect with people, understand their needs, and create a sense of group harmony. Combined with their Introverted Intuition (Ni), they can envision a better future for people and organizations and inspire others to work towards it. In the workplace, they are the charismatic mentors, the team builders, and the communicators who can rally everyone around a shared vision.",
                'key_strengths_in_workplace' => [
                    'Charismatic and Inspiring Leadership: They have a natural talent for leadership, able to motivate and energize teams with their passion and positivity.',
                    'Exceptional People Skills: They are masters of interpersonal dynamics, skilled at communication, persuasion, and conflict resolution.',
                    'Organizational and Planning Skills: They are effective at organizing people and resources to achieve a goal, ensuring that projects run smoothly.',
                    'Altruistic and Development-Focused: They are genuinely invested in the growth and well-being of their colleagues and direct reports.',
                    'Decisive and Action-Oriented: They don\'t just dream of a better future; they actively work to create it.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Overly Invested in Others\' Opinions: Their self-esteem can be heavily tied to the approval of others, making them sensitive to criticism or perceived rejection.',
                    'Tendency to Be Overbearing: Their desire to help can sometimes come across as controlling or meddling if not kept in check.',
                    'Difficulty with Impersonal Logic: They may struggle to make tough, objective decisions that could negatively impact people they care about.',
                    'Avoiding Necessary Conflict: In their quest for harmony, they may smooth over important issues that need to be addressed directly.'
                ],
                'communication_style_and_tips_for_employer' => "ENFJs are warm, engaging, and persuasive communicators. They thrive on positive interaction and affirmation. To communicate effectively with them, be open, encouraging, and focus on the human impact of the work. They are great listeners and expect the same in return. Acknowledge their efforts to build team morale and their insights into people. They are receptive to ideas that will help the team or organization grow.",
                'task_management_approach_and_tips_for_employer' => "ENFJs excel when they are in charge of people-centric projects. They are natural leaders, trainers, and mentors. Give them opportunities to lead teams, manage client relationships, or spearhead organizational culture initiatives. They are highly organized and can be trusted to manage complex projects, especially those requiring strong stakeholder management. Recognize and reward their ability to build a positive and productive team environment.",
                'feedback_receptivity_and_guidance_for_employer' => "ENFJs want to please and can be quite sensitive to feedback, often fearing they have let someone down. Deliver feedback with a great deal of warmth and affirmation. Frame it in the context of their growth and how it can help them be even more effective in their mission to help others. Focus on specific behaviors rather than making broad character judgments. Positive feedback is a powerful motivator for them.",
                'work_environment_preferences_for_employer' => "An ENFJ thrives in a collaborative, harmonious, and people-focused environment. They love being part of a team and are energized by social interaction. A culture that values community, personal growth, and has a clear, positive purpose is ideal. They feel drained by cynical, competitive, or impersonal workplaces.",
                'motivators_for_employer_to_leverage' => [
                    'Leading and inspiring a team towards a positive goal.',
                    'Helping others learn, grow, and succeed.',
                    'Building a strong, harmonious community at work.',
                    'Receiving positive affirmation and appreciation for their efforts.',
                    'Seeing the tangible, positive impact of their work on people.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ENFJ is the natural captain and cheerleader. They take the initiative to organize the group, ensure everyone feels included, and maintain positive morale. They are excellent facilitators, drawing out ideas from quieter members and mediating any conflicts that arise. Their focus is always on the health and success of the group as a whole.",
                'leadership_potential_or_style_notes_for_employer' => "ENFJs are the quintessential charismatic leaders. They lead through inspiration, empathy, and a genuine commitment to their team's development. They are excellent at building culture and fostering loyalty. Their main challenge as a leader is to make tough, objective decisions when necessary, even if it creates temporary disharmony.",
                'cognitive_functions' => ['Dominant: Extraverted Feeling (Fe)', 'Auxiliary: Introverted Intuition (Ni)', 'Tertiary: Extraverted Sensing (Se)', 'Inferior: Introverted Thinking (Ti)'],
                'career_suggestions' => ['HR Manager', 'Sales Manager', 'Teacher / Professor', 'Politician / Diplomat', 'Public Relations Specialist', 'Non-profit Director', 'Consultant'],
                'famous_examples' => ['Barack Obama', 'Oprah Winfrey', 'Martin Luther King Jr.', 'Jennifer Lawrence'],
                'how_to_handle_stress' => "Under extreme stress, an ENFJ can fall into the grip of their inferior function, Introverted Thinking (Ti). This is a stark departure from their usual selves, causing them to become uncharacteristically critical, cynical, and focused on finding logical flaws in everything and everyone. They might withdraw and engage in harsh self-criticism. To help, provide emotional support and reassurance (appealing to their Fe), and remove them from the stressful situation. Giving them a simple, solvable problem can help them regain a sense of logical control in a healthy way.",
                'relationships_with_other_types' => "They form natural, supportive bonds with INFPs and ISFPs, who appreciate their warmth and guidance. They enjoy the intellectual stimulation of INTPs, whom they can help bring out of their shell. They can form a powerful 'vision-and-action' team with ENTJs, though they must balance the ENTJ's logic with their own human-centric focus."
            ],

            //================ ENFP - The Campaigner ================
            [
                'mbti_type' => 'ENFP',
                'type_name' => 'The Campaigner',
                'profile_summary_for_employer' => "The ENFP, or 'The Campaigner,' is an enthusiastic, creative, and sociable free spirit, who can always find a reason to smile. They are driven by their Extraverted Intuition (Ne), constantly scanning the world for exciting ideas, possibilities, and connections with people. In the workplace, they are catalysts for innovation and positive change. They are fantastic brainstormers, networkers, and cheerleaders, able to get others excited about a new vision. Their deep-seated values (Fi) mean they are most engaged when their work helps others or contributes to a cause they believe in.",
                'key_strengths_in_workplace' => [
                    'Infectious Enthusiasm and Positivity: They can energize a team and foster a positive, creative atmosphere.',
                    'Excellent Communication and People Skills: They are natural networkers who can build rapport with almost anyone.',
                    'Exceptional Creativity and Brainstorming: They see possibilities everywhere and are fantastic at generating novel solutions to problems.',
                    'Adaptability and Spontaneity: They are flexible and thrive in dynamic environments where they can juggle multiple projects and ideas.',
                    'Persuasive and Inspiring: When they are passionate about an idea, they can be incredibly effective at winning others over.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Difficulty with Follow-Through: They love starting new projects but can lose interest when the mundane details and execution phase begins.',
                    'Disorganization: Their spontaneous nature can lead to a lack of structure, missed deadlines, and a scattered approach to tasks.',
                    'Over-Promising: In their enthusiasm, they may take on more commitments than they can realistically handle.',
                    'Aversion to Routine and Bureaucracy: They can feel stifled by rigid rules, administrative tasks, and predictable work.'
                ],
                'communication_style_and_tips_for_employer' => "Communicating with an ENFP is an energetic and uplifting experience. They love to explore ideas and connect on a personal level. To engage them, be enthusiastic and open-minded. Allow for brainstorming and tangents. Frame work in terms of possibilities and its positive impact. They appreciate praise and recognition for their creativity. Avoid being overly critical or shutting down their ideas prematurely.",
                'task_management_approach_and_tips_for_employer' => "Do not box an ENFP into a repetitive, detail-oriented role. They need variety, creativity, and human interaction. They are best at the start of a project—ideation, pitching, and getting buy-in. Pair them with a detail-oriented implementer (like an ISTJ) to form a powerful team. Give them flexibility in their schedule and how they approach their work. They are motivated by passion projects and the freedom to explore.",
                'feedback_receptivity_and_guidance_for_employer' => "ENFPs can be sensitive to criticism, as their work is often an expression of their identity. Deliver feedback in a supportive and encouraging manner. Focus on one or two key areas for improvement, rather than overwhelming them with a list of flaws. Frame it as a way to help their brilliant ideas have an even bigger impact. Acknowledge their positive intentions before offering constructive criticism.",
                'work_environment_preferences_for_employer' => "ENFPs thrive in a vibrant, collaborative, and flexible work environment. They love open-plan offices where they can easily interact with colleagues. A culture that encourages creativity, innovation, and social connection is perfect for them. They are demotivated by rigid hierarchies, excessive rules, and a lack of creative freedom.",
                'motivators_for_employer_to_leverage' => [
                    'The freedom to explore new and exciting ideas.',
                    'Connecting with a wide variety of people.',
                    'Working on projects that align with their personal values.',
                    'A positive, encouraging, and non-judgmental atmosphere.',
                    'Opportunities for personal and professional growth.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ENFP is the spark plug. They are the idea generator, the motivator, and the social glue that holds the team together. They excel in brainstorming sessions and are great at presenting the team's ideas to others. They keep morale high and encourage everyone to think outside the box.",
                'leadership_potential_or_style_notes_for_employer' => "As leaders, ENFPs are charismatic and inspiring. They lead by getting people excited about a shared vision and empowering them to be creative. They are excellent change agents and are fantastic at leading teams focused on innovation or marketing. Their challenge is to provide the necessary structure and focus to ensure the team's creative energy leads to tangible results.",
                'cognitive_functions' => ['Dominant: Extraverted Intuition (Ne)', 'Auxiliary: Introverted Feeling (Fi)', 'Tertiary: Extraverted Thinking (Te)', 'Inferior: Introverted Sensing (Si)'],
                'career_suggestions' => ['Marketing Manager', 'Creative Director', 'Consultant', 'Entrepreneur', 'Journalist / Reporter', 'Event Planner', 'Recruiter'],
                'famous_examples' => ['Robin Williams', 'Will Smith', 'Ellen DeGeneres', 'Walt Disney'],
                'how_to_handle_stress' => "Under prolonged stress, ENFPs can fall into the grip of their inferior function, Introverted Sensing (Si). This can cause them to become uncharacteristically obsessed with minor physical ailments, fixated on negative past experiences, or bogged down in small, unproductive details. They lose their usual optimism and feel stuck. To help, get them out of their head and engaged with the world (Ne). Brainstorming a new, low-stakes creative project or simply changing their physical environment can help break the negative loop.",
                'relationships_with_other_types' => "They are often drawn to the depth and structure of INTJs and INFJs, who can help ground their many ideas. They enjoy the logical sparring with INTPs. They can form incredibly fun and energetic partnerships with other EPs like ESTPs."
            ],

            //================ ISTJ - The Logistician ================
            [
                'mbti_type' => 'ISTJ',
                'type_name' => 'The Logistician',
                'profile_summary_for_employer' => "The ISTJ, or 'The Logistician,' is the bedrock of any organization. They are defined by their integrity, practicality, and unwavering dedication to duty. Led by their Introverted Sensing (Si), they have a deep respect for facts, proven methods, and tradition. They are meticulous, responsible, and can be counted on to see a task through to completion, no matter how complex the details. In the workplace, they are the reliable implementers, the guardians of process, and the keepers of institutional knowledge. They bring order to chaos and ensure that operations run smoothly, efficiently, and to a high standard.",
                'key_strengths_in_workplace' => [
                    'Exceptional Reliability and Dependability: When an ISTJ says they will do something, it gets done. They are the most dependable type.',
                    'Meticulous Attention to Detail: They have a keen eye for detail and will not tolerate errors or sloppy work.',
                    'Strong Sense of Duty and Responsibility: They take their commitments seriously and are driven by a powerful sense of duty.',
                    'Practical and Realistic: They are grounded in reality and excel at creating and executing practical, step-by-step plans.',
                    'Highly Organized: They thrive on order and structure, bringing methodical precision to their work and creating efficient systems.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Resistance to Change: Their reliance on \'what has worked before\' can make them resistant to new ideas or untested methods.',
                    'Inflexibility: They can be overly rigid in their adherence to rules and procedures, even when a situation calls for flexibility.',
                    'Difficulty with Abstract Concepts: They may struggle with purely theoretical or strategic brainstorming that lacks a clear, practical application.',
                    'Understating the Human Element: Their focus on facts and tasks can sometimes lead them to overlook the emotional needs of their colleagues.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ISTJ with clarity, precision, and directness. They value facts, data, and evidence. Get to the point and present information in a logical, sequential manner. They have little patience for vague theories or emotional appeals. Provide clear instructions and expectations. Written communication is often preferred as it allows them to review the details carefully.",
                'task_management_approach_and_tips_for_employer' => "The best way to manage an ISTJ is to give them a clear objective, well-defined responsibilities, and the structure they need to execute. They excel in roles that require precision, adherence to standards, and methodical work, such as accounting, logistics, data analysis, or quality assurance. Do not change the plan or move the goalposts without a very good, data-backed reason. Respect their process and judge them on the accuracy and thoroughness of their work.",
                'feedback_receptivity_and_guidance_for_employer' => "ISTJs are receptive to feedback as long as it is specific, factual, and focused on improving performance. Vague feedback is useless to them. Instead of saying 'Do better,' say 'On page 3 of the report, the figures for Q2 are inaccurate; please cross-reference them with the master spreadsheet.' They appreciate clear, actionable criticism that helps them do their job correctly. They also appreciate quiet recognition for a job done right.",
                'work_environment_preferences_for_employer' => "An ISTJ's ideal work environment is quiet, orderly, and stable. They need a structured setting with clear hierarchies and well-defined roles. They prefer to work independently or in small, task-focused teams. An environment that values tradition, stability, and hard work over constant, chaotic change is where they will be most productive and content.",
                'motivators_for_employer_to_leverage' => [
                    'A stable and predictable work environment.',
                    'Clear expectations and well-defined tasks.',
                    'The opportunity to use their expertise to create order and efficiency.',
                    'Recognition for their reliability and thoroughness.',
                    'Seeing a project through to successful, error-free completion.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ISTJ is the anchor. They are the one who remembers the details, keeps track of the plan, and ensures the work is done to standard. They may not be the most vocal member, but their contribution is in their diligent, behind-the-scenes work. They provide the practical grounding that brilliant but scattered ideas need to become a reality.",
                'leadership_potential_or_style_notes_for_employer' => "As leaders, ISTJs are steady and reliable 'administrators.' They lead by example, demonstrating a strong work ethic and a commitment to procedure. They create clear, stable systems and ensure that everyone knows their role and responsibilities. They excel at managing established operations and are pillars of stability within an organization.",
                'cognitive_functions' => ['Dominant: Introverted Sensing (Si)', 'Auxiliary: Extraverted Thinking (Te)', 'Tertiary: Introverted Feeling (Fi)', 'Inferior: Extraverted Intuition (Ne)'],
                'career_suggestions' => ['Accountant', 'Auditor', 'Logistics Manager', 'Database Administrator', 'Military Officer', 'Inspector', 'Civil Engineer'],
                'famous_examples' => ['George Washington', 'Angela Merkel', 'Denzel Washington', 'Jeff Bezos'],
                'how_to_handle_stress' => "Under extreme stress, ISTJs can experience the grip of their inferior function, Extraverted Intuition (Ne). This is known as a 'catastrophe' grip, where they lose their usual grounding in facts and become overwhelmed by a flood of negative, unlikely possibilities. They imagine all the ways things could go wrong. To help, bring them back to the facts and the present moment (Si). Break down the problem into small, manageable, concrete steps to restore their sense of control.",
                'relationships_with_other_types' => "They form highly effective and stable partnerships with ESTJs, sharing a respect for logic and order. They appreciate the energy and social grace of ESFPs. They can provide a much-needed anchor for creative but disorganized NFP types, creating a complementary 'head in the clouds, feet on the ground' dynamic."
            ],

            //================ ISFJ - The Defender ================
            [
                'mbti_type' => 'ISFJ',
                'type_name' => 'The Defender',
                'profile_summary_for_employer' => "The ISFJ, known as 'The Defender,' is a warm, dedicated, and highly responsible individual who is committed to caring for others and maintaining social harmony. Their dominant function, Introverted Sensing (Si), gives them a remarkable memory for details about people and a respect for established procedures. This is combined with their auxiliary Extraverted Feeling (Fe), making them acutely aware of the emotional needs of others. In the workplace, an ISFJ is the supportive backbone of the team. They are the ones who remember birthdays, notice when someone is struggling, and work tirelessly behind the scenes to ensure everyone has what they need to succeed.",
                'key_strengths_in_workplace' => [
                    'Incredibly Loyal and Dedicated: ISFJs are among the most loyal of all types, deeply committed to their team and organization.',
                    'Supportive and Service-Oriented: They have a genuine desire to help and support their colleagues, making them excellent team players.',
                    'Meticulous and Thorough: They have a strong memory for detail and a conscientious approach, ensuring tasks are completed accurately and on time.',
                    'Practical and Grounded: They are focused on the practical needs of the here-and-now and are excellent at carrying out established procedures.',
                    'Strong Interpersonal Skills: Their warmth and empathy allow them to build strong, trusting relationships with colleagues and clients.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Aversion to Conflict: Their strong desire for harmony can make them avoid necessary confrontations or voicing dissenting opinions.',
                    "Difficulty Saying 'No': Their service-oriented nature can lead them to take on too much work and become overburdened.",
                    'Resistance to Change: Like ISTJs, they can be wary of new methods that deviate from tried-and-true traditions.',
                    'Tendency to Be Overly Humble: They often downplay their own contributions and may not advocate for their own needs or career advancement.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ISFJ with warmth, sincerity, and appreciation. They value politeness and personal connection. Be clear and specific in your instructions, providing practical examples. They appreciate being asked for their help and having their efforts acknowledged. Private, one-on-one communication is often more effective than public forums, especially for sensitive topics.",
                'task_management_approach_and_tips_for_employer' => "ISFJs thrive when they have clear, structured tasks and can see how their work directly helps others. They are excellent in support roles, healthcare, administration, and any position that requires meticulous care and a human touch. Give them well-defined responsibilities and a stable environment. A simple 'thank you' for their hard work goes a very long way in motivating them. They are the reliable engine that keeps the team running smoothly.",
                'feedback_receptivity_and_guidance_for_employer' => "ISFJs are very sensitive to criticism and can take it personally, fearing they have disappointed someone. Deliver feedback gently, privately, and with a great deal of reassurance. Emphasize their value to the team and frame the feedback as a way to help them support others even more effectively. Start and end the conversation with genuine praise for their contributions.",
                'work_environment_preferences_for_employer' => "An ISFJ's ideal work environment is harmonious, structured, and collaborative. They value a culture of mutual support and kindness. A quiet, organized workspace allows them to focus on their detail-oriented tasks. They are most comfortable in stable organizations with clear expectations and a strong sense of community.",
                'motivators_for_employer_to_leverage' => [
                    'Feeling needed and appreciated for their help.',
                    'A harmonious and stable work environment.',
                    'Clear expectations and the ability to work methodically.',
                    'Building strong, positive relationships with colleagues.',
                    'Knowing that their work provides practical support for others.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ISFJ is the caretaker. They work tirelessly to support their teammates, maintain a positive atmosphere, and ensure all the practical details are handled. They are fantastic listeners and are often the ones people turn to for help or a sympathetic ear. They are the glue that fosters loyalty and cooperation within a group.",
                'leadership_potential_or_style_notes_for_employer' => "ISFJs are 'servant leaders' in the truest sense. They lead by example, demonstrating dedication and care for their team. They focus on providing their reports with the resources and support they need to do their jobs well. They are excellent at leading small, close-knit teams where their personal touch can foster immense loyalty and stability.",
                'cognitive_functions' => ['Dominant: Introverted Sensing (Si)', 'Auxiliary: Extraverted Feeling (Fe)', 'Tertiary: Introverted Thinking (Ti)', 'Inferior: Extraverted Intuition (Ne)'],
                'career_suggestions' => ['Nurse / Healthcare Provider', 'Elementary School Teacher', 'Administrator', 'Social Worker', 'HR Specialist', 'Librarian', 'Interior Designer'],
                'famous_examples' => ['Queen Elizabeth II', 'Mother Teresa', 'Beyoncé', 'Captain America (Marvel character)'],
                'how_to_handle_stress' => "Under extreme stress, ISFJs can fall into the grip of their inferior function, Extraverted Intuition (Ne). Similar to ISTJs, this manifests as a 'catastrophe' grip, where they become uncharacteristically pessimistic and fixated on all the terrible things that could possibly happen. To help, bring them back to the concrete and familiar (Si). Reassure them and focus on a small, manageable task they can complete successfully to restore their sense of competence and calm.",
                'relationships_with_other_types' => "They form warm, comfortable bonds with ESFJs, sharing a focus on harmony and care. They are often drawn to the excitement and spontaneity of ESTP and ESFP types, who can help them step outside their comfort zone. They provide a stable, supportive foundation for more visionary but less grounded Intuitive types."
            ],

            //================ ESTJ - The Executive ================
            [
                'mbti_type' => 'ESTJ',
                'type_name' => 'The Executive',
                'profile_summary_for_employer' => "The ESTJ, or 'The Executive,' is a quintessential organizer and traditionalist, dedicated to upholding order and creating efficient systems. Led by their dominant Extraverted Thinking (Te), they are logical, decisive, and excel at implementing plans and organizing resources. They use their auxiliary Introverted Sensing (Si) to draw upon past experience and established procedures to make sound, practical decisions. In the workplace, ESTJs are the supervisors and administrators who ensure that things get done correctly, on time, and within budget. They are pillars of the community and believe in the value of hard work, dedication, and clear processes.",
                'key_strengths_in_workplace' => [
                    'Exceptional Organizational Skills: They are masters of logistics, able to create order out of chaos and manage complex projects effectively.',
                    'Decisive and Action-Oriented: They do not hesitate to make tough decisions and take charge to move a project forward.',
                    'Strong Leadership and Delegation: They are natural supervisors who are adept at assigning roles and holding people accountable.',
                    'Practical and Realistic: They are grounded in facts and have a no-nonsense approach to problem-solving.',
                    'Dedicated and Hardworking: They lead by example with a powerful work ethic and a commitment to upholding standards.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Inflexibility and Stubbornness: Their belief in \'the right way\' to do things can make them resistant to new ideas or alternative approaches.',
                    'Can Seem Brusque or Insensitive: Their direct, logic-driven style can sometimes neglect the emotional needs or feelings of others.',
                    'Judgmental of Different Work Styles: They can be critical of those who are not as organized or traditionally productive as they are.',
                    'Difficulty with Unstructured Environments: They can become frustrated in situations that lack clear goals, rules, or authority.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ESTJ directly, logically, and efficiently. Get to the point. Present your case with facts and a clear plan of action. They respect competence and confidence. Avoid emotional language or abstract, unproven theories. They want to know the objective, the plan, and the expected results. They appreciate clear, direct feedback and expect the same from others.",
                'task_management_approach_and_tips_for_employer' => "ESTJs are born managers. Place them in roles where they can organize people, processes, and resources to achieve a clear goal. They excel in operations, management, law enforcement, and any field that requires structure and adherence to standards. Give them a clear mandate and the authority to execute. They are motivated by seeing their organizational efforts lead to tangible, efficient results. Avoid ambiguity and indecision.",
                'feedback_receptivity_and_guidance_for_employer' => "ESTJs view feedback as a tool for improving efficiency and are very receptive to it, as long as it is logical and direct. They are not easily offended by criticism if it is well-reasoned and aimed at improving the outcome. Be straightforward and focus on performance metrics and adherence to procedure. They appreciate being told how to do their job better and will respect you for being direct.",
                'work_environment_preferences_for_employer' => "ESTJs thrive in a structured, orderly, and productive environment. They value clear hierarchies, well-defined roles, and a culture of hard work and responsibility. They enjoy a traditional office setting where they can focus on their tasks and efficiently manage their teams. An organization that rewards competence and respects tradition is an excellent fit.",
                'motivators_for_employer_to_leverage' => [
                    'Opportunities to lead, organize, and manage.',
                    'A clear set of rules and standards to uphold.',
                    'Seeing their efforts result in increased efficiency and productivity.',
                    'Respect and recognition for their competence and leadership.',
                    'A stable and predictable work environment.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ESTJ will quickly assume the role of organizer or leader. They will work to define the goal, create a plan, assign tasks, and set deadlines. They ensure the team stays on track and holds everyone accountable. While they may not be the most focused on social harmony, their leadership is what often drives a team to successfully complete its mission.",
                'leadership_potential_or_style_notes_for_employer' => "ESTJs are natural 'supervisors' and 'administrators.' Their leadership style is directive, organized, and results-focused. They are excellent at managing day-to-day operations, ensuring quality standards are met, and keeping large teams or departments running like a well-oiled machine. Their challenge is to remain open to innovation and to consciously consider the human element in their decision-making.",
                'cognitive_functions' => ['Dominant: Extraverted Thinking (Te)', 'Auxiliary: Introverted Sensing (Si)', 'Tertiary: Extraverted Intuition (Ne)', 'Inferior: Introverted Feeling (Fi)'],
                'career_suggestions' => ['Manager / Supervisor', 'Chief Financial Officer', 'Police Officer / Military Leader', 'Judge', 'Financial Advisor', 'Project Manager', 'Operations Manager'],
                'famous_examples' => ['Sonia Sotomayor', 'John D. Rockefeller', 'Judge Judy', 'Lyndon B. Johnson'],
                'how_to_handle_stress' => "Under intense stress, an ESTJ can fall into the grip of their inferior function, Introverted Feeling (Fi). This is a dramatic shift, causing them to become uncharacteristically sensitive, emotional, and withdrawn. They may feel a profound sense of failure or feel that their efforts are unappreciated, and take things very personally. To help, give them space and avoid logical arguments. A simple, sincere expression of appreciation for their hard work can be incredibly powerful in helping them regain their equilibrium.",
                'relationships_with_other_types' => "They form strong, effective partnerships with ISTJs, sharing a mutual respect for duty and order. They are often intrigued and balanced by the spontaneity and adaptability of ISTPs and INTPs. They can provide valuable structure for more free-spirited Perceiver (P) types, ensuring their creative ideas are put into practice."
            ],

            //================ ESFJ - The Consul ================
            [
                'mbti_type' => 'ESFJ',
                'type_name' => 'The Consul',
                'profile_summary_for_employer' => "The ESFJ, or 'The Consul,' is an extraordinarily caring, sociable, and practical individual who thrives on helping others and fostering a sense of community. Their dominant Extraverted Feeling (Fe) makes them highly attuned to the emotional atmosphere and the needs of others, while their auxiliary Introverted Sensing (Si) gives them a strong respect for tradition and practical details. In the workplace, ESFJs are the social heart of the organization. They are the event planners, the team morale boosters, and the ones who ensure everyone feels welcome and valued. They are dedicated to creating a harmonious and supportive environment where people can do their best work.",
                'key_strengths_in_workplace' => [
                    'Exceptional People Skills: They are warm, empathetic, and masterful at building and maintaining positive relationships.',
                    'Strong Sense of Community: They excel at fostering team spirit, harmony, and a cooperative atmosphere.',
                    'Practical and Organized: They are reliable and conscientious, with a knack for organizing social events and practical, people-oriented tasks.',
                    'Loyal and Dutiful: They are deeply committed to their responsibilities and to the well-being of their team.',
                    'Service-Oriented: They derive genuine satisfaction from helping others and meeting their practical needs.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Difficulty with Impersonal Decisions: They may struggle to make necessary decisions that could upset others or disrupt group harmony.',
                    'Sensitive to Conflict and Criticism: They take criticism to heart and are deeply uncomfortable in environments with interpersonal conflict.',
                    'Need for Approval: Their self-worth can be heavily tied to receiving appreciation and positive feedback from others.',
                    'Resistance to Unconventional Ideas: Their respect for tradition (Si) can make them hesitant to embrace new or non-traditional ways of doing things.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ESFJ with warmth, friendliness, and plenty of positive affirmation. They enjoy small talk and building a personal connection. Frame tasks in terms of how they help the team or serve others. Be clear about expectations, as they want to do the right thing. Expressing appreciation for their efforts is the single most effective way to communicate with and motivate them.",
                'task_management_approach_and_tips_for_employer' => "ESFJs excel in roles that allow them to directly interact with and help people. They are outstanding in customer service, healthcare, teaching, HR, and event management. Give them tasks that involve organizing people and creating positive experiences. They are highly reliable and will diligently follow through on their commitments, especially when they know their work is appreciated. Acknowledge their role in maintaining a positive culture.",
                'feedback_receptivity_and_guidance_for_employer' => "ESFJs are very sensitive to feedback and often interpret it as a sign of personal disapproval. It is crucial to deliver it in a gentle, supportive, and private manner. Surround any criticism with a great deal of praise and reassurance about their value. Focus on the future and how they can continue to contribute positively to the team's harmony and success. They respond much better to encouragement than to criticism.",
                'work_environment_preferences_for_employer' => "An ESFJ needs a harmonious, active, and social work environment. They thrive in a culture of cooperation, appreciation, and community. They enjoy being part of a close-knit team and feel energized by interacting with colleagues. A workplace that is cold, impersonal, or full of conflict will be extremely draining for them.",
                'motivators_for_employer_to_leverage' => [
                    'Public recognition and sincere appreciation for their efforts.',
                    'The opportunity to help and care for others.',
                    'A harmonious, friendly, and cooperative team environment.',
                    'A sense of belonging and community.',
                    'Clear expectations and a chance to fulfill their duties.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ESFJ is the social director and harmonizer. They take the lead in organizing team-building activities, celebrating successes, and ensuring everyone feels included and supported. They are excellent at smoothing over disagreements and keeping morale high. They make sure the 'people' part of teamwork is never forgotten.",
                'leadership_potential_or_style_notes_for_employer' => "As leaders, ESFJs are supportive and people-focused 'caretakers.' They lead by building strong personal relationships with their team members and fostering a sense of family. They are excellent at managing teams where morale and customer satisfaction are key. Their main leadership challenge is to deliver tough feedback and make unpopular decisions when the situation demands it.",
                'cognitive_functions' => ['Dominant: Extraverted Feeling (Fe)', 'Auxiliary: Introverted Sensing (Si)', 'Tertiary: Extraverted Intuition (Ne)', 'Inferior: Introverted Thinking (Ti)'],
                'career_suggestions' => ['Event Coordinator', 'Nurse / Medical Staff', 'Customer Service Representative', 'HR Manager', 'Teacher', 'Sales Representative', 'Social Worker'],
                'famous_examples' => ['Taylor Swift', 'Bill Clinton', 'Jennifer Garner', 'Steve Harvey'],
                'how_to_handle_stress' => "Under prolonged stress, an ESFJ can fall into the grip of their inferior function, Introverted Thinking (Ti). This causes them to become uncharacteristically cynical, critical, and to find fault in everything and everyone, including themselves. They might get lost in negative, looping logic. To help, re-engage their dominant Fe. Remind them of their value to others and get them involved in a low-stakes activity where they can be helpful. Sincere appreciation is a powerful antidote.",
                'relationships_with_other_types' => "They form warm, mutually supportive relationships with ISFJs. They are often drawn to the analytical minds of ISTPs and INTPs, whom they can help connect with the social world. They enjoy the energy of ESFPs, creating a lively and fun-loving pair."
            ],

            //================ ISTP - The Virtuoso ================
            [
                'mbti_type' => 'ISTP',
                'type_name' => 'The Virtuoso',
                'profile_summary_for_employer' => "The ISTP, or 'The Virtuoso,' is a master of tools and a pragmatic troubleshooter. They are observant, action-oriented individuals who are driven by their Introverted Thinking (Ti) to understand how things work, and their Extraverted Sensing (Se) to engage with the physical world in a hands-on way. In the workplace, an ISTP is the ultimate crisis-responder and problem-solver. When a system breaks or an unexpected problem arises, they remain cool-headed, quickly analyzing the situation and finding a practical, efficient solution. They are independent, adaptable, and thrive on new experiences and challenges.",
                'key_strengths_in_workplace' => [
                    'Excellent Troubleshooting Skills: They have an uncanny ability to diagnose problems and find logical, hands-on solutions.',
                    'Grace Under Pressure: They remain calm, objective, and efficient in high-stress or crisis situations.',
                    'Practical and Resourceful: They are masters of using the tools and resources at hand to get the job done.',
                    'Adaptable and Flexible: They are not bound by rigid plans and can easily pivot to respond to changing circumstances.',
                    'Highly Independent: They are self-starters who require minimal supervision and thrive on autonomy.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Dislike of Long-Term Commitments: They can get bored with projects that drag on and may struggle with long-range planning.',
                    'Aversion to Rules and Bureaucracy: They can become frustrated by rigid structures and procedures that they see as inefficient.',
                    'Communication Can Be Too Blunt: Their focus on pure logic can make their communication seem overly direct or dismissive of feelings.',
                    'Can Be Impulsive: Their desire for action and new experiences can sometimes lead them to act without fully considering the consequences.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ISTP directly and to the point. They are interested in the 'what' and the 'how,' not long-winded theories or emotional appeals. Focus on the problem that needs solving. They respect competence and practical knowledge. If you want their buy-in, don't tell them what to do; present them with a problem and let them figure out the best solution. They are people of action, not words.",
                'task_management_approach_and_tips_for_employer' => "The best way to manage an ISTP is to give them a problem to solve and the freedom to solve it their way. They are demotivated by rigid rules, excessive meetings, and micromanagement. They excel in roles that involve hands-on work, crisis management, or technical expertise, such as engineering, IT support, piloting, or being a paramedic. Judge them by their results, not their process. A varied, challenging, and action-oriented workload will keep them engaged.",
                'feedback_receptivity_and_guidance_for_employer' => "ISTPs are surprisingly open to feedback as long as it is logical, direct, and aimed at improving their effectiveness. They do not take it personally; they see it as new data to improve their problem-solving process. Avoid emotional or vague feedback. Be specific and focus on the practical outcome. Acknowledge their skill and competence.",
                'work_environment_preferences_for_employer' => "An ISTP needs a flexible, action-oriented work environment with a minimum of rules and bureaucracy. They need the freedom to move around and engage in hands-on tasks. A dynamic setting that presents new challenges and problems to solve is ideal. A traditional, quiet office environment with repetitive tasks would be extremely stifling for them.",
                'motivators_for_employer_to_leverage' => [
                    'Autonomy and the freedom to work independently.',
                    'Solving immediate, tangible, and complex problems.',
                    'Opportunities for hands-on, action-oriented work.',
                    'A flexible environment with a variety of challenges.',
                    'Mastering a new tool, skill, or system.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ISTP is the troubleshooter and the realist. They are often quiet, observing and analyzing until a concrete problem arises. Then, they spring into action with a practical solution. They contribute best when they can work independently on a specific, technical part of a project. They are not interested in team-building exercises, but in effectively solving the task at hand.",
                'leadership_potential_or_style_notes_for_employer' => "ISTPs are reluctant leaders who lead by expertise and example. They are best suited to lead small, specialized teams in a crisis or technical situation (e.g., a lead firefighter or a senior mechanic). Their style is hands-off, providing their team with the tools and freedom they need to do their jobs. They lead through competence, not charisma.",
                'cognitive_functions' => ['Dominant: Introverted Thinking (Ti)', 'Auxiliary: Extraverted Sensing (Se)', 'Tertiary: Introverted Intuition (Ni)', 'Inferior: Extraverted Feeling (Fe)'],
                'career_suggestions' => ['Mechanical Engineer', 'Paramedic / EMT', 'Firefighter', 'Pilot', 'Computer Programmer', 'Mechanic', 'Forensic Scientist'],
                'famous_examples' => ['Clint Eastwood', 'Tom Cruise', 'Michael Jordan', 'Bruce Lee'],
                'how_to_handle_stress' => "Under severe stress, an ISTP can fall into the grip of their inferior function, Extraverted Feeling (Fe). This can cause them to become uncharacteristically emotional, hypersensitive to others' opinions, and to feel overwhelmed by a need for social validation they can't articulate. They may have emotional outbursts that seem out of place. To help, give them space and a practical, solvable problem to re-engage their dominant Ti. Avoid emotional pressure.",
                'relationships_with_other_types' => "They often have a dynamic and exciting relationship with ESTPs, sharing a love for action. They are intrigued by the vision of ENFJs, who can help them connect with the human side of their work. They appreciate the efficiency of ESTJs, though they may clash over the need for rigid rules."
            ],

            //================ ISFP - The Adventurer ================
            [
                'mbti_type' => 'ISFP',
                'type_name' => 'The Adventurer',
                'profile_summary_for_employer' => "The ISFP, or 'The Adventurer,' is a charming, artistic, and gentle free spirit who lives in a colorful world of sensory experience. They are guided by their deep-seated personal values (Introverted Feeling - Fi) and a desire to explore the world through their five senses (Extraverted Sensing - Se). In the workplace, they are the quiet aesthetes and the supportive collaborators. They bring a unique blend of creativity, adaptability, and a hands-on approach. They are not driven by ambition, but by the desire to live a life that is authentic and to create beauty and harmony in their immediate environment.",
                'key_strengths_in_workplace' => [
                    'Artistic and Aesthetic Sensibility: They have a keen eye for beauty, color, and design, making them natural artists and designers.',
                    'Adaptable and Spontaneous: They are happy to go with the flow and can easily adapt to new situations and environments.',
                    'Supportive and Cooperative: They are warm, friendly, and work well with others in a harmonious, non-competitive setting.',
                    'Practical, Hands-On Skills: They enjoy learning by doing and are often skilled at practical or artistic crafts.',
                    'Loyal to Their Values: They are deeply committed to their personal values and bring a quiet integrity to their work.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Aversion to Long-Term Planning: They live in the present and can struggle with creating and sticking to long-range plans or strategies.',
                    'Extreme Dislike of Conflict and Criticism: They are highly sensitive and will go to great lengths to avoid confrontation or negative feedback.',
                    'Difficulty with Abstract Analysis: They can become bored or disengaged by tasks that are purely theoretical or analytical.',
                    'Tendency to Be Overly Private: They can be difficult to get to know, often keeping their rich inner world to themselves.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ISFP in a gentle, encouraging, and informal way. They value authenticity and kindness. Focus on the tangible, sensory aspects of the work. Show, don't just tell. They are more likely to respond to a visual demonstration than a long, dry memo. Create a supportive atmosphere where they feel safe to share their ideas. Sincere, one-on-one praise is highly motivating.",
                'task_management_approach_and_tips_for_employer' => "ISFPs thrive in roles that allow for creative expression and hands-on work in a flexible environment. Fields like graphic design, fashion, culinary arts, or conservation are excellent fits. Give them projects with a tangible, aesthetic outcome. Avoid rigid structures and high-pressure, data-driven roles. They are motivated by the freedom to create and to make their immediate environment more beautiful and harmonious.",
                'feedback_receptivity_and_guidance_for_employer' => "Feedback must be delivered to an ISFP with extreme gentleness and care. They are perhaps the most sensitive type to criticism. Always deliver it privately and frame it as supportive encouragement, not a critique of their ability or worth. Focus on a specific, actionable behavior and surround it with plenty of genuine praise for their strengths and unique contributions.",
                'work_environment_preferences_for_employer' => "An ISFP needs a relaxed, supportive, and aesthetically pleasing work environment. They thrive in a culture that values individual expression, cooperation, and flexibility. A high-pressure, competitive, or sterile corporate environment is deeply draining for them. The ability to personalize their workspace is a huge plus.",
                'motivators_for_employer_to_leverage' => [
                    'The freedom for creative and artistic self-expression.',
                    'A harmonious and aesthetically pleasing environment.',
                    'Hands-on projects with a tangible outcome.',
                    'A flexible schedule and a lack of rigid rules.',
                    'Feeling that their work aligns with their personal values.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ISFP is the quiet, supportive collaborator. They are not likely to seek the spotlight, but they contribute by fostering a harmonious atmosphere and adding a touch of practical creativity. They are excellent listeners and are always willing to lend a hand. They work best in small, cooperative teams where their artistic talents can be put to use.",
                'leadership_potential_or_style_notes_for_employer' => "ISFPs are reluctant 'leaders by example.' They are not interested in command and control, but can lead small, creative teams by inspiring them through their own passion and artistic talent. Their leadership style is supportive, flexible, and focused on empowering each individual to express their unique skills.",
                'cognitive_functions' => ['Dominant: Introverted Feeling (Fi)', 'Auxiliary: Extraverted Sensing (Se)', 'Tertiary: Introverted Intuition (Ni)', 'Inferior: Extraverted Thinking (Te)'],
                'career_suggestions' => ['Graphic Designer', 'Chef', 'Fashion Designer', 'Artist / Musician', 'Veterinarian / Animal Care', 'Florist', 'Physical Therapist'],
                'famous_examples' => ['Michael Jackson', 'Britney Spears', 'Frida Kahlo', 'Bob Dylan'],
                'how_to_handle_stress' => "Under extreme stress, an ISFP can fall into the grip of their inferior function, Extraverted Thinking (Te). This can cause them to become uncharacteristically harsh, critical, and obsessed with efficiency and control. They may lash out with angry, critical judgments or become overwhelmed by a feeling of incompetence. To help, remove them from the stressful situation and give them space. Engaging them in a simple, enjoyable sensory activity (Se) can help them reconnect with their natural state.",
                'relationships_with_other_types' => "They are often drawn to the warmth and organizing energy of ESFJs and ENFJs, who can provide structure for their creativity. They enjoy the company of other SP 'Adventurer' types like ESTPs, sharing a love for living in the moment. They appreciate the depth of INFJs, who can understand their rich inner world."
            ],

            //================ ESTP - The Entrepreneur ================
            [
                'mbti_type' => 'ESTP',
                'type_name' => 'The Entrepreneur',
                'profile_summary_for_employer' => "The ESTP, or 'The Entrepreneur,' is the ultimate realist, a bundle of dynamic energy focused on the here and now. They are driven by their dominant Extraverted Sensing (Se) to immerse themselves in the present moment and seek out action and new experiences. Their auxiliary Introverted Thinking (Ti) gives them a pragmatic, logical approach to problem-solving. In the workplace, an ESTP is a charismatic, energetic, and persuasive doer. They are natural negotiators and risk-takers, excellent at responding to crises and spotting immediate opportunities that others miss. They thrive on action and are bored by theory.",
                'key_strengths_in_workplace' => [
                    'Action-Oriented and Energetic: They are always ready to jump into action and bring a dynamic energy to any project.',
                    'Excellent Negotiators and Persuaders: Their charm, confidence, and pragmatism make them highly effective at influencing others and closing deals.',
                    'Superb Crisis Responders: They think on their feet and remain cool and resourceful in high-pressure situations.',
                    'Observant and Resourceful: They are keenly aware of their surroundings and are adept at using the resources at hand to their advantage.',
                    'Adaptable Risk-Takers: They are not afraid to take calculated risks to seize an opportunity.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Impulsiveness: Their love of action can lead them to jump into situations without fully thinking through the long-term consequences.',
                    'Aversion to Rules and Structure: They can be rebellious and have difficulty operating within highly structured or bureaucratic environments.',
                    'Boredom with Routine: They quickly lose interest in repetitive tasks or long-term projects that lack immediate excitement.',
                    'Can Be Insensitive: Their focus on action and logic can sometimes make them overlook the feelings or sensitivities of others.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ESTP with energy, directness, and a focus on action. Keep it brief and to the point. They are interested in what can be done right now. They enjoy witty banter and a direct, challenging style. Don't bore them with long-term strategic plans; talk about the immediate challenge and the exciting opportunity. They are natural storytellers and respond well to engaging, real-world examples.",
                'task_management_approach_and_tips_for_employer' => "Give an ESTP a challenge with immediate, tangible results. They excel in fast-paced, action-oriented roles like sales, marketing, entrepreneurship, or emergency services. They need variety and a high degree of freedom. Micromanagement is poison to them. Send them out to put out fires, negotiate deals, or launch a new, exciting initiative. They are motivated by competition, risk, and the thrill of the win.",
                'feedback_receptivity_and_guidance_for_employer' => "ESTPs are generally thick-skinned and take feedback well, as long as it's direct, logical, and not overly emotional. They see it as a way to up their game. Be straightforward and focus on the results. They respect a direct challenge and will be motivated to prove you wrong if they disagree. Don't sugarcoat it, but keep it focused on performance.",
                'work_environment_preferences_for_employer' => "An ESTP thrives in a fast-paced, dynamic, and social environment. They need to be where the action is. A workplace that is full of energy, competition, and new challenges is a perfect fit. They enjoy being part of a fun, energetic team. A quiet, slow-paced, and solitary work environment is their personal hell.",
                'motivators_for_employer_to_leverage' => [
                    'Action, excitement, and immediate results.',
                    'Competition and the opportunity to win.',
                    'The freedom to take risks and solve problems on the fly.',
                    'A fun, social, and high-energy atmosphere.',
                    'Tangible rewards for their successes.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ESTP is the energizer and the troubleshooter. They are the one who gets things moving and can rally the team to tackle an immediate crisis. They are persuasive and can often take the lead in presenting the team's ideas or negotiating on its behalf. They keep things fun and focused on the present moment.",
                'leadership_potential_or_style_notes_for_employer' => "As leaders, ESTPs are charismatic and motivational 'promoters.' They lead from the front, inspiring their teams with their own energy and can-do attitude. They are excellent at leading sales teams, start-up ventures, or crisis response units. Their challenge is to focus on long-term strategy and not get so caught up in the excitement of the now that they neglect the future.",
                'cognitive_functions' => ['Dominant: Extraverted Sensing (Se)', 'Auxiliary: Introverted Thinking (Ti)', 'Tertiary: Extraverted Feeling (Fe)', 'Inferior: Introverted Intuition (Ni)'],
                'career_suggestions' => ['Sales Director', 'Entrepreneur', 'Paramedic', 'Marketing Promoter', 'Financial Trader', 'Detective', 'Professional Athlete'],
                'famous_examples' => ['Donald Trump', 'Madonna', 'Jack Nicholson', 'Eddie Murphy'],
                'how_to_handle_stress' => "Under prolonged stress, an ESTP can fall into the grip of their inferior function, Introverted Intuition (Ni). This can cause them to lose their usual confidence and become plagued by paranoid thoughts and negative future possibilities. They may see hidden, sinister meanings in everything and feel a sense of impending doom. To help, get them re-engaged with their physical environment (Se). A physical challenge, a new experience, or a concrete problem to solve can pull them out of the negative internal spiral.",
                'relationships_with_other_types' => "They are often drawn to the warmth and stability of ISFJs. They enjoy the intellectual challenge presented by INTPs, whom they can push into action. They form a high-energy 'get things done' partnership with ESTJs."
            ],

            //================ ESFP - The Entertainer ================
            [
                'mbti_type' => 'ESFP',
                'type_name' => 'The Entertainer',
                'profile_summary_for_employer' => "The ESFP, or 'The Entertainer,' is a vivacious, charming, and spontaneous individual who lives to soak up life's experiences. They are driven by their dominant Extraverted Sensing (Se) to engage with the world around them and their auxiliary Introverted Feeling (Fi) to connect with others on an emotional level. In the workplace, an ESFP is the ultimate people-person and morale booster. They bring a contagious energy and a flair for the dramatic, making the work environment more fun and engaging. They are excellent at customer-facing roles and at generating enthusiasm for new ideas.",
                'key_strengths_in_workplace' => [
                    'Excellent Interpersonal Skills: They are warm, engaging, and can build rapport with virtually anyone.',
                    'Infectious Optimism and Energy: They are natural performers who can create a positive and lively atmosphere.',
                    'Practical and Adaptable: They are resourceful, live in the moment, and can easily adapt to changing circumstances.',
                    'Aesthetic Sensibility: They have a great sense of style and presentation, and a knack for making things look good.',
                    'Great at Customer Engagement: Their charm and people-skills make them fantastic at sales, service, and public relations.'
                ],
                'potential_development_areas_for_workplace_effectiveness' => [
                    'Difficulty with Long-Term Focus: They live in the present and can struggle with long-range planning and projects that don\'t offer immediate gratification.',
                    'Aversion to Structure and Routine: They can feel stifled by rigid rules, administrative tasks, and predictable schedules.',
                    'Dislike of Conflict: They want everyone to be happy and may avoid difficult conversations or delivering bad news.',
                    'Can Be Easily Distracted: Their love for new experiences can make it difficult for them to focus on a single task to completion.'
                ],
                'communication_style_and_tips_for_employer' => "Communicate with an ESFP with energy, humor, and a personal touch. They love to engage in lively, friendly conversation. Keep things upbeat and focus on the exciting aspects of the work. They respond well to stories and visual aids. Appreciate their style and their ability to connect with people. A boring, formal meeting will quickly lose their attention.",
                'task_management_approach_and_tips_for_employer' => "ESFPs shine in roles that are social, hands-on, and offer plenty of variety. They are perfect for event planning, sales, public relations, and any customer-facing role. Give them the freedom to interact with people and use their natural charm. Avoid isolating them with repetitive, analytical tasks. They are motivated by fun, social interaction, and the opportunity to make a splash.",
                'feedback_receptivity_and_guidance_for_employer' => "ESFPs can be sensitive to criticism, as they want to be liked. Deliver feedback in a supportive, encouraging, and friendly manner. Focus on how they can be even more awesome and connect better with people. It's best to deliver it one-on-one and with a lot of positive reinforcement. Acknowledge their good intentions and their positive impact on team morale.",
                'work_environment_preferences_for_employer' => "An ESFP needs a vibrant, social, and aesthetically pleasing work environment. They love being part of a fun, energetic team where they can collaborate and interact with others. A culture that celebrates successes and encourages a bit of playfulness is ideal. A sterile, silent, or overly formal workplace will drain their energy fast.",
                'motivators_for_employer_to_leverage' => [
                    'A fun, social, and high-energy work atmosphere.',
                    'Opportunities to interact with and entertain people.',
                    'Variety, excitement, and new experiences.',
                    'Public praise and appreciation for their style and charm.',
                    'Hands-on work with a tangible, beautiful result.'
                ],
                'team_collaboration_style_for_employer' => "In a team, the ESFP is the life of the party and the master of ceremonies. They keep the energy high, encourage social bonding, and are great at presenting the team's work with flair. They are the ones who will suggest celebrating milestones and will make sure everyone is having a good time while getting the work done.",
                'leadership_potential_or_style_notes_for_employer' => "As leaders, ESFPs are motivational and charismatic 'cheerleaders.' They lead by inspiring enthusiasm and fostering a positive, fun team culture. They are excellent at leading teams in hospitality, entertainment, or public-facing roles. Their challenge as a leader is to focus on the less exciting, long-term details and to hold people accountable even when it's uncomfortable.",
                'cognitive_functions' => ['Dominant: Extraverted Sensing (Se)', 'Auxiliary: Introverted Feeling (Fi)', 'Tertiary: Extraverted Thinking (Te)', 'Inferior: Introverted Intuition (Ni)'],
                'career_suggestions' => ['Event Planner', 'Sales Representative', 'Public Relations Specialist', 'Performer / Actor', 'Tour Guide', 'Cosmetologist', 'Interior Decorator'],
                'famous_examples' => ['Marilyn Monroe', 'Elvis Presley', 'Adele', 'Leonardo DiCaprio'],
                'how_to_handle_stress' => "Under extreme stress, an ESFP can fall into the grip of their inferior function, Introverted Intuition (Ni). This causes them to lose their usual optimism and become uncharacteristically paranoid, seeing dark, hidden motives and negative future outcomes everywhere. They can feel isolated and overwhelmed by abstract fears. To help, get them out of their head and re-engaged in a positive sensory experience (Se). Listening to music, going for a walk, or talking with a trusted friend about a happy memory can help break the grip.",
                'relationships_with_other_types' => "They form fun and lively connections with other SP types. They are often drawn to the stability and warmth of ISFJs and ESFJs. They can be balanced by the strategic thinking of NTJ types, who can help them see the long-term implications of their actions, creating a powerful 'work hard, play hard' dynamic."
            ]
        ];

        foreach ($typesData as $type) {
            // Use updateOrCreate to update existing records or create new ones.
            // The model's $casts property will automatically handle JSON encoding
            MbtiTypeDetail::updateOrCreate(['mbti_type' => $type['mbti_type']], $type);
        }
    }
}