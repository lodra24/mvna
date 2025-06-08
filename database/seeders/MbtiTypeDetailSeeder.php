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
        // INTJ (Mimar) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'INTJ',
            'type_name' => 'Mimar',
            'profile_summary_for_employer' => 'INTJ tipi çalışanlar, stratejik düşünme yeteneği ve uzun vadeli vizyonları ile öne çıkan değerli ekip üyeleridir. Karmaşık problemleri analiz etme, sistematik çözümler geliştirme ve bağımsız çalışma konularında üstün performans sergilerler. Yüksek standartları ve mükemmeliyetçi yaklaşımları sayesinde kaliteli sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Stratejik planlama ve uzun vadeli vizyon geliştirme',
                'Karmaşık problemleri analiz etme ve sistematik çözümler üretme',
                'Bağımsız çalışma ve öz-yönetim becerileri',
                'Yenilikçi yaklaşımlar ve yaratıcı çözümler geliştirme'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Takım içi iletişim becerilerini geliştirme',
                'Detayları paylaşma ve süreçleri şeffaflaştırma',
                'Sabırsızlık eğilimini kontrol altına alma',
                'Farklı çalışma stillerine tolerans gösterme'
            ],
            'communication_style_and_tips_for_employer' => 'INTJ çalışanlar doğrudan, özlü ve mantıklı iletişimi tercih ederler. Onlarla iletişim kurarken somut veriler ve mantıklı gerekçeler sunun. Gereksiz toplantılardan kaçının ve önemli konuları yazılı olarak iletmeyi tercih edin. Eleştirileri yapıcı ve objektif bir şekilde sunduğunuzda daha iyi karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde özerklik ve esneklik sağlayın. Net hedefler ve son teslim tarihleri belirleyin, ancak süreci nasıl yönetecekleri konusunda onlara güvenin. Mikro-yönetimden kaçının ve sonuç odaklı değerlendirme yapın. Karmaşık ve entelektüel açıdan zorlayıcı projeler verin.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken objektif veriler ve somut örnekler kullanın. Performans değerlendirmelerini mantıklı kriterler üzerinden yapın ve gelişim önerilerinizi net bir şekilde ifade edin. Duygusal yaklaşımlardan ziyade analitik ve yapıcı geri bildirimler tercih ederler.',
            'work_environment_preferences_for_employer' => 'Sessiz, organize ve kesintisiz çalışma ortamları tercih ederler. Açık ofis düzeninden ziyade özel çalışma alanları sağlamaya çalışın. Esnek çalışma saatleri ve uzaktan çalışma imkanları motivasyonlarını artırır. Teknolojik altyapının güçlü olduğu ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Entelektüel açıdan zorlayıcı ve karmaşık projeler',
                'Özerklik ve bağımsız karar verme yetkisi',
                'Uzun vadeli hedefler ve stratejik projeler',
                'Sürekli öğrenme ve gelişim fırsatları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında kalite ve verimlilik odaklı yaklaşım sergilerler. Küçük, yetenekli takımlarda daha etkili çalışırlar. Rol ve sorumlulukların net olarak tanımlandığı ortamlarda başarılı olurlar. Brainstorming seanslarında değerli katkılar sunarlar ancak sosyal aktivitelere katılım konusunda isteksiz olabilirler.',
            'leadership_potential_or_style_notes_for_employer' => 'Doğal liderlik potansiyeline sahiptirler ve vizyoner liderlik tarzı benimserler. Stratejik kararlar alma, uzun vadeli planlar geliştirme ve ekibi hedefler doğrultusunda yönlendirme konularında başarılıdırlar. Liderlik pozisyonlarında bağımsızlık ve karar verme yetkisi verildiğinde en iyi performansı sergilerler.'
        ]);
    }
}
