<?php

header("Access-Control-Allow-Origin: '*'");


if(isset($_POST)) {
    $response = json_decode(file_get_contents('php://input'),true);
    $db = new PDO("sqlite:" . __DIR__ . "/pushUp");
    $query = $db->prepare("INSERT INTO 
    Transformation(before, after)
    VALUES (".$response['before'].",".$response['after'].")");
    echo 'heeeeeeey';
    echo $query;
    $result = $query->execute();
}