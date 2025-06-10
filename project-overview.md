# Proje Özeti: MindMetrics - MBTI Tabanlı Mesleki Analiz Platformu

## 1. Projenin Amacı ve Hedef Kitlesi

**MindMetrics**, kullanıcıların bir dizi soruyu yanıtlayarak MBTI (Myers-Briggs Tipi Göstergesi) kişilik tiplerini öğrenmelerini sağlayan bir web uygulamasıdır. Testi tamamlayan kullanıcılar, bir ödeme yaptıktan sonra kişilik tiplerine özel, özellikle **işverenlere yönelik** hazırlanmış detaylı bir analiz raporuna erişebilirler.

-   **Ana Hedef:** Kullanıcılara, kariyer gelişimlerinde ve iş arama süreçlerinde kullanabilecekleri, profesyonel güçlü yönlerini, gelişim alanlarını ve ideal çalışma ortamlarını özetleyen somut bir rapor sunmak.
-   **İkincil Hedef:** İşverenlerin ve İK departmanlarının, adayları ve mevcut çalışanları daha iyi anlamalarına yardımcı olacak bir araç sağlamak.

Uygulama, Laravel 12 ve Filament 3 üzerine inşa edilmiştir.

---

## 2. Temel Veri Modelleri ve İlişkileri

Uygulamanın veri omurgası aşağıdaki Eloquent Modelleri üzerine kuruludur:

-   `User`: Uygulamaya kayıt olan kullanıcıları temsil eder. Her kullanıcının birden fazla `TestResult`'ı olabilir.
-   `Question`: Yöneticiler tarafından eklenen MBTI test sorularını içerir. Her sorunun ait olduğu bir boyut (`E/I`, `S/N` vb.) ve iki seçenek değeri (`option_a_value`, `option_b_value`) vardır.
-   `TestResult`: Bir kullanıcının tamamladığı tek bir testi temsil eden merkezi modeldir.
    -   Bir `User`'a aittir (`belongsTo`).
    -   Birden çok `UserAnswer` içerir (`hasMany`).
    -   Bir `Payment` kaydı ile ilişkilidir (`belongsTo`).
    -   Hesaplanan `mbti_type` (örn: "INTJ"), her bir boyut için skorlar (`e_score`, `i_score` vb.) ve testin durumunu (`status`) tutar.
-   `UserAnswer`: Bir kullanıcının bir soruya verdiği tek bir cevabı saklar. Bir `TestResult`'a aittir (`belongsTo`).
-   `Payment`: Bir test raporu için yapılan ödeme işlemini kaydeder. Bir `User`'a ve bir `TestResult`'a aittir.
-   `MbtiTypeDetail`: 16 MBTI tipinin her biri için detaylı, işveren odaklı açıklamaları içerir. `TestResult` modeliyle `mbti_type` alanı üzerinden ilişkilidir.

**Önemli Mimari Not:** Kullanıcının cevapları (`UserAnswer`) doğrudan `User` modeline değil, `TestResult` modeline bağlanmıştır. Bu, bir kullanıcının birden fazla test çözmesine ve her testin cevaplarının ayrı ayrı saklanmasına olanak tanır.

---

## 3. Kullanıcı Akışı (User Flow)

Bir ziyaretçinin detaylı raporuna ulaşana kadarki adımları aşağıdaki gibidir:

1.  **Başlangıç (`/test/start`):** Ziyaretçi, teste başlamak için adını girer. Bu bilgi `session`'da saklanır.
2.  **Soruları Cevaplama (`/test/questions`):** Ziyaretçi, veritabanından gelen soruları cevaplar. İlerleme durumu ve cevapları ön yüzde JavaScript ile yönetilir.
3.  **Cevapları Gönderme (`POST /test/submit`):**
    -   Tüm sorular cevaplandığında, cevaplar `TestController@submitAnswers` metoduna gönderilir.
    -   Controller, anında MBTI tipini hesaplar (örn: "ENFP").
    -   Hesaplanan skorlar ve MBTI tipi, **veritabanına kaydedilmeden** `session`'a `pending_test_result` anahtarıyla geçici olarak kaydedilir.
