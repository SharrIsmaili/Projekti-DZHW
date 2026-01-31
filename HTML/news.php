<?php
$pageTitle = 'News';
require_once 'header.php';
require_once 'database.php';

$db = new Database();
$conn = $db->getConnection();

$itemsPerPage = 5;

$currentPage = isset( $_GET[ 'page' ] ) ? ( int )$_GET[ 'page' ] : 1;
if ( $currentPage < 1 ) $currentPage = 1;
$offset = ( $currentPage - 1 ) * $itemsPerPage;

$totalStmt = $conn->query( 'SELECT COUNT(*) FROM news' );
$totalItems = $totalStmt->fetchColumn();
$totalPages = ceil( $totalItems / $itemsPerPage );

$stmt = $conn->prepare( 'SELECT * FROM news ORDER BY Date_Time DESC LIMIT :limit OFFSET :offset' );
$stmt->bindValue( ':limit', $itemsPerPage, PDO::PARAM_INT );
$stmt->bindValue( ':offset', $offset, PDO::PARAM_INT );
$stmt->execute();
$newsItems = $stmt->fetchAll( PDO::FETCH_ASSOC );
?>

<main>
    <div id = 'news'>
       <?php if ($newsItems): ?>
        <?php foreach ($newsItems as $row): ?>

        <a href="posting_news.php?id=<?= $row['id'] ?>">
            <div class="news-container">

                <div class="news-date">
                    <p><?= date('d M Y', strtotime($row['Date_Time'])) ?></p>
                </div>

                <div class="news-content">
                    <h4><?= htmlspecialchars($row['Title']) ?></h4>
                    <p><?= htmlspecialchars($row['Summary']) ?></p>
                </div>

                <div class="news-img">
                    <img src="<?= htmlspecialchars($row['Image']) ?>" alt="<?= htmlspecialchars($row['Title']) ?>">
                </div>
            </div>
        </a>
        <?php
            endforeach;
        ?>
        <?php
            else:
        ?>
            <p>No news articles found.</p>
        <?php
            endif;
        ?>
    </div>

    <div class="pagination">

        <div class="pagination">

            <?php 
                for ($i = 1; $i <= $totalPages; $i++): 
            ?>
            <a href="?page=<?= $i ?>">
                <div class="number <?= ($i == $currentPage) ? 'active' : '' ?>">
                    <p><?= $i ?></p>
                </div></a>
                <?php endfor; ?>

            </div>
        </div>
</main>

<?php
    require_once 'footer.php';
?>