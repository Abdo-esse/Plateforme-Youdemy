<?php
session_start();

if ( $_SESSION["userrole"]!="Enseignant") {
  
   session_destroy();
   header("Location: ../auth/logIn.php"); 
   exit(); 
}?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
       <!-- font -->
       <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- tailwind -->
    <!-- carousel -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: '#da373d',
            }
          }
        }
      }
    </script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>


 <!-- link css -->
 <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="assets/images/logo/faveicon.webp" type="image/x-icon">
    <title> Youdemy | Cours</title>
  </head>
    <body>
        
        <main>
            
    <?php  include '../sideBar.php'?> 

<div class="p-4 sm:ml-64">
   
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
        <a href="./ajouter.php">
        <div class="m-2 flex items-center justify-end">
            <button data-tooltip-target="tooltip-new" type="button" class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
                <span class="sr-only">New item</span>
            </button>
        </div>
        <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Create new item
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        </a>
        
    </div>

    <section class="grid grid-cols-1 ml-1.5 mt-1.5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-xl:gap-4 gap-6">
    <!-- Carte 1 -->
    <article class="bg-white rounded-xl shadow hover:shadow-md transition-shadow duration-300">
      <div class="relative">
        <img src="/api/placeholder/400/250" alt="Image du cours" class="w-full h-40 object-cover rounded-t-xl">
        <span class="absolute top-2 right-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
          Nouveau
        </span>
      </div>
      
      <div class="p-4">
        <h3 class="text-lg font-semibold line-clamp-1 mb-2">Introduction au développement Web</h3>
        <p class="text-gray-600 text-sm line-clamp-2 mb-3">
          Apprenez les bases du développement web avec HTML, CSS et JavaScript.
        </p>
        
        <div class="space-y-1.5 mb-4">
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>12h</span>
          </div>
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span>10 chapitres</span>
          </div>
        </div>

        <div class="flex justify-between items-center">
          <span class="text-blue-600 font-bold">29,99 €</span>
          <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1.5 rounded-lg transition-colors">
            S'inscrire
          </button>
        </div>
      </div>
    </article>

    <!-- Carte 2 -->
    <article class="bg-white rounded-xl shadow hover:shadow-md transition-shadow duration-300">
      <div class="relative">
        <img src="https://www.patterns.dev/img/reactjs/react-logo@3x.svg" alt="Image du cours" class="w-full h-40 object-cover rounded-t-xl">
      </div>
      
      <div class="p-4">
        <h3 class="text-lg font-semibold line-clamp-1 mb-2">React pour débutants</h3>
        <p class="text-gray-600 text-sm line-clamp-2 mb-3">
          Maîtrisez React.js et créez des applications web modernes et réactives.
        </p>
        
        <div class="space-y-1.5 mb-4">
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>15h</span>
          </div>
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span>8 chapitres</span>
          </div>
        </div>

        <div class="flex justify-between items-center">
          <span class="text-blue-600 font-bold">39,99 €</span>
          <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1.5 rounded-lg transition-colors">
            S'inscrire
          </button>
        </div>
      </div>
    </article>
     <!-- Carte 1 -->
     <article class="bg-white rounded-xl shadow hover:shadow-md transition-shadow duration-300">
      <div class="relative">
        <img src="https://www.gcommeuneidee.com/wp-content/uploads/2023/10/image_une.png" alt="Image du cours" class="w-full h-40 object-cover rounded-t-xl">
        <!-- Catégorie -->
        <span class="absolute top-2 left-2 bg-purple-500 text-white text-xs px-2 py-1 rounded-full">
          Développement Web
        </span>
        <!-- Badge nouveau -->
        <span class="absolute top-2 right-2 bg-blue-500 text-white text-xs px-2 py-1 rounded-full">
          Nouveau
        </span>
      </div>
      
      <div class="p-4">
        <h3 class="text-lg font-semibold line-clamp-1 mb-2">Introduction au développement Web</h3>
        
        <!-- Tags -->
        <div class="flex flex-wrap gap-1 mb-2">
          <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded">HTML</span>
          <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded">CSS</span>
          <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded">JavaScript</span>
        </div>

        <p class="text-gray-600 text-sm line-clamp-2 mb-3">
          Apprenez les bases du développement web avec HTML, CSS et JavaScript.
        </p>
        
        <div class="space-y-1.5 mb-4">
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>12h</span>
          </div>
          <div class="flex items-center text-gray-500 text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span>10 chapitres</span>
          </div>
        </div>

        <div class="flex justify-between items-center">
          <span class="text-blue-600 font-bold">29,99 €</span>
          <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1.5 rounded-lg transition-colors">
            S'inscrire
          </button>
        </div>
      </div>
    </article>
  </section>
</div>
</div>

        </main>
    </body>
    </html>



