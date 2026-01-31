<?php
    require_once 'auth.php';
    requireLogin();

    require_once 'header.php';
?>
<?php
    $name = trim(($_SESSION['name'] ?? '') . ' ' . ($_SESSION['lastname'] ?? ''));
?>

<?php if (!empty($_SESSION['isAdmin'])): ?>
    <h2>Hello <?= htmlspecialchars($name) ?>, you're an admin!</h2>
<?php else: ?>
    <h2>Hello <?= htmlspecialchars($name) ?>!</h2>
<?php endif; ?>

<?php
    require_once 'footer.php';
?>