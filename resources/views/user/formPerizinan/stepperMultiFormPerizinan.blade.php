@extends('layouts.template')

@section('title', 'Homepage')

@section('content-primary')

    <div id="stepper" class="relative mb-12 w-3/4 object-center mx-auto mt-10">
        <!-- Stepper Navigation -->
        <ol class="flex items-center w-full mb-6">
            <li class="relative flex-1 flex items-center" data-step="1">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white font-bold">
                    1</div>
                <span class="absolute top-12 text-sm font-medium text-gray-600">Data Permohonan</span>
                <div class="flex-1 h-1 bg-gray-300"></div>
            </li>
            <li class="relative flex-1 flex items-center" data-step="2">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold">
                    2</div>
                <span class="absolute top-12 text-sm font-medium text-gray-600">Tipe Pemohon</span>
                <div class="flex-1 h-1 bg-gray-300"></div>
            </li>
            <li class="relative flex-1 flex items-center" data-step="3">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold">
                    3</div>
                <span class="absolute top-12 text-sm font-medium text-gray-600">Perorangan</span>
                <div class="flex-1 h-1 bg-gray-300"></div>
            </li>
            <li class="relative flex-1 flex items-center" data-step="4">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold">
                    4</div>
                <span class="absolute top-12 text-sm font-medium text-gray-600">Badan Usaha</span>
                <div class="flex-1 h-1 bg-gray-300"></div>
            </li>
            <li class="relative flex-1 flex items-center" data-step="5">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold">
                    5</div>
                <span class="absolute top-12 text-sm font-medium text-gray-600">Persyaratan Dokumen</span>
                <div class="flex-1 h-1 bg-gray-300"></div>
            </li>
            <li class="relative flex items-center" data-step="6">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold">
                    6</div>
                <span class="absolute top-12 text-sm font-medium text-gray-600">Proyek</span>
            </li>
        </ol>
    </div>
    <div class="w-3/4 mx-auto p-6 bg-white">
        @yield('step-1')
        @yield('step-2')
        @yield('step-3')
        @yield('step-4')
        @yield('step-5')
        @yield('step-6')
    </div>


@endsection
