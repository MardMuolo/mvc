<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
</head>
<body>
    <?php
    include('views/layouts/menu.php');
    ?>

    <div>

        <h1><?= $data['title'] ?></h1>
        <p>
            <i><?= $data['created_at'] ?></i> | 
            <b><?= $data['auteur'] ?></b>

        </p>

        <div>
            <?= nl2br($data['content']) ?>
        </div>

    </div>
</body>
</html>
