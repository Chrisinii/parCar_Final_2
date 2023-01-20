function auth() {

    let formData=new FormData();
    formData.append("submit", true)

    fetch("https://530624-3.web.fhgr.ch/php/auth.php",{
        body: formData,
        method: "post"
    })

        .then((response) => {

            return response.json();

        })
        .then((data) => { 

            console.log(data);

            if (data.status === "logged out") {

                window.location.href = "https://530624-3.web.fhgr.ch/index.html";

            }

        })

}


auth();