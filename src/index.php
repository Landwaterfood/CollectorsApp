<?php require_once 'php.php';
$collection= fetchPigmentData()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="modern-normalize.css">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name = "viewport" content = "width = device - width, initial-scale=1.0">
    <title>Pigment Collection App - </title>
</head>

<body>
<section class ="container">
    <table class = "table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>HEX</th>
            <th>Mineral</th>
            <th>Chemical</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php echo createTable() ?>
        </tbody>
    </table>

</section>
</body>

</html>
