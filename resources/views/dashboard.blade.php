<x-app-layout>
    <!-- Modern Header with Gradient Background -->
    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mb-6">
                    Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">MBTI Journey</span>
                </h1>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    Track your personality insights and unlock your professional potential
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($testResults->isEmpty())
                <!-- Empty State Design -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-200/80 hover:shadow-2xl transition-all duration-300">
                    <div class="relative">
                        <!-- Decorative gradient background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50 opacity-50"></div>
                        
                        <div class="relative px-8 py-16 text-center">
                            <!-- Icon with gradient background -->
                            <div class="mx-auto w-32 h-32 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mb-8 shadow-lg">
                                <svg class="w-16 h-16 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            
                            <h3 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Ready to Discover Yourself?</h3>
                            <p class="text-lg text-slate-600 mb-8 max-w-md mx-auto leading-relaxed">
                                Start your MBTI personality assessment journey and unlock insights that will transform your professional life.
                            </p>
                            
                            <!-- Benefits checklist -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-lg mx-auto mb-10 text-left">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700 font-medium">Quick 15-min test</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700 font-medium">Detailed insights</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700 font-medium">Professional report</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700 font-medium">Career guidance</span>
                                </div>
                            </div>
                            
                            <!-- CTA Button -->
                            <a href="{{ route('test.start') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Start Your MBTI Test
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                            
                            <p class="text-xs text-slate-500 mt-6">
                                ✨ No credit card required • Instant results
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Test Results Section -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-slate-900">Your Test Results</h2>
                        <div class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-700 text-sm font-medium rounded-full">
                            {{ $testResults->count() }} {{ Str::plural('Test', $testResults->count()) }}
                        </div>
                    </div>
                </div>

                <!-- Test Results Cards -->
                <div class="space-y-6 mb-12">
                    @foreach($testResults as $testResult)
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-slate-200/80 group">
                            <div class="p-8">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                    <!-- Test Info -->
                                    <div class="flex-1">
                                        <div class="flex items-start space-x-4">
                                            <!-- MBTI Type Badge -->
                                            <div class="flex-shrink-0">
                                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                                    <span class="text-white font-bold text-lg">{{ $testResult->mbti_type }}</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Details -->
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center space-x-3 mb-2">
                                                    <h3 class="text-xl font-bold text-slate-900">
                                                        Personality Type: {{ $testResult->mbti_type }}
                                                    </h3>
                                                    <!-- Status Badge -->
                                                    @if($testResult->status === 'pending_payment')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                                                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Pending Payment
                                                        </span>
                                                    @elseif($testResult->status === 'completed')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Completed
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <div class="flex items-center text-slate-600 space-x-4">
                                                    <div class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <span class="text-sm font-medium">{{ $testResult->created_at->format('d.m.Y H:i') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div class="flex flex-col sm:flex-row gap-3">
                                        @if($testResult->status === 'pending_payment')
                                            <a href="{{ route('test.payment', $testResult->id) }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-amber-600 hover:to-orange-600 transform hover:scale-105 transition-all duration-200 group">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                </svg>
                                                Complete Payment
                                            </a>
                                        @elseif($testResult->status === 'completed')
                                            <a href="{{ route('test.showResult', $testResult->id) }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-200 group">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View Report
                                            </a>
                                            <a href="{{ route('test.downloadReport', $testResult->id) }}" class="inline-flex items-center justify-center px-6 py-3 bg-white border-2 border-slate-300 text-slate-700 font-semibold rounded-xl shadow-md hover:shadow-lg hover:border-slate-400 hover:bg-slate-50 transition-all duration-200 group">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                Download PDF
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- New Test CTA -->
                <div class="bg-gradient-to-br from-slate-50 to-indigo-50 rounded-2xl border border-slate-200 p-8 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Ready for Another Assessment?</h3>
                        <p class="text-slate-600 mb-6">Track your personality development over time with additional tests.</p>
                        <a href="{{ route('test.start') }}" class="inline-flex items-center px-6 py-3 bg-white border-2 border-indigo-200 text-indigo-700 font-semibold rounded-xl shadow-md hover:shadow-lg hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-200 group">
                            <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Start New Test
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
