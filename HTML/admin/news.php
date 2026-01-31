<?php
require_once '../database.php';

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->query("SELECT User_ID FROM users LIMIT 1");
$firstUser = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$firstUser) {
    die("No users found in the database. Please create a user first.");
}
$validUserId = $firstUser['User_ID'];

$action = $_GET['action'] ?? 'list';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title   = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $img     = $_POST['image'] ?? null;

    if ($_POST['action'] === 'add') {
        $stmt = $conn->prepare(
            "INSERT INTO news (Title, Content, Date_Time, Image, User_ID)
             VALUES (?, ?, NOW(), ?, ?)"
        );
        $stmt->execute([$title, $content, $img, $validUserId]);
    }

    if ($_POST['action'] === 'edit' && isset($_POST['News_ID'])) {
        $stmt = $conn->prepare(
            "UPDATE news SET Title=?, Content=?, Image=? WHERE News_ID=?"
        );
        $stmt->execute([
            $title,
            $content,
            $img,
            $_POST['News_ID']
        ]);
    }

    header('Location: news.php');
    exit;
}

if ($action === 'delete' && isset($_GET['News_ID'])) {
    $stmt = $conn->prepare("DELETE FROM news WHERE News_ID = ?");
    $stmt->execute([$_GET['News_ID']]);
    header('Location: news.php');
    exit;
}

if ($action === 'list') {

    $stmt = $conn->query("SELECT * FROM news ORDER BY Date_Time DESC");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>News Management</title>
        <style>
            table { 
                border-collapse: collapse; 
                width: 90%;
            }
            th, td { 
                padding: 10px; 
                border: 1px solid #ccc; 
                text-align: left; 
            }
            a { 
                text-decoration: none; 
                margin-right: 5px; 
            }
        </style>
    </head>
    <body>
        <h2>News Management</h2>
        <a href="news.php?action=add"><img src="../HTML/images/icons/plus.png" alt="Add" style="width:16px; vertical-align:middle; margin-right:5px;"> Add New Article</a>
        <table>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($news as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['Title']) ?></td>
                <td><?= date('d M Y', strtotime($row['Date_Time'])) ?></td>
                <td>
                    <a href="news.php?action=edit&News_ID=<?= $row['News_ID'] ?>">Edit</a> |
                    <a href="news.php?action=delete&News_ID=<?= $row['News_ID'] ?>" onclick="return confirm('Delete this article?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
    </html>
    <?php
    exit;
}

if ($action === 'add' || $action === 'edit') {
    $news = ['Title' => '', 'Content' => '', 'Image' => ''];
    $News_ID = null;

    if ($action === 'edit' && isset($_GET['News_ID'])) {
        $stmt = $conn->prepare("SELECT * FROM news WHERE News_ID=?");
        $stmt->execute([$_GET['News_ID']]);
        $news = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$news) {
            echo "News not found.";
            exit;
        }
        $News_ID = $news['News_ID'];
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?= $action === 'add' ? 'Add' : 'Edit' ?>News</title>
        <style>
            input[type=text], textarea { 
                width: 100%; 
                padding: 8px; 
                margin: 5px 0;
            }
            button { 
                padding: 10px 20px;
            }
        </style>
    </head>
    <body>
        <h2><?= $action === 'add' ? 'Add' : 'Edit' ?> News</h2>
        <form method="POST">
            <input type="hidden" name="action" value="<?= $action ?>">
            <?php if ($News_ID): ?>
                <input type="hidden" name="News_ID" value="<?= $News_ID ?>">
            <?php endif; ?>

            <label>Title:</label><br>
            <input type="text" name="title" value="<?= htmlspecialchars($news['Title']) ?>" required><br>

            <label>Content:</label><br>
            <textarea name="content" rows="7" required><?= htmlspecialchars($news['Content']) ?></textarea><br>

            <label>Image URL (optional):</label><br>
            <input type="text" name="image" value="<?= htmlspecialchars($news['Image']) ?>"><br><br>

            <button type="submit">Save</button><br>
            <a href="news.php">Cancel</a>
        </form>
    </body>
    </html>
    <?php
}
?>