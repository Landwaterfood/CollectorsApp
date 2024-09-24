<?php
function getConnected()
{
    try
    {
        $connection = new PDO(
            'mysql:host=DB;dbname=collectorapp',
            'root',
            'password'
        );
        $connection->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $connection;

    } catch (PDOException $e)
    {
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

    } catch (PDOException $e){
        echo 'fetch error:' . $e->getMessage();
        return[];
    }
}

function createTable()
{
    $collection = fetchPigmentData();

    $result= "";
    foreach ($collection as $pigment)
    {
        $result .='<tr>';
        $result .='<td>' . (is_null($pigment['id']) ? 'NULL' : $pigment['id']) . '</td>';
        $result .='<td >' . is_null($pigment['id']) ? 'NULL' : $pigment['id'] . '</td >';
        $result .='<td >' . is_null($pigment['name']) ? 'NULL' : $pigment['name'] .'</td >';
        $result .='<td >' . is_null($pigment['color']) ? 'Null' : $pigment['color'] .'</td >';
        $result .='<td >' . is_null($pigment['HEX']) ? 'Null' : $pigment['Hex'] . '</td >';
        $result .='<td >' . is_null($pigment['Geology']) ? 'NULL' : $pigment['geology'] .  '</td >';
        $result .='<td >' . is_null($pigment['image_closeup']) ? 'NULL' : '<img src="' . $pigment['image_closeup'] . '" alt="Closeup view">' .'</td >';
        $result .='<td >' . is_null($pigment['image_site']) ? 'NULL' : '<img src="' . $pigment['image_site'] . '" alt="Site view">' . '</td >';
        $result .='<td >' . is_null($pigment['country']) ? 'Null' : $pigment['country'] .'</td >';
        $result .='<td >' . is_null($pigment['town']) ? 'Null' : $pigment['town'] . '</td >';
        $result .='<td >' . is_null($pigment['coordinateslat']) ? 'NULL' : $pigment['coordinateslat'] . '</td >';
        $result .='<td >' . is_null($pigment['coordinateslong']) ? 'NULL' : $pigment['coordinateslong'] . '</td >';
        $result .='</tr >';
    }
    return $result;

}
