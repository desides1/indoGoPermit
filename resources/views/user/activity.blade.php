<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Indo GoPermit
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: "Inter", sans-serif;
    }
  </style>
 </head>
 <body class="bg-white min-h-screen">
  <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
   <div class="flex items-center space-x-2">
    <img alt="Logo" class="w-100 h-100 object-contain" height="100" src="images/gopermit/LOGO4.png" width="100"/>
   </div>
   <nav class="hidden md:flex space-x-10 text-sm font-semibold">
    <a class="text-black hover:text-green-600" href="#">
     Home
    </a>
    <a class="text-black hover:text-green-600" href="#">
     Data Perizinan
    </a>
    <a class="text-black hover:text-green-600" href="#">
     Activity
    </a>
   </nav>
   <div class="flex items-center space-x-6">
    <button aria-label="Notifications" class="text-black text-xl">
     <i class="fas fa-bell">
     </i>
    </button>
    <div aria-label="User profile placeholder" class="w-8 h-8 rounded-full bg-gray-300">
    </div>
   </div>
  </header>
  <main class="flex flex-col md:flex-row gap-6 px-6 py-6 w-full max-w-full mx-auto">
   <!-- Log Activity -->
   <section aria-labelledby="log-activity-title" class="flex-1 border border-blue-500 rounded-md p-4 max-w-full">
    <h2 class="font-semibold text-lg mb-4 text-black" id="log-activity-title">
     Log Actifity
    </h2>
    <!-- Item 1 -->
    <article class="border border-blue-300 rounded-md p-3 mb-2 flex items-center">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       12 Mei 2025 - 14:00
      </p>
      <div class="flex items-center space-x-1 text-xs text-red-800 font-semibold">
       <span>
        Status:
       </span>
       <span class="bg-red-300 rounded-full px-3 py-1 flex items-center space-x-1">
        <i class="fas fa-exclamation-circle text-red-700 text-sm">
        </i>
        <span>
         Perlu Perbaikan
        </span>
       </span>
      </div>
     </div>
     <button class="ml-6 bg-[#52B69A]  text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      Detail
     </button>
    </article>
    <!-- Item 2 -->
    <article class="border border-blue-300 rounded-md p-3 mb-2 flex items-center">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       11 Mei 2025 - 10:15
      </p>
      <div class="flex items-center space-x-1 text-xs text-yellow-700 font-semibold">
       <span>
        Status:
       </span>
       <span class="bg-yellow-100 rounded-full px-3 py-1 flex items-center space-x-1 border border-yellow-300">
        <i class="fas fa-spinner fa-spin text-yellow-600 text-sm">
        </i>
        <span>
         Di Proses
        </span>
       </span>
      </div>
     </div>
     <button class="ml-6 bg-[#52B69A] text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      Detail
     </button>
    </article>
    <!-- Item 3 -->
    <article class="border border-blue-300 rounded-md p-3 mb-2 flex items-center">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       10 Mei 2025 - 08:30
      </p>
      <div class="flex items-center space-x-1 text-xs text-green-700 font-semibold">
       <span>
        Status:
       </span>
       <span class="bg-green-100 rounded-full px-3 py-1 flex items-center space-x-1 border border-green-300">
        <i class="fas fa-paper-plane text-green-600 text-sm">
        </i>
        <span>
         Diajukan
        </span>
       </span>
      </div>
     </div>
     <button class="ml-6 bg-[#52B69A]  text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      Detail
     </button>
    </article>
    <!-- Item 4 -->
    <article class="border border-blue-300 rounded-md p-3 flex items-center">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       10 Mei 2025 · 08:30
      </p>
      <div class="flex items-center space-x-1 text-xs text-blue-700 font-semibold">
       <span>
        Status:
       </span>
       <span class="bg-blue-100 rounded-full px-3 py-1 flex items-center space-x-1 border border-blue-300">
        <i class="fas fa-check-circle text-blue-600 text-sm">
        </i>
        <span>
         Selesai
        </span>
       </span>
      </div>
     </div>
     <button class="ml-6 bg-[#52B69A]  text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      Detail
     </button>
    </article>
   </section>
   <!-- Draft -->
   <section aria-labelledby="draft-title" class="flex-1 bg-gray-100 rounded-md p-4 max-w-full shadow-md">
    <h2 class="font-semibold text-lg mb-4 text-black" id="draft-title">
     Draft
    </h2>
    <!-- Draft item 1 -->
    <article aria-label="Draft item 1" class="bg-white rounded-md p-3 mb-3 border border-gray-200 max-w-full flex items-center" role="region">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       12 Mei 2025 - 14:00
      </p>
     </div>
     <button class="bg-[#52B69A]  text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      lanjut edit
     </button>
    </article>
    <!-- Draft item 2 -->
    <article aria-label="Draft item 2" class="bg-white rounded-md p-3 mb-3 border border-gray-200 max-w-full flex items-center" role="region">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       11 Mei 2025 - 10:15
      </p>
     </div>
     <button class="bg-[#52B69A]  text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      lanjut edit
     </button>
    </article>
    <!-- Draft item 3 -->
    <article aria-label="Draft item 3" class="bg-white rounded-md p-3 mb-3 border border-gray-200 max-w-full flex items-center" role="region">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       10 Mei 2025 - 08:30
      </p>
     </div>
     <button class="bg-[#52B69A]  text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      lanjut edit
     </button>
    </article>
    <!-- Draft item 4 -->
    <article aria-label="Draft item 4" class="bg-white rounded-md p-3 border border-gray-200 max-w-full flex items-center" role="region">
     <div class="flex-1">
      <h3 class="font-semibold text-black mb-1">
       Pengajuan perizinan “Course LKP Fun Mandarin”
      </h3>
      <p class="text-xs text-gray-700 mb-2">
       10 Mei 2025 - 08:30
      </p>
     </div>
     <button class="bg-[#52B69A]  text-white text-sm px-4 py-1 rounded whitespace-nowrap" type="button">
      lanjut edit
     </button>
    </article>
   </section>
  </main>
 </body>
</html>