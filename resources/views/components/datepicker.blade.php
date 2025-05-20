<!-- resources/views/components/datepicker.blade.php -->
@props(['placeholder' => 'Pilih tanggal'])

<div class="relative w-full max-w-sm">
    <input type="text" name="datepicker" id="datepicker"
        {{ $attributes->merge(['class' => 'flatpickr-input w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent']) }}
        placeholder="{{ $placeholder }}" readonly />
    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 7V3m8 4V3m-9 8h10m-11 5h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2z" />
        </svg>
    </div>
</div>
