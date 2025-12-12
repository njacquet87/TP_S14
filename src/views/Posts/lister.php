<h1>Messages</h1>

<div">
    <?php foreach ($posts as $post) : ?>
        
        <div class="card" style="margin: 10px;">
            <h3 class="card-title">Titre : <?php echo $post['titre'];?></h3>
            <p class="card-text">Contenu : <?php echo $post['contenu'];?></p>
            <p>Auteur : <?php echo $post['nom']; ?></p>
            <p>Date : <?php echo $post['date_publication'] ?></p>
        </div> 
    <?php endforeach; ?>
</div>