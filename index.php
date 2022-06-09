<?php

header("Access-Control-Allow-Origin: '*'");


if(isset($_POST)) {

    $response = json_decode(file_get_contents('php://input'),true);
    $db = new PDO("sqlite:" . __DIR__ . "/pushUp");
    /*$query = $db->prepare("
INSERT INTO Transformation(before, after) VALUES (?,?)");
    echo 'heeeeeeey';
    $result = $query->execute([$response['before'],$response['after']]);*/

    $query = $db->prepare("
UPDATE User
SET before = ?, after = ?
WHERE pk_username = ?");
    echo 'heeeeeeey';
    $result = $query->execute([$response['before'],$response['after'],$response['username']]);
}