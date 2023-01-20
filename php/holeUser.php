<?php

    //echo "im holeUser.php angekommen";

    require("config.php");


    $userID = 61;

    $sql = "SELECT * FROM user WHERE ID_user = $userID";

    $stmt = $pdo->prepare($sql);

    $erfolg = $stmt->execute();

    if ($erfolg) {

    $array = $stmt->fetchAll();

    $jsonArray = json_encode($array);

    print_r($jsonArray);
}


?>