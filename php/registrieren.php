<?php

    require('config.php');

    //print_r('Im PHP angekommen');

    //variablen definieren, für gebrauch im execute
    //geben notice: undefined index    
    $VReg_email = $_POST["Reg_EMail"];
    $VReg_username = $_POST["Reg_Username"];
    $VReg_password = $_POST["Reg_Password"];
    $VReg_firstname = $_POST["Reg_Firstname"];
    $VReg_lastname = $_POST["Reg_Lastname"];

    $VReg_short_desc = $_POST["Reg_Short_Desc"];

    $VReg_address = $_POST["Reg_Address"];
    $VReg_PLZ = $_POST["Reg_PLZ"];
    $VReg_city = $_POST["Reg_City"];
    
    $VReg_password = password_hash($VReg_password, PASSWORD_DEFAULT);

    //idk how to make the foreign keys work so imma just yolo it like this ¯\_(ツ)_/¯
    $TotallyLegitFS = rand(1, 100);

    //spaltennamen definieren (aus DB)
    //:Name sind platzhalter
    
    $CreateUsersql = "
    INSERT INTO Address (Street_Address, Zip_Code, City)
    VALUES (:Address, :PLZ, :City);

    INSERT INTO user (First_Name, Last_Name, Username, Password, EMail, ShortDescription, FS_Address) 
    VALUES (:Firstname, :Lastname, :Username, :Password, :Email, :Short_desc, :AddressFS);";
 
    $stmt = $pdo->prepare($CreateUsersql);

    $erfolg = $stmt->execute(array( 'Firstname' => $VReg_firstname, 
                                    'Lastname' => $VReg_lastname, 
                                    'Username' => $VReg_username, 
                                    'Password' => $VReg_password,
                                    'Email' => $VReg_email,
                                    'Short_desc' => $VReg_short_desc,
                                    'AddressFS' => $TotallyLegitFS,
                                
                                    'Address' => $VReg_address,
                                    'PLZ' => $VReg_PLZ,
                                    'City' => $VReg_city));

    if ($erfolg) 
    {
        print_r('Registrierung erfolgreich.');
    } 
    else 
    {
        print_r($pdo);
        print_r($erfolg); 
        print_r("registrierung nicht erfolgreich :(");
    };

?>