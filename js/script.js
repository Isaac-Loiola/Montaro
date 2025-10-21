let menorQueZero = document.getElementById("alertaMenor");

menorQueZero.addEventListener("change", ()=>{
    let valor = parseFloat(menorQueZero.innerHTML());
    if(valor < 0 ){
        menorQueZero.hidden = "false";
    }
})