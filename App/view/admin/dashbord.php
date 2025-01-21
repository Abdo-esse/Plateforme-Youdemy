<?php
session_start();
require __DIR__ . '/../../../vendor/autoload.php'; 

if ( $_SESSION["userrole"]!="Administrateur") {
  
   session_destroy();
   header("Location: ../auth/logIn.php"); 
   exit(); 
}


   use App\Class\Role; 
   use App\controller\AdminC;
   $role = new Role(1);
   $admin= new AdminC( $_SESSION["userName"],$_SESSION["useremail"],"",$role);
   $courPlusEtudiants=$admin->courPlusEtudiantsConreller();
   $totaleCours=$admin->totalCourConreller();
   $topEnseignants=$admin->topEnseignantsConreller();



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
            
<?php   include './seadbar.php'  ?>

<div class="p-4 sm:ml-64 bg-gray-50 p-4">
   <div class="mb-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Total des Cours</h3>
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo $totaleCours->total_cours?></p>
        </div>
    </div>

   


    <div class="mb-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Cours le Plus Populaire</h3>
            <div class="flex items-start space-x-4">
                <div class="bg-gray-100 rounded-lg w-16 h-16 flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900"><?php echo $courPlusEtudiants->titre?></h4>
                    <p class="text-sm text-gray-500 mt-1"><?php echo $courPlusEtudiants->description?></p>
                    <div class="mt-2 flex items-center">
                        <span class="text-2xl font-bold text-gray-900"><?php echo $courPlusEtudiants->max_nombre_etudiants?></span>
                        <span class="ml-2 text-sm text-gray-500">étudiants inscrits</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Top 3 Enseignants</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                  
                <?php for ($i=0; $i <count($topEnseignants); $i++) { 
                        ?>
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-100 text-blue-600 font-bold rounded-full w-8 h-8 flex items-center justify-center">
                        <?php echo $i+1 ?>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900"><?php echo $topEnseignants[$i]->name ?></p>
                            <p class="text-sm text-gray-500"><?php echo $topEnseignants[$i]->nombre_cours?> cours </p>
                        </div>
                    </div>
                </div>
             <?php } ?>
            </div>
        </div>
    </div>
​
</div>

        </main>
    </body>
    </html>