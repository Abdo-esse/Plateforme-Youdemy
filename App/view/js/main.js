// form des input
let workExperienceForm = document.querySelector("#form-work-experience");

// Parent des inputs
let parentWorkExperience = document.querySelector(".parent-input");

//button de add work experience
let addWorkExperienceBtn = document.querySelector("#add-work-experience");





// La function de  add Work Experience
function addWorkExperience() {
  let newForme = parentWorkExperience.cloneNode(true);
  let dataform = newForme.querySelector(".input-value");
  dataform.value = "";
 
  workExperienceForm.appendChild(newForme);
}









// Declaration du fonction

// la function de add Work Experience
addWorkExperienceBtn.addEventListener("click", addWorkExperience);
// la function de save data
// saveData.addEventListener("click", saevAndPrin);
