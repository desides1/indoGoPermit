@extends('layouts.template')

@section('title', 'Draft Perizinan')

@section('content-primary')
    <section class="p-4 sm:p-6">
        <div class="max-w-7xl mx-auto w-[80%]">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Draft Tersimpan</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse ($drafts as $draft)
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="font-medium text-gray-900">{{ $draft->title ?? 'Draft Perizinan' }}</h3>
                            <span class="text-xs text-gray-500">
                                {{ $draft->created_at ? \Carbon\Carbon::parse($draft->created_at)->format('d M Y') : '-' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">{{ Str::limit($draft->description ?? '', 100) }}</p>
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('draft.edit', $draft->id) }}"
                                class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                                Edit
                            </a>
                            <form action="{{ route('draft.destroy', $draft->id) }}" method="POST"
                                onsubmit="return confirm('Hapus draft ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1.5 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">
                        Tidak ada draft tersimpan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
