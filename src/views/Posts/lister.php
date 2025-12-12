<h1>Messages</h1>

<div">

    <?php if (count($posts) == 0) { ?>
        <h3>Aucun message à été posté</h3>
    <?php } ?>

    <?php foreach ($posts as $post) : ?>
        
        <div class="card" style="margin: 10px; padding : 10px;">
            <h3 class="card-title">Titre : <?php echo $post['titre'];?></h3>
            <p class="card-text">Contenu : <?php echo $post['contenu'];?></p>
            <p>Auteur : <?php echo $post['nom']; ?></p>
            <p>Date : <?php echo $post['date_publication'] ?></p>

            <a class="btn btn-primary" style="width: 100px;" href="?c=Posts&a=affichageModifier&id=<?php echo $post['id']; ?>">Modifier</a>
            <a class="btn btn-danger" style="width: 100px;" href="?c=Posts&a=supprimer&id=<?php echo $post['id'] ?>">Supprimer</a>
        </div> 
    <?php endforeach; ?>
</div>