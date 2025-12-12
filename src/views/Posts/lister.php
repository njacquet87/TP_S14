<h1>Messages</h1>

<div>
    <?php foreach ($posts as $post) :  echo var_dump($post)?>
        
        <div class="card">
            <h3 class="card-title">Titre : <?php echo $post['titre'];?></h3>
            <p class="card-text">Contenu : <?php echo $post['contenu'];?></p>
            <p>Auteur : <?php echo $posts['nom']; ?></p>
            <p>Date : <?php echo $posts['date_publication'] ?></p>
        </div> 
    <?php endforeach; ?>
</div>