<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white-800 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="text-center mb-6">
            <img alt="image" class="mx-auto mb-4" height="100" src="images/gopermit/LOGO1.png" width="100" />
            <h2 class="text-2xl font-Medium">Login</h2>
            <p class="text-gray-600">Access Your Account with Ease!</p>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700" for="username">Username</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="username" name="username" placeholder="Enter Username" type="text" value="{{ old('username') }}" />
                @error('username')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700" for="password">Password</label>
                <input class="w-full px-3 py-2 border rounded-lg" id="password" name="password" placeholder="Enter Password" type="password" />
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <button class="w-full bg-[#52B69A]  text-white py-2 rounded-lg" type="submit">Login</button>
                </ div>
                <div class="text-center">
                    <a class="text-gray-600 hover:text-gray-800" href="#">
                        Forgot password?
                    </a>
                </div>
                <div class="text-center mt-4">
                    <p class="text-gray-600">
                        Don't have an account yet?
                        <a class="text-[#52B69A] hover:text-green-700" href="{{ route('register') }}">
                            Sign up here
                        </a>
                    </p>
                </div>
        </form>
    </div>
    <div class="absolute bottom--2 left-0 w-full">
        <svg class="w-full h-32" viewBox="0 0 3200 320" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,224L3200,96L3200,320L0,320Z" fill="#52B69A" fill-opacity="1"></path>
        </svg>
    </div>
    </div>

    </div>

    </svg>

</body>

</html>