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

    } catch (PDOException $exception)
    {
        echo 'connection error: ' . $exception->getMessage();
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

    } catch (PDOException $exception){
        echo 'fetch error:' . $exception->getMessage();
        return[];
    }
}

function createTable()
{
    $collection = fetchPigmentData(); // Get the data
    $result = ""; // Initialize an empty result string

    // Loop through each pigment in the collection
    foreach ($collection as $pigment)
    {
        $result .= '<tr>';
        $result .= '<td>' . (is_null($pigment['id']) ? 'NULL' : htmlspecialchars($pigment['id'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['name']) ? 'NULL' : htmlspecialchars($pigment['name'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['color']) ? 'NULL' : htmlspecialchars($pigment['color'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['HEX']) ? 'NULL' : htmlspecialchars($pigment['HEX'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['Geology']) ? 'NULL' : htmlspecialchars($pigment['Geology'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['image_closeup']) ? 'NULL' : '<img src="' . htmlspecialchars($pigment['image_closeup']) . '" alt="Closeup view">') . '</td>';
        $result .= '<td>' . (is_null($pigment['image_site']) ? 'NULL' : '<img src="' . htmlspecialchars($pigment['image_site']) . '" alt="Site view">') . '</td>';
        $result .= '<td>' . (is_null($pigment['country']) ? 'NULL' : htmlspecialchars($pigment['country'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['town']) ? 'NULL' : htmlspecialchars($pigment['town'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['coordinateslat']) ? 'NULL' : htmlspecialchars($pigment['coordinateslat'])) . '</td>';
        $result .= '<td>' . (is_null($pigment['coordinateslong']) ? 'NULL' : htmlspecialchars($pigment['coordinateslong'])) . '</td>';
        $result .= '</tr>';
    }

    return $result;
}
