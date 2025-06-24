@extends('layout.index')

@section('hide_footer', true)
@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-6xl mx-auto px-4">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex gap-8">
                <div class="w-1/3">
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                        <div class="mb-6">
                            <div class="w-32 h-32 mx-auto rounded-full bg-pink-100 flex items-center justify-center overflow-hidden">
                                @if($user->photo)
                                    <img src="{{ Storage::url($user->photo) }}" alt="Profile Photo" class="w-full h-full object-cover rounded-full">
                                @else
                                    <svg class="w-20 h-20 text-teal-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                    </svg>
                                @endif
                            </div>

                            @if($user->photo)
                                <form action="{{ route('user.profile.delete-photo') }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-sm hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to delete your profile photo?')">
                                        Remove Photo
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $user->name }}</h2>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $user->address ?? 'No address provided' }}
                            </p>
                        </div>

                        <hr class="border-gray-200 mb-6">

                        <div class="space-y-3 text-left">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-sm">{{ $user->phone ?? 'No phone number' }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm">{{ $user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-2/3">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Profile</h1>

                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2" for="name">Name</label>
                                <input
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A]"
                                    id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required />
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                                <input
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A]"
                                    id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required />
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2" for="phone">Phone</label>
                                <input
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A]"
                                    id="phone" name="phone" type="text" value="{{ old('phone', $user->phone) }}" />
                                @error('phone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-2" for="address">Address</label>
                                <textarea
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A] h-24 resize-none"
                                    id="address" name="address">{{ old('address', $user->address) }}</textarea>
                                @error('address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="border-t border-gray-200 pt-6 mb-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4">Change Password (Optional)</h3>
                                <p class="text-sm text-gray-600 mb-4">Leave blank if you don't want to change your password</p>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2" for="current_password">Current Password</label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A]"
                                        id="current_password" name="current_password" type="password" />
                                    @error('current_password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2" for="password">New Password</label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A]"
                                        id="password" name="password" type="password" />
                                    @error('password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2" for="password_confirmation">Confirm New Password</label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A]"
                                        id="password_confirmation" name="password_confirmation" type="password" />
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 font-medium mb-2" for="photo">Upload Photo</label>
                                <input
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:border-[#52B69A] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100"
                                    id="photo" name="photo" type="file" accept="image/*" />
                                @error('photo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                <p class="text-sm text-gray-500 mt-1">Maximum file size: 2MB. Accepted formats: JPEG, PNG, JPG, GIF</p>
                            </div>

                            <div class="text-left">
                                <button
                                    class="bg-[#52B69A] hover:bg-[#449985] text-white px-6 py-2 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-[#52B69A] focus:ring-offset-2"
                                    type="submit">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
