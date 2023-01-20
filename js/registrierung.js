
// console.log("hallo");

function registrieren() {

    let vname = document.querySelector("#vname").value;
    let nname = document.querySelector("#nname").value;
    let mail = document.querySelector("#mail").value;
    let password = document.querySelector("#password").value;
    let fznr = document.querySelector("#fznr").value;
    let iban = document.querySelector("#iban").value;

    let formData = new FormData();
    formData.append('vname', vname);
    formData.append('nname', nname);
    formData.append('mail', mail);
    formData.append('password', password);
    formData.append('fznr', fznr);
    formData.append('iban', iban);

    fetch("https://530624-3.web.fhgr.ch/php/registrierung.php",
        {
            body: formData,
            method: "post",
        })

        .then((response) => {

            return response.text();

        })
        .then((data) => {
            window.location.href = "https://530624-3.web.fhgr.ch/login.html";
            // console.log("resultat aus php", data);
            document.querySelector('#nachricht').innerHTML = data;


        })

}
