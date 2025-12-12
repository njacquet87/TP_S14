<h1>Messages</h1>

<div>
    <?php foreach ($posts as $post) : ?>
        <div class="card">
            <p>Titre : <?php echo $post['titre'];?></p>
            <p>Contenu : <?php echo $post['contenu'];?></p>
        </div> 
    <?php endforeach; ?>
</div>