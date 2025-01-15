<?php 
require_once __DIR__ . '/../../../../vendor/autoload.php'; 

// use App\classes\Categorie;
//  session_start();
//  $Categories= new Categorie();
//    $_SESSION["categories"]=$Categories->readCategorie();
//    use App\classes\Tag;
//  $tags= new Tag();
//  $_SESSION["tags"]=$tags->readtag();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruteur</title>
      <!-- tailwind -->
    <!-- carousel -->
    <link
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: "#da373d",
            },
          },
        },
      };
    </script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
</head>
<body>
<form action="../../../Controllers/recruteur/addOffre.php" method="post"  class="card max-w-sm mx-auto p-2">
            <div class="mb-2">
              <label
                for="name"
                class="block mb-2 text-sm font-medium text-gray"
                >Post</label
              >
              <input
                type="name"
                id="name"
                name="post"
                class="inputsText fullName bg-gray-50 border border-gray-300 outline-none text-gray text-sm rounded-lg focus:ring-0 focus:border-transparent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray"
                placeholder="Full-Name"
                required
              />
            </div>
            <div class="mb-2">
              <label
                for="photoJeuor"
                class="block mb-2 text-sm font-medium text-gray dark:text-gray"
                >Salaire proposé</label
              >
              <input
                type="text"
                id="photoJeuor"
                name="salaire"
                class="inputsLien photoInputs bg-gray-50 border border-gray-300 outline-none text-gray text-sm rounded-lg focus:ring-0 focus:border-transparent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray"
                placeholder="Entrer lien de limage"
                required
              />
            </div>
            <div class="mb-2">
              <label
                for="photoJeuor"
                class="block mb-2 text-sm font-medium text-gray dark:text-gray"
                >Qualifications requises</label
              >
              <textarea
               name="qualifications" 
               id=""
               class="inputsLien photoInputs bg-gray-50 border border-gray-300 outline-none text-gray text-sm rounded-lg focus:ring-0 focus:border-transparent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray"
               placeholder="Entrer lien de limage"
               ></textarea>
            </div>
            <div class="md:flex gap-2">
              <div class="mb-2">
                <label
                  for="countries"
                  class="block mb-2 text-sm font-medium text-gray dark:text-gray"
                  >Catégorie</label
                >
                <select
                  id="countries"
                  name="categorie"
                  class="selectInput positionInputs bg-gray-50 border border-gray-300 outline-none text-gray text-sm rounded-lg focus:ring-0 focus:border-transparent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray"
                >
                  <option onch value="">Choisai une  Catégorie</option>
                  <?php 
                //   foreach ($_SESSION["categories"] as $categorieItem) {
                // if ($categorieItem->date_delete == null) {
                    ?>
                         <option value="<?php ?>"><?php  ?></option>
                  <?php
            //        } 
            // }
            ?>
              </select>
              </div>

              <div class="mb-2">
                  <label
                    for="nationality"
                    class="block mb-2 text-sm font-medium text-gray dark:text-gray"
                    >Lieu de travail.</label
                  >
                  <input
                type="text"
                name="lieu"
                    class="bg-gray-50 border border-gray-300 text-gray text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Entrer lien de limage"
                required
              />
                 
                </div>
            </div>
            <div class="mb-2">
            <label for="tags" class="block text-sm font-medium text-gray-400">Tags</label>
                <select 
                    id="tags" 
                    name="tags[]" 
                    multiple 
                    class="bg-gray-50 border border-gray-300 outline-none text-gray text-sm rounded-lg focus:ring-0 focus:border-transparent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray"
                >
                <?php
            //  foreach ($_SESSION["tags"] as $tagItem) {
            //     if ($tagItem->date_delete == null) {
                    ?>
                    <option value=" <?php  ?>" ><?php  ?></option>
                <?php
            //     }
            //  } 
            ?>
                   
                </select>
            </div>

            <button
              type="submit"
              name="submit"
              class="sendData text-gray bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
            >
              submit
            </button>
            <div>
              
            </div>
          </form>
</body>
</html>