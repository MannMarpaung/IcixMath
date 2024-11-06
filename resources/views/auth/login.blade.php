<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    {{-- Icon --}}
    <link rel="icon" href="{{ asset('frontend/images/IcixBox.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- Gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* Animasi roket */
        .rocket {
            position: absolute;
            bottom: -100px;
            left: 50%;
            transform: translateX(-50%);
            animation: fly-up 2s forwards;
        }

        @keyframes fly-up {
            0% {
                bottom: -100px;
                opacity: 1;
            }

            50% {
                opacity: 1;
            }

            100% {
                bottom: 100%;
                opacity: 0;
            }
        }

        /* Animasi api */
        .animate-fire {
            animation: fireAnimation 0.3s infinite alternate;
        }

        /* Animasi api di bawah roket */
        @keyframes fireAnimation {
            0% {
                height: 40px;
                background-color: orange;
            }

            100% {
                height: 40px;
                background-color: red;
            }
        }

        /* Menambah efek smooth */
        #login-container {
            transition: opacity 1s ease-in-out;
            opacity: 0;
            padding: 20px;
            margin: 20px;
        }

        #login-container.show {
            opacity: 1;
        }

        /* Tooltip styling */
        .tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            /* Position the tooltip above the icon */
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        /* Falling Stars */
        .falling-stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            z-index: -2;
            perspective: 800px;
        }

        .star {
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 8px white;
            opacity: 0;
            transform: translateZ(0);
            clip-path: polygon(50% 0%,
                    61% 35%,
                    98% 35%,
                    68% 57%,
                    79% 91%,
                    50% 70%,
                    21% 91%,
                    32% 57%,
                    2% 35%,
                    39% 35%);
        }
    </style>
</head>

