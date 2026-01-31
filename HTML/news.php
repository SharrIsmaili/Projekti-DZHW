<?php
$pageTitle = 'News';
require_once 'header.php';
require_once 'database.php';

$db = new Database();
$conn = $db->getConnection();

// Pagination settings
$itemsPerPage = 5;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) $currentPage = 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Get total news items
$totalStmt = $conn->query("SELECT COUNT(*) FROM news");
$totalItems = $totalStmt->fetchColumn();
$totalPages = ceil($totalItems / $itemsPerPage);

// Fetch current page news
$stmt = $conn->prepare("SELECT * FROM news ORDER BY Date_Time DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <div id="news">
        <?php if ($newsItems): ?>
            <?php foreach ($newsItems as $row): ?>
                <a href="posting_news.php?id=<?= (int)$row['id'] ?>">
                    <div class="news-container">
                        <div class="news-date">
                            <p><?= date('d M Y', strtotime($row['Date_Time'])) ?></p>
                        </div>

                        <div class="news-content">
                            <h4><?= htmlspecialchars($row['Title']) ?></h4>
                            <p><?= htmlspecialchars($row['Content']) ?></p>
                        </div>

                        <div class="news-img">
                            <img src="<?= htmlspecialchars($row['Image']) ?>" alt="News Image">
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No news yet.</p>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>"><div class="number">Prev</div></a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php $activeClass = ($i == $currentPage) ? 'active' : ''; ?>
            <a href="?page=<?= $i ?>">
                <div class="number <?= $activeClass ?>"><p><?= $i ?></p></div>
            </a>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?= $currentPage + 1 ?>"><div class="number">Next</div></a>
        <?php endif; ?>
    </div>
</main>

<style>
    .pagination {
        display: flex;
        gap: 5px;
        margin-top: 20px;
        justify-content: center;
    }

    .number {
        padding: 8px 12px;
        background-color: #eee;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
    }

    .number.active {
        background-color: #333;
        color: #fff;
    }

    .number:hover {
        background-color: #ccc;
    }
</style>

<?php
    require_once 'footer.php';
?>