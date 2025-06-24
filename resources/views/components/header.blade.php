<header class="bg-white shadow-md">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-2">
                <div class="p-1 rounded-sm">
                    <img src="/images/LOGO4.png" alt="Logo Indo GoPermit" class="h-10 w-auto" />
                </div>
            </div>

            <nav class="space-x-6 hidden md:flex">
                <a href="/" class="text-gray-700 hover:text-[#52B69A]">Home</a>
                <a href="{{ route('user.berandaDataPerizinan') }}" class="text-gray-700 hover:text-[#52B69A]">Data Perizinan</a>
                <a href="{{ route('draft.index') }}" class="text-gray-700 hover:text-[#52B69A]">Activity</a>
            </nav>


            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="focus:outline-none">
                    <div
                        class="h-8 w-8 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold overflow-hidden">
                        @if (auth()->user()->photo)
                        <img src="{{ Storage::url(auth()->user()->photo) }}" alt="Profile Photo"
                            class="w-full h-full object-cover rounded-full">
                        @else
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>
                </button>

                <div x-show="open" @click.outside="open = false" x-transition
                    class="absolute right-0 mt-2 w-40 bg-white border rounded-md shadow-lg z-20">
                    <a href="{{ route('user.profile') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Update
                        Profile</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>