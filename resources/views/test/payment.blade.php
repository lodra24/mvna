@extends('layouts.test-layout')

@section('title', 'Rapor Ödemesi')

@section('page-title')
    Raporunuz Neredeyse Hazır!
@endsection

@section('page-subtitle')
    Kişilik tipiniz: <span class="font-extrabold text-mindmetrics-indigo">{{ $testResult->mbti_type }}</span>. Aşağıdaki butona tıklayarak size özel hazırlanan detaylı raporun kilidini açın.
@endsection

@section('content')
    <div class="text-center">
        <div class="max-w-2xl mx-auto">
            
            <!-- Raporun Değerini Vurgulayan Bölüm -->
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-8 mb-8">
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Detaylı İşveren Raporu</h3>
                <p class="text-slate-600 mb-6">Bu rapor, potansiyel işverenlerinize sunabileceğiniz, profesyonel hayattaki güçlü yönlerinizi ve potansiyelinizi ortaya koyan kapsamlı bir analiz içerir.</p>
                <ul class="text-left space-y-3 text-slate-700">
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>İş yerindeki temel güçlü yönleriniz</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Potansiyel gelişim alanlarınız için ipuçları</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Etkili iletişim ve görev yönetimi tarzınız</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Sizi neyin motive ettiği ve ideal çalışma ortamınız</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Liderlik potansiyeliniz ve takım içi işbirliği stiliniz</span></li>
                </ul>
            </div>

            <!-- Fiyat ve Ödeme Butonu -->
            <div class="mb-4">
                <span class="text-5xl font-extrabold text-slate-900">$14</span>
                <span class="text-2xl font-bold text-slate-600">.99</span>
            </div>
            <p class="text-slate-500 font-medium mb-8">Tek seferlik ödeme</p>

            <!-- Geçici sahte ödeme butonu -->
            <a href="{{ route('test.handlePayment', ['testResult' => $testResult->id]) }}" class="test-button test-button--primary test-button--large w-full max-w-md mx-auto">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H4a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                Güvenli Ödeme Yap ve Raporu Aç
            </a>
            <p class="text-xs text-slate-500 mt-4">Test amaçlı geçici ödeme sistemi aktif.</p>

        </div>
    </div>
@endsection