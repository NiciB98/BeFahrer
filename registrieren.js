console.log("Hello Registrierung");

function registrieren() {
    console.log("Du hast mich gedrückt!");
    
    let Reg_Firstname = document.getElementById("Reg_vorname").value;
    let Reg_Lastname = document.getElementById("Reg_nachname").value;
    let Reg_Username = document.getElementById("Reg_benutzername").value;
    let Reg_EMail = document.getElementById("Reg_email").value;
    let Reg_Password = document.getElementById("Reg_password").value;
    let Reg_Short_Desc = document.getElementById("Reg_shortdescription").value;
    let Reg_Address = document.getElementById("Reg_adresse").value;
    let Reg_PLZ = document.getElementById("Reg_postleitzahl").value;
    let Reg_City = document.getElementById("Reg_stadt").value;
    
    //check 
    //console.log(Reg_Address + " </br> " + Reg_PLZ + " </br> " + Reg_City);
    if(Reg_Firstname == 0 || Reg_Lastname == 0|| Reg_Username == 0|| Reg_EMail == 0|| Reg_Password == 0|| Reg_Short_Desc == 0 || Reg_Address == 0|| Reg_PLZ == 0|| Reg_City == 0)
    {
        alert("Bitte füllen Sie alle Felder aus");
        return;
    }

    let formData = new FormData(); 
    formData.append('Reg_Firstname', Reg_Firstname);
    formData.append('Reg_Lastname', Reg_Lastname);
    formData.append('Reg_Username', Reg_Username);
    formData.append('Reg_EMail', Reg_EMail);
    formData.append('Reg_Password', Reg_Password);
    formData.append('Reg_Short_Desc', Reg_Short_Desc);
    formData.append('Reg_Address', Reg_Address);
    formData.append('Reg_PLZ', Reg_PLZ);
    formData.append('Reg_City', Reg_City);

    
    fetch('https://753574-2.web.fhgr.ch/php/registrieren.php', //NICOLAS, ANPASSEN
    {
        body: formData,
        method: "post",
    })

    .then((response) => {
        return response.text();
    })
    .then((data) => {
        
        document.querySelector('#nachricht').innerHTML = data;
        console.log(data);
    })

    .catch(error => console.log(error))

    //INSERT INTO user (First_Name, Last_Name, Username, Password, EMail, ShortDescription)
    //VALUES (Reg_Firstname, Reg_Lastname, Reg_Username, Reg_Password, Reg_EMail, Reg_Short_Desc);

    //INSERT INTO Address (Street_Address, Zip_Code, City)
    //VALUES (Reg_Address, Reg_PLZ, Reg_City);

}
