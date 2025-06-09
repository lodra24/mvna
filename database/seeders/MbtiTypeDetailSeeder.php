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

        // INTP (Düşünür) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'INTP',
            'type_name' => 'Düşünür',
            'profile_summary_for_employer' => 'INTP tipi çalışanlar, analitik düşünce gücü ve teorik problem çözme yetenekleri ile değer katan ekip üyeleridir. Karmaşık sistemleri anlama, yenilikçi çözümler geliştirme ve derinlemesine araştırma yapma konularında olağanüstü performans sergilerler. Objektif yaklaşımları ve mantıklı analizleri sayesinde kaliteli sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Karmaşık teorik problemleri analiz etme ve çözüm geliştirme',
                'Yenilikçi ve özgün yaklaşımlar ile sistem optimizasyonu',
                'Derinlemesine araştırma ve veri analizi becerileri',
                'Objektif değerlendirme ve mantık temelli karar verme'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Proje teslim tarihlerine odaklanma ve zaman yönetimi',
                'Takım içi düzenli iletişim ve güncelleme paylaşımı',
                'Pratik uygulamaya yönelik sonuç odaklılık geliştirme',
                'Rutin görevlere karşı motivasyon sürdürme'
            ],
            'communication_style_and_tips_for_employer' => 'INTP çalışanlar mantıklı, analitik ve derinlemesine iletişimi tercih ederler. Onlarla iletişim kurarken teorik temeller ve mantıklı açıklamalar sunun. Fikirlerini geliştirmeleri için zaman tanıyın ve düşüncelerini ifade etmelerine olanak sağlayın. Eleştirileri objektif verilerle desteklediğinizde daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde esneklik ve yaratıcılık için alan sağlayın. Net sonuçlar tanımlayın ancak süreci nasıl yönetecekleri konusunda özgürlük verin. Araştırma ve geliştirme odaklı projeler verin. Rutin görevleri minimize edin ve entelektüel açıdan zorlayıcı işler önceliklendirin.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken mantıklı gerekçeler ve objektif kriterler kullanın. Performans değerlendirmelerini analitik yaklaşımla yapın ve gelişim önerilerinizi teorik temeller ile destekleyin. Kişisel eleştirilerden ziyade iş odaklı, yapıcı geri bildirimler tercih ederler.',
            'work_environment_preferences_for_employer' => 'Sessiz, düşünmeye elverişli ve kesintisiz çalışma ortamları tercih ederler. Bireysel çalışma alanları ve esnek çalışma düzenlemeleri sağlamaya çalışın. Araştırma kaynaklarına kolay erişim ve güçlü teknolojik altyapı motivasyonlarını artırır. Sosyal baskının az olduğu ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Teorik ve analitik açıdan zorlayıcı projeler',
                'Araştırma ve geliştirme fırsatları',
                'Özgün çözümler geliştirme imkanı',
                'Sürekli öğrenme ve keşfetme olanakları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında fikir geliştirme ve problem çözme odaklı yaklaşım sergilerler. Brainstorming ve analitik tartışmalarda değerli katkılar sunarlar. Küçük, uzmanlık odaklı takımlarda daha etkili çalışırlar. Sosyal etkileşimden ziyade işbirliği temelli çalışma ortamlarını tercih ederler.',
            'leadership_potential_or_style_notes_for_employer' => 'Geleneksel liderlik tarzından ziyade uzmanlık temelli liderlik sergilerler. Teknik konularda rehberlik etme, yenilikçi çözümler geliştirme ve analitik yaklaşımlar ile ekibi yönlendirme konularında başarılıdırlar. Liderlik pozisyonlarında teknik özerklik ve araştırma yetkisi verildiğinde en iyi performansı sergilerler.'
        ]);

        // ENTJ (Komutan) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ENTJ',
            'type_name' => 'Komutan',
            'profile_summary_for_employer' => 'ENTJ tipi çalışanlar, doğal liderlik yetenekleri ve stratejik vizyon ile öne çıkan güçlü ekip üyeleridir. Organizasyon yönetimi, hedef odaklı çalışma ve ekip motivasyonu konularında üstün performans sergilerler. Sonuç odaklı yaklaşımları ve kararlı duruşları sayesinde projeleri başarıyla tamamlarlar.',
            'key_strengths_in_workplace' => [
                'Doğal liderlik ve ekip yönetimi yetenekleri',
                'Stratejik planlama ve hedef belirleme becerileri',
                'Hızlı karar verme ve etkili uygulama gücü',
                'Organizasyonel verimlilik ve süreç optimizasyonu'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Sabırlı dinleme ve empati geliştirme',
                'Detaylara odaklanma ve titizlik artırma',
                'Farklı görüşlere açıklık ve tolerans gösterme',
                'Ekip üyelerinin gelişim hızlarına uyum sağlama'
            ],
            'communication_style_and_tips_for_employer' => 'ENTJ çalışanlar doğrudan, net ve sonuç odaklı iletişimi tercih ederler. Onlarla iletişim kurarken açık hedefler ve somut beklentiler belirtin. Hızlı karar verme süreçlerini destekleyin ve gereksiz detaylardan kaçının. Eleştirileri performans odaklı ve gelişim yönlü sunduğunuzda daha etkili olur.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde liderlik yetkisi ve karar verme gücü sağlayın. Net hedefler, ölçülebilir sonuçlar ve son teslim tarihleri belirleyin. Ekip yönetimi sorumluluğu verin ve süreçleri optimize etme yetkisi tanıyın. Zorlayıcı ve stratejik öneme sahip projeler atayın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken doğrudan, açık ve sonuç odaklı yaklaşım benimseyin. Performans değerlendirmelerini ölçülebilir kriterler üzerinden yapın ve gelişim önerilerinizi stratejik hedeflerle ilişkilendirin. Yapıcı eleştirileri kabul ederler ancak gerekçelerin mantıklı olmasını beklerler.',
            'work_environment_preferences_for_employer' => 'Dinamik, hızlı tempolu ve sonuç odaklı çalışma ortamları tercih ederler. Liderlik pozisyonları ve karar verme yetkisi motivasyonlarını artırır. Ekip etkileşiminin yoğun olduğu, işbirliği temelli ortamlarda daha verimli çalışırlar. Teknolojik araçlar ve verimlilik sistemleri sağlamaya çalışın.',
            'motivators_for_employer_to_leverage' => [
                'Liderlik sorumlulukları ve ekip yönetimi fırsatları',
                'Stratejik öneme sahip ve zorlayıcı projeler',
                'Organizasyonel gelişim ve değişim yönetimi',
                'Başarı tanınması ve kariyer gelişim imkanları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında liderlik ve koordinasyon odaklı yaklaşım sergilerler. Ekip motivasyonunu artırma, hedefleri belirleme ve süreçleri yönetme konularında etkili çalışırlar. Büyük takımlarda bile etkili liderlik sergileyebilirler. Sonuç odaklı işbirliği ve performans temelli çalışma ortamlarını tercih ederler.',
            'leadership_potential_or_style_notes_for_employer' => 'Güçlü doğal liderlik potansiyeline sahiptirler ve direktif liderlik tarzı benimserler. Stratejik hedefler belirleme, ekibi motive etme ve sonuçları takip etme konularında başarılıdırlar. Liderlik pozisyonlarında geniş yetki ve sorumluluk verildiğinde en iyi performansı sergilerler. Organizasyonel değişim ve büyüme süreçlerini etkili yönetirler.'
        ]);

        // ENTP (Tartışmacı) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ENTP',
            'type_name' => 'Tartışmacı',
            'profile_summary_for_employer' => 'ENTP tipi çalışanlar, yenilikçi düşünce yapıları ve yaratıcı problem çözme yetenekleri ile değer katan dinamik ekip üyeleridir. Brainstorming, yeni fikirlerin geliştirilmesi ve değişim yönetimi konularında üstün performans sergilerler. Adaptasyon yetenekleri ve enerjik yaklaşımları sayesinde zorlu projelerde başarılı sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Yaratıcı problem çözme ve yenilikçi yaklaşımlar',
                'Hızlı adaptasyon ve değişim yönetimi becerileri',
                'Etkili iletişim ve ikna etme yetenekleri',
                'Çok yönlü düşünme ve alternatif çözümler geliştirme'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Detay odaklılık ve titizlik geliştirme',
                'Uzun vadeli projelerde odaklanma sürdürme',
                'Rutin görevlere karşı motivasyon artırma',
                'Sabırlı uygulama ve takip etme becerilerini güçlendirme'
            ],
            'communication_style_and_tips_for_employer' => 'ENTP çalışanlar enerjik, etkileşimli ve fikir odaklı iletişimi tercih ederler. Onlarla iletişim kurarken açık tartışma ortamları sağlayın ve fikirlerini geliştirmelerine olanak tanıyın. Brainstorming seanslarını destekleyin ve yaratıcı önerilerini değerlendirin. Eleştirileri gelişim odaklı ve fikir temelli sunduğunuzda daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde esneklik ve yaratıcılık için alan sağlayın. Çeşitli projeler ve değişken görevler verin. Rutin işleri minimize edin ve yenilikçi yaklaşımlar gerektiren projeler önceliklendirin. Takım işbirliği ve fikir paylaşımı fırsatları sunun. Kısa vadeli hedefler ile uzun vadeli vizyonu dengelemeye çalışın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken etkileşimli ve tartışmaya açık yaklaşım benimseyin. Performans değerlendirmelerini gelişim odaklı yapın ve yeni fırsatlar ile ilişkilendirin. Yaratıcı katkılarını tanıyın ve gelişim önerilerinizi fikir geliştirme fırsatları olarak sunun. Yapıcı tartışmaları teşvik edin.',
            'work_environment_preferences_for_employer' => 'Dinamik, etkileşimli ve değişken çalışma ortamları tercih ederler. Açık iletişim kanalları ve işbirliği fırsatları motivasyonlarını artırır. Esnek çalışma düzenlemeleri ve çeşitli proje imkanları sağlamaya çalışın. Sosyal etkileşimin yoğun olduğu, enerjik ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Yenilikçi ve yaratıcı projeler',
                'Çeşitli görevler ve değişken sorumluluklar',
                'Takım işbirliği ve fikir paylaşımı fırsatları',
                'Sürekli öğrenme ve gelişim imkanları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında enerji ve yaratıcılık odaklı yaklaşım sergilerler. Brainstorming seanslarında değerli katkılar sunar ve ekip motivasyonunu artırırlar. Çapraz fonksiyonel takımlarda etkili çalışırlar ve farklı perspektifleri bir araya getirme konusunda başarılıdırlar. İşbirliği temelli ve dinamik çalışma ortamlarını tercih ederler.',
            'leadership_potential_or_style_notes_for_employer' => 'Yenilikçi ve ilham verici liderlik potansiyeline sahiptirler. Değişim yönetimi, ekip motivasyonu ve yaratıcı çözümler geliştirme konularında etkili liderlik sergilerler. Liderlik pozisyonlarında esneklik ve yenilik yetkisi verildiğinde en iyi performansı sergilerler. Geleneksel hiyerarşiden ziyade işbirliği temelli liderlik tarzını benimserler.'
        ]);

        // INFJ (Avukat) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'INFJ',
            'type_name' => 'Avukat',
            'profile_summary_for_employer' => 'INFJ tipi çalışanlar, derin empati yetenekleri ve güçlü değer sistemleri ile öne çıkan değerli ekip üyeleridir. İnsan odaklı çözümler geliştirme, uzun vadeli vizyon oluşturma ve anlamlı projeler yürütme konularında üstün performans sergilerler. Sessiz kararlılıkları ve mükemmeliyetçi yaklaşımları sayesinde kaliteli ve sürdürülebilir sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Derin empati ve insan psikolojisini anlama yeteneği',
                'Uzun vadeli vizyon ve stratejik düşünme becerileri',
                'Yüksek kalite standartları ve detay odaklı çalışma',
                'Değer temelli karar verme ve etik yaklaşımlar'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Çatışma durumlarında daha assertif olma',
                'Eleştirileri kişisel algılamama becerisi geliştirme',
                'Mükemmeliyetçilik nedeniyle gecikmeleri önleme',
                'Büyük gruplarda kendini ifade etme becerisini artırma'
            ],
            'communication_style_and_tips_for_employer' => 'INFJ çalışanlar derin, anlamlı ve empati temelli iletişimi tercih ederler. Onlarla iletişim kurarken değerlerini ve motivasyonlarını anlayın. Bireysel görüşmeler yapın ve fikirlerini geliştirmeleri için zaman tanıyın. Eleştirileri yapıcı ve destekleyici bir tonla sunduğunuzda daha etkili olur. Projelerin insan üzerindeki etkilerini vurgulayın.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde anlamlı ve değer temelli projeler verin. Net hedefler belirleyin ancak yaratıcı süreçleri yönetme konusunda özgürlük tanıyın. Kalite odaklı değerlendirmeler yapın ve mükemmeliyetçi eğilimlerini destekleyin. İnsan odaklı ve toplumsal fayda sağlayan projeleri önceliklendirin.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken destekleyici ve yapıcı yaklaşım benimseyin. Performans değerlendirmelerini değer temelli kriterler ile yapın ve kişisel gelişim fırsatları sunun. Başarılarını takdir edin ve gelişim önerilerinizi mentorlu bir yaklaşımla sunun. Kişisel eleştirilerden ziyade iş odaklı geri bildirimler tercih ederler.',
            'work_environment_preferences_for_employer' => 'Sessiz, huzurlu ve kesintisiz çalışma ortamları tercih ederler. Pozitif ekip dinamiği ve değer uyumu olan ortamlar motivasyonlarını artırır. Esnek çalışma düzenlemeleri ve bireysel çalışma alanları sağlamaya çalışın. Anlamlı projelerin yürütüldüğü, etik değerlerin önemsendiği ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Anlamlı ve toplumsal fayda sağlayan projeler',
                'Kişisel gelişim ve mentorluk fırsatları',
                'Yaratıcı özgürlük ve kalite odaklı çalışma',
                'Değer uyumu olan ekip ve organizasyon kültürü'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında empati ve uyum odaklı yaklaşım sergilerler. Ekip üyelerinin güçlü yanlarını keşfetme ve destekleme konusunda etkili çalışırlar. Küçük, samimi takımlarda daha rahat çalışırlar. Çatışma çözümü ve ekip uyumunu sağlama konularında değerli katkılar sunarlar.',
            'leadership_potential_or_style_notes_for_employer' => 'Sessiz ve ilham verici liderlik potansiyeline sahiptirler. Vizyon belirleme, ekip motivasyonu ve değer temelli karar verme konularında etkili liderlik sergilerler. Liderlik pozisyonlarında empati ve anlayış yetkisi verildiğinde en iyi performansı sergilerler. Hizmetkar liderlik tarzını benimser ve ekip üyelerinin gelişimini önceliklendirir.'
        ]);

        // INFP (Arabulucu) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'INFP',
            'type_name' => 'Arabulucu',
            'profile_summary_for_employer' => 'INFP tipi çalışanlar, güçlü değer sistemleri ve yaratıcı yaklaşımları ile öne çıkan özgün ekip üyeleridir. Bireysel motivasyon, yaratıcı problem çözme ve değer temelli projeler yürütme konularında üstün performans sergilerler. Özgünlük arayışları ve esnek yaklaşımları sayesinde yenilikçi ve sürdürülebilir çözümler üretirler.',
            'key_strengths_in_workplace' => [
                'Güçlü değer sistemi ve etik karar verme',
                'Yaratıcı düşünme ve özgün çözümler geliştirme',
                'Bireysel motivasyon ve öz-yönlendirme becerileri',
                'Empati ve farklılıklara saygı gösterme'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Zaman yönetimi ve deadline odaklılık geliştirme',
                'Yapılandırılmış süreçlere uyum sağlama',
                'Eleştiri ve geri bildirimleri objektif değerlendirme',
                'Takım içi düzenli iletişim ve güncelleme paylaşımı'
            ],
            'communication_style_and_tips_for_employer' => 'INFP çalışanlar samimi, değer temelli ve bireysel iletişimi tercih ederler. Onlarla iletişim kurarken kişisel değerlerini ve motivasyonlarını anlayın. Bire bir görüşmeler yapın ve fikirlerini rahatça ifade edebilecekleri ortam sağlayın. Eleştirileri destekleyici ve gelişim odaklı sunduğunuzda daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde esneklik ve yaratıcı özgürlük sağlayın. Değer uyumu olan projeler verin ve anlamlı hedefler belirleyin. Mikro-yönetimden kaçının ve sonuç odaklı değerlendirmeler yapın. Bireysel çalışma tarzlarını destekleyin ve yaratıcı süreçlere zaman tanıyın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken empatik ve destekleyici yaklaşım benimseyin. Performans değerlendirmelerini kişisel gelişim odaklı yapın ve güçlü yanlarını vurgulayın. Yapıcı eleştirileri değer temelli çerçevede sunun ve gelişim fırsatları ile ilişkilendirin. Kişisel saldırı algısı yaratmayacak şekilde objektif geri bildirimler verin.',
            'work_environment_preferences_for_employer' => 'Esnek, yaratıcı ve değer uyumu olan çalışma ortamları tercih ederler. Bireysel çalışma alanları ve esnek çalışma saatleri motivasyonlarını artırır. Pozitif ekip kültürü ve farklılıklara saygı gösterilen ortamlar sağlamaya çalışın. Yaratıcı projelerin desteklendiği, özgünlüğün değer gördüğü ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Değer uyumu olan anlamlı projeler',
                'Yaratıcı özgürlük ve bireysel ifade imkanları',
                'Esnek çalışma düzenlemeleri ve özerklik',
                'Kişisel gelişim ve öz-gerçekleştirme fırsatları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında uyum ve empati odaklı yaklaşım sergilerler. Farklı perspektifleri anlama ve destekleme konusunda etkili çalışırlar. Küçük, samimi takımlarda daha rahat hissederler. Çatışma çözümü ve ekip içi uyumu sağlama konularında arabuluculuk rolü üstlenebilirler.',
            'leadership_potential_or_style_notes_for_employer' => 'Değer temelli ve ilham verici liderlik potansiyeline sahiptirler. Ekip üyelerinin bireysel güçlerini keşfetme ve destekleme konularında etkili liderlik sergilerler. Liderlik pozisyonlarında özgünlük ve değer uyumu yetkisi verildiğinde en iyi performansı sergilerler. Demokratik ve katılımcı liderlik tarzını benimser.'
        ]);

        // ENFJ (Başrol) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ENFJ',
            'type_name' => 'Başrol',
            'profile_summary_for_employer' => 'ENFJ tipi çalışanlar, karizmatik liderlik yetenekleri ve güçlü insan odaklı yaklaşımları ile öne çıkan değerli ekip üyeleridir. Ekip motivasyonu, organizasyonel gelişim ve insan kaynakları yönetimi konularında üstün performans sergilerler. İlham verici yaklaşımları ve empati yetenekleri sayesinde yüksek performanslı takımlar oluştururlar.',
            'key_strengths_in_workplace' => [
                'Karizmatik liderlik ve ekip motivasyonu sağlama',
                'İnsan kaynakları geliştirme ve mentorluk becerileri',
                'Etkili iletişim ve ikna etme yetenekleri',
                'Organizasyonel kültür oluşturma ve değişim yönetimi'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Objektif karar verme ve duygusal mesafe koruma',
                'Kendi ihtiyaçlarını da önceliklendirme',
                'Eleştirel geri bildirim verme becerisini geliştirme',
                'Aşırı sorumluluk alma eğilimini kontrol etme'
            ],
            'communication_style_and_tips_for_employer' => 'ENFJ çalışanlar sıcak, ilham verici ve kişi odaklı iletişimi tercih ederler. Onlarla iletişim kurarken ekip ve organizasyon vizyonunu vurgulayın. Açık ve destekleyici geri bildirimler verin. İnsan odaklı hedefler ve toplumsal faydayı ön plana çıkardığınızda daha motive olurlar. Takım toplantılarında aktif rol almalarını destekleyin.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde liderlik sorumlulukları ve ekip koordinasyonu verin. İnsan kaynakları odaklı projeler atayın ve mentorluk fırsatları sağlayın. Organizasyonel gelişim ve kültür oluşturma görevlerini önceliklendirin. Ekip başarısını ölçülebilir hale getirin ve kolektif hedefler belirleyin.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken destekleyici ve gelişim odaklı yaklaşım benimseyin. Performans değerlendirmelerini ekip başarısı ve insan gelişimi kriterlerini içerecek şekilde yapın. Liderlik becerilerini tanıyın ve gelişim fırsatları sunun. Yapıcı eleştirileri organizasyonel fayda çerçevesinde sunduğunuzda daha etkili olur.',
            'work_environment_preferences_for_employer' => 'İşbirliği odaklı, dinamik ve insan merkezli çalışma ortamları tercih ederler. Açık iletişim kanalları ve ekip etkileşimi motivasyonlarını artırır. Liderlik fırsatları ve mentorluk imkanları sağlamaya çalışın. Pozitif organizasyon kültürünün desteklendiği, değer temelli çalışma ortamlarında daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Liderlik sorumlulukları ve ekip geliştirme fırsatları',
                'İnsan odaklı ve toplumsal fayda sağlayan projeler',
                'Mentorluk ve kişisel gelişim programları',
                'Organizasyonel kültür oluşturma ve değişim yönetimi'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında liderlik ve koordinasyon odaklı yaklaşım sergilerler. Ekip üyelerinin güçlü yanlarını keşfetme ve geliştirme konusunda etkili çalışırlar. Büyük takımlarda bile uyumlu çalışma ortamı yaratabilirler. Ekip motivasyonu ve performans artırma konularında değerli katkılar sunarlar.',
            'leadership_potential_or_style_notes_for_employer' => 'Güçlü doğal liderlik potansiyeline sahiptirler ve transformasyonel liderlik tarzı benimserler. Vizyon oluşturma, ekip ilham verme ve organizasyonel değişim yönetimi konularında başarılıdırlar. Liderlik pozisyonlarında insan kaynakları yetkisi ve mentorluk sorumluluğu verildiğinde en iyi performansı sergilerler. İnsani değerleri önceleyen, katılımcı liderlik yaklaşımını benimserler.'
        ]);

        // ENFP (Kampanyacı) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ENFP',
            'type_name' => 'Kampanyacı',
            'profile_summary_for_employer' => 'ENFP tipi çalışanlar, coşkulu enerjileri ve yaratıcı yaklaşımları ile öne çıkan dinamik ekip üyeleridir. İnovasyon yönetimi, ekip motivasyonu ve yaratıcı problem çözme konularında üstün performans sergilerler. İlham verici yaklaşımları ve insan odaklı çözümleri sayesinde pozitif çalışma ortamları oluştururlar.',
            'key_strengths_in_workplace' => [
                'Yaratıcı düşünme ve yenilikçi çözümler geliştirme',
                'Güçlü iletişim becerileri ve ekip motivasyonu',
                'Hızlı adaptasyon ve değişim yönetimi yetenekleri',
                'İnsan ilişkilerinde empati ve bağlantı kurma'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Detay odaklılık ve titizlik geliştirme',
                'Uzun vadeli projelerde odaklanma sürdürme',
                'Zaman yönetimi ve önceliklendirme becerilerini artırma',
                'Rutin görevlere karşı motivasyon sürdürme'
            ],
            'communication_style_and_tips_for_employer' => 'ENFP çalışanlar enerjik, etkileşimli ve ilham verici iletişimi tercih ederler. Onlarla iletişim kurarken coşkularını destekleyin ve yaratıcı fikirlerini dinleyin. Brainstorming seansları düzenleyin ve ekip etkileşimini teşvik edin. Eleştirileri gelişim fırsatları olarak sunduğunuzda ve pozitif tonla verdiğinizde daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde çeşitlilik ve yaratıcı özgürlük sağlayın. İnovasyon odaklı projeler verin ve ekip işbirliği fırsatları sunun. Rutin görevleri minimize edin ve insan odaklı, anlamlı projeler önceliklendirin. Kısa vadeli hedefler ile uzun vadeli vizyonu dengelemeye çalışın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken pozitif ve destekleyici yaklaşım benimseyin. Performans değerlendirmelerini yaratıcı katkılar ve ekip etkisi üzerinden yapın. Güçlü yanlarını vurgulayın ve gelişim önerilerinizi yeni fırsatlar ile ilişkilendirin. Eleştirileri yapıcı tartışma ortamında sunduğunuzda daha etkili olur.',
            'work_environment_preferences_for_employer' => 'Dinamik, etkileşimli ve yaratıcı çalışma ortamları tercih ederler. Açık iletişim kanalları ve işbirliği fırsatları motivasyonlarını artırır. Esnek çalışma düzenlemeleri ve çeşitli proje imkanları sağlamaya çalışın. Pozitif enerji ve yenilikçiliğin desteklendiği ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Yaratıcı ve yenilikçi projeler',
                'Ekip işbirliği ve insan odaklı çalışmalar',
                'Çeşitli görevler ve değişken sorumluluklar',
                'Kişisel gelişim ve ilham verici liderlik fırsatları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında enerji ve motivasyon odaklı yaklaşım sergilerler. Ekip üyelerini bir araya getirme ve pozitif atmosfer yaratma konusunda etkili çalışırlar. Çapraz fonksiyonel takımlarda değerli katkılar sunarlar. Brainstorming ve yaratıcı problem çözme seanslarında ekip performansını artırırlar.',
            'leadership_potential_or_style_notes_for_employer' => 'İlham verici ve katılımcı liderlik potansiyeline sahiptirler. Ekip motivasyonu, yaratıcı vizyon oluşturma ve değişim yönetimi konularında etkili liderlik sergilerler. Liderlik pozisyonlarında yaratıcı özgürlük ve insan odaklı yaklaşım yetkisi verildiğinde en iyi performansı sergilerler. Demokratik ve etkileşimli liderlik tarzını benimser, ekip üyelerinin potansiyelini ortaya çıkarmaya odaklanır.'
        ]);

        // ISTJ (Lojistikçi) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ISTJ',
            'type_name' => 'Lojistikçi',
            'profile_summary_for_employer' => 'ISTJ tipi çalışanlar, güvenilirlik ve sistematik yaklaşımları ile organizasyona istikrar getiren değerli ekip üyeleridir. Detay odaklı çalışma, süreç yönetimi ve kalite kontrolü konularında üstün performans sergilerler. Metodical yaklaşımları ve sorumluluk bilinçleri sayesinde tutarlı ve güvenilir sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Detay odaklı ve titiz çalışma yaklaşımı',
                'Güvenilir süreç yönetimi ve kalite kontrolü',
                'Sistematik planlama ve organize etme becerileri',
                'Sorumluluk bilinci ve taahhütlere bağlılık'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Değişim ve yeniliklere adaptasyon hızını artırma',
                'Yaratıcı ve esnek çözümlere açıklık geliştirme',
                'Takım içi iletişimi daha proaktif hale getirme',
                'Risk alma ve deneysel yaklaşımlara tolerans gösterme'
            ],
            'communication_style_and_tips_for_employer' => 'ISTJ çalışanlar net, yapılandırılmış ve gerçeklere dayalı iletişimi tercih ederler. Onlarla iletişim kurarken somut veriler ve açık talimatlar sunun. Yazılı iletişimi destekleyin ve değişiklikleri önceden bildirin. Eleştirileri objektif kriterler üzerinden sunduğunuzda daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde net süreçler ve açık beklentiler belirleyin. Detaylı proje planları ve zaman çizelgeleri sağlayın. Kalite standartlarını net olarak tanımlayın ve düzenli kontrol noktaları oluşturun. Rutin ve tekrarlanan görevlerde uzmanlaşmalarına olanak tanıyın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken objektif kriterler ve somut örnekler kullanın. Performans değerlendirmelerini ölçülebilir standartlar üzerinden yapın ve gelişim önerilerinizi yapılandırılmış bir plan ile sunun. Başarılarını takdir edin ve güvenilirliklerini vurgulayın.',
            'work_environment_preferences_for_employer' => 'Organize, sessiz ve öngörülebilir çalışma ortamları tercih ederler. Net iş tanımları ve düzenli rutinler motivasyonlarını artırır. Bireysel çalışma alanları ve minimal kesinti ortamları sağlamaya çalışın. Geleneksel ofis düzeni ve yapılandırılmış süreçlerin olduğu ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Net sorumluluklar ve ölçülebilir hedefler',
                'Kalite ve mükemmellik odaklı projeler',
                'Düzenli rutinler ve öngörülebilir süreçler',
                'Başarı takdiri ve güvenilirlik vurgusu'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında güvenilirlik ve istikrar odaklı yaklaşım sergilerler. Net rol tanımları olan, organize takımlarda etkili çalışırlar. Süreç odaklı işbirliği ve kalite kontrolü konularında değerli katkılar sunarlar. Küçük, istikrarlı takım yapılarını tercih ederler.',
            'leadership_potential_or_style_notes_for_employer' => 'Güvenilir ve süreç odaklı liderlik potansiyeline sahiptirler. Operasyonel yönetim, kalite kontrolü ve ekip organizasyonu konularında etkili liderlik sergilerler. Liderlik pozisyonlarında net yetki ve sorumluluk tanımları verildiğinde en iyi performansı sergilerler. Geleneksel ve istikrar odaklı liderlik tarzını benimserler.'
        ]);

        // ISFJ (Savunmacı/Koruyucu) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ISFJ',
            'type_name' => 'Savunmacı',
            'profile_summary_for_employer' => 'ISFJ tipi çalışanlar, fedakar yaklaşımları ve güçlü destek yetenekleri ile organizasyona uyum ve istikrar getiren değerli ekip üyeleridir. İnsan kaynakları desteği, müşteri hizmetleri ve ekip uyumu konularında üstün performans sergilerler. Koruyucu yaklaşımları ve empati yetenekleri sayesinde pozitif çalışma ortamları oluştururlar.',
            'key_strengths_in_workplace' => [
                'Güçlü empati ve insan odaklı destek sağlama',
                'Detay odaklı ve titiz hizmet kalitesi',
                'Ekip uyumu ve çatışma çözümü becerileri',
                'Fedakar çalışma ve başkalarının ihtiyaçlarını önceleme'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Kendi ihtiyaçlarını da ifade etme becerisi geliştirme',
                'Eleştirel geri bildirim verme konusunda cesaret artırma',
                'Değişim ve yeniliklere adaptasyon hızını artırma',
                'Aşırı sorumluluk alma eğilimini dengeleme'
            ],
            'communication_style_and_tips_for_employer' => 'ISFJ çalışanlar sıcak, destekleyici ve kişi odaklı iletişimi tercih ederler. Onlarla iletişim kurarken empati gösterin ve kişisel değerlerini anlayın. Bire bir görüşmeleri destekleyin ve fikirlerini rahatça ifade edebilecekleri ortam sağlayın. Eleştirileri yapıcı ve destekleyici tonla sunduğunuzda daha etkili olur.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde insan odaklı projeler ve destek rollerini önceliklendirin. Net hedefler belirleyin ancak uygulama konusunda esneklik tanıyın. Müşteri hizmetleri, ekip desteği ve organizasyonel uyum görevlerini verin. Başkalarına yardım etme fırsatları sunan projeler atayın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken destekleyici ve kişisel yaklaşım benimseyin. Performans değerlendirmelerini ekip katkısı ve insan ilişkileri üzerinden yapın. Fedakar çalışmalarını takdir edin ve gelişim önerilerinizi mentorluk yaklaşımıyla sunun. Kişisel eleştirilerden kaçının ve yapıcı geri bildirimler verin.',
            'work_environment_preferences_for_employer' => 'Uyumlu, destekleyici ve pozitif çalışma ortamları tercih ederler. Ekip içi işbirliği ve samimi ilişkiler motivasyonlarını artırır. Çatışmasız ve stressiz ortamlar sağlamaya çalışın. İnsan odaklı değerlerin önemsendiği, empati ve anlayışın hakim olduğu ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'İnsan odaklı ve destek sağlayan projeler',
                'Ekip uyumu ve organizasyonel kültür geliştirme',
                'Müşteri memnuniyeti ve hizmet kalitesi odaklı görevler',
                'Takdir edilme ve katkılarının görülmesi'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında destek ve uyum odaklı yaklaşım sergilerler. Ekip üyelerinin ihtiyaçlarını karşılama ve çatışma çözümü konusunda etkili çalışırlar. Samimi, küçük takımlarda daha rahat hissederler. Ekip moralini yüksek tutma ve pozitif atmosfer yaratma konularında değerli katkılar sunarlar.',
            'leadership_potential_or_style_notes_for_employer' => 'Destekleyici ve hizmetkar liderlik potansiyeline sahiptirler. Ekip gelişimi, insan kaynakları yönetimi ve organizasyonel kültür oluşturma konularında etkili liderlik sergilerler. Liderlik pozisyonlarında empati ve destek yetkisi verildiğinde en iyi performansı sergilerler. Koruyucu ve ekip odaklı liderlik tarzını benimserler.'
        ]);

        // ESTJ (Yönetici) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ESTJ',
            'type_name' => 'Yönetici',
            'profile_summary_for_employer' => 'ESTJ tipi çalışanlar, güçlü organizasyon yetenekleri ve sistemli yaklaşımları ile işletmeye düzen ve verimlilik getiren değerli ekip üyeleridir. Proje yönetimi, operasyonel verimlilik ve ekip koordinasyonu konularında üstün performans sergilerler. Liderlik yetenekleri ve sonuç odaklı yaklaşımları sayesinde hedeflere ulaşmada etkili sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Güçlü organizasyon ve proje yönetimi becerileri',
                'Sistemli yaklaşım ve operasyonel verimlilik sağlama',
                'Doğal liderlik ve ekip koordinasyonu yetenekleri',
                'Sonuç odaklı çalışma ve hedef odaklılık'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Esneklik ve yaratıcı çözümlere açıklık geliştirme',
                'Sabırlı dinleme ve farklı görüşlere tolerans artırma',
                'Detaylara odaklanma ve mikro-yönetim eğilimini dengeleme',
                'Ekip üyelerinin bireysel çalışma stillerine uyum sağlama'
            ],
            'communication_style_and_tips_for_employer' => 'ESTJ çalışanlar doğrudan, net ve sonuç odaklı iletişimi tercih ederler. Onlarla iletişim kurarken açık hedefler ve somut beklentiler belirtin. Hızlı karar verme süreçlerini destekleyin ve verimlilik odaklı yaklaşımları takdir edin. Eleştirileri performans ve sonuç odaklı sunduğunuzda daha etkili olur.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde liderlik sorumlulukları ve organizasyonel görevler verin. Net hedefler, ölçülebilir sonuçlar ve zaman çizelgeleri belirleyin. Proje yönetimi ve ekip koordinasyonu sorumluluğu tanıyın. Operasyonel verimlilik ve sistem iyileştirme projelerini önceliklendirin.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken doğrudan, açık ve sonuç odaklı yaklaşım benimseyin. Performans değerlendirmelerini ölçülebilir kriterler ve başarı metrikleri üzerinden yapın. Liderlik becerilerini takdir edin ve gelişim önerilerinizi organizasyonel hedeflerle ilişkilendirin. Objektif ve yapıcı eleştirileri kabul ederler.',
            'work_environment_preferences_for_employer' => 'Organize, verimli ve hedef odaklı çalışma ortamları tercih ederler. Net hiyerarşi ve sorumluluk tanımları motivasyonlarını artırır. Liderlik fırsatları ve karar verme yetkisi sağlamaya çalışın. Sonuç odaklı ve performans temelli değerlendirmelerin yapıldığı ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Liderlik sorumlulukları ve yönetim fırsatları',
                'Organizasyonel verimlilik ve sistem iyileştirme projeleri',
                'Net hedefler ve ölçülebilir başarı kriterleri',
                'Başarı tanınması ve kariyer gelişim imkanları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında liderlik ve koordinasyon odaklı yaklaşım sergilerler. Ekip organizasyonu, görev dağılımı ve süreç yönetimi konularında etkili çalışırlar. Büyük takımlarda bile düzen ve verimlilik sağlayabilirler. Sonuç odaklı işbirliği ve performans temelli çalışma ortamlarını tercih ederler.',
            'leadership_potential_or_style_notes_for_employer' => 'Güçlü doğal liderlik potansiyeline sahiptirler ve direktif liderlik tarzı benimserler. Operasyonel yönetim, ekip koordinasyonu ve organizasyonel verimlilik konularında başarılıdırlar. Liderlik pozisyonlarında geniş yetki ve organizasyonel sorumluluk verildiğinde en iyi performansı sergilerler. Geleneksel ve sonuç odaklı liderlik yaklaşımını benimserler.'
        ]);

        // ESFJ (Konsolos) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ESFJ',
            'type_name' => 'Konsolos',
            'profile_summary_for_employer' => 'ESFJ tipi çalışanlar, güçlü sosyal yetenekleri ve hizmet odaklı yaklaşımları ile organizasyona uyum ve pozitif enerji getiren değerli ekip üyeleridir. Müşteri ilişkileri, ekip koordinasyonu ve organizasyonel kültür geliştirme konularında üstün performans sergilerler. İnsani yaklaşımları ve topluluk odaklı çalışma tarzları sayesinde güçlü iş ilişkileri oluştururlar.',
            'key_strengths_in_workplace' => [
                'Güçlü sosyal beceriler ve müşteri odaklı hizmet',
                'Ekip uyumu ve pozitif çalışma ortamı yaratma',
                'Organizasyonel kültür geliştirme ve topluluk oluşturma',
                'Detay odaklı ve titiz hizmet kalitesi sağlama'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Eleştirel geri bildirim verme konusunda cesaret artırma',
                'Kendi görüşlerini daha assertif şekilde ifade etme',
                'Değişim ve yeniliklere adaptasyon hızını artırma',
                'Çatışma durumlarında daha objektif yaklaşım geliştirme'
            ],
            'communication_style_and_tips_for_employer' => 'ESFJ çalışanlar sıcak, destekleyici ve topluluk odaklı iletişimi tercih ederler. Onlarla iletişim kurarken kişisel ilgi gösterin ve ekip dinamiklerini vurgulayın. Açık takdir ve pozitif geri bildirimler verin. Organizasyonel değerleri ve toplumsal faydayı ön plana çıkardığınızda daha motive olurlar.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde insan odaklı projeler ve müşteri hizmetleri rollerini önceliklendirin. Net hedefler belirleyin ve ekip işbirliği fırsatları sunun. Organizasyonel etkinlikler, kültür geliştirme ve müşteri ilişkileri görevlerini verin. Sosyal etkileşim gerektiren projeleri atayın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken destekleyici ve pozitif yaklaşım benimseyin. Performans değerlendirmelerini ekip katkısı ve müşteri memnuniyeti üzerinden yapın. Sosyal becerilerini ve ekip odaklı çalışmalarını takdir edin. Gelişim önerilerinizi kişisel gelişim fırsatları olarak sunduğunuzda daha etkili olur.',
            'work_environment_preferences_for_employer' => 'Sosyal, işbirliği odaklı ve pozitif çalışma ortamları tercih ederler. Ekip etkileşimi ve açık iletişim kanalları motivasyonlarını artırır. Müşteri teması ve hizmet odaklı roller sağlamaya çalışın. İnsani değerlerin önemsendiği, topluluk hissinin güçlü olduğu ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Müşteri hizmetleri ve insan odaklı projeler',
                'Ekip etkinlikleri ve organizasyonel kültür geliştirme',
                'Sosyal sorumluluk ve toplumsal fayda sağlayan görevler',
                'Takdir edilme ve ekip içindeki değerli rolü vurgulama'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında uyum ve sosyal bağlantı odaklı yaklaşım sergilerler. Ekip moralini yüksek tutma ve pozitif atmosfer yaratma konusunda etkili çalışırlar. Büyük takımlarda bile sosyal uyumu sağlayabilirler. Ekip etkinlikleri ve işbirliği projelerinde değerli katkılar sunarlar.',
            'leadership_potential_or_style_notes_for_employer' => 'Sosyal ve destekleyici liderlik potansiyeline sahiptirler. Ekip motivasyonu, organizasyonel kültür oluşturma ve müşteri ilişkileri yönetimi konularında etkili liderlik sergilerler. Liderlik pozisyonlarında insan kaynakları ve topluluk oluşturma yetkisi verildiğinde en iyi performansı sergilerler. Katılımcı ve hizmet odaklı liderlik tarzını benimserler.'
        ]);

        // ISTP (Zanaatkar/Sanal) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ISTP',
            'type_name' => 'Zanaatkar',
            'profile_summary_for_employer' => 'ISTP tipi çalışanlar, pratik problem çözme yetenekleri ve teknik uzmanlıkları ile organizasyona somut değer katan dinamik ekip üyeleridir. Anlık çözüm geliştirme, sistem optimizasyonu ve hands-on yaklaşımlar konularında üstün performans sergilerler. Esnek adaptasyon yetenekleri ve analitik düşünce yapıları sayesinde karmaşık teknik sorunlarda etkili sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Pratik ve teknik problem çözme konusunda üstün yetenek',
                'Araçlar, sistemler ve teknolojilerle usta düzeyde çalışma',
                'Anlık adaptasyon ve kriz yönetimi becerileri',
                'Bağımsız çalışma ve öz-yönlendirme kapasitesi'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Uzun vadeli planlama ve stratejik düşünme becerilerini geliştirme',
                'Takım içi düzenli iletişim ve güncelleme paylaşımı',
                'Teorik ve kavramsal çalışmalara tolerans artırma',
                'Rutin raporlama ve dokümantasyon alışkanlığı geliştirme'
            ],
            'communication_style_and_tips_for_employer' => 'ISTP çalışanlar kısa, net ve sonuç odaklı iletişimi tercih ederler. Onlarla iletişim kurarken somut örnekler ve pratik uygulamalar sunun. Gereksiz toplantılardan kaçının ve teknik detayları vurgulayın. Eleştirileri objektif verilerle desteklediğinizde ve çözüm odaklı sunduğunuzda daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde özerklik ve teknik özgürlük sağlayın. Hands-on projeler verin ve sonuç odaklı değerlendirmeler yapın. Mikro-yönetimden kaçının ve acil durum müdahalesi gerektiren görevlerde onlara güvenin. Teknik araştırma ve geliştirme projelerini önceliklendirin.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken doğrudan, teknik temelli ve çözüm odaklı yaklaşım benimseyin. Performans değerlendirmelerini somut sonuçlar üzerinden yapın ve gelişim önerilerinizi pratik uygulamalarla destekleyin. Teknik başarılarını takdir edin ve yeni araç/teknoloji öğrenme fırsatları sunun.',
            'work_environment_preferences_for_employer' => 'Esnek, kesintisiz ve teknik araçların bol olduğu çalışma ortamları tercih ederler. Bireysel çalışma alanları ve hands-on deneyim imkanları motivasyonlarını artırır. Uzaktan çalışma seçenekleri ve esnek saatler sağlamaya çalışın. Teknik laboratuvar ve atölye benzeri ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Teknik zorluklar ve hands-on problem çözme projeleri',
                'Yeni araç ve teknolojilerle çalışma fırsatları',
                'Özerklik ve bağımsız karar verme yetkisi',
                'Acil durum müdahalesi ve kriz çözümü sorumlulukları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında pratik katkı ve teknik destek odaklı yaklaşım sergilerler. Küçük, teknik odaklı takımlarda daha etkili çalışırlar. Brainstorming seanslarında uygulanabilir çözümler sunarlar. Sosyal aktivitelerden ziyade iş odaklı işbirliğini tercih ederler.',
            'leadership_potential_or_style_notes_for_employer' => 'Teknik uzmanlık temelli liderlik potansiyeline sahiptirler. Kriz yönetimi, teknik proje liderliği ve problem çözme konularında etkili liderlik sergilerler. Liderlik pozisyonlarında teknik özerklik ve hands-on yaklaşım yetkisi verildiğinde en iyi performansı sergilerler. Pragmatik ve sonuç odaklı liderlik tarzını benimserler.'
        ]);

        // ISFP (Maceracı) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ISFP',
            'type_name' => 'Maceracı',
            'profile_summary_for_employer' => 'ISFP tipi çalışanlar, yaratıcı yaklaşımları ve güçlü estetik duyarlılıkları ile organizasyona özgünlük ve yenilik getiren değerli ekip üyeleridir. Yaratıcı projeler, bireysel ifade ve değer temelli çalışmalar konularında üstün performans sergilerler. Esnek adaptasyon yetenekleri ve empati odaklı yaklaşımları sayesinde insan merkezli çözümler üretirler.',
            'key_strengths_in_workplace' => [
                'Yaratıcı düşünme ve özgün çözümler geliştirme',
                'Güçlü estetik duyarlılık ve tasarım becerileri',
                'Bireysel motivasyon ve öz-yönlendirme kapasitesi',
                'Empati ve farklılıklara saygı gösterme yeteneği'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Zaman yönetimi ve deadline odaklılık geliştirme',
                'Yapılandırılmış süreçlere uyum sağlama becerisini artırma',
                'Takım içi proaktif iletişim ve güncelleme paylaşımı',
                'Eleştiri ve geri bildirimleri objektif değerlendirme'
            ],
            'communication_style_and_tips_for_employer' => 'ISFP çalışanlar samimi, değer temelli ve bireysel iletişimi tercih ederler. Onlarla iletişim kurarken kişisel değerlerini ve yaratıcı vizyonlarını anlayın. Bire bir görüşmeler yapın ve fikirlerini geliştirmeleri için zaman tanıyın. Eleştirileri destekleyici ve gelişim odaklı sunduğunuzda daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde yaratıcı özgürlük ve esnek süreçler sağlayın. Anlamlı ve değer uyumu olan projeler verin. Mikro-yönetimden kaçının ve bireysel çalışma tarzlarını destekleyin. Yaratıcı ve estetik odaklı projeleri önceliklendirin.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken empatik ve destekleyici yaklaşım benimseyin. Performans değerlendirmelerini yaratıcı katkılar ve bireysel gelişim üzerinden yapın. Güçlü yanlarını vurgulayın ve gelişim önerilerinizi kişisel değerler çerçevesinde sunun. Yapıcı eleştirileri yaratıcı fırsatlar olarak sunduğunuzda daha etkili olur.',
            'work_environment_preferences_for_employer' => 'Esnek, yaratıcı ve estetik açıdan hoş çalışma ortamları tercih ederler. Bireysel çalışma alanları ve yaratıcı ifade imkanları motivasyonlarını artırır. Doğal ışık ve rahat atmosfer sağlamaya çalışın. Özgünlüğün değer gördüğü, farklılıkların desteklendiği ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Yaratıcı ve estetik odaklı projeler',
                'Bireysel ifade ve özgünlük fırsatları',
                'Değer uyumu olan anlamlı çalışmalar',
                'Esnek çalışma düzenlemeleri ve özerklik'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında yaratıcılık ve empati odaklı yaklaşım sergilerler. Farklı perspektifleri anlama ve yaratıcı çözümler geliştirme konusunda etkili çalışırlar. Küçük, samimi takımlarda daha rahat hissederler. Brainstorming ve yaratıcı problem çözme seanslarında değerli katkılar sunarlar.',
            'leadership_potential_or_style_notes_for_employer' => 'İlham verici ve değer temelli liderlik potansiyeline sahiptirler. Yaratıcı vizyon oluşturma, ekip üyelerinin bireysel güçlerini keşfetme ve özgün çözümler geliştirme konularında etkili liderlik sergilerler. Liderlik pozisyonlarında yaratıcı özgürlük ve değer uyumu yetkisi verildiğinde en iyi performansı sergilerler. Demokratik ve ilham verici liderlik tarzını benimserler.'
        ]);

        // ESTP (Girişimci) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ESTP',
            'type_name' => 'Girişimci',
            'profile_summary_for_employer' => 'ESTP tipi çalışanlar, dinamik enerjileri ve anlık fırsat değerlendirme yetenekleri ile organizasyona hız ve adaptasyon getiren değerli ekip üyeleridir. Satış, müzakere ve hızlı karar gerektiren durumlar konularında üstün performans sergilerler. Risk alma cesaretleri ve pragmatik yaklaşımları sayesinde rekabetçi ortamlarda etkili sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Hızlı karar verme ve anlık fırsat değerlendirme',
                'Güçlü sosyal beceriler ve ikna etme yetenekleri',
                'Risk alma cesareti ve girişimci yaklaşımlar',
                'Yüksek enerji ve dinamik çalışma kapasitesi'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Uzun vadeli planlama ve stratejik düşünme becerilerini geliştirme',
                'Detay odaklılık ve titizlik konusunda gelişim sağlama',
                'Sabırlı analiz ve derinlemesine araştırma alışkanlığı',
                'Rutin görevlere karşı motivasyon sürdürme'
            ],
            'communication_style_and_tips_for_employer' => 'ESTP çalışanlar enerjik, doğrudan ve etkileşimli iletişimi tercih ederler. Onlarla iletişim kurarken hızlı tempolu ve sonuç odaklı yaklaşım benimseyin. Yüz yüze görüşmeleri destekleyin ve dinamik tartışma ortamları sağlayın. Eleştirileri hızlı ve aksiyon odaklı sunduğunuzda daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde çeşitlilik ve hızlı tempo sağlayın. Satış, müzakere ve müşteri ilişkileri odaklı projeler verin. Rutin görevleri minimize edin ve rekabetçi hedefler belirleyin. Anlık karar verme yetkisi tanıyın ve sonuç odaklı değerlendirmeler yapın.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken doğrudan, hızlı ve aksiyon odaklı yaklaşım benimseyin. Performans değerlendirmelerini somut sonuçlar ve başarı metrikleri üzerinden yapın. Girişimci yaklaşımlarını takdir edin ve yeni fırsatlar ile ilişkilendirin. Rekabetçi başarıları vurgulayın.',
            'work_environment_preferences_for_employer' => 'Dinamik, hızlı tempolu ve sosyal etkileşimin yoğun olduğu çalışma ortamları tercih ederler. Müşteri teması ve dış saha çalışması motivasyonlarını artırır. Esnek çalışma düzenlemeleri ve hareket özgürlüğü sağlamaya çalışın. Rekabetçi ve başarı odaklı ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Rekabetçi hedefler ve başarı odaklı projeler',
                'Satış, müzakere ve müşteri ilişkileri fırsatları',
                'Hızlı karar verme yetkisi ve özerklik',
                'Çeşitli görevler ve değişken sorumluluklar'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında enerji ve motivasyon odaklı yaklaşım sergilerler. Ekip dinamizmini artırma ve hızlı çözümler geliştirme konusunda etkili çalışırlar. Rekabetçi takım ortamlarında başarılı olurlar. Brainstorming ve hızlı karar gerektiren durumlarda değerli katkılar sunarlar.',
            'leadership_potential_or_style_notes_for_employer' => 'Dinamik ve sonuç odaklı liderlik potansiyeline sahiptirler. Satış ekibi liderliği, kriz yönetimi ve hızlı büyüme dönemlerinde etkili liderlik sergilerler. Liderlik pozisyonlarında hızlı karar verme ve risk alma yetkisi verildiğinde en iyi performansı sergilerler. Pragmatik ve girişimci liderlik tarzını benimserler.'
        ]);

        // ESFP (Eğlendirici) kişilik tipi için detaylı iş profili
        MbtiTypeDetail::create([
            'mbti_type' => 'ESFP',
            'type_name' => 'Eğlendirici',
            'profile_summary_for_employer' => 'ESFP tipi çalışanlar, coşkulu enerjileri ve güçlü sosyal yetenekleri ile organizasyona pozitif atmosfer ve insan odaklı yaklaşım getiren değerli ekip üyeleridir. Müşteri hizmetleri, ekip motivasyonu ve yaratıcı sunum konularında üstün performans sergilerler. Spontane adaptasyon yetenekleri ve empati odaklı yaklaşımları sayesinde dinamik çalışma ortamlarında etkili sonuçlar üretirler.',
            'key_strengths_in_workplace' => [
                'Güçlü sosyal beceriler ve müşteri odaklı hizmet',
                'Pozitif enerji ve ekip motivasyonu sağlama',
                'Spontane adaptasyon ve anlık problem çözme',
                'Yaratıcı sunum ve etkileşimli iletişim yetenekleri'
            ],
            'potential_development_areas_for_workplace_effectiveness' => [
                'Uzun vadeli planlama ve stratejik düşünme becerilerini geliştirme',
                'Detay odaklılık ve dokümantasyon alışkanlığı',
                'Zaman yönetimi ve önceliklendirme becerilerini artırma',
                'Eleştirel analiz ve objektif değerlendirme kapasitesi'
            ],
            'communication_style_and_tips_for_employer' => 'ESFP çalışanlar enerjik, sıcak ve etkileşimli iletişimi tercih ederler. Onlarla iletişim kurarken coşkularını destekleyin ve kişisel ilgi gösterin. Yüz yüze görüşmeleri ve ekip toplantılarını teşvik edin. Eleştirileri pozitif tonla ve gelişim fırsatları olarak sunduğunuzda daha yapıcı karşılanır.',
            'task_management_approach_and_tips_for_employer' => 'Görev yönetiminde çeşitlilik ve sosyal etkileşim sağlayın. Müşteri odaklı, yaratıcı ve ekip işbirliği gerektiren projeler verin. Rutin görevleri minimize edin ve spontane çözümler gerektiren durumları önceliklendirin. Kısa vadeli hedefler ile motivasyonu sürdürün.',
            'feedback_receptivity_and_guidance_for_employer' => 'Geri bildirim verirken pozitif, destekleyici ve kişisel yaklaşım benimseyin. Performans değerlendirmelerini ekip katkısı ve müşteri memnuniyeti üzerinden yapın. Sosyal becerilerini ve pozitif etkilerini takdir edin. Gelişim önerilerinizi yeni deneyimler ve fırsatlar olarak sunduğunuzda daha etkili olur.',
            'work_environment_preferences_for_employer' => 'Dinamik, sosyal ve etkileşimli çalışma ortamları tercih ederler. Müşteri teması ve ekip işbirliği motivasyonlarını artırır. Esnek çalışma düzenlemeleri ve yaratıcı ifade imkanları sağlamaya çalışın. Pozitif enerji ve eğlenceli atmosferin desteklendiği ortamlarda daha verimli çalışırlar.',
            'motivators_for_employer_to_leverage' => [
                'Müşteri odaklı ve sosyal etkileşim gerektiren projeler',
                'Yaratıcı sunum ve etkinlik organizasyonu fırsatları',
                'Ekip motivasyonu ve pozitif atmosfer yaratma görevleri',
                'Çeşitli deneyimler ve yeni insanlarla tanışma imkanları'
            ],
            'team_collaboration_style_for_employer' => 'Takım çalışmasında enerji ve pozitif atmosfer odaklı yaklaşım sergilerler. Ekip moralini yüksek tutma ve sosyal bağlantıları güçlendirme konusunda etkili çalışırlar. Büyük takımlarda bile uyumlu çalışma ortamı yaratabilirler. Ekip etkinlikleri ve yaratıcı projelerinde değerli katkılar sunarlar.',
            'leadership_potential_or_style_notes_for_employer' => 'İlham verici ve insan odaklı liderlik potansiyeline sahiptirler. Ekip motivasyonu, müşteri ilişkileri yönetimi ve pozitif kültür oluşturma konularında etkili liderlik sergilerler. Liderlik pozisyonlarında sosyal etkileşim ve yaratıcı yaklaşım yetkisi verildiğinde en iyi performansı sergilerler. Katılımcı ve eğlenceli liderlik tarzını benimser, ekip üyelerinin potansiyelini ortaya çıkarmaya odaklanır.'
        ]);
    }
}
