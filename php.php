<?php


$db = new PDO(
    'mysql:host=DB;dbname=collectorapp',
    'root',
    'password'
);

$db->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM `MOCK_DATA`');

$result = $query->execute(); //execute does it and tells you if it works or not



if ($result) {
    $print = $query->fetchALL();
    echo '<pre>';
    var_dump($print);
}

