@extends('layouts.test-layout')

@section('title', 'Payment Successful')

@section('content')
    <div class="text-center py-12">
        <!-- Başarı İkonu -->
        <div class="mx-auto w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mb-6 animate-pulse">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <!-- Mesaj -->
        <h1 class="text-3xl font-bold text-slate-800 mb-4">Thank You!</h1>
        <p class="text-lg text-slate-600 mb-8 max-w-md mx-auto">
            Your payment was successful. We are now generating your detailed report.
        </p>

        <!-- Yükleme Animasyonu -->
        <div class="flex items-center justify-center space-x-2">
            <div class="w-3 h-3 bg-indigo-500 rounded-full animate-bounce"></div>
            <div class="w-3 h-3 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
            <div class="w-3 h-3 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
        </div>
        <p class="text-sm text-slate-500 mt-4">You will be redirected shortly...</p>
    </div>

    <script>
        // 5 saniye sonra kullanıcıyı dashboard'a yönlendir.
        setTimeout(function () {
            window.location.href = "{{ route('dashboard') }}";
        }, 5000); // 5 saniye (5000 milisaniye)
    </script>
@endsection
