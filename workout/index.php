<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");


if(isset($_POST)) {

    $response = json_decode(file_get_contents('php://input'),true);
    if(isset($response['start']) && isset($response['end']) && isset($response['pushUps']) && isset($response['username'])) {
        $db = new PDO("sqlite:" . __DIR__ . "/../pushUp");

        $query = $db->prepare("INSERT INTO Workout (start, end, pushUpCount, fk_pk_username)
            VALUES (?,?,?,?)");
        $result = $query->execute([$response['start'],$response['end'],$response['pushUps'],$response['username']]);
        echo 'suc';
    }
}