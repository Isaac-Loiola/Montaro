// fetch API 

const URL = "http://127.0.0.1/montaro/php/api/fetch.php";

async function callApi(){
    const response = await fetch(URL);
    if(response.status == 200){
        const object = await response.json();
        console.log(object); 
    }
}

callApi();