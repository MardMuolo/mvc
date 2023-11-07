<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <style>
        .alert {
            color:red;border:1px solid red;
            border-radius:5px;
            padding: 5px;
        }
    </style>
</head>
<body>

    <form action="?controller=user&action=connexionUser" method="post">
        <?php 
        if(isset($_GET['noexist'])) {
            echo '<p class="alert">Email ou mot de passe incorrecte!</p>';
        }
        ?>
        
        <p>
            Email : 
            <input type="email" name="email">
        </p>
        <p>Mot de passe : <input type="password" name="password"></p>
        <p>
            <input type="checkbox" name="remember" id=""> 
            Se souvenir de moi
        </p>
        
        <p><button type="submit">Valider</button></p>
        <p>Vous n'avez pas encore un compte? <a href="?controller=user&action=register">S'inscrire</a></p>
    </form>
</body>
</html>


