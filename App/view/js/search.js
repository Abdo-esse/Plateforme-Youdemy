

const searchKeyword=async ()=>{
   let keyword= document.querySelector('#keyword').value
   let coursContanaire=document.querySelector("#coursContanaire")
   if (!keyword) {
    // coursContanaire.innerHTML = "Veuillez entrer un mot-clé.";
       return;
   }

   try {
       const req = await fetch(`http://localhost/Plateforme-Youdemy/App/view/etudiant/search.php?keyword=${keyword}`);

       const json = await req.json();
       console.log(json);


       

       if (json.length > 0) {
        coursContanaire.innerHTML =''
           json.forEach((nom) => {
            console.log(nom);
            
            coursContanaire.innerHTML += `<article  class="bg-white mt-4 rounded-xl shadow hover:shadow-md transition-shadow duration-300">
<div class="relative">
  <iframe class="w-full h-40 object-cover rounded-t-xl" src="${nom.photoCouverture}" frameborder="0"></iframe>

  <!-- Catégorie -->
  <span class="absolute top-2 left-2 bg-purple-500 text-white text-xs px-2 py-1 rounded-full">
  ${nom.categories}
  </span>
</div>

<div class="p-4">
  <div class="mb-2">
    <h3 class="text-lg font-semibold line-clamp-1">${nom.titre}</h3>
  </div>
  
  <!-- Tags -->
  <div class="flex flex-wrap gap-1 mb-2">
  
      <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded">${nom.tags}</span>
   
  </div>

  <p class="text-gray-600 text-sm line-clamp-2 mb-3">
  ${nom.description}
  </p>
  
  <div class="space-y-1.5 mb-4">
    <div class="flex items-center text-gray-500 text-sm">
      <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span> ${nom.duree}h</span>
    </div>
    <div class="flex items-center text-gray-500 text-sm">
      <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
      </svg>
      <span> ${nom.nomberChapitre}chapitres</span>
    </div>
    <!-- Ajout du nombre d'étudiants -->
    <div class="flex items-center text-gray-500 text-sm">
      <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
      </svg>
      <span>125 étudiants</span>
    </div>
  </div>

  <div class="flex justify-between items-center">
    <span class="text-blue-600 font-bold">${nom.prix}€</span>
    <a  href=" ./etudiant/details.php?id=${nom.id} 
      class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg transition-colors">
      Read More
    </a>
  </div>
</div>
</article>`;
           });
       } else {
        coursContanaire.innerHTML = "Aucun résultat trouvé.";
       }
   } catch (error) {
    coursContanaire.innerHTML = "Une erreur s'est produite lors de la recherche.";
   }
   
   
}



`<article id="coursCatalogue" class="bg-white mt-4 rounded-xl shadow hover:shadow-md transition-shadow duration-300">
<div class="relative">
  <iframe class="w-full h-40 object-cover rounded-t-xl" src="photoCouverture" frameborder="0"></iframe>

  <!-- Catégorie -->
  <span class="absolute top-2 left-2 bg-purple-500 text-white text-xs px-2 py-1 rounded-full">
  ${nom.categories}
  </span>
</div>

<div class="p-4">
  <div class="mb-2">
    <h3 class="text-lg font-semibold line-clamp-1">${nom.titre}</h3>
  </div>
  
  <!-- Tags -->
  <div class="flex flex-wrap gap-1 mb-2">
  
      <span class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded">${nom.tags}</span>
   
  </div>

  <p class="text-gray-600 text-sm line-clamp-2 mb-3">
  ${nom.description}
  </p>
  
  <div class="space-y-1.5 mb-4">
    <div class="flex items-center text-gray-500 text-sm">
      <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span> ${nom.duree}h</span>
    </div>
    <div class="flex items-center text-gray-500 text-sm">
      <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
      </svg>
      <span> ${nom.nomberChapitre}chapitres</span>
    </div>
    <!-- Ajout du nombre d'étudiants -->
    <div class="flex items-center text-gray-500 text-sm">
      <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
      </svg>
      <span>125 étudiants</span>
    </div>
  </div>

  <div class="flex justify-between items-center">
    <span class="text-blue-600 font-bold">${nom.prix}  €</span>
    <a  href=" ./etudiant/details.php?id=${nom.id} 
      class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg transition-colors">
      Read More
    </a>
  </div>
</div>
</article>`