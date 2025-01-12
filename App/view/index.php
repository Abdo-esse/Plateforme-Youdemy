<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link css -->
    <link rel="stylesheet" href="assets/style/style.css">
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



    <link rel="shortcut icon" href="assets/images/logo/faveicon.webp" type="image/x-icon">
    <title> Youdemy | Home Page</title>
  </head>
  <body>

    <!-- header -->
    <nav x-data="{ isOpen: false }"
      class="relative bg-white shadow dark:bg-gray-800">
      <div
        class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
          <a href="#"
            class="text-2xl font-bold text-gray-800 hover:text-blue-600">
            <svg viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg" width="150" height="50">
    <!-- Fond du logo -->
    <rect width="200" height="60" fill="white"/>
    
    <!-- Symbole du livre/écran -->
    <path d="M 40 15 
             L 60 15 
             L 60 45 
             L 40 45 
             Z" 
          fill="#4A90E2" 
          stroke="#2171CD" 
          stroke-width="2"/>
    
    <!-- Pages/écrans qui se superposent -->
    <path d="M 45 20 
             L 65 20 
             L 65 50 
             L 45 50 
             Z" 
          fill="#5CA0E2" 
          stroke="#2171CD" 
          stroke-width="2"/>
    
    <!-- Texte "You" -->
    <text x="80" y="38" 
          font-family="Arial" 
          font-weight="bold" 
          font-size="20" 
          fill="#2171CD">You</text>
    
    <!-- Texte "demy" -->
    <text x="125" y="38" 
          font-family="Arial" 
          font-weight="bold" 
          font-size="20" 
          fill="#4A90E2">demy</text>
    
    <!-- Tagline (facultatif, supprimé pour compacité) -->
    
    <!-- Graduation cap icon -->
    <path d="M 170 25 
             L 180 20 
             L 190 25 
             L 180 30 
             Z 
             M 180 30 
             L 180 35 
             M 172 26 
             L 172 33" 
          fill="none" 
          stroke="#4A90E2" 
          stroke-width="2"/>
</svg>

          </a>

          <!-- Mobile menu button -->
          <div class="flex lg:hidden">
            <button x-cloak @click="isOpen = !isOpen" type="button"
              class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
              aria-label="toggle menu">
              <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 8h16M4 16h16" />
              </svg>

              <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div x-cloak
          :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
          class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800 md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center text-center">
          <div class="flex flex-col md:flex-row md:mx-6">
            <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="index.html">Home</a>
            <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="pages/products.html">Cours</a>
            <a
              class="my-2 text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 md:mx-4 md:my-0"
              href="#">About</a>
          </div>

          <!-- <div class="flex justify-center md:block">
            <a
              class="relative text-gray-700 transition-colors duration-300 transform dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-300  "
              href="pages/checkout.html">

              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M3 3H5L5.4 5M7 13H17L21 5H5.4M7 13L5.4 5M7 13L4.70711 15.2929C4.07714 15.9229 4.52331 17 5.41421 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM9 19C9 20.1046 8.10457 21 7 21C5.89543 21 5 20.1046 5 19C5 17.8954 5.89543 17 7 17C8.10457 17 9 17.8954 9 19Z"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>

              <span
                class="absolute bottom-2 right-4 text-xs text-white bg-blue-500 rounded-full w-auto p-1 px-2"
                id="count"
                >0</span>

            </a>
          </div> -->
     
      <div>
        <a href="#">
      <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Log In</button>
        </a>
        <a href="#">
        <button type="button" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign Up</button>

        </a>

      </div>
        </div>
      </div>
    </nav>

    <!-- hero section -->
    <section id="hero-section" class="h-[80vh] bg-cover bg-center relative">
      <div class="flex items-center justify-center h-full bg-black bg-opacity-50 mb-0">
        <div class="text-center text-white px-6">
          <h1 class="text-4xl lg:text-5xl font-bold mb-4">Welcome to  Youdemy: Your One-Stop Online Course Platform !</h1>
          <p class="text-lg mb-6">
          Explorez notre gamme complète de cours éducatifs interactifs, conçus pour enrichir vos connaissances et développer vos compétences tout en favorisant un apprentissage durable et accessible à tous..
          </p>
          <a href="#products" class="bg-blue-500 text-white py-3 px-5 rounded-lg hover:bg-blue-600 transition duration-300">
          get started
          </a>
        </div>
      </div>
    </section>
    