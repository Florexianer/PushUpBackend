<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");


if (isset($_GET)) {
    $db = new PDO("sqlite:" . __DIR__ . "/../pushUp");
    $query = $db->
    prepare ("SELECT start, end, pushUpCount FROM Workout
                    WHERE fk_pk_username = ?");
    $query->execute([$_GET['username']]);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

