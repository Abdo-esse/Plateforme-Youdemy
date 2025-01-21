
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
    // print_r( $course);

  }

   
   ?>



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
           
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-2"><?php echo $course->titre ?></h1>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                
                <div class="aspect-w-16 aspect-h-9 bg-black">
                <iframe 
    class="w-full h-full object-cover" 
    src="<?php echo $course->contenu; ?>" 
    frameborder="0" 
    allowfullscreen>
</iframe>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-blue-600"><?php echo $course->nomberChapitre ?> Module</span>
                            <span class="mx-2 text-gray-400">•</span>
                            <span class="text-sm text-gray-500">Durée: <?php echo $course->duree ?> h</span>
                        </div>
                    </div>
                    <div class="prose max-w-none">
                        <h2 class="text-xl font-semibold text-gray-800 mb-3">À propos de cette leçon</h2>
                        <p class="text-gray-600">
                        <?php echo $course->description ?>
                        </p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="./mesCours.php">
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                                Routoure
                            </button>
                            </a>
                        </div>

                   
                </div>
            </div>
        </div>
    </main>
</body>
</html>