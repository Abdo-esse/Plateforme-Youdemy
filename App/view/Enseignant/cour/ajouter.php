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
    <title> Youdemy | Add Cours</title>
  </head>
<body class="bg-gray-100 min-h-screen">
  <div class="container mx-auto px-4 py-8">
    <!-- En-tête -->
    <h1 class="text-2xl font-bold text-center mb-8">Ajouter un nouveau cours</h1>

    <!-- Conteneur divisé -->
    <div class="grid md:grid-cols-2 gap-6 max-w-6xl mx-auto">
      <!-- Section Cours Vidéo -->
      <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
        <div class="flex flex-col items-center text-center space-y-4">
          <!-- Icône Vidéo -->
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
          </div>
          
          <h2 class="text-xl font-semibold text-gray-800">Cours Vidéo</h2>
          <p class="text-gray-600 mb-4">Créez un cours avec du contenu vidéo interactif</p>
          
          <a href="./coursVideo.php" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200 w-full max-w-xs">
            <span>Ajouter un cours vidéo</span>
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Section Cours Texte -->
      <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
        <div class="flex flex-col items-center text-center space-y-4">
          <!-- Icône Document -->
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          
          <h2 class="text-xl font-semibold text-gray-800">Cours Texte</h2>
          <p class="text-gray-600 mb-4">Créez un cours basé sur du contenu textuel et des images</p>
          
          <a href="#" class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200 w-full max-w-xs">
            <span>Ajouter un cours texte</span>
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>