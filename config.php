<?php

     //NICOLAS - USER, PASSWORD UND DBNAME MIT DEINEN DATEN AUSTAUSCHEN (infos auf intranet)
     $host = "localhost";
     $user = "753574_2_1";       //ÄNDERN
     $password = "b5GUzAmqYjVR"; //ÄNDERN
     $dbname = "753574_2_1";     //ÄNDERN
 
 
    $pdo = new PDO('mysql:host='. $host . '; dbname=' . $dbname . ';charset=utf8', $user, $password);
    $pdo->exec("set names utf8");

    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

    //print_r($pdo);

?>