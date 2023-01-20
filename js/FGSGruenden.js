console.log("Hello FGS Gründung!");

function FGSGruenden() {
    console.log("Du hast mich gedrückt!");
    
    let CFGS_Datum = document.getElementById("CFGS_Datum").value;
    let CFGS_Kosten = document.getElementById("CFGS_Kosten").value;
    let CFGS_Plaetze = document.getElementById("CFGS_plaetze").value;

    let CFGS_Sadresse = document.getElementById("CFGS_Sadresse").value;
    let CFGS_SPLZ = document.getElementById("CFGS_Spostleitzahl").value;
    let CGFS_SCity = document.getElementById("CFGS_Sstadt").value;

    let CFGS_Eadresse = document.getElementById("CFGS_Eadresse").value;
    let CFGS_EPLZ = document.getElementById("CFGS_Epostleitzahl").value;
    let CGFS_ECity = document.getElementById("CFGS_Estadt").value;

    //check 
    //console.log(Reg_Address + " </br> " + Reg_PLZ + " </br> " + Reg_City);

    if(CFGS_Datum == 0 || CFGS_Kosten == 0|| CFGS_Plaetze == 0|| CFGS_Sadresse == 0|| CFGS_SPLZ == 0|| CGFS_SCity == 0 || CFGS_Eadresse == 0|| CFGS_EPLZ == 0|| CGFS_ECity == 0)
    {
        alert("Bitte füllen Sie alle Felder aus");
        return;
    }


    let formData = new FormData();
    formData.append('CFGS_Datum', CFGS_Datum);
    formData.append('CFGS_Kosten', CFGS_Kosten);
    formData.append('CFGS_Plaetze', CFGS_Plaetze);
    formData.append('CFGS_Sadresse', CFGS_Sadresse);
    formData.append('CFGS_SReg_PLZ', CFGS_SPLZ);
    formData.append('CFGS_SCity', CGFS_SCity);
    formData.append('CFGS_Eadresse', CFGS_Eadresse);
    formData.append('CFGS_EReg_PLZ', CFGS_EPLZ);
    formData.append('CFGS_ECity', CGFS_ECity);

    
    fetch('https://753574-2.web.fhgr.ch/php/FGSGruenden.php', //NICOLAS, ANPASSEN
    {
        body: formData,
        method: "post",
    })

    .then((response) => {
        return response.text();
    })
    .then((data) => {
        console.log(data);
    })

    .catch(error => console.log(error))

}
