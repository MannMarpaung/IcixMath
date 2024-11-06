<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson - Q-Bee</title>
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
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    <!-- Lesson Content -->
    <section class="py-12">
        <div class="container mx-auto px-6 md:px-32">
            <!-- Judul Halaman -->
            <h1 class="text-4xl font-bold text-blue-600 mb-6">Lesson Detail</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Level {{ $lesson->levels->level }} -
                {{ $lesson->title }}</h2>

            <!-- Konten Pelajaran -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <p class="text-gray-700">{{ $lesson->content }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b border-gray-300 pb-2">History Quiz</h2>
            
                @forelse ($userQuiz as $item)
                    <div class="flex justify-between items-center border-b border-gray-200 py-4">
                        <p class="text-lg">
                            <span class="font-semibold text-gray-700">{{ $loop->iteration }}.</span> Anda
                            <span class="font-bold {{ $item->is_completed ? 'text-green-500' : 'text-red-500' }}">
                                {{ $item->is_completed ? 'Lulus' : 'Tidak lulus' }}</span>
                            dengan score <span class="font-semibold text-gray-600">{{ $item->score }}</span>
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                @empty
                    <p class="text-center text-gray-500 mt-4">Anda belum mengerjakan quiz</p>
                @endforelse
            </div>            

            <!-- Tombol Submit -->
            <form action="{{ route('user.lessonQuiz', [$level->id, $lesson->slug]) }}">
                <button
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Start Quiz
                </button>
            </form>


        </div>
    </section>
</body>

</html>
