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
    <title> Youdemy | Home Page</title>
  </head>
  <body class="bg-gray-50">
    <!-- Navigation -->
    <nav x-data="{ isOpen: false }" 
         class="bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg">
        <div class="container mx-auto px-6 py-4 md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <a href="#" class="flex items-center">
                    <svg class="w-10 h-10 mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 14L21 9L12 4L3 9L12 14Z" fill="white"/>
                        <path d="M12 14L16.2426 11.7574C16.6331 11.9147 17.0037 12.0978 17.3536 12.3536L12 16L6.64645 12.3536C6.99634 12.0978 7.36686 11.9147 7.7574 11.7574L12 14Z" fill="white"/>
                        <path d="M12 20L16.2426 17.7574C16.6331 17.9147 17.0037 18.0978 17.3536 18.3536L12 22L6.64645 18.3536C6.99634 18.0978 7.36686 17.9147 7.7574 17.7574L12 20Z" fill="white"/>
                    </svg>
                    <span class="text-2xl font-bold text-white">LearnHub</span>
                </a>

                <div class="flex md:hidden">
                    <button @click="isOpen = !isOpen" 
                            class="text-white focus:outline-none">
                        <svg x-show="!isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div x-cloak 
                 x-show="isOpen || window.innerWidth >= 768"
                 class="md:flex md:items-center md:space-x-6 
                        transform transition-all duration-300 
                        absolute md:relative top-full left-0 
                        w-full md:w-auto bg-gradient-to-r 
                        from-indigo-600 to-purple-600 
                        md:bg-none z-50">
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6 p-4 md:p-0">
                    <a href="../index.php" 
                       class="text-white hover:bg-white/20 px-3 py-2 rounded-md transition-colors">
                        Courses
                    </a>
                    <a href="./pages/about.php" 
                       class="text-white hover:bg-white/20 px-3 py-2 rounded-md transition-colors">
                        About
                    </a>
                    <a href="#" 
                       class="text-white hover:bg-white/20 px-3 py-2 rounded-md transition-colors">
                        Community
                    </a>
                </div>

                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 p-4 md:p-0">
                    <a href="../auth/logIn.php" 
                       class="text-white bg-white/20 hover:bg-white/30 px-4 py-2 rounded-full transition-colors">
                        Log In
                    </a>
                    <a href="../auth/signUp.php" 
                       class="text-indigo-600 bg-white hover:bg-gray-100 px-4 py-2 rounded-full transition-colors font-semibold">
                        Start Learning
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="h-[80vh] bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg text-white py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Notre Histoire</h2>
            <p class="text-xl max-w-2xl mx-auto">Transformons ensemble l'éducation en ligne pour créer un avenir meilleur</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto py-16 px-4">
        <!-- Mission Section -->
        <div class="mb-16">
            <h3 class="text-3xl font-bold text-gray-800 mb-6">Notre Mission</h3>
            <p class="text-gray-600 leading-relaxed mb-8">
                YOUdumy est née de la conviction que l'éducation de qualité devrait être accessible à tous. Notre plateforme connecte des experts passionnés avec des apprenants motivés du monde entier.
            </p>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">1M+</div>
                <div class="text-gray-600">Étudiants Actifs</div>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">10K+</div>
                <div class="text-gray-600">Cours Disponibles</div>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                <div class="text-gray-600">Pays Représentés</div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="mb-16">
            <h3 class="text-3xl font-bold text-gray-800 mb-6">Notre Équipe</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="../images/WhatsApp Image 2025-01-02 at 22.14.47.jpeg" alt="CEO" class="rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-bold text-gray-800 text-center">Abdel Ilah ESSEMLALI</h4>
                    <p class="text-gray-600 text-center">CEO & Fondatrice</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="../images/WhatsApp Image 2025-01-02 at 22.14.47.jpeg" alt="CTO" class="rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-bold text-gray-800 text-center">Abdel Ilah ESSEMLALI</h4>
                    <p class="text-gray-600 text-center">Directeur Technique</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="../images/WhatsApp Image 2025-01-02 at 22.14.47.jpeg" alt="COO" class="rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-bold text-gray-800 text-center">Abdel Ilah ESSEMLALI</h4>
                    <p class="text-gray-600 text-center">Directrice des Opérations</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="bg-gray-50">
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- En-tête de la section -->
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-4">Contactez-nous</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Une question ? Un projet ? Parlons-en ensemble. Notre équipe est là pour vous accompagner.
                </p>
            </div>

            <!-- Grille principale -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Informations de contact -->
                <div class="space-y-8 bg-white p-8 rounded-2xl shadow-lg">
                    <div class="space-y-6">
                        <h3 class="text-2xl font-semibold text-gray-900">Nos coordonnées</h3>
                        
                        <!-- Cartes d'information -->
                        <div class="space-y-4">
                            <!-- Email -->
                            <div class="flex items-center p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                                <div class="bg-blue-600 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Email</h4>
                                    <p class="text-gray-600">contact@youdumy.com</p>
                                </div>
                            </div>

                            <!-- Téléphone -->
                            <div class="flex items-center p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                                <div class="bg-blue-600 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Téléphone</h4>
                                    <p class="text-gray-600">+33 1 23 45 67 89</p>
                                </div>
                            </div>

                            <!-- Localisation -->
                            <div class="flex items-center p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                                <div class="bg-blue-600 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-900">Adresse</h4>
                                    <p class="text-gray-600">123 Avenue de l'Innovation, Paris</p>
                                </div>
                            </div>
                        </div>

                        <!-- Réseaux sociaux -->
                        <div class="pt-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Suivez-nous</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-blue-600 p-3 rounded-full text-white hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="bg-blue-600 p-3 rounded-full text-white hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="bg-blue-600 p-3 rounded-full text-white hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de contact -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="first_name">
                                    Prénom
                                </label>
                                <input type="text" id="first_name" name="first_name" 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="last_name">
                                    Nom
                                </label>
                                <input type="text" id="last_name" name="last_name" 
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="email">
                                Email
                            </label>
                            <input type="email" id="email" name="email" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="subject">
                                Sujet
                            </label>
                            <select id="subject" name="subject" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors">
                                <option value="">Sélectionnez un sujet</option>
                                <option value="support">Support technique</option>
                                <option value="sales">Service commercial</option>
                                <option value="other">Autre demande</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="message">
                                Message
                            </label>
                            <textarea id="message" name="message" rows="4" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-colors resize-none"></textarea>
                        </div>

                        <button type="submit" 
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-2">
                            <span>Envoyer le message</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>

     <!-- footer -->
     <footer class="bg-white">
      <hr>
      <div class="mx-auto max-w-screen-xl px-4 pb-8 pt-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-md">
          <strong class="block text-center text-xl font-bold text-gray-900 sm:text-3xl">
            Want us to email you with the latest blockbuster news?
          </strong>

          <form class="mt-6">
            <div class="relative max-w-lg">
              <label class="sr-only" for="email"> Email </label>

              <input
                class="w-full rounded-full border-gray-200 bg-gray-100 p-4 pe-32 text-sm font-medium"
                id="email"
                type="email"
                placeholder="john@doe.com"
              />

              <button
                class="absolute end-1 top-1/2 -translate-y-1/2 rounded-full bg-blue-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-blue-700"
              >
                Subscribe
              </button>
            </div>
          </form>
        </div>

        <div class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-32">
          <div class="mx-auto max-w-sm lg:max-w-none">
            <p class="mt-4 text-center text-gray-500 lg:text-left lg:text-lg">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium natus quod eveniet
              aut perferendis distinctio iusto repudiandae, provident velit earum?
            </p>

            <div class="mt-6 flex justify-center gap-4 lg:justify-start">
              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Facebook </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Instagram </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Twitter </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> GitHub </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>

              <a
                class="text-gray-700 transition hover:text-gray-700/75"
                href="#"
                target="_blank"
                rel="noreferrer"
              >
                <span class="sr-only"> Dribbble </span>

                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-3 lg:text-left">
            <div>
              <strong class="font-medium text-gray-900"> Services </strong>

              <ul class="mt-6 space-y-1">
                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Marketing </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                    Graphic Design
                  </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                    App Development
                  </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#">
                    Web Development
                  </a>
                </li>
              </ul>
            </div>

            <div>
              <strong class="font-medium text-gray-900"> About </strong>

              <ul class="mt-6 space-y-1">
                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> About </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Careers </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> History </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Our Team </a>
                </li>
              </ul>
            </div>

            <div>
              <strong class="font-medium text-gray-900"> Support </strong>

              <ul class="mt-6 space-y-1">
                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> FAQs </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Contact </a>
                </li>

                <li>
                  <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Live Chat </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="mt-16 border-t border-gray-100 pt-8">
          <p class="text-center text-xs/relaxed text-gray-500">
            © Company 2022. All rights reserved.

            <br />

            Created with
            <a href="#" class="text-gray-700 underline transition hover:text-gray-700/75">Laravel</a>
            and
            <a href="#" class="text-gray-700 underline transition hover:text-gray-700/75"
              >Laravel Livewire</a
            >.
          </p>
        </div>
      </div>
    </footer>
</body>
</html>