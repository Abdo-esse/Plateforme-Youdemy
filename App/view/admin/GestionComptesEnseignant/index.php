<?php
session_start();
if ( $_SESSION["userrole"]!="Administrateur") {
  
    session_destroy();
    header("Location: ../auth/logIn.php"); 
    exit(); 
 }
     require __DIR__ . '/../../../../vendor/autoload.php'; 
     use App\Class\Role; 
    use App\controller\AdminC;
    $role = new Role(1);
     $admin= new AdminC( $_SESSION["userName"],$_SESSION["useremail"],"",$role);
      $_SESSION["ComptesEnseignant"]=$admin->afficherComptesEnseignantsEnCoursConreller();

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
    <title> Youdemy | Catégories</title>
  </head>
    <body>

        
        <main>
            
        <?php   include '../seadbar.php'  ?>

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
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Name
                </th>
                <th scope="col" class="px-6 py-3">
                   E-mail
                </th>
                <th scope="col" class="px-6 py-3">
                   Date demande
                </th>
                <th scope="col" class="px-6 py-3">
                Accepter
                </th>
                <th scope="col" class="px-6 py-3">
                Refuser
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
             foreach ($_SESSION["ComptesEnseignant"] as $Comptes) {
                        ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $Comptes->name?>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $Comptes->email?>
                </td>
                <td class="px-6 py-4">
                <?php echo $Comptes->dateCreation;?>
                </td>
                <td class="px-6 py-4">
                    <a href="./validerEnseignant.php?id=<?php echo $Comptes->id?>&idEnseignant=<?php echo $Comptes->enseignants?>&etatCompte=accepter" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accepter</a>
                </td>
                <td class="px-6 py-4">
                    <a href="./validerEnseignant.php?id=<?php echo $Comptes->id?>&idEnseignant=<?php echo $Comptes->enseignants?>&etatCompte=refuser" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Refuser</a>
                </td>
            </tr>
            <?php
             
                }
            ?>
        </tbody>
    </table>
</div>


</div>

        </main>
    </body>
    </html>