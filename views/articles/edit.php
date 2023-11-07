<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
</head>
<body>
    <?php
    include('views/layouts/menu.php');
    ?>
    <form action="?controller=article&action=update&id=<?= $data['id'] ?>" method="post">
        <p>
            Titre : 
            <input type="text" name="title" value="<?= $data['title'] ?>">
        </p>
        <p>Slug : <input value="<?= $data['slug'] ?>" type="text" name="slug"></p>
        <p>Description : <textarea name="content" id="" cols="30" rows="10"><?= $data['content'] ?></textarea></p>
        <p>Auteur : <input value="<?= $data['auteur'] ?>" type="text" name="auteur"></p>
        <p><button type="submit">Valider</button></p>
        <input type="hidden" value="<?= $data['id'] ?>" name="id">
    </form> 
</body>
</html>
