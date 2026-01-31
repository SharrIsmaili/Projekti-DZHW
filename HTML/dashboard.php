<?php
    $pageTitle = 'Dashboard';
    require_once 'database.php';
    require_once 'users.php';
    require_once 'staff.php';
    require_once 'NewsClass.php';
    require_once 'feedback.php';

    require_once 'auth.php';
    requireAdmin();

    $db = new Database();
    $con = $db->getConnection();
    
    $type = $_GET['type'] ?? 'users';
    $id = $_GET['id'] ?? null;

    $rows = [];
    $selected = null;

    switch ($type) {
        case 'users':
            $obj = new Users($con);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['update'])) {
                    $obj->updateUser(
                        $_POST['id'],
                        $_POST['name'],
                        $_POST['lastname'],
                        $_POST['email'],
                        $_POST['phone'],
                        isset($_POST['isAdmin']) ? 1 : 0
                    );
                }
                if (isset($_POST['delete'])) {
                    $obj->deleteUser($_POST['id']);
                }
            }

            if ($id) $selected = $obj->getUserById($id);
            $rows = $obj->getAllUsers();
        break;

        case 'staff':
            $obj = new Staff($con);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['add'])) {
                    $obj->addStaff(
                        $_POST['name'],
                        $_POST['lastname'],
                        $_POST['email'],
                        $_POST['phone'],
                        $_POST['location'],
                        $_POST['profession']
                    );
                }
                if (isset($_POST['update'])) {
                    $obj->updateStaff(
                        $_POST['id'],
                        $_POST['name'],
                        $_POST['lastname'],
                        $_POST['email'],
                        $_POST['phone'],
                        $_POST['location'],
                        $_POST['profession']
                    );
                }
                if (isset($_POST['delete'])) {
                    $obj->deleteStaff($_POST['id']);
                }
            }

            if ($id) $selected = $obj->getStaffById($id);
            $rows = $obj->getAllStaff();
        break;

        case 'news':
            $newsObj = new NewsClass($con);

            $selected = isset($_GET['id']) ? $newsObj->getNewsById($_GET['id']) : null;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id = $_POST['id'] ?? null;
                $title = $_POST['title'] ?? '';
                $content = $_POST['content'] ?? '';
                $imagePath = $selected['Image'] ?? null;

                if (!empty($_FILES['image']['name'])) {
                    $uploadDir = 'uploads/news/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

                    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $fileName = uniqid('news_') . '.' . $ext;
                    $target = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        $imagePath = $target;
                    }
                }

                $userId = $_SESSION['user_id'];

                if (isset($_POST['add'])) {
                    $newsObj->addNews($title, $content, $imagePath, $userId);
                    header("Location: dashboard.php?type=news");
                    exit;
                }

                if (isset($_POST['update']) && $id) {
                    $newsObj->updateNews($id, $title, $content, $imagePath);
                    header("Location: dashboard.php?type=news");
                    exit;
                }

                if (isset($_POST['delete']) && $id) {
                    $newsObj->deleteNews($id);

                    if (!empty($selected['Image']) && file_exists($selected['Image'])) {
                        unlink($selected['Image']);
                    }

                    header("Location: dashboard.php?type=news");
                    exit;
                }
            }

            $rows = $newsObj->getAllNews();
        break;

        case 'feedback':
            $feedbackObj = new Feedback($con);

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
                $feedbackObj->deleteFeedback($_POST['id']);
            }

            $selected = isset($_GET['id']) ? $feedbackObj->getFeedbackById($_GET['id']) : null;

            $rows = $feedbackObj->getAllFeedback();
        break;
    }

    $columns = [];

    switch ($type) {
        case 'users':
            $columns = [
                'Name' => 'Name',
                'Lastname' => 'Lastname',
                'Email' => 'Email',
                'Phone_Number' => 'Phone',
                'isAdmin' => 'Admin'
            ];
            $pk = 'User_ID';
            break;
        
        case 'staff':
            $columns = [
                'Name' => 'Name',
                'Lastname' => 'Lastname',
                'Email' => 'Email',
                'Phone_Number' => 'Phone',
                'Location' => 'Location',
                'Profession' => 'Profession'
            ];
            $pk = 'Staff_ID';
            break;
        
        case 'news':
            $columns = [
                'Date_Time' => 'Published',
                'Title' => 'Title',
                'Author' => 'Written by',
                'Image' => 'Image'
            ];
            $pk = 'News_ID';
            break;
        
        case 'feedback':
            $columns = [
                'User' => 'User',
                'Subject' => 'Subject',
                'Message' => 'Message'
            ];
            $pk = 'Feedback_ID';
            break;
    }

    require_once 'header.php';
