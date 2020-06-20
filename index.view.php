<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/public/dist/app.css">
</head>
<body>

    <h1>
        <?= $greeting; ?>
    </h1>

    <ul>
        <?php
            foreach($names as $name) {
                echo "<li>$name</li>";
            }
        ?>
    </ul>

    <ul>
        <?php foreach($person as $feature => $val) : ?>
            <li>
                <strong><?= ucwords($feature); ?>:</strong>
                <?= $val; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <script src="/public/dist/app.js"></script>
</body>
</html>