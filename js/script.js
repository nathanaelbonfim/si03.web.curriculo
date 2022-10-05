
function addExperiencia(){
    var divExp = document.getElementById("experiencia");
    var exp = document.createElement("input");
    exp.type = "text";
    exp.setAttribute("class", "form-control mt-2"); 
    exp.setAttribute("name", "exp2"); 

    divExp.appendChild(exp);
}
