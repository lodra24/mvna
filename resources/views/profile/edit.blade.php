<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-mindmetrics-indigo to-indigo-600 rounded-full mr-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">
                        {{ __('Profile Settings') }}
                    </h2>
                    <p class="text-slate-600 text-sm mt-1">
                        Manage your account settings and preferences
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 geometric-grid min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Information Card -->
            <div class="bg-white shadow-lg rounded-xl border border-slate-200 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-slate-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-blue-800">Profile Information</h3>
                            <p class="text-blue-600 text-sm">Update your account details</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Update Card -->
            <div class="bg-white shadow-lg rounded-xl border border-slate-200 overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-slate-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-green-800">Password Security</h3>
                            <p class="text-green-600 text-sm">Keep your account secure</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Danger Zone Card -->
            <div class="bg-white shadow-lg rounded-xl border border-red-200 overflow-hidden">
                <div class="bg-gradient-to-r from-red-50 to-rose-50 px-6 py-4 border-b border-red-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-red-800">Danger Zone</h3>
                            <p class="text-red-600 text-sm">Permanently delete your account</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
