<?php if (isset($_SESSION['nom'])) { ?>
    <form action="?c=Posts&a=enregistrer" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="titre" class="form-label">Titre du message</label>
            <input type="text" class="form-control" name="titre" id="titre" required>
        </div>
        
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu du message</label>
            <textarea class="form-control" name="contenu" id="contenu" rows="3" required></textarea>
        </div>
    </form>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="enregistrer">Enregistrer</button>
    </div>
    
<?php } else { ?>
    <h1>connectez-vous pour ajouter des messages</h1>
<?php } ?>