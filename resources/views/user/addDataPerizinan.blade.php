@extends('layouts.template')

@section('title', 'Homepage')

@section('content-primary')
    <section class="bg-primary dark:bg-primary">
        <div class="flex flex-col items-center justify-center px-6 mx-auto ">
            <div class=" bg-white rounded-lg shadow md:my-22 sm:max-w-md xl:p-0 max-w-full">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <img class="w-1/2 object-contain" src="{{ asset('images/LOGO 1.png') }}" alt="logo">


                    <p>Pilih Jenis Perizinan Yang Akan Di Ajukan Sesusai Bidang Usaha Yang Di Miliki</p>

                    <form class="max-w-sm mx-auto" action="{{ route('permission.validate') }}" method="POST">
                        @csrf
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Pilih jenis
                            perizinan</label>
                        <select name="permitTypes" id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" disabled selected>-- Pilih jenis perizinan --</option>
                            @foreach ($permitTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>

                        <button type="submit"
                            class="mt-6 w-full text-white bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary-700 dark:focus:ring-primary-800">Selanjutnya</button>

                    </form>

                    {{-- <form class="space-y-4 md:space-y-6" action="{{ route('add-Data') }}">
                        <div>

                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="text-gray-300 bg-white hover:bg-white font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center border border-gray-300 w-full"
                                type="button">Pilih jenis perizinan<svg class="w-2.5 h-2.5 ms-auto text-gray-700"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-sm">
                                <ul class="py-2 text-sm text-gray-950 " aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Perizinan Pendidikan
                                            & Lembaga Kursus</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Perizinan Pariwisata
                                            & Hiburan</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Perizinan Kesehatan
                                            & Kencantikan</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Perizianan
                                            Perbankan</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Perizianan UMKM</a>
                                    </li>
                                </ul>
                            </div>

                        </div>


                        <button type="submit"
                            class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary-700 dark:focus:ring-primary-800">Selanjutnya</button>

                    </form> --}}
                </div>
            </div>
        </div>

    </section>

@endsection
