<?php

    require('config.php');

    $LOG_email = $_POST["LOG_email"]; 
    $LOG_password = $_POST["LOG_password"];
    
    $CreateFGSsql = "SELECT * FROM user WHERE EMail = '$LOG_email'";
    
    $stmt = $pdo->prepare($CreateFGSsql);

    $erfolg = $stmt->execute();

    if($erfolg)
    {
        $array = $stmt->fetchALL();

        $anzahlResultate = count($array);

        if ($anzahlResultate == 1)
        {
            $dbPassword = $array[0]['Password']; //DB-Zeilenname
            $userID = $array[0]['ID_user'];
            pruefepassword($LOG_password, $dbPassword, $userID);
        }
        else
        {
            sendeAntwort("Dieser User existiert nicht", 0, 0);
        }

        //$jsonArray = json_encode($array);
        //print_r($jsonArray);

    }

function pruefepassword($loginPW, $dbPW, $userID)
{
    if (password_verify($loginPW, $dbPW))
    {
        //print_r('Anmeldedaten korrekt. ');

        erstelleToken($userID); 
    }
    else 
    {
        sendeAntwort('Ihr Passwort ist inkorrekt!', 0, 0);
    }
}

function erstelleToken($userID)
{

    require('config.php');

    //variablen definieren, für gebrauch im execute
    //geben notice: undefined index    
    $Token = generateRandomString(42);
    
    $CreateUsersql = "
    INSERT INTO Session (FS_user, Token) 
    VALUES (:FS_User, :Token);";
 
    $stmt = $pdo->prepare($CreateUsersql);

    $erfolg = $stmt->execute(array( 'FS_User' => $userID, 
                                    'Token' => $Token));

    if ($erfolg) 
    {
        //print_r('Session erfolgreich erstellt.');
        sendeAntwort("Session erfolgreich erstellt", $userID, $Token);
    } 
    else 
    {
        //print_r($pdo);
        //print_r($erfolg); 
        sendeAntwort("registrierung nicht erfolgreich :(", 0, 0);
    };



}

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendeAntwort($nachricht, $userID, $token)
{
    $antwort = [$nachricht, $userID, $token];

    $antwort = json_encode($antwort);

    print($antwort);
}

?>