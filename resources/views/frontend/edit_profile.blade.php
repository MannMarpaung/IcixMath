<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1544045776-1d0d038d8ec4') no-repeat center center fixed;
            background-size: cover;
        }

        input[type="file"] {
            display: none;
            /* Sembunyikan input file asli */
        }
    </style>
</head>

<body class="relative min-h-screen flex flex-col items-center justify-center">
    <!-- Overlay for background -->
    <div class="absolute inset-0 bg-black opacity-30"></div>

    <!-- Main Content -->
    <section class="py-16 w-full max-w-md mx-auto">
        <div class="container relative z-10 bg-white bg-opacity-95 p-8 rounded-lg shadow-2xl max-w-lg mx-auto">
            <h1 class="text-3xl font-bold text-blue-700 mb-8 text-center">Edit Profile</h1>
            <form action="{{ route('user.updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Profile Picture Section -->
                <div class="mb-8 text-center">
                    <label for="image" class="block text-lg font-semibold text-gray-800 mb-6">Profile Picture</label>
                    <div class="flex justify-center mb-4">
                        <img id="imagePreview"
                            src="{{ $user->image ? url('storage/user/' . $user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random' }}"
                            alt="{{ $user->name }} Image"
                            class="w-32 h-32 rounded-full border-4 border-gray-300 shadow-lg object-cover">
                    </div>
                    <label for="imageInput"
                        class="cursor-pointer bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 inline-flex items-center">
                        <span>Choose File</span>
                    </label>
                    <input type="file" id="imageInput" name="image" accept="image/*">
                    <p id="fileName" class="mt-2 text-gray-600"></p>
                </div>

                <!-- Name Input Field -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold text-gray-800">Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-2 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $user->name }}" required>
                </div>

                <!-- Email Input Field (Read-Only) -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-semibold text-gray-800">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-2 w-full p-3 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none text-gray-500"
                        value="{{ $user->email }}" required readonly>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('user.dashboard') }}"
                        class="text-center text-red-600 font-semibold py-2 px-4 hover:underline transition duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- JavaScript for Image Preview -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the src of the image preview to the file
                };
                reader.readAsDataURL(file); // Read the file as a data URL
                fileName.textContent = file.name; // Display the file name
            } else {
                fileName.textContent = ''; // Clear file name if no file is selected
            }
        });
    </script>
</body>

</html>
