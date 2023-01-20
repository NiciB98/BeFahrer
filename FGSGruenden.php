<?php

    require('config.php');

    $CFGS_datum = $_POST["startdatum"];
    $CFGS_kosten = $_POST["kosten"];
    $CFGS_plaetze = $_POST["plaetze"];

    $CFGS_Sadresse = $_POST["Sadresse"];
    $CFGS_SPLZ = $_POST["SPLZ"];
    $CFGS_Sstadt = $_POST["Sstadt"];
    
    $CFGS_Eadresse = $_POST["Eadresse"];
    $CFGS_EPLZ = $_POST["EPLZ"];
    $CFGS_Estadt = $_POST["Estadt"];
    

    //spaltennamen definieren (aus DB)
    //:Name sind platzhalter
    $CreateFGSsql = "
    INSERT INTO Address (Street_Address, Zip_Code, City)
    VALUES 
        (:SAddress, :SPLZ, :SCity),
        (:EAddress, :EPLZ, :ECity)

    INSERT INTO Fahrgemeinschaft ('ID_fahrgemeinschaft', Startdatum, Kosten, Status, Plaetze)
    VALUES (NULL, :Startdatum, :Kosten, :Status, :Plaetze);";
    
    $stmt = $pdo->prepare($CreateFGSsql);

    $erfolg = $stmt->execute(array( 'Startdatum' => $CFGS_datum, 
                                    'Kosten' => $CFGS_kosten, 
                                    'Status' => 'Plaetze verfuegbar', 
                                    'Plaetze' => $CFGS_plaetze,
                                    
                                    'SAddress' => $CFGS_Saddress,
                                    'SPLZ' => $CFGS_Splz,
                                    'SCity' => $CFGS_Scity,

                                    'EAddress' => $CFGS_Eaddress,
                                    'EPLZ' => $CFGS_Eplz,
                                    'ECity' => $CFGS_Ecity
                                ));


    if ($erfolg) 
    {
        print_r('Registrierung erfolgreich.');
    } 
    else 
    {
        print_r($erfolg);
    };

?>