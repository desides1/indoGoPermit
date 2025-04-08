<!DOCTYPE html>
<html lang="en">
<x-head title="Data Perizinan" description="Ini adalah halaman utama." />

<body>
    <x-nav />

    {{-- Perizinan Kosong --}}
    <div class="place-items-center m-18">
        <img class="w-1/4" src="{{ asset('images/perizinanNone.png') }}" alt="">
        <div class="mt-12 text-center">
            <p>Kamu Belum Menambahkan Perizinan</p>
            <p>Click Tombol Di Bawah Untuk Menambahkan</p>
            <button type="button"
                class=" mt-4 px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 rounded-lg text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
                Tambah Perizinan
            </button>
        </div>
    </div>

    <x-footer />
</body>

</html>
