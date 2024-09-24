
<!DOCTYPE html>
<html lang="en">
<head>

    <?php require_once 'php.php'; ?>
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
            <?php foreach ($collection as $pigment) :
                ?>
                <tr>
                    <td><?= $pigment['id']; ?></td>
                    <td><?= $pigment['name']; ?></td>
                    <td><?= $pigment['color']; ?></td>
                    <td><?= $pigment['HEX']; ?></td>
                    <td><?= $pigment['Geology']; ?></td>
                    <td><img src="<?= $pigment['image_closeup']; ?>" alt="Closeup view"></td>
                    <td><img src="<?= $pigment['image_site']; ?>" alt="location view" ></td>
                    <td><?= $pigment['country']; ?></td>
                    <td><?= $pigment['town']; ?></td>
                    <td><?= $pigment['coordinateslat']; ?></td>
                    <td><?= $pigment['coordinateslong']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>

</body>

</html>
