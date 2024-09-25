<?php
function getConnected() : ?PDO
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
        return null ;
    }
}

function fetchPigmentData() : array
{
    // Establish a database connection
    $connection = getConnected();

    try {
        // Prepare an SQL query to select the relevant fields from the MOCK_DATA table
        $query = $connection->prepare('SELECT `id`, `name`, `HEX`, `mineral`, `chemical`, `description`, `image_closeup` FROM `pigment`');
        $query->execute();
        return $query->fetchALL();

    } catch (PDOException $exception){
        // In case of a database-related error, catch the exception and print an error message
        echo 'fetch error:' . $exception->getMessage();
        // Return an empty array if there's an error
        return[];
    }
}

function createTable() : string
{
    $collection = fetchPigmentData(); // Get the data
    $result = ""; // Initialize an empty result string

    // Loop through each pigment in the collection
    foreach ($collection as $pigment)
    {
        $result .= '<tr>' .
                    '<td>' . (is_null($pigment['id']) ? 'NULL' : htmlspecialchars($pigment['id'])) . '</td>' .
                    '<td>' . (is_null($pigment['name']) ? 'NULL' : htmlspecialchars($pigment['name'])) . '</td>' .
                    '<td>' . (is_null($pigment['HEX']) ? 'NULL' : htmlspecialchars($pigment['HEX'])) . '</td>' .
                    '<td>' . (is_null($pigment['mineral']) ? 'NULL' : htmlspecialchars($pigment['mineral'])) . '</td>' .
                    '<td>' . (is_null($pigment['chemical']) ? 'NULL' : htmlspecialchars($pigment['chemical'])) . '</td>' .
                    '<td>' . (is_null($pigment['description']) ? 'NULL' : htmlspecialchars($pigment['description'])) . '</td>' .
                    '<td>' . (is_null($pigment['image_closeup']) || empty($pigment['image_closeup'])
                ? 'No Image Available'
                : '<img src="' . htmlspecialchars($pigment['image_closeup']) . '" alt="image" style="width:100px;height:auto;">') . '</td>' .
                    '</tr>';
    }

    return $result;
}
