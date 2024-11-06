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
            <h1 class="text-4xl font-bold text-blue-600 mb-6">Lesson Quiz</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Level {{ $level->level }} - {{ $lesson->title }} - Quiz</h2>

            <!-- Formulir Quiz -->
            <form action="{{ route('user.quiz.store', [$level->id, $lesson->slug]) }}" method="post"
                enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('POST')

                @foreach ($lesson->questions as $question)
                    <div class="mb-6">
                        <p class="text-xl font-semibold text-gray-800">{{ $loop->iteration }}. {{ $question->question }}
                        </p>

                        <!-- Pilihan Jawaban  -->
                        <fieldset class="mt-4 flex">
                            <legend class="sr-only">Pilih Jawaban</legend>
                            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 justify-center">
                                <div class="answer-box flex gap-2">
                                    @foreach ($question->answers->shuffle() as $answer)
                                        <div class="flex items-center">
                                            <!-- Menggabungkan $question->id dengan $loop->iteration untuk id yang unik -->
                                            <input type="radio" name="{{ $question->id }}_question"
                                                id="answer_{{ $question->id }}_{{ $loop->iteration }}"
                                                value="{{ $answer->status }}" class="hidden peer">
                                            <label for="answer_{{ $question->id }}_{{ $loop->iteration }}"
                                                class="block w-full p-4 border border-gray-300 rounded cursor-pointer bg-white hover:bg-gray-50 peer-checked:bg-blue-100 peer-checked:border-blue-500">
                                                {{ $answer->answer }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </fieldset>
                    </div>
                @endforeach

                <!-- Tombol Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Submit
                </button>
            </form>

        </div>
    </section>
</body>

</html>
