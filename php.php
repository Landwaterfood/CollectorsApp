<?php


$db = new PDO(
    'mysql:host=DB;dbname=collectorapp',
    'root',
    'password'
);
$db->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$query = $db->prepare('SELECT `name`, `color`, `HEX`, `country` FROM `MOCK_DATA`');
$result = $query->execute(); //execute does it and tells you if it works or not

if ($result) {
    $collection = $query->fetchALL();
} else{
    echo 'error';
}

foreach($collection as $pigment ) {
    echo "name: " . $pigment['name'];
    echo "country" . $pigment['country'];
    echo " color: " . $pigment['color'];
    echo " HEX code: " . $pigment['HEX']. "<br>". "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="modern-normalize.css">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name = "viewpoint" content = "width = device - width, initial-scale=1.0">
    <?php require_once 'php.php';?>
</head>

<body>
<section class ="pigments">
    <div id = "one" class="pigment"><h3>Pigment 1</h3> </div>

    <div id = "two" class="pigment"><h3>Pigment 2</h3> </div>
    <div id = "three" class="pigment"><h3>Pigment 3</h3> </div>
    <div id = "four" class="pigment"><h3>Pigment 4</h3> </div>
    <div id = "five" class="pigment"><h3>Pigment 5</h3> </div>
    <div id = "six" class="pigment"><h3>Pigment 6</h3> </div>
    <div id = "seven" class="pigment"><h3>Pigment 7</h3> </div>
    <div id = "eight" class="pigment"><h3>Pigment 8</h3> </div>
    <div id = "nine" class="pigment"><h3>Pigment 9</h3> </div>
    <div id = "ten" class="pigment"><h3>Pigment 10</h3> </div>

</section>

</body>

</html>

