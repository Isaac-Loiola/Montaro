const date = document.getElementById("data");
const hour = document.getElementById("hora")

async function callApi(url) {
    const response = await fetch(url);
    if (response.status == 200) {
        const object = await response.json();
        return object;
    }
}


date.addEventListener("change", async () => {
    let valueDate = date.value.toString();
    
    const URL = "http://127.0.0.1/montaro/php/api/fetch.php?data=" + valueDate;
    const response = await callApi(URL);

    response.forEach(element => {
        let option = document.createElement("option");
        option.value = element['horario'];
        option.textContent = element['horario'].toString().slice(0,5);

        hour.appendChild(option);
    });

    hour.disabled = false;
});