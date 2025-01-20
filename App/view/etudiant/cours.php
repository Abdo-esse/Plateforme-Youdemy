<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours Vidéo</title>
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
    <title> Youdemy | Home Page</title>
</head>
<body class="bg-gray-100 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- En-tête du cours -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Titre du cours</h1>
                <p class="text-gray-600">Description du cours et informations supplémentaires</p>
            </div>

            <!-- Conteneur vidéo principal -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Zone de la vidéo -->
                <div class="aspect-w-16 aspect-h-9 bg-black">
                    <!-- Remplacez src par votre source vidéo -->
                    <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/h7AXmyOn0tk?si=FJ5tjf-1pZeOns7H"  frameborder="0"  ></iframe>
                </div>

                <!-- Informations sous la vidéo -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-blue-600">Module 1</span>
                            <span class="mx-2 text-gray-400">•</span>
                            <span class="text-sm text-gray-500">Durée: 45 min</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                                Suivant
                            </button>
                        </div>
                    </div>

                    <!-- Description détaillée -->
                    <div class="prose max-w-none">
                        <h2 class="text-xl font-semibold text-gray-800 mb-3">À propos de cette leçon</h2>
                        <p class="text-gray-600">
                            Dans cette leçon, nous aborderons les concepts fondamentaux du sujet.
                            Cette vidéo vous guidera à travers les points essentiels et vous fournira
                            des exemples pratiques.
                        </p>
                    </div>

                   
                </div>
            </div>
        </div>
    </main>
</body>
</html>