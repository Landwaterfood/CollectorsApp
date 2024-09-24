<?php


    try {
        $connection = new PDO(
            'mysql:host=DB;dbname=collectorapp',
            'root',
            'password'
        );
        $connection->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = $connection->prepare('SELECT `id`, `name`, `color`, `HEX`, `Geology`, `image_closeup`, `image_site`, `country`, `town`, `coordinateslat`, `coordinateslong` FROM `MOCK_DATA`');
        $result = $query->execute(); //execute does it and tells you if it works or not
        $collection= $query->fetchALL();
    } catch (PDOException $e) {
        echo 'connection error: ' . $e->getMessage();
        return [];
    }




