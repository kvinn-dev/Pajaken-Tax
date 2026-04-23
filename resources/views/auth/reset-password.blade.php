<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- LEFT SIDE - ILLUSTRATION -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-gradient-to-br from-violet-600 via-purple-600 to-fuchsia-700">
            <!-- Decorative Shapes -->
            <div class="absolute top-0 left-0 w-96 h-96 -translate-x-1/2 -translate-y-1/2">
                <div class="w-full h-full bg-white/10 rounded-full blur-3xl"></div>
            </div>
            <div class="absolute bottom-0 right-0 w-80 h-80 translate-x-1/3 translate-y-1/3">
                <div class="w-full h-full bg-white/10 rounded-full blur-3xl"></div>
            </div>
            <div class="absolute top-1/3 right-1/4 w-64 h-64">
                <div class="w-full h-full bg-white/5 rounded-full blur-2xl"></div>
            </div>

            <!-- Grid Pattern Overlay -->
            <div class="absolute inset-0 opacity-10">
                <div class="h-full w-full" style="background-image: radial-gradient(circle, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 30px 30px;"></div>
            </div>

            <!-- Content -->
            <div class="relative flex flex-col justify-center px-12 lg:px-20 w-full text-white">
                <!-- Logo -->
                <div class="mb-12">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold tracking-tight">Pajaken</span>
                    </div>
                </div>

                <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6">
                    Buat Kata Sandi
                    <span class="block text-white/80">Baru yang Lebih Kuat</span>
                </h1>
                
                <p class="text-lg text-white/70 leading-relaxed mb-10 max-w-md">
                    Hampir selesai! Buat kata sandi baru untuk akun Anda. Pastikan kata sandi yang kuat dan mudah diingat.
                </p>

                <!-- Password Tips -->
                <div class="space-y-3 mb-10">
                    <h3 class="text-sm font-semibold text-white/90 uppercase tracking-wider mb-4">Kata Sandi yang Kuat:</h3>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-white/80">Minimal 8 karakter</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-white/80">Gunakan huruf besar & kecil</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-white/80">Tambahkan angka & simbol</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-white/80">Hindari info pribadi</span>
                    </div>
                </div>

                <!-- Floating Elements -->
                <div class="absolute bottom-20 left-20 w-20 h-20 bg-white/10 rounded-2xl backdrop-blur-sm flex items-center justify-center animate-float-slow">
                    <svg class="w-8 h-8 text-white/60" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                <div class="absolute top-1/4 right-16 w-14 h-14 bg-white/10 rounded-xl backdrop-blur-sm flex items-center justify-center animate-float-slow" style="animation-delay: 2s;">
                    <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE - FORM -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12 bg-white">
            <div class="w-full max-w-md">
                <!-- Mobile Logo (Visible only on mobile) -->
                <div class="lg:hidden text-center mb-8">
                    <div class="inline-flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-violet-600 to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">Pajaken</span>
                    </div>
                </div>

                <!-- Header -->
                <div class="text-center lg:text-left mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Reset Kata Sandi</h2>
                    <p class="mt-2 text-gray-500">
                        Buat kata sandi baru untuk akun Anda
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email Display Card -->
                <div class="mb-6 p-4 bg-violet-50 border border-violet-200 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-violet-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-violet-600 font-medium">Mereset password untuk</p>
                            <p class="text-sm font-semibold text-gray-900">{{ old('email', $request->email) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Reset Password Form -->
                <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address (Hidden) -->
                    <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Kata Sandi Baru
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                placeholder="Minimal 8 karakter"
                                class="block w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50/50 hover:bg-gray-50"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password', 'eyeIcon1')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <svg id="eyeIcon1" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Password Strength Indicator -->
                        <div class="mt-2 flex gap-1">
                            <div class="h-1 flex-1 rounded-full bg-gray-200 password-strength-bar" data-level="1"></div>
                            <div class="h-1 flex-1 rounded-full bg-gray-200 password-strength-bar" data-level="2"></div>
                            <div class="h-1 flex-1 rounded-full bg-gray-200 password-strength-bar" data-level="3"></div>
                            <div class="h-1 flex-1 rounded-full bg-gray-200 password-strength-bar" data-level="4"></div>
                        </div>
                        <p class="mt-1 text-xs text-gray-400" id="passwordStrengthText">Masukkan kata sandi baru</p>
                        
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Konfirmasi Kata Sandi Baru
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input 
                                id="password_confirmation" 
                                type="password" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Ulangi kata sandi baru"
                                class="block w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50/50 hover:bg-gray-50"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password_confirmation', 'eyeIcon2')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <svg id="eyeIcon2" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Password Match Indicator -->
                        <p class="mt-1 text-xs text-gray-400" id="passwordMatchText">Konfirmasi kata sandi baru</p>
                        
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-violet-600 to-purple-600 text-white py-3.5 px-4 rounded-xl font-semibold hover:from-violet-700 hover:to-purple-700 focus:ring-4 focus:ring-violet-200 transition-all duration-200 transform hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                        Reset Kata Sandi
                    </button>
                </form>

                <!-- Back to Login -->
                <div class="mt-8 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke halaman masuk
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle password visibility
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }

        // Password strength checker
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const strengthBars = document.querySelectorAll('.password-strength-bar');
            const strengthText = document.getElementById('passwordStrengthText');
            const matchText = document.getElementById('passwordMatchText');

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                if (password.length >= 8) strength++;
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
                if (password.match(/[0-9]/)) strength++;
                if (password.match(/[^a-zA-Z0-9]/)) strength++;

                // Update bars
                strengthBars.forEach((bar, index) => {
                    bar.classList.remove('bg-gray-200', 'bg-red-400', 'bg-orange-400', 'bg-yellow-400', 'bg-green-400', 'bg-violet-500');
                    
                    if (index < strength) {
                        if (strength === 1) bar.classList.add('bg-red-400');
                        else if (strength === 2) bar.classList.add('bg-orange-400');
                        else if (strength === 3) bar.classList.add('bg-yellow-400');
                        else bar.classList.add('bg-green-400');
                    } else {
                        bar.classList.add('bg-gray-200');
                    }
                });

                // Update text
                const messages = [
                    'Masukkan kata sandi baru',
                    'Lemah - Tambahkan huruf besar & angka',
                    'Cukup - Tambahkan simbol',
                    'Kuat - Hampir sempurna',
                    'Sangat Kuat - Kata sandi aman!'
                ];
                
                if (password.length === 0) {
                    strengthText.textContent = messages[0];
                    strengthText.className = 'mt-1 text-xs text-gray-400';
                } else {
                    strengthText.textContent = messages[strength];
                    const colors = ['text-gray-400', 'text-red-500', 'text-orange-500', 'text-yellow-600', 'text-green-500'];
                    strengthText.className = `mt-1 text-xs font-medium ${colors[strength]}`;
                }

                // Check match
                checkPasswordMatch();
            });

            confirmInput.addEventListener('input', checkPasswordMatch);

            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirm = confirmInput.value;

                if (confirm.length === 0) {
                    matchText.textContent = 'Konfirmasi kata sandi baru';
                    matchText.className = 'mt-1 text-xs text-gray-400';
                } else if (password === confirm) {
                    matchText.innerHTML = '<span class="inline-flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>Kata sandi cocok</span>';
                    matchText.className = 'mt-1 text-xs font-medium text-green-500';
                } else {
                    matchText.innerHTML = '<span class="inline-flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>Kata sandi tidak cocok</span>';
                    matchText.className = 'mt-1 text-xs font-medium text-red-500';
                }
            }
        });
    </script>
</x-guest-layout>