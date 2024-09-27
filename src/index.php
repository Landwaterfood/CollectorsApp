<?php require_once 'php.php';
$db = getConnected();
$collection= fetchPigmentData($db)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="modern-normalize.css">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name = "viewport" content = "width = device - width, initial-scale=1.0">
    <title>Pigment Collection App</title>
</head>

<body>
<nav class="navbar">
    <div class = "title "><h1>Pigmadex</h1></div>

</nav>
<section class ="hero">

        <div class ="container">
                <?php echo createpigmaDIVS($collection) ?>
        </div>
    </section>
</body>

</html>
