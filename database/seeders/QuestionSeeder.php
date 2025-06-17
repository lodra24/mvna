<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Önce mevcut tüm soruları temizleyelim ki her seeder çalıştığında tekrar eklenmesin.
        Question::query()->delete();

        $questions = [
            // E/I Boyutu
            [
                'question_text' => ['tr' => 'Zorlu bir iş gününün ardından nasıl deşarj olursunuz?', 'en' => 'How do you recharge after a challenging workday?'],
                'option_a_text' => ['tr' => 'Arkadaşlarımla veya ailemle sosyalleşerek.', 'en' => 'By socializing with friends or family.'],
                'option_b_text' => ['tr' => 'Tek başıma sessiz bir aktiviteyle (kitap, film vb.).', 'en' => 'With a quiet, solitary activity (reading, movie, etc.).'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Bir beyin fırtınası toplantısında rolünüz nedir?', 'en' => 'What is your role in a brainstorming meeting?'],
                'option_a_text' => ['tr' => 'Fikirlerimi yüksek sesle paylaşır ve tartışmayı yönlendiririm.', 'en' => 'I share my ideas out loud and drive the discussion.'],
                'option_b_text' => ['tr' => 'Önce dinler, notlar alır ve en iyi fikirleri zihnimde işlerim.', 'en' => 'I listen first, take notes, and process the best ideas internally.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Öğle yemeği molasını genellikle nasıl geçirirsiniz?', 'en' => 'How do you typically spend your lunch break?'],
                'option_a_text' => ['tr' => 'İş arkadaşlarımla birlikte yemek yiyerek ve sohbet ederek.', 'en' => 'Eating and chatting with my colleagues.'],
                'option_b_text' => ['tr' => 'Kendi başıma yemek yiyerek veya kişisel işlerimi hallederek.', 'en' => 'Eating by myself or handling personal tasks.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Yeni bir ortama girdiğinizde ilk ne yaparsınız?', 'en' => 'What\'s the first thing you do when entering a new environment?'],
                'option_a_text' => ['tr' => 'Kendimi tanıtır ve insanlarla hemen sohbet etmeye başlarım.', 'en' => 'I introduce myself and start conversations with people right away.'],
                'option_b_text' => ['tr' => 'Önce etrafı gözlemler ve ortama alışmaya çalışırım.', 'en' => 'I observe my surroundings first and try to get a feel for the place.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Büyük bir proje tesliminden sonra kutlamayı nasıl tercih edersiniz?', 'en' => 'How do you prefer to celebrate after a major project delivery?'],
                'option_a_text' => ['tr' => 'Takım arkadaşlarımla büyük bir grup etkinliğiyle.', 'en' => 'With a large group event with my team.'],
                'option_b_text' => ['tr' => 'Yakın birkaç arkadaşımla sakin bir yemek yiyerek veya evde dinlenerek.', 'en' => 'With a quiet dinner with a few close friends or relaxing at home.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Telefonla konuşmak mı, e-posta yazmak mı?', 'en' => 'A phone call or an email?'],
                'option_a_text' => ['tr' => 'Hızlı ve doğrudan iletişim için telefonla konuşmayı tercih ederim.', 'en' => 'I prefer a phone call for quick and direct communication.'],
                'option_b_text' => ['tr' => 'Düşüncelerimi netleştirmek için e-posta yazmayı tercih ederim.', 'en' => 'I prefer writing an email to clarify my thoughts.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Bir konferansta veya seminerde, mola sırasında ne yaparsınız?', 'en' => 'What do you do during a break at a conference or seminar?'],
                'option_a_text' => ['tr' => 'Yeni insanlarla tanışmak için etrafta dolaşır, ağ kurarım (networking).', 'en' => 'I walk around and network to meet new people.'],
                'option_b_text' => ['tr' => 'Bir sonraki oturuma hazırlanır veya düşüncelerimi toparlamak için yalnız kalırım.', 'en' => 'I prepare for the next session or find a quiet spot to gather my thoughts.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Enerjinizin en yüksek olduğu zamanlar...', 'en' => 'You feel most energetic when...'],
                'option_a_text' => ['tr' => 'İnsanlarla dolu, hareketli ve dinamik ortamlardayım.', 'en' => 'I\'m in lively, dynamic environments full of people.'],
                'option_b_text' => ['tr' => 'Sakin, odaklanmış ve kendi düşüncelerimle baş başa olduğum zamanlar.', 'en' => 'I\'m calm, focused, and alone with my thoughts.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Bir grup çalışmasında genellikle hangi rolü üstlenirsiniz?', 'en' => 'Which role do you typically take in a group project?'],
                'option_a_text' => ['tr' => 'Grubun sözcüsü olur, fikirleri bir araya getirip sunarım.', 'en' => 'I become the group\'s spokesperson, gathering and presenting ideas.'],
                'option_b_text' => ['tr' => 'Arka planda araştırma yapar, verileri analiz eder ve gruba destek olurum.', 'en' => 'I do background research, analyze data, and support the group.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Hafta sonu planlarınız genellikle nasıldır?', 'en' => 'What are your typical weekend plans?'],
                'option_a_text' => ['tr' => 'Sosyal etkinlikler, partiler veya arkadaşlarla buluşmalarla doludur.', 'en' => 'Filled with social events, parties, or meetups with friends.'],
                'option_b_text' => ['tr' => 'Genellikle evde dinlenerek, hobilerimle ilgilenerek veya sakin aktivitelerle geçer.', 'en' => 'Usually spent relaxing at home, pursuing hobbies, or doing quiet activities.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Bir sorunu çözerken yaklaşımınız nedir?', 'en' => 'How do you approach solving a problem?'],
                'option_a_text' => ['tr' => 'Diğerlerinin fikirlerini almak için konuyu hemen birileriyle konuşurum.', 'en' => 'I immediately talk it over with someone to get their input.'],
                'option_b_text' => ['tr' => 'Sorunu kendi başıma analiz eder, tüm yönleriyle düşünürüm.', 'en' => 'I analyze the problem on my own, thinking through all its aspects.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Açık ofis ortamı mı, kişisel ofis mi?', 'en' => 'An open-plan office or a personal office?'],
                'option_a_text' => ['tr' => 'Etkileşimi ve iş birliğini artırdığı için açık ofisi tercih ederim.', 'en' => 'I prefer an open-plan office as it boosts interaction and collaboration.'],
                'option_b_text' => ['tr' => 'Odaklanmamı sağladığı için kişisel veya sessiz bir ofisi tercih ederim.', 'en' => 'I prefer a personal or quiet office as it helps me focus.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Bir konu hakkında bilgi edinirken...', 'en' => 'When learning about a new topic...'],
                'option_a_text' => ['tr' => 'Konuyu bilen kişilerle konuşarak veya bir tartışma grubuna katılarak öğrenirim.', 'en' => 'I learn by talking to people who know about it or joining a discussion group.'],
                'option_b_text' => ['tr' => 'Konu hakkında yazılar okuyarak veya belgeseller izleyerek kendi kendime öğrenirim.', 'en' => 'I learn on my own by reading articles or watching documentaries about it.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Tanımadığınız insanların olduğu bir partide...', 'en' => 'At a party where you don\'t know many people...'],
                'option_a_text' => ['tr' => 'Rahatça yeni gruplara katılır ve sohbete başlarım.', 'en' => 'I comfortably join new groups and start conversations.'],
                'option_b_text' => ['tr' => 'Genellikle tanıdığım birini bulur veya tek başıma bir köşede dururum.', 'en' => 'I usually find someone I know or stand alone in a corner.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],
            [
                'question_text' => ['tr' => 'Kendinizi ifade ederken hangi yolu daha doğal bulursunuz?', 'en' => 'Which way of expressing yourself do you find more natural?'],
                'option_a_text' => ['tr' => 'Konuşarak ve anında tepki vererek.', 'en' => 'By talking and reacting in the moment.'],
                'option_b_text' => ['tr' => 'Yazarak veya iyice düşündükten sonra konuşarak.', 'en' => 'By writing or speaking after careful thought.'],
                'dimension' => 'E/I', 'option_a_value' => 'E', 'option_b_value' => 'I'
            ],

            // S/N Boyutu
            [
                'question_text' => ['tr' => 'Bir proje planlarken neye odaklanırsınız?', 'en' => 'When planning a project, what do you focus on?'],
                'option_a_text' => ['tr' => 'Gerçekçi adımlara, mevcut kaynaklara ve somut detaylara.', 'en' => 'On realistic steps, available resources, and concrete details.'],
                'option_b_text' => ['tr' => 'Genel vizyona, gelecekteki olasılıklara ve yenilikçi fikirlere.', 'en' => 'On the overall vision, future possibilities, and innovative ideas.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Yeni bir cihaz aldığınızda...', 'en' => 'When you get a new device...'],
                'option_a_text' => ['tr' => 'Kullanım kılavuzunu adım adım okur ve uygularım.', 'en' => 'I read and follow the instruction manual step by step.'],
                'option_b_text' => ['tr' => 'Cihazı hemen kurcalar, deneyerek nasıl çalıştığını anlarım.', 'en' => 'I start tinkering with it, figuring out how it works by trying.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Bir hikaye anlatırken...', 'en' => 'When telling a story...'],
                'option_a_text' => ['tr' => 'Olayları sıralı ve detaylı bir şekilde anlatırım.', 'en' => 'I narrate the events sequentially and with a lot of detail.'],
                'option_b_text' => ['tr' => 'Ana fikri ve yarattığı duyguyu vurgular, detayları atlarım.', 'en' => 'I emphasize the main point and the feeling it created, often skipping details.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Talimatları nasıl almayı tercih edersiniz?', 'en' => 'How do you prefer to receive instructions?'],
                'option_a_text' => ['tr' => 'Açık, net, adım adım ve spesifik olarak.', 'en' => 'Clear, specific, and step-by-step.'],
                'option_b_text' => ['tr' => 'Genel bir hedef ve amaç şeklinde, detayları bana bırakarak.', 'en' => 'As a general goal or objective, leaving the details to me.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Gelecek hakkında düşünürken...', 'en' => 'When thinking about the future...'],
                'option_a_text' => ['tr' => 'Mevcut durumdan yola çıkarak pratik ve ulaşılabilir hedefler koyarım.', 'en' => 'I set practical and achievable goals based on the current situation.'],
                'option_b_text' => ['tr' => 'Olabilecekler hakkında hayal kurar, büyük ve ilham verici resimler çizerim.', 'en' => 'I dream about what could be, painting big and inspiring pictures.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Bir toplantıda sunulan verilere nasıl yaklaşırsınız?', 'en' => 'How do you approach data presented in a meeting?'],
                'option_a_text' => ['tr' => 'Verilerin doğruluğunu, kaynağını ve pratik sonuçlarını sorgularım.', 'en' => 'I question the accuracy, source, and practical implications of the data.'],
                'option_b_text' => ['tr' => 'Veriler arasındaki gizli bağlantıları ve ne anlama gelebileceğini düşünürüm.', 'en' => 'I think about the hidden patterns and what the data might imply.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Hangisi sizi daha çok tanımlar?', 'en' => 'Which describes you better?'],
                'option_a_text' => ['tr' => 'Gerçekçi ve ayakları yere basan.', 'en' => 'Realistic and down-to-earth.'],
                'option_b_text' => ['tr' => 'Hayalperest ve vizyoner.', 'en' => 'Imaginative and visionary.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Bir sanat eserine baktığınızda neye dikkat edersiniz?', 'en' => 'When looking at a piece of art, what do you notice?'],
                'option_a_text' => ['tr' => 'Renkler, şekiller ve kullanılan teknik gibi somut özelliklere.', 'en' => 'The concrete features like colors, shapes, and the technique used.'],
                'option_b_text' => ['tr' => 'Eserin bana hissettirdiği duyguya ve sembolik anlamına.', 'en' => 'The feeling the artwork evokes in me and its symbolic meaning.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Problem çözerken...', 'en' => 'When solving a problem...'],
                'option_a_text' => ['tr' => 'Daha önce işe yaramış, denenmiş ve güvenilir yöntemleri kullanırım.', 'en' => 'I use tried and true methods that have worked before.'],
                'option_b_text' => ['tr' => 'Yepyeni, daha önce denenmemiş ve yaratıcı çözümler üretmeye çalışırım.', 'en' => 'I try to come up with brand new, untried, and creative solutions.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Bir iş arkadaşınızı değerlendirirken neye güvenirsiniz?', 'en' => 'When evaluating a colleague, what do you trust more?'],
                'option_a_text' => ['tr' => 'Geçmişteki performansına ve somut başarılarına.', 'en' => 'Their past performance and concrete achievements.'],
                'option_b_text' => ['tr' => 'Potansiyeline ve gelecekte neler yapabileceğine dair sezgilerime.', 'en' => 'My intuition about their potential and what they could do in the future.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Bir film izlerken dikkatinizi ne çeker?', 'en' => 'What catches your attention while watching a movie?'],
                'option_a_text' => ['tr' => 'Olay örgüsünün mantıksal tutarlılığı ve gerçekçi detaylar.', 'en' => 'The logical consistency of the plot and realistic details.'],
                'option_b_text' => ['tr' => 'Filmin ana teması, metaforları ve alt metinleri.', 'en' => 'The film\'s main theme, metaphors, and subtext.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Yeni bir fikirle karşılaştığınızda ilk tepkiniz ne olur?', 'en' => 'What is your first reaction to a new idea?'],
                'option_a_text' => ['tr' => '"Bu nasıl çalışır? Pratik uygulaması nedir?" diye düşünürüm.', 'en' => 'I think, "How will this work? What are its practical applications?"'],
                'option_b_text' => ['tr' => '"Bu fikir ne gibi yeni kapılar açar? Başka nelere yol açabilir?" diye düşünürüm.', 'en' => 'I think, "What new doors could this idea open? What else could it lead to?"'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Bir işin "yapıldı" sayılması için ne gerekir?', 'en' => 'What does it take for a task to be considered "done"?'],
                'option_a_text' => ['tr' => 'Tüm adımlar tamamlandığında ve somut bir çıktı olduğunda.', 'en' => 'When all the steps are completed and there is a tangible output.'],
                'option_b_text' => ['tr' => 'Görevin ardındaki amaç karşılandığında, detaylar değişebilir.', 'en' => 'When the purpose behind the task is met, even if the details change.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Veri analizi yaparken...', 'en' => 'When analyzing data...'],
                'option_a_text' => ['tr' => 'Rakamlara ve istatistiklere odaklanır, somut sonuçlar çıkarırım.', 'en' => 'I focus on the numbers and statistics, drawing concrete conclusions.'],
                'option_b_text' => ['tr' => 'Trendlere, genel eğilimlere ve verilerin arkasındaki "büyük resme" odaklanırım.', 'en' => 'I focus on trends, overall patterns, and the "big picture" behind the data.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],
            [
                'question_text' => ['tr' => 'Bir tatil planı yaparken...', 'en' => 'When planning a vacation...'],
                'option_a_text' => ['tr' => 'Gidilecek yerleri, konaklamayı ve aktiviteleri önceden detaylıca araştırırım.', 'en' => 'I research places to visit, accommodation, and activities in detail beforehand.'],
                'option_b_text' => ['tr' => 'Gideceğim yerin genel atmosferini hayal eder, planı akışına bırakırım.', 'en' => 'I imagine the general atmosphere of the destination and go with the flow.'],
                'dimension' => 'S/N', 'option_a_value' => 'S', 'option_b_value' => 'N'
            ],

            // T/F Boyutu
            [
                'question_text' => ['tr' => 'Bir ekip arkadaşınıza geri bildirim verirken...', 'en' => 'When giving feedback to a teammate...'],
                'option_a_text' => ['tr' => 'Doğrudan, mantıklı ve eleştirimi objektif kriterlere dayandırırım.', 'en' => 'I am direct, logical, and base my critique on objective criteria.'],
                'option_b_text' => ['tr' => 'Nazik ve yapıcı olmaya çalışır, kişinin duygularını incitmemeye özen gösteririm.', 'en' => 'I try to be gentle and constructive, careful not to hurt their feelings.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Önemli bir karar alırken neye daha çok güvenirsiniz?', 'en' => 'What do you rely on more when making an important decision?'],
                'option_a_text' => ['tr' => 'Mantığıma, gerçeklere ve verilere dayalı analizime.', 'en' => 'My logic, facts, and data-based analysis.'],
                'option_b_text' => ['tr' => 'Değerlerime, içgüdülerime ve kararın insanlar üzerindeki etkisine.', 'en' => 'My values, my gut feeling, and the impact of the decision on people.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir tartışmada önceliğiniz nedir?', 'en' => 'What is your priority in a debate?'],
                'option_a_text' => ['tr' => 'Doğru ve tutarlı sonuca ulaşmak.', 'en' => 'Reaching the correct and consistent conclusion.'],
                'option_b_text' => ['tr' => 'Herkesin kendini ifade edebildiği uyumlu bir ortam sağlamak.', 'en' => 'Ensuring a harmonious environment where everyone can express themselves.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir işe alım kararında en önemli faktör nedir?', 'en' => 'What is the most important factor in a hiring decision?'],
                'option_a_text' => ['tr' => 'Adayın yetkinlikleri, deneyimi ve kanıtlanmış becerileri.', 'en' => 'The candidate\'s competencies, experience, and proven skills.'],
                'option_b_text' => ['tr' => 'Adayın ekip kültürüne uyumu, tutkusu ve karakteri.', 'en' => 'The candidate\'s fit with the team culture, their passion, and character.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir iş arkadaşınız kişisel bir sorununu anlattığında...', 'en' => 'When a colleague shares a personal problem...'],
                'option_a_text' => ['tr' => 'Pratik çözümler ve mantıklı tavsiyeler sunmaya çalışırım.', 'en' => 'I try to offer practical solutions and logical advice.'],
                'option_b_text' => ['tr' => 'Onu dinler, empati kurar ve duygusal destek veririm.', 'en' => 'I listen, empathize, and offer emotional support.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Başarıyı nasıl tanımlarsınız?', 'en' => 'How do you define success?'],
                'option_a_text' => ['tr' => 'Belirlenen hedeflere ulaşmak ve verimli sonuçlar elde etmek.', 'en' => 'Achieving set goals and producing efficient results.'],
                'option_b_text' => ['tr' => 'Yaptığım işten kişisel tatmin duymak ve başkalarına yardım etmek.', 'en' => 'Feeling personal fulfillment from my work and helping others.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir kuralın istisnası yapılabilir mi?', 'en' => 'Can an exception be made to a rule?'],
                'option_a_text' => ['tr' => 'Hayır, kurallar herkese eşit ve tutarlı uygulanmalıdır.', 'en' => 'No, rules should be applied equally and consistently to everyone.'],
                'option_b_text' => ['tr' => 'Evet, durumun özel koşulları ve insani faktörler göz önüne alınmalı.', 'en' => 'Yes, the specific circumstances and human factors should be considered.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir eleştiri aldığınızda ilk tepkiniz ne olur?', 'en' => 'What\'s your first reaction when you receive criticism?'],
                'option_a_text' => ['tr' => 'Eleştirinin mantığını anlamaya ve kendimi nasıl geliştireceğime odaklanırım.', 'en' => 'I focus on understanding the logic of the criticism and how I can improve.'],
                'option_b_text' => ['tr' => 'Eleştiriyi kişisel olarak algılayabilir ve üzülebilirim.', 'en' => 'I might take the criticism personally and feel upset.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir grup kararında önceliğiniz...', 'en' => 'In a group decision, your priority is...'],
                'option_a_text' => ['tr' => 'En mantıklı ve etkili kararın alınmasıdır.', 'en' => 'to make the most logical and effective decision.'],
                'option_b_text' => ['tr' => 'Grubun çoğunluğunun mutlu olacağı bir uzlaşmaya varılmasıdır.', 'en' => 'to reach a consensus that makes the majority of the group happy.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir şirketin sosyal sorumluluk projeleri sizin için ne kadar önemli?', 'en' => 'How important are a company\'s social responsibility projects to you?'],
                'option_a_text' => ['tr' => 'Şirketin ana işi kadar önemli değildir, karlılık önceliklidir.', 'en' => 'Not as important as the core business; profitability is the priority.'],
                'option_b_text' => ['tr' => 'Çok önemlidir, bir şirketin topluma katkıda bulunmasını beklerim.', 'en' => 'Very important; I expect a company to contribute to society.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir anlaşmazlık durumunda nasıl bir arabulucu olursunuz?', 'en' => 'How do you mediate in a disagreement?'],
                'option_a_text' => ['tr' => 'Tarafsız kalır, sorunun temel nedenlerini mantıksal olarak analiz ederim.', 'en' => 'I remain impartial and logically analyze the root causes of the problem.'],
                'option_b_text' => ['tr' => 'Tarafların duygularını anlamaya çalışır, aralarında bir köprü kurarım.', 'en' => 'I try to understand the feelings of both sides and build a bridge between them.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Birini övmeniz gerektiğinde...', 'en' => 'When you need to praise someone...'],
                'option_a_text' => ['tr' => 'Yaptığı işin spesifik, ölçülebilir başarılarını vurgularım.', 'en' => 'I highlight the specific, measurable achievements of their work.'],
                'option_b_text' => ['tr' => 'Gösterdiği çabayı, tutkuyu ve takıma kattığı pozitif enerjiyi överim.', 'en' => 'I praise their effort, passion, and the positive energy they bring to the team.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Hangisi daha kötü bir hata olurdu?', 'en' => 'Which would be a worse mistake?'],
                'option_a_text' => ['tr' => 'Duygulara kapılıp mantıksız bir karar vermek.', 'en' => 'To make an illogical decision based on emotions.'],
                'option_b_text' => ['tr' => 'Bir başkasının duygularını görmezden gelerek çok katı olmak.', 'en' => 'To be too harsh by ignoring someone else\'s feelings.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir liderde aradığınız en önemli özellik...', 'en' => 'The most important quality you look for in a leader is...'],
                'option_a_text' => ['tr' => 'Yetkinlik ve stratejik zeka.', 'en' => 'Competence and strategic intelligence.'],
                'option_b_text' => ['tr' => 'Empati ve ilham verme yeteneği.', 'en' => 'Empathy and the ability to inspire.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],
            [
                'question_text' => ['tr' => 'Bir görevi delege ederken neye odaklanırsınız?', 'en' => 'When delegating a task, what do you focus on?'],
                'option_a_text' => ['tr' => 'İşi en iyi ve en verimli kimin yapabileceğine.', 'en' => 'Who can do the job best and most efficiently.'],
                'option_b_text' => ['tr' => 'Bu görevin o kişinin gelişimine nasıl katkı sağlayacağına.', 'en' => 'How the task can contribute to that person\'s development.'],
                'dimension' => 'T/F', 'option_a_value' => 'T', 'option_b_value' => 'F'
            ],

            // J/P Boyutu
            [
                'question_text' => ['tr' => 'Çalışma masanız genellikle nasıldır?', 'en' => 'What is your desk usually like?'],
                'option_a_text' => ['tr' => 'Düzenli, temiz ve her şeyin belirli bir yeri vardır.', 'en' => 'Tidy, organized, and everything has its specific place.'],
                'option_b_text' => ['tr' => 'Biraz dağınıktır ama aradığım şeyi nerede bulacağımı bilirim.', 'en' => 'A bit messy, but I know where to find what I\'m looking for.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir tatil planı yaparken...', 'en' => 'When planning a vacation...'],
                'option_a_text' => ['tr' => 'Gideceğim yerleri ve aktiviteleri önceden belirler, bir program yaparım.', 'en' => 'I decide on the places to visit and activities in advance and make a schedule.'],
                'option_b_text' => ['tr' => 'Sadece ana hedefi belirler, geri kalanını akışına bırakmayı severim.', 'en' => 'I only set the main destination and like to go with the flow for the rest.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir proje üzerinde çalışırken...', 'en' => 'When working on a project...'],
                'option_a_text' => ['tr' => 'Belirlenmiş son teslim tarihlerine sıkı sıkıya uyar, işi erken bitirmeye çalışırım.', 'en' => 'I strictly adhere to deadlines and try to finish work early.'],
                'option_b_text' => ['tr' => 'Son ana kadar esnek kalır, en iyi ilham geldiğinde çalışırım.', 'en' => 'I stay flexible until the last minute and work when the best inspiration hits.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir karar aldıktan sonra...', 'en' => 'After making a decision...'],
                'option_a_text' => ['tr' => 'Kararıma sadık kalırım ve nadiren değiştiririm.', 'en' => 'I stick to my decision and rarely change it.'],
                'option_b_text' => ['tr' => 'Yeni bilgiler geldikçe fikrimi değiştirmeye ve seçenekleri açık tutmaya eğilimliyim.', 'en' => 'I\'m inclined to change my mind as new information comes in and keep options open.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Sabah rutininiz nasıldır?', 'en' => 'What\'s your morning routine like?'],
                'option_a_text' => ['tr' => 'Her sabah hemen hemen aynı saatte, aynı şeyleri yaparım.', 'en' => 'I do the same things at almost the same time every morning.'],
                'option_b_text' => ['tr' => 'Rutinim yoktur, o günkü moduma ve enerjime göre hareket ederim.', 'en' => 'I don\'t have a routine; I act according to my mood and energy that day.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => '"İşleri halletmek" sizin için ne anlama gelir?', 'en' => 'What does "getting things done" mean to you?'],
                'option_a_text' => ['tr' => 'Bir görev listesindeki maddeleri birer birer tamamlayıp üzerini çizmek.', 'en' => 'Checking off items one by one from a to-do list.'],
                'option_b_text' => ['tr' => 'Birçok farklı projeyi aynı anda başlatmak ve esnek bir şekilde ilerlemek.', 'en' => 'Starting many different projects at once and progressing flexibly.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir toplantıya hazırlanırken...', 'en' => 'When preparing for a meeting...'],
                'option_a_text' => ['tr' => 'Gündemi önceden belirler, konuşacaklarımı net bir şekilde planlarım.', 'en' => 'I set the agenda in advance and clearly plan what I will say.'],
                'option_b_text' => ['tr' => 'Ana konuları aklımda tutar, toplantının akışına göre spontane konuşurum.', 'en' => 'I keep the main topics in mind and speak spontaneously according to the flow of the meeting.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Hangisi sizi daha çok strese sokar?', 'en' => 'What stresses you out more?'],
                'option_a_text' => ['tr' => 'Beklenmedik bir şekilde planların değişmesi.', 'en' => 'Unexpected changes to plans.'],
                'option_b_text' => ['tr' => 'Çok fazla kural ve yapıya uymak zorunda kalmak.', 'en' => 'Having to conform to too many rules and structures.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Alışverişe çıktığınızda...', 'en' => 'When you go shopping...'],
                'option_a_text' => ['tr' => 'Genellikle ne alacağımı önceden belirlediğim bir listeyle giderim.', 'en' => 'I usually go with a list of what I need to buy.'],
                'option_b_text' => ['tr' => 'Mağazaları dolaşır, o an ilgimi çeken şeyleri alırım.', 'en' => 'I wander through stores and buy whatever catches my eye at the moment.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir işi tamamlarken yaklaşımınız...', 'en' => 'Your approach to completing a task is...'],
                'option_a_text' => ['tr' => 'Görevi parçalara ayırır, sistematik ve sıralı bir şekilde ilerlerim.', 'en' => 'to break the task into parts and proceed systematically and sequentially.'],
                'option_b_text' => ['tr' => 'Görevin en ilginç kısmından başlar, enerjiyle ve esnek bir şekilde çalışırım.', 'en' => 'to start with the most interesting part of the task and work with energy and flexibility.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Hayatınızda belirsizlik...', 'en' => 'Uncertainty in your life...'],
                'option_a_text' => ['tr' => 'Beni rahatsız eder, netlik ve öngörülebilirlik ararım.', 'en' => 'makes me uncomfortable; I seek clarity and predictability.'],
                'option_b_text' => ['tr' => 'Bana heyecan verir, yeni fırsatlar ve deneyimler sunar.', 'en' => 'excites me; it offers new opportunities and experiences.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir son teslim tarihi (deadline) yaklaştığında...', 'en' => 'When a deadline is approaching...'],
                'option_a_text' => ['tr' => 'Genellikle işimi çoktan bitirmiş veya bitirmek üzere olurum.', 'en' => 'I have usually already finished or am about to finish my work.'],
                'option_b_text' => ['tr' => 'En verimli çalıştığım zamandır, baskı altında daha iyi odaklanırım.', 'en' => 'It\'s when I work most efficiently; I focus better under pressure.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir grup projesinde takvimi kim yönetmeli?', 'en' => 'Who should manage the schedule in a group project?'],
                'option_a_text' => ['tr' => 'Ben, çünkü planlama ve organizasyon konusunda iyiyimdir.', 'en' => 'Me, because I\'m good at planning and organization.'],
                'option_b_text' => ['tr' => 'Biri yönetmeli ama planlar esnek olmalı ve değişebilmeli.', 'en' => 'Someone should manage it, but plans should be flexible and adaptable.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir konuyu kapattıktan sonra...', 'en' => 'After you\'ve closed a topic...'],
                'option_a_text' => ['tr' => 'O konuya geri dönmekten hoşlanmam, kararlar kesindir.', 'en' => 'I don\'t like going back to it; decisions are final.'],
                'option_b_text' => ['tr' => 'Yeni bir bakış açısı ortaya çıkarsa konuyu yeniden tartışmaya açığım.', 'en' => 'I\'m open to reopening the discussion if a new perspective emerges.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
            [
                'question_text' => ['tr' => 'Bir seçenekler listesiyle karşılaştığınızda...', 'en' => 'When faced with a list of options...'],
                'option_a_text' => ['tr' => 'Hızlıca en iyi seçeneği belirleyip karar vermek isterim.', 'en' => 'I want to quickly identify the best option and make a decision.'],
                'option_b_text' => ['tr' => 'Tüm seçenekleri mümkün olduğunca uzun süre açık tutmak isterim.', 'en' => 'I like to keep all options open for as long as possible.'],
                'dimension' => 'J/P', 'option_a_value' => 'J', 'option_b_value' => 'P'
            ],
        ];

        foreach ($questions as $questionData) {
            Question::create($questionData);
        }
    }
}