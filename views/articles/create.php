<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregister</title>
</head>
<body>
<?php  
    include('views/layouts/menu.php');
?>
<form action="?controller=article&action=store" enctype="multipart/form-data" method="post">
    <p>
        Titre : 
        <input type="text" name="title">
    </p>
    <p>Slug : <input type="text" name="slug"></p>
    <p>Description : <textarea name="content" id="" cols="30" rows="10"></textarea></p>
    <p>Auteur : <input type="text" name="auteur"></p>
    <p>Image : <input type="file" name="pic"></p>
    <p><button type="submit">Valider</button></p>
</form>
</body>
</html>



