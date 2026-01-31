<?php
    require_once '../auth.php';
    requireLogin();

    require_once '../header.php';
?>

    <h1>HELLO WORLD TEST TEST!!!!!</h1>

    <?php if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']): ?>
        <h2>OHHH YOURE AN ADMIN HELLOO!!!!!</h2>
    <?php endif;?>

    <a href="../logout.php">LOG OUT!@@!!!</a>

<?php
    require_once '../footer.php';
?>