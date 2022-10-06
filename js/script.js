var qtdExperiencias = 1;

function addExperiencia(){
    var divExp = document.getElementById("experiencia");
    var exp = document.createElement("input");

    qtdExperiencias++;

    exp.type = "text";
    exp.setAttribute("class", "form-control mt-2"); 
    exp.setAttribute("name", "exp[" + qtdExperiencias + "]"); 

    divExp.appendChild(exp);
}
