
function update() {

    // event.preventDefault()

    console.log('edit user');
    // Formulardaten in Body übertragen
    let nachname = document.querySelector('#nname').value;
    let mail = document.querySelector('#mail').value;
    let password = document.querySelector('#password').value;
    let fz_nr = document.querySelector('#fz_nr').value;
    let iban = document.querySelector('#iban').value;


    let formData = new FormData();
    formData.append('nachname', nachname);
    formData.append('mail', mail);
    formData.append('password', password);
    formData.append('fz_nr', fz_nr);
    formData.append('iban', iban);


    fetch("https://530624-3.web.fhgr.ch/php/updatekonto.php",
    {
        body: formData,
        method: "post",

    })

        .then((response) => {

            return response.text();

        })

        .then((data) => {

        console.log(data);
        let nachricht = document.querySelector("#updatenachricht");
            nachricht.textContent = data

            nachricht.style.color = "green";

        })
        window.location.href = "https://530624-3.web.fhgr.ch/konto.html";

}