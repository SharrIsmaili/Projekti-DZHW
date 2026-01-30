<?php
    require_once 'database.php';
    
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: news.php");
        exit();
    }

    $id = $_GET['id'];
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT * FROM news WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        die("Article not found.");
    }

    $pageTitle = $article['Title'];
    require_once 'header.php';
?>

<main>
    <article class="news-detail-container">
        <div class="detail-header">
            <a href="news.php">&larr; Back to News</a>
            <h1><?= htmlspecialchars($article['Title']) ?></h1>
            <p class="date">Published on: <?= date('d M Y', strtotime($article['Date_Time'])) ?></p>
        </div>

        <?php if (!empty($article['Image'])): ?>
            <div class="detail-img">
                <img src="<?= htmlspecialchars($article['Image']) ?>" alt="<?= htmlspecialchars($article['Title']) ?>" style="max-width:100%; height:auto;">
            </div>
        <?php endif; ?>

        <div class="detail-content">
            <p><?= nl2br(htmlspecialchars($article['Content'])) ?></p>
        </div>


        <div class="pagination">
            <?php if ($currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>"><div><p>&laquo;</p></div></a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>">
                <div class="number <?= $i === $currentPage ? 'active' : '' ?>" 
                style="<?= $i === $currentPage ? 'background-color: #d32f2f; color: white;' : '' ?>">
                    <p><?php echo $i; ?></p>
                </div>
            </a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?= $currentPage + 1 ?>">
                    <div>
                        <p>&raquo;</p>
                    </div>
                </a>
            <?php endif; ?>
        </div>
    </article>
</main>

<?php require_once 'footer.php'; ?>
