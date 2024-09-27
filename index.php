<?php require_once 'src/php.php';
$db = getConnected();
$collection= fetchPigmentData($db)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="src/modern-normalize.css">
    <link rel="stylesheet" href="src/stylesheet.css">
    <meta name = "viewport" content = "width = device - width, initial-scale=1.0">
    <title>Pigment Collection App</title>
</head>

<body>
<nav class="navbar">
    <div class = "title "><h1>Pigmadex</h1></div>

</nav>
<section class ="hero">

        <div class ="container">
                <?php echo displayPigments($collection) ?>
        </div>
    </section>
</body>

</html>
