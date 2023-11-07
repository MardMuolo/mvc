<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <style>
        .alert {
            color:red;border:1px solid red;
            border-radius:5px;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    <form action="?controller=user&action=store" method="post">
        <?php 
        if(isset($_GET['exist'])) {
            echo '<p class="alert">Un utilisateur avec cet email existe déjà</p>';
        }
        ?>
        <p>
            Nom : 
            <input type="text" name="nom">
        </p>
        <p>
            Email : 
            <input type="email" name="email">
        </p>
        <p>Mot de passe : <input type="password" name="password"></p>
        
        <p><button type="submit">Valider</button></p>
        <p>Vous avez déjà un compte? <a href="index.php">Se connecter</a></p>
    </form>
</body>
</html>