?>

    <main id="dashboard-main">
        <aside id="dashboard-sidebar">
            <div id="title">
                <h2>Dashboard</h2>
            </div>
            <div id="options">
                <ul>
                    <li><a href="dashboard.php?type=users" class="<?= $type === 'users' ? 'active' : '' ?>">Users</a></li>
                    <li><a href="dashboard.php?type=staff" class="<?= $type === 'staff' ? 'active' : '' ?>">Staff</a></li>
                    <li><a href="dashboard.php?type=news" class="<?= $type === 'news' ? 'active' : '' ?>">News</a></li>
                    <li><a href="dashboard.php?type=feedback" class="<?= $type === 'feedback' ? 'active' : '' ?>">Feedback</a></li>
                </ul>
            </div>
        </aside>

        <section id="information">
            <div id="top-section">
                <div id="left-side">
                    <?php if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']): ?>
                        <h1>Welcome, <?= htmlspecialchars($_SESSION['name'] . ' ' . $_SESSION['lastname']) ?>!</h1>
                    <?php endif;?>
                </div>
            </div>

            <div id="middle-section">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $selected['User_ID'] ?? $selected['Staff_ID'] ?? $selected['News_ID'] ?? $selected['Feedback_ID'] ?? '' ?>">

                    <?php if ($type === 'users'): ?>
                        <div>
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" value="<?= htmlspecialchars($selected['Name'] ?? '') ?>" required>
                        </div>
                    
                        <div>
                            <label for="lastname">Lastname</label>
                            <input id="lastname" type="text" name="lastname" value="<?= htmlspecialchars($selected['Lastname'] ?? '') ?>" required>
                        </div>
                    
                        <div>
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="<?= htmlspecialchars($selected['Email'] ?? '') ?>" required>
                        </div>
                    
                        <div>
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" name="phone" value="<?= htmlspecialchars($selected['Phone_Number'] ?? '') ?>">
                        </div>
                    
                        <div>
                            <label for="isAdmin">Admin</label>
                            <input id="isAdmin" type="checkbox" name="isAdmin" <?= !empty($selected['isAdmin']) ? 'checked' : '' ?>>
                        </div>
                    
                        <button type="submit" name="update">Update</button>
                        <button type="submit" name="delete" onclick="return confirm('Delete this user?')">Delete</button>
                    
                    <?php elseif ($type === 'staff'): ?>
                        <div>
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" value="<?= htmlspecialchars($selected['Name'] ?? '') ?>" required>
                        </div>
                    
                        <div>
                            <label for="lastname">Lastname</label>
                            <input id="lastname" type="text" name="lastname" value="<?= htmlspecialchars($selected['Lastname'] ?? '') ?>" required>
                        </div>
                    
                        <div>
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="<?= htmlspecialchars($selected['Email'] ?? '') ?>" required>
                        </div>
                    
                        <div>
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" name="phone" value="<?= htmlspecialchars($selected['Phone_Number'] ?? '') ?>">
                        </div>
                    
                        <div>
                            <label for="location">Location</label>
                            <input id="location" type="text" name="location" value="<?= htmlspecialchars($selected['Location'] ?? '') ?>">
                        </div>
                    
                        <div>
                            <label for="profession">Profession</label>
                            <input id="profession" type="text" name="profession" value="<?= htmlspecialchars($selected['Profession'] ?? '') ?>">
                        </div>
                    
                        <button type="submit" name="add">Add</button>
                        <button type="submit" name="update">Update</button>
                        <button type="submit" name="delete" onclick="return confirm('Delete this staff?')">Delete</button>
                    
                    <?php elseif ($type === 'news'): ?>
                        <div>
                            <label for="title">Title</label>
                            <input id="title" type="text" name="title" value="<?= htmlspecialchars($selected['Title'] ?? '') ?>" required>
                        </div>
                    
                        <div>
                            <label for="content">Content</label>
                            <textarea id="content" name="content" rows="5" required><?= htmlspecialchars($selected['Content'] ?? '') ?></textarea>
                        </div>
                    
                        <div>
                            <label for="image">Image</label>
                            <input id="image" type="file" name="image" accept="image/*">
                        </div>
                    
                        <?php if (!empty($selected['Image'])): ?>
                            <div>
                                <label>Current Image</label><br>
                                <img src="<?= htmlspecialchars($selected['Image']) ?>" width="120">
                            </div>
                        <?php endif; ?>
                        
                        <button type="submit" name="add">Add</button>
                        <button type="submit" name="update">Update</button>
                        <button type="submit" name="delete" onclick="return confirm('Delete this news?')">Delete</button>
                        
                    <?php elseif ($type === 'feedback'): ?>
                        <div>
                            <label>User</label>
                            <input type="text" value="<?= htmlspecialchars($selected['User'] ?? '') ?>" readonly>
                        </div>

                        <div>
                            <label>Subject</label>
                            <input type="text" value="<?= htmlspecialchars($selected['Subject'] ?? '') ?>" readonly>
                        </div>

                        <div>
                            <label>Message</label>
                            <textarea readonly><?= htmlspecialchars($selected['Message'] ?? '') ?></textarea>
                        </div>

                        <button type="submit" name="delete" onclick="return confirm('Delete this feedback?')">Delete</button>
                    <?php endif; ?>
                </form>
            </div>

            <div id="bottom-section">
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($columns as $label): ?>
                                <th><?= $label ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($rows as $r): ?>
                            <tr>
                                <?php foreach ($columns as $field => $label): ?>
                                    <td><a href="dashboard.php?type=<?= $type ?>&id=<?= $r[$pk] ?>"><?= htmlspecialchars($r[$field]) ?></a></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

<?php
    require_once 'footer.php';
?>