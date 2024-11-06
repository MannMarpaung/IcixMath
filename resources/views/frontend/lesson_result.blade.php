<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Result</title>
    {{-- Icon --}}
    <link rel="icon" href="{{ asset('frontend/images/IcixBox.png') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                        customColor: '#efeef3',
                    },
                    backgroundImage: {
                        'space-pattern': "url('https://images.unsplash.com/photo-1544045776-1d0d038d8ec4')",
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1544045776-1d0d038d8ec4') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-cover bg-center bg-fixed bg-space-pattern text-gray-800">
    <!-- Lesson Result Section -->
    <section class="flex justify-center items-center min-h-screen px-4">
        <div class="bg-white bg-opacity-90 p-8 md:p-10 rounded-lg shadow-lg w-full sm:w-10/12 md:w-8/12 lg:w-7/12 xl:w-6/12 2xl:w-5/12 max-w-4xl">
            <h1 class="text-4xl font-extrabold text-blue-700 mb-8 text-center">Lesson Result</h1>
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800">Lesson Title:</h2>
                <p class="text-lg text-gray-600 mt-1">Introduction to Space Science</p>
                <p class="text-gray-500 mt-2">Date: October 24, 2024</p>
            </div>
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800">Score:</h2>
                <p class="text-5xl font-extrabold text-blue-600 mt-2">{{ $user_quiz->score }}</p>
            </div>
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800">Feedback:</h2>
                <p class="text-gray-600 mt-2">Great job! You have a good understanding of the material. Keep up the good work!</p>
            </div>
            <div class="flex justify-evenly items-center mb-6">
                <button class="bg-blue-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg hover:bg-blue-800 transition duration-300 transform hover:scale-105">
                    Try Again
                </button>
                <a href="{{ route('user.levels') }}" class="text-gray-700 font-semibold hover:underline transition duration-300">
                    Back to Levels
                </a>
            </div>
        </div>
    </section>
</body>

</html>
