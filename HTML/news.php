<?php
    $pageTitle = 'News';
    require_once 'header.php';
    require_once 'database.php';

    $db = new Database();
    $conn = $db->getConnection();

    $itemsPerPage = 5; 
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($currentPage < 1) $currentPage = 1;
    $offset = ($currentPage - 1) * $itemsPerPage;

    $totalStmt = $conn->query("SELECT COUNT(*) FROM news");
    $totalItems = $totalStmt->fetchColumn();
    $totalPages = ceil($totalItems / $itemsPerPage);

    $stmt = $conn->prepare("SELECT * FROM news ORDER BY Date_Time DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <main>
        <div id="news">
            <!-- <a href="#">
                <div class="news-container">
                    <div class="news-date">
                        <p>2 days ago</p>
                    </div>

                    <div class="news-content">
                        <h4>Without my new heart, I couldn't tell my story</h4>
                        <p>Elodie shares her story a decade after having the life-saving transplant as a baby.</p>
                    </div>

                    <div class="news-img">
                        <img src="../images/news-page/news 5.jpg" alt="New heart">
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="news-container">
                    <div class="news-date">
                        <p>5 days ago</p>
                    </div>

                    <div class="news-content">
                        <h4>Mum and "miracle baby" join call for festive blood donations</h4>
                        <p>Figures show fewer than 2% of people in Scottland are currently donating blood, down from 3% ten years ago.</p>
                    </div>

                    <div class="news-img">
                        <img src="../images/news-page/news1.jpg" alt="miracle baby'">
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="news-container">
                    <div class="news-date">
                        <p>21 Nov 2025</p>
                    </div>

                    <div class="news-content">
                        <h4>New mobile blood collection team for region</h4>
                        <p>Appointments across the West Midlands can now be booked online, with more that 430 slots available to book each week.</p>
                    </div>

                    <div class="news-img">
                        <img src="../images/news-page/news2.jpg" alt="Mobile blood collection">
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="news-container">
                    <div class="news-date">
                        <p>12 Nov 2025</p>
                    </div>

                    <div class="news-content">
                        <h4>The magic of the world's rarest blood type</h4>
                        <p>Only one in every six million people have the Rh null blood type. Now researchers are trying to grow this "golden blood" in the hope it  could    save lives.</p>
                    </div>

                    <div class="news-img">
                        <img src="../images/news-page/news6.jpg" alt="Rarest blood type">
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="news-container">
                    <div class="news-date">
                        <p>11 Nov 2025</p>
                    </div>

                    <div class="news-content">
                        <h4>Gurdwara blood drive sees dozens come forward</h4>
                        <p>Amid a shortage of donor blood from ethnic minorities a donor drive is held at a Sikh temple.</p>
                    </div>

                    <div class="news-img">
                        <img src="../images/news-page/news3.jpg" alt="Gurdwara blood drive">
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="news-container">
                    <div class="news-date">
                        <p>31 Oct 2025</p>
                    </div>

                    <div class="news-content">
                        <h4>'Dracula's bride' donates 1000th pint of blood</h4>
                        <p>It has taken 80-year-old Carol Verney from Blandford 61 years to reach the milestone donation.</p>
                    </div>

                    <div class="news-img">
                        <img src="../images/news-page/news4.jpg" alt="'Dracula's bride'">
                    </div>
                </div>
            </a> -->

            <?php 
                if ($newsItems): 
            ?>
            <?php 
                foreach ($newsItems as $row): 
            ?>
                <a href="posting_news.php?id=<?= $row['id'] ?>">
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
            <?php 
                endforeach; 
            ?>
            <?php 
                else: 
            ?>
                <p>No news yet.</p>
            <?php
                endif;
            ?>
        </div>

        <div class="pagination">
            <a href="#"><div class="number" id="active"><p>1</p></div></a>
            <a href="#"><div class="number"><p>2</p></div></a>
            <a href="#"><div class="number"><p>3</p></div></a>
            <a href="#"><div class="number"><p>4</p></div></a>
            <a href="#"><div class="number"><p>5</p></div></a>
        </div>
    </main>

<?php
    require_once 'footer.php';
?>