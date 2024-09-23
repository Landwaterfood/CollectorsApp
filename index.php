
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
            <?php foreach ($collection as $pigment) : ?>
            <tr>
                <td><?= htmlspecialchars($pigment['id']); ?></td>
                <td><?= htmlspecialchars($pigment['name']); ?></td>
                <td><?= htmlspecialchars($pigment['color']); ?></td>
                <td><?= htmlspecialchars($pigment['HEX']); ?></td>
                <td><?= htmlspecialchars($pigment['Geology']); ?></td>
                <td><img src="<?= htmlspecialchars($pigment['image_closeup']); ?>" alt="Closeup view"></td>
                <td><img src="<?= htmlspecialchars($pigment['image_site']); ?>" alt="location view" ></td>
                <td><?= htmlspecialchars($pigment['country']); ?></td>
                <td><?= htmlspecialchars($pigment['town']); ?></td>
                <td><?= htmlspecialchars($pigment['coordinateslat']); ?></td>
                <td><?= htmlspecialchars($pigment['coordinateslong']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>

</body>

</html>
