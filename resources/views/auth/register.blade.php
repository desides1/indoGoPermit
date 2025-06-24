@extends('layout.index')

@section('hide_header', true)
@section('hide_footer', true)

@section('content')
<div class="bg-white-100 flex items-center justify-center min-h-screen relative">
    <div class="w-full max-w-md p-4 relative z-10">
        <div class="text-center mb-6">
            <img alt="Indo GoPermit Logo" class="mx-auto mb-4" height="100" src="images/LOGO1.png" width="100"/>
            <h1 class="text-2xl font-medium text-gray-800">Registrasi</h1>
            <p class="text-gray-600">Join Now and Make Your Licensing Easy!</p>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700" for="username">Username</label>
                <input
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A] @error('name') border-red-500 @enderror"
                    id="username"
                    name="name"
                    placeholder="Masukkan username anda"
                    type="text"
                    value="{{ old('name') }}"
                    required
                />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="email">Email Address</label>
                <input
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A] @error('email') border-red-500 @enderror"
                    id="email"
                    name="email"
                    placeholder="Masukkan email anda"
                    type="email"
                    value="{{ old('email') }}"
                    required
                />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="password">Password</label>
                <input
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A] @error('password') border-red-500 @enderror"
                    id="password"
                    name="password"
                    placeholder="Masukkan password anda"
                    type="password"
                    required
                />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="password_confirmation">Verification Password</label>
                <input
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A] @error('password') border-red-500 @enderror"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Masukkan kembali password anda"
                    type="password"
                    required
                />
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 text-center">
                <p class="text-gray-600">Apakah anda sudah punya akun?
                    <a class="text-[#52B69A] hover:text-[#449985] font-medium" href="{{ route('login') }}">Login</a>
                </p>
            </div>

            <div class="text-center">
                <button
                    class="w-full bg-[#52B69A] hover:bg-[#449985] text-white py-2 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:ring-offset-2"
                    type="submit"
                >
                    Daftar
                </button>
            </div>
        </form>
    </div>

    <div class="absolute w-full" style="margin-top: 50%">
        <svg class="w-full h-34" viewBox="0 0 3200 320" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,224L3200,96L3200,320L0,320Z" fill="#52B69A" fill-opacity="1"></path>
        </svg>
    </div>
</div>
@endsection
