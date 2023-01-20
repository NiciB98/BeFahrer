console.log("Hello Login!");

function login() {
    console.log("Du hast mich gedrückt!");
    
    let LOG_email = document.getElementById("LOG_email").value;
    let LOG_password = document.getElementById("LOG_password").value;

    //check 
    console.log(LOG_email + "  " + LOG_password);

    let formData = new FormData();
    formData.append('LOG_email', LOG_email);
    formData.append('LOG_password', LOG_password);
    
    fetch('https://753574-2.web.fhgr.ch/php/login.php', //NICOLAS, ANPASSEN
    {
        body: formData,
        method: "post",
    })

    .then((response) => {
        return response.json();
    })
    .then((data) => {
        console.log(data);
        document.querySelector('#nachricht').innerHTML = data[0];

        localStorage.setItem("userID", data[1]);
        localStorage.setItem("userToken", data[2]);

        if (data[1] != 0 && data[2] != 0) //user-id wird gespeichert
        {
            window.location.href= "https://753574-2.web.fhgr.ch/index.html";
        }
    
    })


    .catch(error => console.log(error))

}
