<?php require_once 'php.php';
$collection= fetchPigmentData()


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="modern-normalize.css">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name = "viewpoint" content = "width = device - width, initial-scale=1.0">
    <title>Pigment Hunting Collection App - </title>
</head>

<body>

<section class ="container">
    <table class = "table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Color</th>
            <th>Similar HEX Code</th>
            <th>Geology</th>
            <th>Image Closeup</th>
            <th>Image Site</th>
            <th>Country</th>
            <th>Town</th>
            <th>Coordinates (Lat)</th>
            <th>Coordinates (Long)</th>
        </tr>
        </thead>
        <tbody>
        <?php echo createTable() ?>
        </tbody>
    </table>

</section>

</body>

</html>
