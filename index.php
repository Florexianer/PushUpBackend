<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");


if(isset($_POST)) {

    $response = json_decode(file_get_contents('php://input'),true);
    if($response['before'] && $response['after']) {
        $db = new PDO("sqlite:" . __DIR__ . "/pushUp");
        /*$query = $db->prepare("
    INSERT INTO Transformation(before, after) VALUES (?,?)");
        echo 'heeeeeeey';
        $result = $query->execute([$response['before'],$response['after']]);*/

        $query = $db->prepare("
UPDATE User
SET before = ?, after = ?
WHERE pk_username = ?");
        $result = $query->execute([$response['before'],$response['after'],$response['username']]);
    } else if($response['before']) {
        header("Status: 400 Bad Request");
        echo 'You need to send a before image';
    } else if($response['after']) {
        header("Status: 400 Bad Request");
        echo 'You need to send a after image';
    }
}