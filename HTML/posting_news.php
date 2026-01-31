<?php
    require_once 'database.php';
    require_once 'newsClass.php';

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: news.php");
        exit();
    }

    $id = (int)$_GET['id'];

    $db = new Database();
    $conn = $db->getConnection();

    $news = new NewsClass($conn);
    $article = $news->getNewsById($id);

    if (!$article) {
        die("Article not found.");
    }

    $pageTitle = $article['Title'];
    require_once 'header.php';
?>

<main>
    <article class="news-detail-container" style="max-width: 900px; margin: 50px auto; padding: 20px; background-color: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

        <div class="detail-header" style="margin-bottom: 20px;">
           <div class="goBack">
                <a href="news.php" style="text-decoration: none; color: var(--red); font-weight: bold;">
                <img src="../images/icons/backBtn.png" alt="Back Button" id="newsBackArrow"> Back to News</a>
            </div>
            
            <h1 style="margin-top: 10px; color: var(--black);"><?= htmlspecialchars($article['Title']) ?></h1>
            <p class="date" style="color: gray; font-size: 14px;">Published on: <?= date('d M Y', strtotime($article['Date_Time'])) ?></p>
        </div>

        <?php if (!empty($article['Image'])): ?>
            <div class="detail-img" style="text-align: center; margin-bottom: 20px;">
                <img src="<?= htmlspecialchars($article['Image']) ?>" alt="<?= htmlspecialchars($article['Title']) ?>" style="max-width:100%; height:auto; border-radius: 10px;">
            </div>
        <?php endif; ?>

        <div class="detail-content" style="line-height: 1.7; color: var(--black); font-size: 18px;">
            <p><?= nl2br(htmlspecialchars($article['Content'])) ?></p>
        </div>

        <div class="detail-author">
            <p class="author" style="color: gray; font-size: 14px;">Author: <?= htmlspecialchars($article['Author']) ?></p>
        </div>

    </article>
</main>

<style>
    .news-detail-container a {
        transition: 0.2s ease-in-out;
    }
    .news-detail-container a:hover {
        color: var(--darkred);
        text-decoration: underline;
    }
</style>

<?php require_once 'footer.php'; ?>