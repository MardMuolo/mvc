<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les articles</title>
</head>
<body>
<?php
include('views/layouts/menu.php');
if(count($tab) > 0) {

?>
<table border="1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Titre</th>
            <th>Slug</th>
            <th>Auteur</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($tab as $data) {
        ?>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['created_at'] ?></td>
            <td><?= $data['title'] ?></td>
            <td><?= $data['slug'] ?></td>
            <td><?= $data['auteur'] ?></td>
            <td><?php echo ($data['pic'])?'<img src="views/images/'.$data['pic'].'" width="100" />':null ?></td>
            <td>
            <a href="?controller=article&action=show&id=<?= $data['id'] ?>">voir plus</a>
            <a onclick="supprimer(event)" href="?controller=article&action=destroy&id=<?= $data['id'] ?>">Supprimer</a>
            <a href="?controller=article&action=edit&id=<?= $data['id'] ?>">Editer</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>

<script>
    async function supprimer(event) {
        event.preventDefault()

        var url = event.target.getAttribute('href')
        if(confirm("Voulez-vous vraiment effectuer cette suppression?")) {
            event.target.innerHTML = "Suppression..."
            let rep = await fetch(url)
                            .then(response => response.json())
                            .then(json => json)

            if(rep.status == "ok") {
                alert("Suppression réussie!")
                event.target.closest('tr').remove()
            }
            else {
                alert("Erreur")
            }
        }
        
    }
</script>
<?php 
}
else {
    echo "Aucun resultat";
}
?>
</body>
</html>
