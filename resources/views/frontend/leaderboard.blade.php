<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leaderboard</title>

    {{-- Icon --}}
    <link rel="icon" href="{{ asset('frontend/images/IcixBox.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    @include('layouts.frontend.include.navbar')

    <!-- Leaderboard Section -->
    <div class="mt-16 px-4">
        <div class="text-center max-w-5xl mx-auto p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-8">LEADERBOARD</h1>

            <!-- Top 3 Players Section -->
            <div class="flex justify-around items-center mb-8">
                @php
                    $firstPlace = $topThreeUsers[0] ?? null; // Menyimpan ranking 1
                    $secondPlace = $topThreeUsers[1] ?? null; // Menyimpan ranking 2
                    $thirdPlace = $topThreeUsers[2] ?? null; // Menyimpan ranking 3
                @endphp

                <!-- 2nd Place -->
                @if ($secondPlace)
                    <div class="text-center">
                        <div class="bg-gray-200 rounded-full p-2 mb-2 inline-block">
                            <img src="{{ $secondPlace->image ? url('storage/user/' . $secondPlace->image) : 'https://ui-avatars.com/api/?name=' . urlencode($secondPlace->name) . '&background=random' }}"
                                alt="Player 2" class="rounded-full w-16 h-16">
                        </div>
                        <p class="font-bold text-lg text-gray-800">2<sup>nd</sup></p>
                        <p class="font-bold text-gray-700">{{ $secondPlace->name }}</p>
                        <p class="text-lg text-gray-600">{{ $secondPlace->total_score }}</p>
                    </div>
                @endif

                <!-- 1st Place -->
                @if ($firstPlace)
                    <div class="text-center">
                        <div class="bg-gray-200 rounded-full p-2 mb-2 inline-block">
                            <img src="{{ $firstPlace->image ? url('storage/user/' . $firstPlace->image) : 'https://ui-avatars.com/api/?name=' . urlencode($firstPlace->name) . '&background=random' }}"
                                alt="Player 1" class="rounded-full w-20 h-20">
                        </div>
                        <p class="text-yellow-500 font-bold text-3xl">1<sup>st</sup> <span
                                class="inline-block">🏆</span>
                        </p>
                        <p class="font-bold text-xl text-gray-700">{{ $firstPlace->name }}</p>
                        <p class="text-2xl text-gray-600">{{ $firstPlace->total_score }}</p>
                    </div>
                @endif

                <!-- 3rd Place -->
                @if ($thirdPlace)
                    <div class="text-center">
                        <div class="bg-gray-200 rounded-full p-2 mb-2 inline-block">
                            <img src="{{ $thirdPlace->image ? url('storage/user/' . $thirdPlace->image) : 'https://ui-avatars.com/api/?name=' . urlencode($thirdPlace->name) . '&background=random' }}"
                                alt="Player 3" class="rounded-full w-16 h-16">
                        </div>
                        <p class="font-bold text-lg text-gray-800">3<sup>rd</sup></p>
                        <p class="font-bold text-gray-700">{{ $thirdPlace->name }}</p>
                        <p class="text-lg text-gray-600">{{ $thirdPlace->total_score }}</p>
                    </div>
                @endif
            </div>

            <!-- Other Rankings in 3-Column Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($nextUsers as $index => $user)
                    @php
                        // Menentukan posisi berdasarkan index, mulai dari 4
                        $rank = $index + 4;

                        // Menentukan akhiran yang sesuai untuk peringkat
                        if ($rank % 100 >= 11 && $rank % 100 <= 13) {
                            $suffix = 'th'; // 11th, 12th, 13th
                        } else {
                            switch ($rank % 10) {
                                case 1:
                                    $suffix = 'st'; // 1st
                                    break;
                                case 2:
                                    $suffix = 'nd'; // 2nd
                                    break;
                                case 3:
                                    $suffix = 'rd'; // 3rd
                                    break;
                                default:
                                    $suffix = 'th'; // 4th, 5th, 6th, ...
                                    break;
                            }
                        }
                    @endphp

                    <div
                        class="flex items-center justify-between rounded-lg px-4 py-2 {{ $user->id == Auth::user()->id ? 'border-4 border-blue-500 bg-blue-100' : 'bg-gray-100' }}">
                        <div class="flex items-center">
                            <img src="{{ $user->image ? url('storage/user/' . $user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random' }}"
                                alt="Player {{ $rank }}" class="rounded-full w-10 h-10 mr-3">
                            <p class="font-bold text-gray-700">{{ $rank }}<sup
                                    class="z-0">{{ $suffix }}</sup>
                                {{ $user->name }}</p>
                        </div>
                        <p class="text-gray-600">{{ $user->total_score }}</p>

                    </div>

                @endforeach

                
            </div>

        </div>
    </div>

</body>

</html>
