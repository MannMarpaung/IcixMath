<nav class="sticky top-0 transition-transform-de bg-white py-4 md:px-8">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('user.dashboard') }}" class="lg:text-2xl font-bold text-blue-600">ICIX Math</a>

        <!-- Desktop Menu -->
        <div id="menu-links" class="hidden md:flex space-x-8 text-md">
            <a href="{{ route('user.dashboard') }}" class="text-gray-700 font-semibold">Home</a>
            <a href="{{ route('user.levels') }}" class="text-gray-700 font-semibold">Levels</a>
            <a href="{{ route('user.leaderboard') }}" class="text-gray-700 font-semibold">Leaderboard</a>
        </div>

        <!-- Hamburger and User Icon -->
        <div class="relative flex items-center space-x-4">
            <!-- Toggle Button -->
            <div class="fixed top-4 right-6 -z-50">
                <div id="toggleIcon" class="icon3d cursor-pointer">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full" id="user-menu-button"
                        aria-expanded="false">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full lg:w-12 lg:h-12"
                            src="{{ Auth::user()->image ? url('storage/user/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}"
                            alt="profile image">
                    </button>
                </div>
            </div>

            {{-- sidebar --}}
            <div id="sidebar"
                class="w-1/5 p-6 bg-white shadow-lg fixed top-0 right-0 h-full transition-transform transform translate-x-full overflow-y-auto">
                <!-- Close Button -->
                <div class="flex justify-end mb-4">
                    <button id="closeSidebar" class="text-gray-600 hover:text-gray-800 text-xl focus:outline-none">
                        &times;
                    </button>
                </div>

                <!-- User Info Section -->
                <div class="flex flex-col items-center border-b border-gray-300 pb-4 mb-4">
                    <!-- Avatar -->
                    <img class="w-10 h-10 rounded-full lg:w-28 lg:h-28"
                            src="{{ Auth::user()->image ? url('storage/user/' . Auth::user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}"
                            alt="profile image">
                    <!-- User Name -->
                    <h2 class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                    <!-- User Email -->
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    <!-- User Score -->
                    <div class="mt-3 bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                        Score: {{ Auth::user()->total_score }}
                    </div>
                </div>

                <!-- User Menu Section -->
                <ul class="py-2 mt-4">
                    <!-- Edit Profile -->
                    <li>
                        <a href="{{ route('user.editProfile') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-200">
                            <i class="fas fa-user-edit mr-2"></i> Edit Profile
                        </a>
                    </li>
                    <!-- Sign Out -->
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-200">
                                <i class="fas fa-sign-out-alt mr-2"></i> Sign out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>

</nav>

<!-- Script untuk toggle sidebar -->
<script>
    const toggleIcon = document.getElementById('toggleIcon');
    const sidebar = document.getElementById('sidebar');
    const gridContainer = document.getElementById('gridContainer')

    toggleIcon.addEventListener('click', () => {
        sidebar.classList.toggle('active'); // Sidebar toggle muncul dan sembunyi

        if (sidebar.classList.contains('active')) {
            gridContainer.classList.remove('grid-cols-4');
            gridContainer.classList.add('grid-cols-3');
        } else {
            gridContainer.classList.remove('grid-cols-3');
            gridContainer.classList.add('grid-cols-4');
        }
    });
</script>

<script>
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    // Function to close sidebar
    closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('translate-x-full'); // Hide sidebar
    });

    // Optional: Add a function to open the sidebar, e.g., with a button
    function openSidebar() {
        sidebar.classList.remove('translate-x-full');
    }
</script>