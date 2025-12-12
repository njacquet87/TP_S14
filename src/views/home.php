<?php if (isset($_SESSION['nom'])) { ?>
    <h1>Bienvenue <?php echo $_SESSION['nom']; ?></h1>
<?php } else {?>
    <h1>Bienvenue</h1>
<?php } ?>


<div>
    <a class="btn btn-primary" href='?c=Posts&a=ajouter'>Ajouter un message</a>
    <a class="btn btn-primary" href="?c=Posts&a=lister">Page des messages</a>
</div>