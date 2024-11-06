<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                        customColor: '#efeef3',
                    }
                }
            }
        }
    </script>
    {{-- gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>ICIX Math</title>
    {{-- Icon --}}
    <link rel="icon" href="{{ asset('frontend/images/IcixBox.png') }}" type="image/x-icon">


</head>

<style>
        /* Animasi asteroid yang jatuh dari atas ke bawah */
        @keyframes fall {
            0% {
                transform: translateY(-100vh);
            }

            100% {
                transform: translateY(100vh);
            }
        }

        /* Animasi planet yang mengambang */
        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
                /* Meningkatkan gerakan */
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Animasi roket saat lepas landas */
        @keyframes rocketTakeoff {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            100% {
                transform: translateY(-150vh) rotate(-45deg);
            }
        }

        /* Animasi api di bawah roket */
        @keyframes fireAnimation {
            0% {
                height: 40px;
                background-color: orange;
            }

            100% {
                height: 60px;
                background-color: red;
            }
        }

        /* Animasi untuk membuat roket bergerak maju mundur */
        @keyframes rocketMove {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-30px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .rocket {
            perspective: 1000px;
            transform: rotate3d(1, 1, 0, 10deg);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        /* Kelas untuk memulai animasi lepas landas */
        .animate-rocket-takeoff {
            animation: rocketTakeoff 2s ease-in-out forwards;
        }

        /* Kelas untuk memulai animasi maju mundur */
        .animate-rocket-move {
            animation: rocketMove 1s ease-in-out infinite;
        }

        /* Gaya untuk asteroid yang jatuh */
        .box {
            position: absolute;
            border-radius: 50%;
            animation: fall linear infinite;
        }

        /* Gaya untuk asteroid kecil */
        .box.small {
            width: 30px;
            height: 30px;
            background-color: #f5c542;
            animation-duration: 5s;
            transform: rotate3d(1, 1, 1, 45deg);
        }

        /* Gaya untuk asteroid sedang */
        .box.medium {
            width: 50px;
            height: 50px;
            background-color: #ff69b4;
            animation-duration: 6s;
            transform: rotate3d(1, 1, 1, 45deg);
        }

        /* Gaya untuk asteroid besar */
        .box.large {
            width: 70px;
            height: 70px;
            background-color: #32cd32;
            animation-duration: 7s;
            transform: rotate3d(1, 1, 1, 45deg);
        }

        /* Gaya untuk animasi api di bawah roket */
        .animate-fire {
            animation: fireAnimation 0.3s infinite alternate;
            box-shadow: 0 0 20px rgba(255, 165, 0, 0.7), 0 0 30px rgba(255, 69, 0, 0.6);
        }

        /* Sembunyikan elemen yang tidak diinginkan selama loading */
        .hide-during-loading {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .show-content {
            opacity: 1;
        }

        /* Background luar angkasa */
        body {
            background: radial-gradient(circle at 50% 50%, rgba(0, 0, 50, 0.8), rgba(0, 0, 20, 1)), url('path-to-your-space-image.jpg') no-repeat center center/cover;
            perspective: 1500px;
        }

        /* Planet mengambang */
        .planet {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.8), inset 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .planet1 {
            width: 100px;
            height: 100px;
            background-color: rgba(200, 50, 50, 0.9);
            position: absolute;
            top: 10%;
            left: 10%;
        }

        .planet2 {
            width: 80px;
            height: 80px;
            background-color: rgba(50, 200, 200, 0.9);
            position: absolute;
            top: 30%;
            right: 15%;
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

    <!-- Lottie player script -->
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</head>

<body
    class="relative flex justify-center items-center min-h-screen bg-gradient-to-b from-blue-900 to-black text-white overflow-hidden">
    <!-- Planet yang mengambang -->
    <div class="planet planet1 hide-during-loading"></div>
    <div class="planet planet2 hide-during-loading"></div>


    <!-- Roket -->
    <div class="rocket absolute w-12 h-20 bg-gray-300 rounded-lg bottom-10 left-1/2 transform -translate-x-1/2 transition-transform duration-1000 ease-in-out animate-rocket-move hide-during-loading"
        id="rocket">
        <div class="w-8 h-12 bg-red-500 rounded-full absolute -top-6 left-1/2 transform -translate-x-1/2"></div>
        <div class="w-4 h-10 bg-orange-400 rounded-full absolute -bottom-5 left-1/2 transform -translate-x-1/2 animate-fire"
            id="rocket-fire"></div>
        <div
            class="w-2 h-4 bg-yellow-400 rounded-full absolute -bottom-10 left-1/2 transform -translate-x-1/2 animate-fire">
        </div>
        <div class="absolute w-4 h-4 bg-yellow-300 rounded-full bottom-5 left-1/2 transform -translate-x-1/2 rotate-45">
        </div>
    </div>

    <!-- Asteroid -->
    <div class="box small hide-during-loading"></div>
    <div class="box medium hide-during-loading"></div>
    <div class="box large hide-during-loading"></div>
    <div class="box small hide-during-loading"></div>
    <div class="box medium hide-during-loading"></div>

    <!-- Falling Stars -->
    <div class="falling-stars"></div>

    <!-- Layar loading -->
    <div class="loading absolute inset-0 flex justify-center items-center z-20" id="loading-text">
        <dotlottie-player src="https://lottie.host/56e82c33-defd-4e86-8317-1d9f68b0b436/lrUErwemBU.json"
            background="transparent" speed="1" style="width: 300px; height: 300px;" loop
            autoplay></dotlottie-player>
    </div>

    <!-- Konten utama -->
    <div class="content text-center hidden z-30" id="main-content">
        <h1 class="text-4xl font-bold mb-4">WELCOME TO ICIX MATH</h1>
        <p class="text-lg max-w-md mx-auto mb-6">
            ICIX Math, dikembangkan oleh ICIX BOX Team, adalah game edukasi yang membuat belajar Matematika menjadi
            menyenangkan dan interaktif untuk pelajar. </p>
        <div>
            <a href="#"
                class="px-6 py-3 bg-pink-500 text-white text-lg rounded shadow-lg hover:bg-pink-600 transition duration-300"
                id="get-started-btn">GET STARTED</a>
        </div>
    </div>

    <script>
        let starInterval; // Variabel untuk interval animasi bintang

        // Ketika halaman selesai dimuat
        window.addEventListener("load", () => {
            setTimeout(() => {
                const loadingText = document.getElementById("loading-text");
                const mainContent = document.getElementById("main-content");
                const elementsToHide = document.querySelectorAll('.hide-during-loading');

                // Sembunyikan layar loading dan tampilkan konten utama
                loadingText.style.display = "none";
                mainContent.style.display = "block";

                // Tampilkan elemen-elemen yang disembunyikan
                elementsToHide.forEach(el => {
                    el.classList.add('show-content');
                });

                // Mulai animasi bintang setelah loading selesai
                startShootingStars();

            }, 3000); // Tampilkan konten setelah loading selesai selama 3 detik
        });

        // Fungsi untuk menjalankan animasi bintang jatuh menggunakan GSAP
        function startShootingStars() {
            const createFallingStar = () => {
                const star = document.createElement('div');
                star.classList.add('star');
                document.querySelector('.falling-stars').appendChild(star);

                // Posisi awal bintang secara acak
                const startX = Math.random() * window.innerWidth;
                const startY = Math.random() * window.innerHeight / 2;
                const startZ = Math.random() * 400 - 200; // Elemen Z untuk efek 3D

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
                    transformOrigin: "50% 50%"
                });

                // Animasi bintang jatuh menggunakan GSAP
                gsap.to(star, {
                    duration: Math.random() * 2 + 1.5, // Durasi jatuh bervariasi
                    x: endX,
                    y: endY,
                    z: endZ,
                    ease: "power2.out",
                    opacity: 0,
                    rotation: rotate + 180, // Putaran saat jatuh
                    onComplete: () => {
                        star.remove(); // Hapus bintang setelah jatuh
                    }
                });
            };

            // Membuat bintang jatuh secara acak
            const generateStars = () => {
                const starCount = Math.floor(Math.random() * 5 + 3); // Jumlah acak 3-8 bintang setiap kali
                for (let i = 0; i < starCount; i++) {
                    createFallingStar();
                }
            };

            // Interval acak untuk bintang jatuh
            starInterval = setInterval(generateStars, 1500); // Bintang jatuh setiap 1.5 detik
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

        // Ketika tombol "GET STARTED" ditekan
        document.getElementById('get-started-btn').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah tindakan default dari link

            const rocket = document.getElementById('rocket');

            // Tambahkan animasi lepas landas ke roket
            rocket.classList.add('animate-rocket-takeoff');

            // Hentikan animasi maju mundur roket sebelum lepas landas
            rocket.classList.remove('animate-rocket-move');

            // Pindah ke halaman berikutnya setelah animasi selesai
            setTimeout(() => {
                window.location.href = 'login';
            }, 2000); // Sesuaikan waktu dengan durasi animasi
        });

        // Mengatur posisi acak untuk asteroid
        const boxes = document.querySelectorAll('.box');

        // Fungsi untuk menghasilkan posisi acak
        function randomPosition(min, max) {
            return Math.random() * (max - min) + min; // Menghasilkan angka acak antara min dan max
        }

        // Menetapkan posisi acak dan delay untuk setiap asteroid
        boxes.forEach(box => {
            const xPosition = randomPosition(0, window.innerWidth - box.clientWidth);
            const delay = randomPosition(0, 3);

            // Atur posisi horizontal asteroid
            box.style.left = `${xPosition}px`;

            // Atur delay animasi asteroid
            box.style.animationDelay = `${delay}s`;
        });

        // Menggunakan GSAP untuk animasi planet
        gsap.to(".planet1", {
            y: -20,
            repeat: -1,
            yoyo: true,
            duration: 2,
            ease: "sine.inOut"
        });

        gsap.to(".planet2", {
            y: -30,
            repeat: -1,
            yoyo: true,
            duration: 3,
            ease: "sine.inOut"
        });
    </script>


</body>

</html>