let inputValor = document.getElementById("valor");

// ------------------------
//  ALERTA VALOR MENOR 0

// pegando os elementos de input e de alerta que está como hiiden.
let alertaMin = document.getElementById("alerta_minimo");

// esperando perder o foco do input, e pegar o valor digitado.
inputValor.addEventListener("focusout", ()=>{
    // convertendo esse valor para float.
    let valor = parseFloat(inputValor.value);
    
    // caso seja negativo, mostre o alerta.
    if(valor <= 0 ){
        alertaMin.hidden = false;
    }
    else{
        // caso não for torne o alerta invisivel
        alertaMin.hidden = true;
    }
})

// ------------------------
// ALERTA VALOR MAIOR QUE R$1000,00
let alertaMax = document.getElementById("alerta_maximo");

inputValor.addEventListener("focusout", () => {
    let valor = parseFloat(inputValor.value);

    if(valor >= 1000){
        alertaMax.hidden = false;
    }
    else{
        alertaMax.hidden = true;
    }
})

// -----------------------
// ALERTA INPUT DE LETRAS
let alertaLet = document.getElementById("alerta_letra"); // alerta letra.
    inputValor.addEventListener("focusout", () =>{
        let valor = parseFloat(inputValor.value);

        if(isNaN(valor)){
            alertaLet.hidden = false;
        }
        else{
            alertaLet.hidden = true;
        }
    })


// fetch API 

const URL = "../php/api/fetch.php";

async function callApi(){
    const response = await fetch(URL);
    console.log(response);
}