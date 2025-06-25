@extends('layouts.public')

@section('title', 'Privacy Policy')
@section('description', 'Learn how CognifyWork protects your privacy and handles your personal data in our comprehensive privacy policy.')

@section('content')
    <!-- PRIVACY POLICY CONTENT -->
    <div class="bg-gradient-to-b from-slate-50 via-white to-slate-50 geometric-grid relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50 opacity-30"></div>
            <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider text-mindmetrics-indigo uppercase bg-mindmetrics-indigo-light/70 rounded-full">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Privacy & Security
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight mb-6">
                    Privacy Policy
                </h1>
                <p class="max-w-2xl mx-auto text-lg sm:text-xl text-slate-600 mb-8 leading-relaxed">
                    Your privacy is our priority. Learn how we collect, use, and protect your personal information.
                </p>
                <div class="flex items-center justify-center text-sm text-slate-500">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Last updated: December 25, 2024
                </div>
            </div>

            <!-- Privacy Policy Content -->
            <div class="prose prose-lg prose-slate max-w-none">
                <!-- Introduction -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-mindmetrics-indigo to-indigo-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Introduction</h2>
                            <p class="text-slate-600 leading-relaxed">
                                Welcome to CognifyWork ("we," "our," or "us"). We are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our MBTI personality assessment services.
                            </p>
                            <p class="text-slate-600 leading-relaxed mt-4">
                                We understand that privacy is fundamental to building trust with our users. This policy provides transparent information about our data practices to help you make informed decisions about using our services. By using our website and services, you consent to the collection and use of information in accordance with this policy.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Information We Collect -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-mindmetrics-green to-emerald-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Information We Collect</h2>
                            <div class="space-y-6 text-slate-600">
                                <div>
                                    <h3 class="font-semibold text-slate-800 mb-3 text-lg">Information You Provide to Us</h3>
                                    <p class="mb-3 leading-relaxed">We collect information that you voluntarily provide to us when using our services:</p>
                                    <ul class="list-disc list-inside space-y-2 ml-4">
                                        <li><strong>Account Registration:</strong> Name and email address when you create an account or sign up for our services</li>
                                        <li><strong>Test Initiation:</strong> Name and basic demographic information when you start taking the MBTI assessment</li>
                                        <li><strong>Contact Forms:</strong> Contact information, messages, and any other details you provide when you reach out to us</li>
                                        <li><strong>Payment Information:</strong> Billing details processed securely through our payment providers (we do not store full payment card details)</li>
                                        <li><strong>Communication Preferences:</strong> Your choices regarding marketing communications and notifications</li>
                                    </ul>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-slate-800 mb-3 text-lg">Information We Collect Automatically</h3>
                                    <p class="mb-3 leading-relaxed">When you visit our website, we automatically collect certain information about your device and browsing behavior:</p>
                                    <ul class="list-disc list-inside space-y-2 ml-4">
                                        <li><strong>Device Information:</strong> Device type, operating system, browser type and version, screen resolution, and device identifiers</li>
                                        <li><strong>Browser Information:</strong> Browser settings, language preferences, and installed plugins</li>
                                        <li><strong>IP Address:</strong> Your Internet Protocol address and approximate geographic location</li>
                                        <li><strong>Usage Data:</strong> Pages visited, time spent on pages, click paths, referring websites, and interaction patterns</li>
                                        <li><strong>Technical Data:</strong> Session information, error logs, and performance metrics</li>
                                    </ul>
                                </div>
                                
                                <div>
                                    <h3 class="font-semibold text-slate-800 mb-3 text-lg">Assessment and Test Data</h3>
                                    <p class="mb-3 leading-relaxed">We collect and process data specifically related to your personality assessment experience:</p>
                                    <ul class="list-disc list-inside space-y-2 ml-4">
                                        <li><strong>Test Responses:</strong> Your answers to all MBTI personality assessment questions</li>
                                        <li><strong>Assessment Results:</strong> Calculated personality type, scores, and dimensional preferences</li>
                                        <li><strong>Generated Reports:</strong> Personalized personality reports, insights, and recommendations based on your results</li>
                                        <li><strong>Test Progress:</strong> Completion status, time taken, and any incomplete sessions</li>
                                        <li><strong>Historical Data:</strong> Previous test results if you retake assessments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- How We Use Your Information -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">How We Use Your Information</h2>
                            <div class="space-y-3 text-slate-600">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Provide and deliver our MBTI personality assessment services</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Generate personalized personality reports and insights</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Communicate with you about your account and our services</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Improve our services and develop new features</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Ensure security and prevent fraudulent activities</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-mindmetrics-green mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Comply with legal obligations and protect our rights</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Sharing -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">How We Share Your Information</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We respect your privacy and do not sell, trade, or rent your personal information to third parties for marketing purposes. We may share your information only in the specific circumstances outlined below:
                                </p>
                                <div class="space-y-4">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"/>
                                            </svg>
                                            Service Providers
                                        </h3>
                                        <p class="text-sm leading-relaxed">We share information with trusted third-party service providers who assist us in operating our website and providing our services. These include:</p>
                                        <ul class="text-sm mt-2 ml-4 list-disc list-inside space-y-1">
                                            <li><strong>Paddle:</strong> Our payment processor for handling secure transactions and billing</li>
                                            <li><strong>Google Services:</strong> For authentication (Google Sign-In) and security (reCAPTCHA)</li>
                                            <li><strong>Email Service Providers:</strong> For sending transactional emails and notifications</li>
                                            <li><strong>Hosting Providers:</strong> For website infrastructure and data storage</li>
                                        </ul>
                                        <p class="text-sm mt-2 text-slate-600">All service providers are bound by confidentiality agreements and are only authorized to use your information for the specific services they provide to us.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                            </svg>
                                            Legal Compliance
                                        </h3>
                                        <p class="text-sm">We may disclose your information when required by law, legal process, or government request, or when we believe disclosure is necessary to:</p>
                                        <ul class="text-sm mt-2 ml-4 list-disc list-inside space-y-1">
                                            <li>Comply with applicable laws and regulations</li>
                                            <li>Respond to lawful requests from public authorities</li>
                                            <li>Protect our rights, property, or safety</li>
                                            <li>Protect the rights, property, or safety of our users or others</li>
                                            <li>Prevent or investigate potential fraud or security issues</li>
                                        </ul>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 3v12a2 2 0 002 2h6a2 2 0 002-2V7M9 11h6M9 15h6"/>
                                            </svg>
                                            Business Transfers
                                        </h3>
                                        <p class="text-sm">In the event of a merger, acquisition, bankruptcy, dissolution, reorganization, or similar business transaction or proceeding, your information may be transferred as part of the business assets. We will provide notice before your personal information is transferred and becomes subject to a different privacy policy.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Data Security</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We implement comprehensive technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. Your data security is our top priority.
                                </p>
                                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200 mb-4">
                                    <h4 class="font-semibold text-slate-800 mb-2">Our Security Measures Include:</h4>
                                    <ul class="text-sm space-y-1 ml-4 list-disc list-inside">
                                        <li><strong>SSL Encryption:</strong> All data transmitted between your browser and our servers is encrypted using SSL/TLS protocols</li>
                                        <li><strong>Password Hashing:</strong> User passwords are hashed using industry-standard algorithms and never stored in plain text</li>
                                        <li><strong>Database Security:</strong> Database access is restricted and monitored with comprehensive logging</li>
                                        <li><strong>Regular Security Audits:</strong> We conduct regular security reviews and vulnerability assessments</li>
                                        <li><strong>Secure Infrastructure:</strong> Our hosting infrastructure meets industry security standards</li>
                                    </ul>
                                </div>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Encryption</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">All data is encrypted in transit and at rest using industry-standard protocols.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Access Control</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">Strict access controls ensure only authorized personnel can access your data.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Regular Monitoring</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">We continuously monitor our systems for potential security threats.</p>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-5 h-5 text-mindmetrics-green mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                            <h3 class="font-semibold text-slate-800">Data Backup</h3>
                                        </div>
                                        <p class="text-sm text-slate-600">Regular secure backups ensure your data is protected against loss.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Rights -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Your Data Protection Rights</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    You have certain rights regarding your personal information under applicable data protection laws, including GDPR and CCPA. These rights may vary depending on your location and the nature of our relationship with you.
                                </p>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-blue-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Access
                                        </h3>
                                        <p class="text-sm">Request a copy of the personal information we hold about you.</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-lg p-4 border border-green-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Correction
                                        </h3>
                                        <p class="text-sm">Request correction of inaccurate or incomplete information.</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-lg p-4 border border-red-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Deletion
                                        </h3>
                                        <p class="text-sm">Request deletion of your personal information under certain circumstances.</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-lg p-4 border border-purple-100">
                                        <h3 class="font-semibold text-slate-800 mb-2 flex items-center">
                                            <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                            Portability
                                        </h3>
                                        <p class="text-sm">Request transfer of your data to another service provider.</p>
                                    </div>
                                </div>
                                <div class="bg-mindmetrics-indigo-light/30 rounded-lg p-4 border border-mindmetrics-indigo/20">
                                    <p class="text-sm">
                                        <strong>To exercise these rights:</strong> Contact us at
                                        <a href="mailto:privacy@cognifywork.com" class="text-mindmetrics-indigo hover:underline font-medium">privacy@cognifywork.com</a>
                                        with your request. We will respond within 30 days.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cookies and Tracking -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Cookies and Tracking Technologies</h2>
                            <div class="space-y-6 text-slate-600">
                                <p class="leading-relaxed">
                                    We use cookies and similar tracking technologies to enhance your experience on our website, ensure security, and analyze how our services are used. Below is a detailed breakdown of the types of cookies we use:
                                </p>
                                
                                <div class="space-y-4">
                                    <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                        <h3 class="font-semibold text-slate-800 mb-3 flex items-center">
                                            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5C3.312 18.333 4.274 20 5.814 20z"/>
                                            </svg>
                                            Strictly Necessary Cookies
                                        </h3>
                                        <p class="text-sm mb-3">These cookies are essential for the website to function properly and cannot be disabled. They do not require your consent as they are necessary for the basic operation of our services.</p>
                                        <ul class="text-sm space-y-1 ml-4 list-disc list-inside">
                                            <li><strong>Laravel Session:</strong> Maintains your session state while browsing our website</li>
                                            <li><strong>CSRF Token:</strong> Protects against cross-site request forgery attacks</li>
                                            <li><strong>Cookie Consent (laravel_cookie_consent):</strong> Remembers your cookie preferences</li>
                                            <li><strong>Authentication:</strong> Keeps you logged in to your account</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                        <h3 class="font-semibold text-slate-800 mb-3 flex items-center">
                                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            Functional Cookies
                                        </h3>
                                        <p class="text-sm mb-3">These cookies enhance your user experience by remembering your preferences and settings.</p>
                                        <ul class="text-sm space-y-1 ml-4 list-disc list-inside">
                                            <li><strong>Language Preference:</strong> Remembers your preferred language selection</li>
                                            <li><strong>Theme Settings:</strong> Stores your interface preferences (if applicable)</li>
                                            <li><strong>Test Preferences:</strong> Remembers your assessment display preferences</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                        <h3 class="font-semibold text-slate-800 mb-3 flex items-center">
                                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                            </svg>
                                            Analytics and Performance Cookies
                                        </h3>
                                        <p class="text-sm mb-3">These cookies help us understand how visitors interact with our website by collecting anonymous statistical information.</p>
                                        <ul class="text-sm space-y-1 ml-4 list-disc list-inside">
                                            <li><strong>Google Analytics:</strong> Tracks website usage patterns, popular pages, and user flows (when implemented)</li>
                                            <li><strong>Performance Monitoring:</strong> Helps us identify and fix technical issues</li>
                                            <li><strong>User Experience Analytics:</strong> Provides insights to improve our services</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="bg-purple-50 rounded-lg p-4 border border-purple-200">
                                        <h3 class="font-semibold text-slate-800 mb-3 flex items-center">
                                            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                            </svg>
                                            Third-Party Cookies
                                        </h3>
                                        <p class="text-sm mb-3">Third-party services we use may place their own cookies on your device. These cookies are controlled by the respective third-party services and subject to their own privacy policies.</p>
                                        <ul class="text-sm space-y-2 ml-4 list-disc list-inside">
                                            <li><strong>Google reCAPTCHA:</strong> Used for spam and bot detection to protect our forms and ensure security. Cookies are used for fraud prevention and abuse detection.</li>
                                            <li><strong>Google Sign-In:</strong> Enables single sign-on functionality when you choose to log in with your Google account. Google may place cookies for authentication and account management.</li>
                                            <li><strong>Paddle Payment System:</strong> Our payment processor may place cookies for payment processing, fraud detection, and transaction security when you make purchases.</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="bg-amber-50 p-4 rounded-lg border border-amber-200">
                                    <h4 class="font-semibold text-slate-800 mb-2">Managing Your Cookie Preferences</h4>
                                    <p class="text-sm mb-2">
                                        You have control over cookies through several methods:
                                    </p>
                                    <ul class="text-sm space-y-1 ml-4 list-disc list-inside">
                                        <li><strong>Cookie Banner:</strong> Use our cookie consent banner to manage your preferences</li>
                                        <li><strong>Browser Settings:</strong> Configure your browser to block or delete cookies</li>
                                        <li><strong>Third-Party Opt-Outs:</strong> Visit third-party websites to manage their cookies directly</li>
                                    </ul>
                                    <p class="text-sm mt-2 text-amber-800">
                                        <strong>Note:</strong> Disabling certain cookies may affect the functionality of our website and your user experience.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Children's Privacy -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Children's Privacy</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    Our services are not intended for children under the age of 16. We do not knowingly collect personal information from children under 16.
                                </p>
                                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg p-4 border border-yellow-200">
                                    <p class="text-sm">
                                        <strong>If you are a parent or guardian</strong> and believe your child has provided us with personal information, please contact us immediately so we can delete such information from our systems.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Changes to This Policy -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-12 border border-slate-200/80">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3">Changes to This Privacy Policy</h2>
                            <div class="space-y-4 text-slate-600">
                                <p class="leading-relaxed">
                                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.
                                </p>
                                <div class="bg-slate-50 rounded-lg p-4">
                                    <h3 class="font-semibold text-slate-800 mb-2">How We Notify You</h3>
                                    <ul class="text-sm space-y-1">
                                        <li>• Email notification for significant changes</li>
                                        <li>• Website banner for policy updates</li>
                                        <li>• Updated timestamp on this page</li>
                                    </ul>
                                </div>
                                <p class="text-sm">
                                    Your continued use of our services after any changes indicates your acceptance of the updated Privacy Policy.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-gradient-to-br from-mindmetrics-indigo to-indigo-700 rounded-2xl shadow-xl p-8 md:p-12 mb-12 text-white">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center justify-center w-12 h-12 bg-white/20 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold mb-3">Contact Us</h2>
                            <div class="space-y-4">
                                <p class="leading-relaxed opacity-90">
                                    If you have any questions about this Privacy Policy or our privacy practices, please don't hesitate to contact us.
                                </p>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            Email
                                        </h3>
                                        <a href="mailto:privacy@cognifywork.com" class="text-white/90 hover:text-white underline">
                                            privacy@cognifywork.com
                                        </a>
                                    </div>
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <h3 class="font-semibold mb-2 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Response Time
                                        </h3>
                                        <p class="text-white/90">Within 24-48 hours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
