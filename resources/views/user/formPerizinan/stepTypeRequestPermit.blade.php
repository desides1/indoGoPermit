@extends('layouts.stepperForm')

@section('title', 'Tipe Permohonan')

@section('step-3')

    <div class="step-content" data-step="2">
        <h1 class="text-primary font-bold text-2xl">TIPE PEMOHON</h1>
        <p class="mb-4">Pilih Tipe Pemohon</p>
        <div class="grid grid-cols-2 gap-2 w-fit justify-self-center">
            <div class="Perorangan">
                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        Perseorangan</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Informasi terkait data pribadi
                        pemohon</p>
                </a>
            </div>

            <div class="badanUsaha">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Badan
                        Usaha</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Informasi terkait data badan usaha
                        pemohon</p>
                </a>

            </div>
        </div>
    </div>

@endsection
