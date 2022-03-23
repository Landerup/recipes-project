let addInput = document.getElementById("addIngredient");

addInput.addEventListener("click", addIngredient);

function addIngredient() {
    let inDiv = document.getElementById('ingredientDiv');
    let newInput = document.createElement("input");

   newInput.setAttribute("type","text");
    newInput.setAttribute("class","form-control my-2");
    newInput.setAttribute("placeholder","Write here");
    newInput.setAttribute("name","ingredient[]");


    inDiv.appendChild(newInput);
}