4.  **Kayıt/Giriş Ekranı (`/auth/register-or-login`):**
    -   Kullanıcı, sonuçları kaydetmek ve rapora erişmek için kayıt olmaya veya giriş yapmaya yönlendirilir.
    -   Kayıt veya giriş işlemi başarılı olduğunda, `session`'daki `pending_test_result` bilgisi alınır.
    -   `users`, `test_results` ve `user_answers` tablolarına kalıcı kayıtlar oluşturulur. `TestResult`'ın başlangıç durumu `pending_payment` olarak ayarlanır.
5.  **Ödeme Ekranı (`/test/payment/{testResult}`):**
    -   Kullanıcı, detaylı raporun kilidini açmak için ödeme sayfasına yönlendirilir.
    -   Mevcut sistemde, bu sayfada "sahte" bir ödeme butonu bulunmaktadır.
6.  **Ödeme Başarısı ve Rapor Erişimi (`/test/payment/{testResult}/success`):**
    -   Sahte ödeme işlemi tamamlandığında `TestController@handleSuccessfulPayment` metodu çalışır.
    -   `payments` tablosuna bir kayıt eklenir.
    -   İlgili `TestResult` kaydının `status` alanı `completed` olarak güncellenir.
    -   Kullanıcıya ödemenin başarılı olduğuna dair bir e-posta (`PaymentSuccessful`) gönderilir.
    -   Kullanıcı, sonuç sayfasına (`/test/result/{testResult}`) yönlendirilir.
7.  **Sonuçları Görüntüleme ve İndirme:**
    -   `test.results` sayfasında kullanıcı, ödemesi yapılmış raporunun tüm detaylarını (güçlü yönler, gelişim alanları vb.) görür.
    -   `test.downloadReport` rotası üzerinden raporunu PDF formatında indirebilir. PDF oluşturma işlemi `barryvdh/laravel-dompdf` paketi ile `report_pdf.blade.php` şablonu kullanılarak yapılır.
8.  **Kontrol Paneli (`/dashboard`):** Giriş yapmış kullanıcılar, daha önce tamamladıkları tüm test sonuçlarını bu sayfada listeleyebilir.

---

## 4. Yönetici Akışı (Filament Admin Panel)

Yöneticiler, `/admin` URL'i üzerinden Filament paneline erişir ve aşağıdaki işlemleri yapabilir:

-   **Kullanıcı Yönetimi (`UserResource`):**
    -   Tüm kullanıcıları listeleyebilir, rollerini (admin/user) düzenleyebilir.
    -   Bir kullanıcının detay sayfasından, o kullanıcıya ait tüm `TestResult`'ları (`TestResultsRelationManager` ile) görebilir.
-   **Soru Yönetimi (`QuestionResource`):**
    -   MBTI test soruları ekleyebilir, düzenleyebilir ve silebilir.
    -   Her soru için metin, ait olduğu boyut ve seçeneklerin değerlerini belirleyebilir.
-   **Test Sonuçları Yönetimi (`TestResultResource`):**
    -   Tüm kullanıcıların test sonuçlarını merkezi bir yerden inceleyebilir.
    -   Sonuçları kullanıcı adı, MBTI tipi veya ödeme durumuna (`status`) göre filtreleyebilir.
    -   Bir test sonucunun detay sayfasında, o teste ait tüm cevapları (`UserAnswersRelationManager` ile) görebilir.

---

## 5. Teknik Detaylar ve Anahtar Dosyalar

-   **Backend:** Laravel `12.x`
-   **Frontend:** Vite, TailwindCSS, Alpine.js
-   **Admin Panel:** Filament `3.x`
-   **PDF Üretimi:** `barryvdh/laravel-dompdf`
-   **Ana İş Mantığı:** `app/Http/Controllers/TestController.php` (Tüm test ve sonuç akışını yönetir)
-   **Ana Yönlendirme:** `routes/web.php`
-   **Kullanıcı Arayüzü (Test):** `resources/views/test/` klasöründeki Blade şablonları (`start`, `questions`, `payment`, `results`).
-   **Yönetici Arayüzü (Filament):** `app/Filament/Resources/` klasöründeki Resource dosyaları.
-   **Veritabanı Şeması:** `database/migrations/` klasöründeki dosyalar.
-   **Veritabanı İçerik Doldurma:** `database/seeders/` (Özellikle `MbtiTypeDetailSeeder.php` rapor içeriklerini barındırır).