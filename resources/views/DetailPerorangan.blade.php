<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Perizinan Course LKP Fun Mandarin
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   /* Custom scrollbar for horizontal scroll if needed */
    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }
    .scrollbar-hide {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
 </head>
 <body class="bg-white text-gray-900 font-sans">
  <header class="border-b border-gray-200">
   <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
    <div class="flex items-center space-x-2">
    <img alt="Logo" class="w-full max-w-[100px] h-auto object-contain" src="images/gopermit/LOGO4.png">
    </div>
    <ul class="hidden md:flex space-x-8 text-sm font-medium text-gray-700">
     <li>
      <a class="hover:text-gray-900" href="#">
       Home
      </a>
     </li>
     <li>
      <a class="hover:text-gray-900" href="#">
       Data Perizinan
      </a>
     </li>
     <li>
      <a class="hover:text-gray-900" href="#">
       Activity
      </a>
     </li>
    </ul>
    <div>
     <button aria-label="User menu" class="w-6 h-6 rounded-full bg-gray-300" title="User menu">
     </button>
    </div>
   </nav>
  </header>
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
   <section>
    <h2 class="text-sm font-normal text-gray-800 mb-1">
     Detail Perizinan
    </h2>
    <h1 class="text-base font-semibold text-gray-900 mb-6">
     Perizinan Course LKP Fun Mandarin
    </h1>
    <!-- Process Tracker -->
    <div aria-label="Process Tracker" class="border border-gray-300 rounded-md p-4 mb-8 max-w-4xl mx-auto">
     <h3 class="text-sm font-normal text-gray-800 mb-4">
      Process Tracker
     </h3>
     <ol aria-label="Process steps" class="flex justify-between text-xs font-normal text-gray-600 select-none">
      <li class="flex flex-col items-center w-full relative">
       <div aria-hidden="true" class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-600 mb-1">
        <i class="fas fa-file-alt text-gray-600">
        </i>
       </div>
       <span>
        Filed
       </span>
       <div class="absolute top-3.5 right-0 w-full h-[1px] bg-gray-300 -z-10" style="left: 50%;">
       </div>
      </li>
      <li class="flex flex-col items-center w-full relative">
       <div aria-hidden="true" class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-600 mb-1">
        <i class="fas fa-file-alt text-gray-600">
        </i>
       </div>
       <span>
        processed
       </span>
       <div class="absolute top-3.5 right-0 w-full h-[1px] bg-gray-300 -z-10" style="left: 50%;">
       </div>
      </li>
      <li class="flex flex-col items-center w-full relative">
       <div aria-hidden="true" class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-600 mb-1">
        <i class="fas fa-file-alt text-gray-600">
        </i>
       </div>
       <span>
        Approved
       </span>
       <div class="absolute top-3.5 right-0 w-full h-[1px] bg-gray-300 -z-10" style="left: 50%;">
       </div>
      </li>
      <li class="flex flex-col items-center w-full">
       <div aria-hidden="true" class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-600 mb-1">
        <i class="fas fa-check text-gray-600">
        </i>
       </div>
       <span>
        finished
       </span>
      </li>
     </ol>
    </div>
    <!-- Data Permohonan -->
    <section class="w-full max-w-full mb-10">
     <h3 class="text-green-800 font-semibold text-sm mb-2">
      DATA PERMOHONAN
     </h3>
     <p class="text-xs font-normal text-gray-700 mb-4">
      Masukkan informasi data permohonan.
     </p>
     <form class="space-y-6 text-xs font-normal text-gray-700">
      <div>
       <label class="block mb-1 font-semibold text-gray-800" for="jenis-permohonan">
        Jenis Permohonan
        <span class="text-red-600">
         *
        </span>
       </label>
       <select class="w-full border border-gray-300 rounded px-3 py-2 text-xs text-gray-700" id="jenis-permohonan" name="jenis-permohonan">
        <option>
         Pilih Jenis Permohonan
        </option>
       </select>
      </div>
      <div>
       <label class="block mb-1 font-semibold text-gray-800" for="instansi">
        Instansi
        <span class="text-red-600">
         *
        </span>
       </label>
       <select class="w-full border border-gray-300 rounded px-3 py-2 text-xs text-gray-700" id="instansi" name="instansi">
        <option>
         Pilih Instansi
        </option>
       </select>
      </div>
      <div>
       <label class="block mb-1 font-semibold text-gray-800" for="unit">
        Unit
        <span class="text-red-600">
         *
        </span>
       </label>
       <select class="w-full border border-gray-300 rounded px-3 py-2 text-xs text-gray-700" id="unit" name="unit">
        <option>
         Pilih Unit
        </option>
       </select>
      </div>
      <div>
       <label class="block mb-1 font-semibold text-gray-800" for="jenis-izin">
        Jenis Izin
        <span class="text-red-600">
         *
        </span>
       </label>
       <select class="w-full border border-gray-300 rounded px-3 py-2 text-xs text-gray-700" id="jenis-izin" name="jenis-izin">
        <option>
         Pilih Jenis Izin
        </option>
       </select>
      </div>
      <div>
       <label class="block mb-1 font-semibold text-gray-800" for="nomor-permohonan">
        Nomor Permohonan
       </label>
       <input class="w-full bg-green-100 border border-green-300 rounded px-3 py-2 text-xs text-gray-700" id="nomor-permohonan" name="nomor-permohonan" type="text"/>
      </div>
     </form>
    </section>
    <!-- Data Lokasi -->
    <section class="w-full max-w-full">
     <h3 class="text-green-800 font-semibold text-sm mb-2">
      DATA LOKASI
     </h3>
     <p class="text-xs font-normal text-gray-700 mb-4">
      Atur lokasi pada peta dan masukkan informasi lokasi lengkapnya.
     </p>
     <body>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1010296.3993742312!2d114.41200632575861!3d-8.453560101474046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd141d3e8100fa1%3A0x24910fb14b24e690!2sBali!5e0!3m2!1sid!2sid!4v1745545534674!5m2!1sid!2sid" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </body>
     <table class="w-full text-xs text-gray-700 border border-gray-300 rounded mb-4">
      <thead class="bg-green-100 text-green-800 font-semibold">
       <tr>
        <th class="py-1 px-2 border border-green-200 text-center">
         NO.
        </th>
        <th class="py-1 px-2 border border-green-200 text-center">
         ALAMAT
        </th>
        <th class="py-1 px-2 border border-green-200 text-center">
         LATITUDE
        </th>
        <th class="py-1 px-2 border border-green-200 text-center">
         LONGITUDE
        </th>
        <th class="py-1 px-2 border border-green-200 text-center">
         AKSI
        </th>
       </tr>
      </thead>
      <tbody>
       <tr>
        <td class="py-2 text-center border border-green-200" colspan="5">
         Tidak Ada Data
        </td>
       </tr>
      </tbody>
     </table>
     <div>
      <label class="block mb-1 font-semibold text-gray-800 text-xs" for="keterangan-lokasi">
       Keterangan lokasi (jika ada)
      </label>
      <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-xs text-gray-700 resize-none" id="keterangan-lokasi" name="keterangan-lokasi" placeholder="Masukkan Keterangan" rows="2"></textarea>
     </div>
    </section>
   </section>
  </main>
 </body>
</html>