<body class="relative flex justify-center items-center min-h-screen bg-gradient-to-b from-blue-900 to-black text-white">

    <!-- Roket -->
    <div class="rocket absolute w-12 h-20 bg-gray-300 rounded-lg bottom-10 left-1/2 transform -translate-x-1/2 transition-transform duration-1000 ease-in-out animate-rocket-move hide-during-loading"
        id="rocket">
        <div class="w-8 h-12 bg-red-500 rounded-full absolute -top-6 left-1/2 transform -translate-x-1/2"></div>
        <div class="w-4 h-10 bg-orange-400 rounded-full absolute -bottom-5 left-1/2 transform -translate-x-1/2 animate-fire"
            id="rocket-fire"></div>
    </div>

    <!-- Falling Stars -->
    <div class="falling-stars"></div>


    <div class="bg-white shadow-lg rounded-lg flex flex-col items-center py-10 w-full max-w-md overflow-y-auto"
        id="login-container">

        <!-- Logo -->
        <div class="mb-6">
            <img src="{{ asset('frontend/images/IcixBox.png') }}" alt="SmartSave" class="mx-auto w-20 h-20">
        </div>

        <!-- Sign In / Sign Up Tabs -->
        <div class="flex flex-col items-center w-full max-w-xs">
            <div class="flex justify-between mb-6 w-full bg-gray-200 rounded-full p-1">
                <button id="signin-tab" class="w-1/2 bg-white py-2 rounded-full text-gray-800 font-semibold">Sign
                    In</button>
                <button id="signup-tab" class="w-1/2 py-2 text-gray-800 font-semibold rounded-full">Sign Up</button>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="w-full max-w-xs" id="login-form">
                @csrf
                <!-- Email Input -->
                <div class="mb-4">
                    <div class="flex items-center border border-gray-300 rounded-lg p-2">
                        <span class="p-1 bg-white">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </span>
                        <input id="email" type="email"
                            class="w-full pl-3 pr-3 py-2 outline-none text-gray-700 @error('email') border-red-500 @enderror"
                            name="email" required placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <div class="flex items-center border border-gray-300 rounded-lg p-2">
                        <span class="p-1 bg-white">
                            <i class="fas fa-lock text-gray-500"></i>
                        </span>
                        <input id="password" type="password"
                            class="w-full pl-3 pr-3 py-2 outline-none text-gray-700 @error('password') border-red-500 @enderror"
                            name="password" required placeholder="Password">
                        <button type="button" id="toggle-password" class="ml-2 text-gray-500 tooltip">
                            <i id="eye-icon" class="fas fa-eye"></i>
                            <span class="tooltiptext">Show Password</span>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center mb-4">
                    <input id="remember" type="checkbox" name="remember" class="mr-2"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="text-gray-700">Remember Me</label>
                </div>

                <!-- Forgot Password Link -->
                <div class="mb-6 text-right">
                    <a class="text-blue-500 hover:underline text-sm" href="{{ route('password.request') }}">Forgot Your
                        Password?</a>
                </div>

                <!-- Continue Button -->
                <div class="mb-6">
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold">
                        Continue
                        <span id="loading-spinner"
                            class="hidden spinner-border animate-spin inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full"></span>
                    </button>
                </div>

                <!-- Menampilkan pesan error umum -->
                @if ($errors->has('email') || $errors->has('password'))
                    <div class="mb-4">
                        <span class="text-red-500 text-sm">
                            {{ $errors->first('email') ?: $errors->first('password') }}
                        </span>
                    </div>
                @endif
            </form>

            <!-- Form Sign Up -->
            <form method="POST" action="{{ route('register') }}" class="w-full max-w-xs hidden" id="signup-form">
                @csrf
                <!-- Name Input -->
                <div class="mb-4">
                    <div class="flex items-center border border-gray-300 rounded-lg p-2">
                        <span class="p-1 bg-white">
                            <i class="fas fa-user text-gray-500"></i>
                        </span>
                        <input id="name" type="text"
                            class="w-full pl-3 pr-3 py-2 outline-none text-gray-700 @error('name') border-red-500 @enderror"
                            name="name" required placeholder="Full Name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="mb-4">
                    <div class="flex items-center border border-gray-300 rounded-lg p-2">
                        <span class="p-1 bg-white">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </span>
                        <input id="signup-email" type="email"
                            class="w-full pl-3 pr-3 py-2 outline-none text-gray-700 @error('email') border-red-500 @enderror"
                            name="email" required placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <div class="flex items-center border border-gray-300 rounded-lg p-2">
                        <span class="p-1 bg-white">
                            <i class="fas fa-lock text-gray-500"></i>
                        </span>
                        <input id="signup-password" type="password"
                            class="w-full pl-3 pr-3 py-2 outline-none text-gray-700 @error('password') border-red-500 @enderror"
                            name="password" required placeholder="Password">
                        <button type="button" id="toggle-signup-password" class="ml-2 text-gray-500 tooltip">
                            <i id="signup-eye-icon" class="fas fa-eye"></i>
                            <span class="tooltiptext">Show Password</span>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <div class="flex items-center border border-gray-300 rounded-lg p-2">
                        <span class="p-1 bg-white">
                            <i class="fas fa-lock text-gray-500"></i>
                        </span>
                        <input id="password-confirm" type="password"
                            class="w-full pl-3 pr-3 py-2 outline-none text-gray-700" name="password_confirmation"
                            required placeholder="Confirm Password">
                    </div>
                </div>

                <!-- Continue Button -->
                <div class="mb-6">
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold">
                        Sign Up
                    </button>
                </div>

                <!-- Menampilkan pesan error umum -->
                @if ($errors->has('name') || $errors->has('email') || $errors->has('password'))
                    <div class="mb-4">
                        <span class="text-red-500 text-sm">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </span>
                    </div>
                @endif
            </form>

            <!-- Social Login -->
            <div class="mb-4">
                <span class="text-gray-600">Or sign in with</span>
            </div>
            <div class="flex justify-around w-full">
                <div class="tooltip">
                    <a href="{{ url('/auth/facebook') }}">
                        <i class="fab fa-facebook-f bg-blue-600 p-2 rounded-full cursor-pointer"></i>
                        <span class="tooltiptext">Facebook</span>
                    </a>
                </div>
                <div class="tooltip">
                    <a href="{{ url('/auth/google') }}">
                        <i class="fab fa-google bg-red-600 p-2 rounded-full cursor-pointer"></i>
                        <span class="tooltiptext">Google</span>
                    </a>
                </div>
                <div class="tooltip">
                    <a href="{{ url('/auth/github') }}">
                        <i class="fab fa-github bg-gray-800 p-2 rounded-full cursor-pointer"></i>
                        <span class="tooltiptext">GitHub</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let starInterval; // Variabel untuk interval animasi bintang

        // Fungsi untuk mengganti tampilan form
        function toggleForm(isLogin) {
            const loginForm = document.getElementById('login-form');
            const signupForm = document.getElementById('signup-form');
            const signinTab = document.getElementById('signin-tab');
            const signupTab = document.getElementById('signup-tab');

            if (isLogin) {
                // Tampilkan form login, sembunyikan form signup
                loginForm.classList.remove('hidden');
                signupForm.classList.add('hidden');

                // Update tampilan tab menjadi aktif untuk login
                signinTab.classList.add('bg-white', 'text-black'); // Tab login aktif
                signinTab.classList.remove('text-gray-800');
                signupTab.classList.remove('bg-white', 'text-black'); // Tab signup tidak aktif
                signupTab.classList.add('text-gray-800');
            } else {
                // Tampilkan form signup, sembunyikan form login
                loginForm.classList.add('hidden');
                signupForm.classList.remove('hidden');

                // Update tampilan tab menjadi aktif untuk signup
                signupTab.classList.add('bg-white', 'text-black'); // Tab signup aktif
                signupTab.classList.remove('text-gray-800');
                signinTab.classList.remove('bg-white', 'text-black'); // Tab login tidak aktif
                signinTab.classList.add('text-gray-800');
            }
        }

        // Event listener untuk klik pada tab login
        document.getElementById('signin-tab').onclick = function() {
            toggleForm(true); // true berarti login form yang aktif
        };

        // Event listener untuk klik pada tab signup
        document.getElementById('signup-tab').onclick = function() {
            toggleForm(false); // false berarti signup form yang aktif
        };

        // Menampilkan dan menyembunyikan password
        const togglePassword = (inputId, iconId) => {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            const type = input.type === "password" ? "text" : "password";
            input.type = type;
            icon.classList.toggle("fa-eye-slash");
        };

        document.getElementById('toggle-password').onclick = function() {
            togglePassword('password', 'eye-icon');
        };

        document.getElementById('toggle-signup-password').onclick = function() {
            togglePassword('signup-password', 'signup-eye-icon');
        };

        // Menampilkan kontainer login
        setTimeout(() => {
            document.getElementById('login-container').classList.add('show');
        }, 1000);

        const createFallingStar = () => {
            const star = document.createElement('div');
            star.classList.add('star');
            document.querySelector('.falling-stars').appendChild(star);

            // Posisi awal bintang secara acak
            const startX = Math.random() * window.innerWidth;
            const startY = Math.random() * window.innerHeight / 2;
            const startZ = Math.random() * 400 - 200; // Tambahkan elemen Z untuk efek 3D

            // Tujuan akhir bintang secara acak (jatuh acak)
            const endX = startX + (Math.random() * 400 - 200);
            const endY = startY + 600 + Math.random() * 200; // Lebih panjang ke bawah
            const endZ = Math.random() * 300 - 150; // Variasi kedalaman Z

            const scale = Math.random() * 0.5 + 0.2; // Ukuran bintang bervariasi
            const rotate = Math.random() * 360; // Rotasi acak

            // Setel posisi awal bintang menggunakan GSAP
            gsap.set(star, {
                x: startX,
                y: startY,
                z: startZ,
                scale: scale,
                rotation: rotate,
                opacity: 1,
                transformOrigin: "50% 50%" // Pusat rotasi bintang
            });

            // Animasi bintang jatuh menggunakan GSAP
            gsap.to(star, {
                duration: Math.random() * 2 + 1.5, // Durasi bintang jatuh lebih bervariasi
                x: endX,
                y: endY,
                z: endZ,
                ease: "power2.out", // Efek easing untuk jatuh
                opacity: 0,
                rotation: rotate + 180, // Putaran saat jatuh
                onComplete: () => {
                    star.remove(); // Hapus bintang setelah jatuh
                }
            });
        };

        // Membuat bintang jatuh secara acak
        const generateStars = () => {
            const starCount = Math.floor(Math.random() * 5 + 3); // Jumlah bintang acak antara 3-8 setiap kali muncul
            for (let i = 0; i < starCount; i++) {
                createFallingStar();
            }
        };

        // Fungsi untuk memulai animasi bintang
        function startShootingStars() {
            starInterval = setInterval(generateStars, 400); // Bintang jatuh setiap 0.4 detik dengan jumlah acak
        }

        // Fungsi untuk menghentikan animasi bintang
        function stopShootingStars() {
            clearInterval(starInterval); // Hentikan interval bintang
        }

        // Event listener untuk mengatur animasi saat tab aktif atau tidak aktif
        document.addEventListener("visibilitychange", () => {
            if (document.hidden) {
                stopShootingStars(); // Hentikan animasi jika halaman tidak aktif
            } else {
                startShootingStars(); // Lanjutkan animasi jika halaman aktif
            }
        });

        // Mulai animasi bintang saat halaman dimuat
        startShootingStars();
    </script>

</body>

</html>
