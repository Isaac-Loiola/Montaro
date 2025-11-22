const date = document.getElementById("data");
const hour = document.getElementById("hora")

const URL = "http://127.0.0.1/montaro/php/api/fetch.php";

async function callApi() {
    const response = await fetch(URL);
    if (response.status == 200) {
        const object = await response.json();
        return object;
    }
}


date.addEventListener("change", async () => {
    const response = await callApi();

    response.forEach(element => {
        let option = document.createElement("option");
        option.value = element;
        option.textContent = element.toString();

        hour.appendChild(option);
    });

    hour.disabled = false;
});