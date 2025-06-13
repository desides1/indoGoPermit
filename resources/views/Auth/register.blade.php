<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="text-center mb-6">
            <img alt="image" class="mx-auto mb-4" height="100" src="images/gopermit/LOGO1.png" width="100" />
            <h1 class="text-2xl font-Medium">Registrasi</h1>
            <p class="text-gray-600">Join Now and Make Your Learning Easy!</p>
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700" for="username">Username</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="username" name="username" placeholder="Username"
                    type="text" value="{{ old('username') }}" />
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="email">Email Address</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="email" name="email"
                    placeholder="Email Address" type="email" value="{{ old('email') }}" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="password">Password</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" placeholder="Password"
                    type="password" />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="confirm-password">Verification Password</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="confirm-password" name="password_confirmation"
                    placeholder="Verification Password" type="password" />
            </div>
            <div class="mb-4 text-center">
                <p class="text-gray-600">Apakah sudah memiliki akun? <a class="text-[#52B69A]"
                        href="{{ route('login') }}">Login</a></p>
            </div>
            <div class="text-center">
                <button class="w-full bg-[#52B69A] -500 text-white py-2 rounded-lg" type="submit">Daftar</button>
            </div>
        </form>
        <div class="absolute bottom--2 left-0 w-full">
            <svg class="w-full h-32" viewBox="0 0 3200 320" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,224L3200,96L3200,320L0,320Z" fill="#52B69A" fill-opacity="1"></path>
            </svg>
        </div>
    </div>
</body>

</html>
