@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg flex w-full max-w-4xl">
            <!-- Left Side - Form -->
            <div class="w-1/2 p-10">
                <div class="mb-8 text-center">
                    <img src="logo.png" alt="SmartSave" class="mx-auto w-16 h-16">
                    <h2 class="text-3xl font-bold mt-4">Create Your Account</h2>
                    <p class="text-gray-600 mt-2">Join us and start your journey</p>
                </div>


                <!-- Form Register Laravel -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <span class="p-3 bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </span>
                            <input id="name" type="text"
                                class="w-full px-3 py-2 outline-none border-b-2 border-gray-300 @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        @error('name')
                            <span class="invalid-feedback text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <span class="p-3 bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-at">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28" />
                                </svg>
                            </span>
                            <input id="email" type="email"
                                class="w-full px-3 py-2 outline-none @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        @error('email')
                            <span class="invalid-feedback text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <span class="p-3 bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                    <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                </svg>
                            </span>
                            <input id="password" type="password"
                                class="w-full px-3 py-2 outline-none @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                            <span class="p-3 cursor-pointer" onclick="togglePassword('password', 'toggle-password')">
                                <svg id="toggle-password" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-eye">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 -4 -5.333 -6 -10 -6s-7.333 2 -10 6c2.667 4 5.333 6 10 6s7.333 -2 10 -6" />
                                </svg>
                            </span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">Confirm
                            Password</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <span class="p-3 bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                    <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                </svg>
                            </span>
                            <input id="password-confirm" type="password" class="w-full px-3 py-2 outline-none"
                                name="password_confirmation" required autocomplete="new-password">
                            <span class="p-3 cursor-pointer"
                                onclick="togglePassword('password-confirm', 'toggle-confirm-password')">
                                <svg id="toggle-confirm-password" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icon-tabler-eye">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 -4 -5.333 -6 -10 -6s-7.333 2 -10 6c2.667 4 5.333 6 10 6s7.333 -2 10 -6" />
                                </svg>
                            </span>
                        </div>
                    </div>


                    <!-- Continue Button -->
                    <div class="mb-6">
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

                <!-- Social Login -->
                <div class="text-center mb-6">
                    <p class="text-gray-600">Or Continue With</p>
                    <div class="flex justify-center mt-4 space-x-4">
                        <button class="bg-white p-2 rounded-full shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                viewBox="0 0 48 48">
                                <path fill="#FFC107"
                                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                                </path>
                                <path fill="#FF3D00"
                                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                                </path>
                                <path fill="#4CAF50"
                                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                                </path>
                                <path fill="#1976D2"
                                    d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Footer Text -->
                <p class="text-sm text-gray-600 text-center">
                    Already have an account? <a href="{{ route('login') }}"
                        class="text-blue-500 hover:text-blue-700">Login here</a>.
                </p>
            </div>

            <!-- Right Side - Image -->
            <div class="w-1/2 bg-blue-50 flex items-center justify-center">
                <img src="signup-image.png" alt="Sign Up" class="w-3/4">
            </div>
        </div>
    </div>

    {{-- untuk js eye icon --}}
    <script>
        function togglePassword(passwordId, toggleIconId) {
            var passwordField = document.getElementById(passwordId);
            var toggleIcon = document.getElementById(toggleIconId);

            // Cek tipe input password
            if (passwordField.type === "password") {
                // Ubah menjadi text untuk menampilkan password
                passwordField.type = "text";

                // Ganti ikon menjadi mata tertutup
                toggleIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"/>
                <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"/>
                <path d="M3 3l18 18"/>
            </svg>
        `;
            } else {
                // Ubah kembali menjadi password untuk menyembunyikan
                passwordField.type = "password";

                // Ganti ikon menjadi mata terbuka
                toggleIcon.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
            </svg>
        `;
            }
        }
    </script>
@endsection
