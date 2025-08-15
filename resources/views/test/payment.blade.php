@extends('layouts.test-layout')

@section('title', 'Report Payment')

@push('head')
    @paddleJS
@endpush

@section('page-title')
    Your Report Is Almost Ready!
@endsection

@section('page-subtitle')
    Your personality type: <span class="font-extrabold text-mindmetrics-indigo">{{ $testResult->mbti_type }}</span>. Unlock your detailed, personalized report by clicking the button below.
@endsection

@section('content')
    <div class="text-center">
        <div class="max-w-2xl mx-auto">
            
            <!-- Raporun Değerini Vurgulayan Bölüm -->
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-8 mb-8">
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Detailed Employer Report</h3>
                <p class="text-slate-600 mb-6">This report includes a comprehensive analysis that you can present to potential employers, highlighting your professional strengths and potential.</p>
                <ul class="text-left space-y-3 text-slate-700">
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Your key strengths in the workplace</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Tips for your potential development areas</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Your effective communication and task management style</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>What motivates you and your ideal work environment</span></li>
                    <li class="flex items-start"><span class="text-green-500 mr-3 mt-1">✓</span><span>Your leadership potential and team collaboration style</span></li>
                </ul>
            </div>

            <!-- Fiyat ve Ödeme Butonu -->
            @php
                // Artık app() çağırmaya gerek yok, $settings zaten var.
                $price = $settings->test_price;
                $priceParts = explode('.', number_format($price, 2, '.', ''));
            @endphp
            <div class="mb-4">
                <span class="text-5xl font-extrabold text-slate-900">${{ $priceParts[0] }}</span>
                <span class="text-2xl font-bold text-slate-600">.{{ $priceParts[1] ?? '00' }}</span>
            </div>
            <p class="text-slate-500 font-medium mb-8">One-time payment</p>

             <!-- YENİ ve GERÇEK PADDLE BUTONU -->
            <x-paddle-button 
                :checkout="$checkout" 
                class="test-button test-button--primary test-button--large w-full max-w-md mx-auto"
            >
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H4a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                Secure Payment & Unlock Report
            </x-paddle-button>

            <p class="text-xs text-slate-500 mt-4">Payments are securely processed by Paddle.</p>

        </div>
    </div>
@endsection
