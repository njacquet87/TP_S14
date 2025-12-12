<?php if (isset($_SESSION['nom'])) { ?>
    <h1>Bienvenue <?php echo $_SESSION['nom']; ?></h1>
<?php } else {?>
    <h1>Bienvenue</h1>
<?php } ?>