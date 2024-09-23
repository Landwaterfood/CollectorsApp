<?php
function getConnected()
{
    try {
        $connection = new PDO(
            'mysql:host=DB;dbname=collectorapp',
            'root',
            'password'
        );
        $connection->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $connection;
    } catch (PDOException $e) {
        echo 'connection error: ' . $e->getMessage();
        return [];
    }
}


function fetchPigmentData()
{
    $connection = getConnected();

    try {
        $query = $connection->prepare('SELECT `id`, `name`, `color`, `HEX`, `Geology`, `image_closeup`, `image_site`, `country`, `town`, `coordinateslat`, `coordinateslong` FROM `MOCK_DATA`');
        $query->execute();
        return $query->fetchALL();

    } catch (PDOException $e) {
        echo 'connection error: ' . $e->getMessage();
        return [];
    }
}




