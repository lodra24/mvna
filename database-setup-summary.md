# Myers-Briggs Veritabanı Kurulumu Özeti

## Veritabanı Bilgileri
- **Veritabanı Adı**: laravel_app
- **Veritabanı Türü**: MySQL
- **Host**: 127.0.0.1
- **Port**: 3306
- **Kullanıcı**: root
- **Şifre**: (boş)

## Oluşturulan Tablolar

### 1. questions (Sorular Tablosu)
- **id**: Birincil anahtar
- **question_text**: Soru metni (text)
- **dimension**: Hangi boyuta ait olduğu (enum: 'E/I', 'S/N', 'T/F', 'J/P')
- **option_a_value**: A seçeneğinin değeri (char, 1 karakter)
- **option_b_value**: B seçeneğinin değeri (char, 1 karakter)
- **timestamps**: created_at ve updated_at

### 2. user_answers (Kullanıcı Cevapları Tablosu)
- **id**: Birincil anahtar
- **user_id**: Kullanıcı ID'si (foreign key, users tablosuna referans)
- **question_id**: Soru ID'si (foreign key, questions tablosuna referans)
- **chosen_option**: Seçilen seçenek (enum: 'A', 'B')
- **timestamps**: created_at ve updated_at
- **Unique Index**: user_id + question_id (Bir kullanıcı bir soruya sadece bir kez cevap verebilir)

### 3. test_results (Test Sonuçları Tablosu)
- **id**: Birincil anahtar
- **user_id**: Kullanıcı ID'si (foreign key, users tablosuna referans)
- **mbti_type**: MBTI tipi (string, 4 karakter, örn: INFJ, ENTP)
- **e_score**: Extraversion skoru (integer, varsayılan: 0)
- **i_score**: Introversion skoru (integer, varsayılan: 0)
- **s_score**: Sensing skoru (integer, varsayılan: 0)
- **n_score**: Intuition skoru (integer, varsayılan: 0)
- **t_score**: Thinking skoru (integer, varsayılan: 0)
- **f_score**: Feeling skoru (integer, varsayılan: 0)
- **j_score**: Judging skoru (integer, varsayılan: 0)
- **p_score**: Perceiving skoru (integer, varsayılan: 0)
- **report_path**: Oluşturulan raporun dosya yolu (string, nullable)
- **payment_id**: Ödeme ID'si (string, nullable)
- **timestamps**: created_at ve updated_at

## Model İlişkileri

### User Model
- `hasMany` → UserAnswer (Bir kullanıcının birden fazla cevabı olabilir)
- `hasMany` → TestResult (Bir kullanıcının birden fazla test sonucu olabilir)

### Question Model
- `hasMany` → UserAnswer (Bir sorunun birden fazla cevabı olabilir)

### UserAnswer Model
- `belongsTo` → User (Her cevap bir kullanıcıya aittir)
- `belongsTo` → Question (Her cevap bir soruya aittir)

### TestResult Model
- `belongsTo` → User (Her test sonucu bir kullanıcıya aittir)
- `calculateMbtiType()` → MBTI tipini skorlara göre hesaplayan yardımcı metod

## Migration Dosyaları
1. `2025_05_28_134326_create_questions_table.php`
2. `2025_05_28_134352_create_user_answers_table.php`
3. `2025_05_28_134405_create_test_results_table.php`

## Model Dosyaları
1. `app/Models/Question.php`
2. `app/Models/UserAnswer.php`
3. `app/Models/TestResult.php`
4. `app/Models/User.php` (İlişkiler eklendi)

## Kurulum Tamamlandı
Veritabanı ve tüm tablolar başarıyla oluşturuldu. Sistem Myers-Briggs kişilik testi uygulaması için hazır durumda.
