console.log("Hallo Welt");

loggedIn();

holePP();

function loggedIn() {

    fetch("https://530624-3.web.fhgr.ch/php/auth.php")

        .then((response) => {

            return response.json();

        })
        .then((data) => { 

            console.log(data);

            if (data.status === "logged in") {

                displayUser();

                document.getElementById("registrierung").style.display = "none";
                document.getElementById("login").style.display = "none";

            } else {

                document.getElementById("konto").style.display = "none";

            }

        })

}

function displayUser() {

    fetch("https://530624-3.web.fhgr.ch/php/holeUser.php")

        .then((res) => {

            return res.json();

        })

        .then((data) => {

    // mache etwas
    //console.log(data);

    console.log(data);

    // document.getElementById("konto").style.display = "none";

    let username = document.querySelector("#vname");
    username.innerHTML = data[0].vorname;
    

})

}


function holePP() {
    fetch("https://530624-3.web.fhgr.ch/php/holePP.php",

    )

    .then((res) => {
        

        return res.json();


    })
    .then((data) => {

        console.log("Wir holen den Parkplatz", data);
        PPAnzeigen(data);
    
    })
}


function PPAnzeigen(data) {

    data.forEach(pp => {


        let ppContainer = document.createElement("div");
        ppContainer.innerHTML =

            '<div class="pp">' +
                    '<div class="strasse">' +
                        '<p>' + pp.strasse + ' , '+ pp.plz + ' ' + pp.ort + '</p>' +
                    '</div>' +
                    '<div class="startdatum">' +
                        '<p>' + 'Verfügbar von: ' +
                        pp.startdatum + ' bis ' + pp.enddatum + '</p>' + 
            '</div>';

        document.getElementById("liste-pp").appendChild(ppContainer);

    });
}


function suchePP(plz, startdatum, enddatum) {
    let formData = new FormData();
    formData.append('plz', plz);
    formData.append('startdatum', startdatum);
    formData.append('enddatum', enddatum);


    console.log("anfang von SuchePP");
    fetch("https://530624-3.web.fhgr.ch/php/suchePP.php",

    {
        body: formData,
        method: "post",
    }

    )

    .then((res) => {

        
        return res.json();


    })
    .then((data) => {

        console.log("Suchresultat aus Datenbank ", data);
        PPSuchanzeige(data);
    
    })
}


function PPSuchanzeige(data) {
    document.getElementById("liste-pp").innerHTML="";
    data.forEach(pp => {


        let ppContainer = document.createElement("div");
        ppContainer.innerHTML =

        '<div class="pp">' +
        '<p>' + pp.strasse + '</p>' +
        '<p>' + pp.plz + " " + pp.ort + '</p>' +
        '<p>' + 'Startdatum: ' + pp.startdatum + '</p>' +
        '<p>' + 'Enddatum: ' + pp.enddatum + '</p>' +
        '</div>';

            
        document.getElementById("liste-pp").appendChild(ppContainer);

    });
}
