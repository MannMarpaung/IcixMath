<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>level</title>
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
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body>
    <!-- Navbar -->
    @include('layouts.frontend.include.navbar')

    @foreach ($levels as $level)
        <div class="w-full h-12" id="level{{ $level->id }}"></div>
        <section class="bg-white rounded-lg shadow-lg p-6 max-w-lg mx-auto">
            <div class="mb-4">
                <h2 class="text-2xl font-bold">Level {{ $level->level }}: {{ $level->name }}</h2>
            </div>

            <!-- List of Topics -->
            <div class="space-y-8 relative">

                @foreach ($level->lessons as $lesson)
                    <!-- Lesson -->
                    <a href="{{ route('user.lessonDetail', [$level->id, $lesson->slug]) }}"
                        class="flex items-center relative">
                        <div class="relative z-10">
                            <img src="{{ $lesson->image ? url('storage/lesson', $lesson->image) : 'https://via.placeholder.com/60' }}"
                                alt="{{ $lesson->title }} Lesson"
                                class="w-14 h-14 rounded-full border-4 border-blue-500">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold">{{ $lesson->title }}</h3>
                        </div>
                    </a>
                @endforeach

            </div>


        </section>
    @endforeach

</body>

</html>
