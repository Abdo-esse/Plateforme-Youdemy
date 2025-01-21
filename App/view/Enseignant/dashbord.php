<?php
session_start();
require __DIR__ . '/../../../vendor/autoload.php'; 
    use App\Class\Role; 
    use App\controller\EnseignantController; 
if ( $_SESSION["userrole"]!="Enseignant") {
  
   session_destroy();
   header("Location: ../auth/logIn.php"); 
   exit(); 
   }
   $roleEnseignant = new Role(2);
   $enseignat= new EnseignantController( $_SESSION["userName"],$_SESSION["useremail"],"",$roleEnseignant,"", $_SESSION["userid"]);

   $tolaCourdPublier=$enseignat->totalCours(true,$_SESSION["userid"]);
   $tolaCourdNotPublier=$enseignat->totalCours(false,$_SESSION["userid"]);
   $totalEtudiant=$enseignat->totalEtudiant($_SESSION["userid"]);
 

   
   ?>

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
    <title> Youdemy | Dashbord</title>
  </head>
    <body>
        
        <main>
            
    <?php  include './sideBar.php'?> 

<div class="p-4 sm:ml-64 bg-gray-50 p-4 ">
    <h2 class="text-3xl font-bold mb-6 text-gray-900">Tableau de bord Youdemy</h2>
    
    <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm text-gray-600 font-medium">Cours Publier</h3>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>
            <div class="text-2xl font-bold text-gray-900"><?php   echo $tolaCourdPublier->nombre_cours?></div>
            <p class="text-xs text-gray-500 mt-1">Nombre de cours publiés</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm text-gray-600 font-medium">Cours non publiés</h3>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>
            <div class="text-2xl font-bold text-gray-900"><?php   echo $tolaCourdNotPublier->nombre_cours?></div>
            <p class="text-xs text-gray-500 mt-1">Nombre de cours non publiés</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm text-gray-600 font-medium">Inscriptions</h3>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                    </path>
                </svg>
            </div>
            <div class="text-2xl font-bold text-gray-900"><?php   echo $totalEtudiant->etudiants?></div>
            <p class="text-xs text-gray-500 mt-1">Nombre total d'inscriptions aux cours</p>
        </div>
    </div>


</div>

        </main>
    </body>
    </html>