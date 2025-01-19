<?php
session_start();
require __DIR__ . '/../../../vendor/autoload.php';
use App\controller\CoursConroller;
if ( $_SESSION["userrole"]!="Etudiant") {
  
   session_destroy();
   header("Location: ../auth/logIn.php"); 
   exit(); 
   }
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $cours= new CoursConroller();
    $course=$cours->readCour($id);

  }

   
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
    <title> Youdemy | Détails du Cours</title>
  </head>

<body class="bg-gray-50">
    <!-- Hero Section with Course Cover -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Course Info -->
                <div class="lg:w-2/3">
                    <div class="space-y-4">
                        <span class="inline-block px-3 py-1 bg-blue-500 rounded-full text-sm font-semibold">
                            <?php echo $course->categories; ?>
                        </span>
                        <h1 class="text-4xl font-bold"><?php echo $course->titre; ?></h1>
                        <p class="text-xl text-blue-100"><?php echo $course->description; ?></p>
                        
                        <div class="flex items-center gap-4 text-sm">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd"/>
                                </svg>
                                1234 étudiants
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                123 note moyenne
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div>
                                <p class="font-medium">Par <?php echo $course->name; ?></p>
                                <p class="text-sm text-blue-100">Enseignant certifié</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Course Card -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="relative pb-2">
                            <img src="<?php echo $course->photoCouverture; ?>" alt="Aperçu du cours" class="w-full rounded-lg">
                            <span class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                                Aperçu disponible
                            </span>
                        </div>
                        
                        <div class="space-y-4 mt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-3xl font-bold text-gray-500 "><?php echo $course->prix; ?> €</span>
                            </div>
                            <a href="./inscription.php?id=<?php echo $course->id; ?>">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200">
                                S'inscrire maintenant
                            </button>
                            </a>
                            
                            <div class="space-y-3 pt-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class=" text-gray-500 "><?php echo $course->duree; ?> heures de contenu</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span class="text-gray-500 " ><?php echo $course->nomberChapitre; ?> chapitres</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class=" text-gray-500 ">Certificat de fin de cours</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>