console.log("PP Registrierung erfolgt.")

function erfassen () {
    let strasse = document.querySelector("#strasse").value;
    let plz = document.querySelector("#plz").value;
    let ort = document.querySelector("#ort").value;
    let startdatum = document.querySelector("#startdatum").value;
    let enddatum = document.querySelector("#enddatum").value;

    // console.log(vname + nname + mail + password + fznr + iban);

    let formData = new FormData();
    formData.append('strasse', strasse);
    formData.append('plz', plz);
    formData.append('ort', ort);
    formData.append('startdatum', startdatum);
    formData.append('enddatum', enddatum);

    fetch("https://530624-3.web.fhgr.ch/php/ppreg.php",
        {
            body: formData,
            method: "post",
        })

        .then((response) => {

            return response.text();

        })
        .then((data) => {
            window.location.href = "https://530624-3.web.fhgr.ch/index.html";
            //  console.log("resultat aus php", data);
            document.querySelector('#nachricht').innerHTML = data;


        })

}