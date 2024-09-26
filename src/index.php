<?php require_once 'php.php';
$collection= fetchPigmentData()

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
    <div class = "title "><a><h1>Pigmadex</h1></a></div>

</nav>
<section class ="hero">

        <div class ="container">

                <?php echo createpigmaDIVS() ?>

        </div>
    </section>
</body>

</html>
