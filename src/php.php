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
        $query = $connection->prepare('SELECT pigment.id, pigment.name, pigment.HEX, pigment.mineral, pigment.chemical, pigment.description, pigment.image_closeup, color.name AS color_name
            FROM pigment
            INNER JOIN color color ON pigment.color_id = color.color_id');
        $query->execute();
        return $query->fetchALL();

    } catch (PDOException $exception){
        // In case of a database-related error, catch the exception and print an error message
        echo 'fetch error:' . $exception->getMessage();
        // Return an empty array if there's an error
        return[];
    }
}
function createpigmaDIVS(array $collection = null): string
{
    if (empty($collection) || !is_array($collection)) {


        return '<div>Invalid pigment data.</div>';
    }
    $result = "";

    foreach ($collection as $pigment) {
        if(!isset($pigment['id']) || is_null($pigment['id'])){
            return '';
        }
        if(!is_int($pigment['id'])){
            throw new UnexpectedValueException('id was not a num');
        }
        if(!isset($pigment['name']) || is_null($pigment['name'])){
            return '';
        }
        if(!isset($pigment['color_name']) || is_null($pigment['color_name'])){
            return '';
        }

        $result .=
            '<div class = "pigment_item">' .
            '<div class = "pigments pigment_id">' . '<div class = "stattitle">ID: #</div>' . $pigment['id'] . '</div>' .
            '<div class = "pigments pigment_name">' . '<div class = "stattitle">name:</div>' . $pigment['name']  . '</div>' .
            '<div class = "pigments pigment_color_name">' . '<div class = "stattitle">color: </div>' . $pigment['color_name'] . '</div>' .
            '<div class = "pigments pigment_HEX">' . '<div class = "stattitle">HEX: </div>' . (is_null($pigment['HEX']) ? 'NULL' : htmlspecialchars($pigment['HEX'])) . '</div>' .
            '<div class = "pigments pigment_mineral">' . '<div class = "stattitle">mineral: </div>' . (is_null($pigment['mineral']) ? 'NULL' : htmlspecialchars($pigment['mineral'])) . '</div>' .
            '<div class = "pigments pigment_chemical">' . '<div class = "stattitle">chemical: </div>' . (is_null($pigment['chemical']) ? 'NULL' : htmlspecialchars($pigment['chemical'])) . '</div>' .
            '<div class = "pigment_description">' . '<div class = "stattitle">description: </div>' . (is_null($pigment['description']) ? 'NULL' : htmlspecialchars($pigment['description'])) . '</div>' .
            '<div class = "pigment_image_closeup">' . (is_null($pigment['image_closeup']) || empty($pigment['image_closeup'])
                ? 'No Image Available'
                : '<img src="' . htmlspecialchars($pigment['image_closeup']) . '" alt="image" style="width:100%;height:80%;">') . '</div>' .
            '</div>';
    }

    return $result;
}






