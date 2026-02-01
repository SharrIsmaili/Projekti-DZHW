<?php
    $pageTitle = 'Dashboard';
    require_once 'database.php';
    require_once 'users.php';
    require_once 'staff.php';
    require_once 'newsClass.php';
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
            if ($id) $selected = $obj->getUserById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $postId = $_POST['id'] ?? null;

                if (isset($_POST['add'])) {}
                if (isset($_POST['update']) && $postId) {
                    $obj->updateUser(
                        $postId,
                        $_POST['name'],
                        $_POST['lastname'],
                        $_POST['email'],
                        $_POST['phone'],
                        null,
                        isset($_POST['isAdmin']) ? 1 : 0
                    );
                }
                if (isset($_POST['delete']) && $postId) {
                    $obj->deleteUser($postId);
                }

                if ($postId) $selected = $obj->getUserById($postId);
            }

            $rows = $obj->getAllUsers();
        break;

        case 'staff':
            $obj = new Staff($con);
            if ($id) $selected = $obj->getStaffById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $postId = $_POST['id'] ?? null;
                $imagePath = $selected['Image'] ?? null;

                if(!empty($_FILES['image']['name'])){
                    $uploadDir = 'uploads/staff/';
                    if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

                    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $fileName = uniqid('staff_') . '.' . $ext;
                    $target = $uploadDir . $fileName;

                    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                        if(!empty($selected['Image']) && file_exists($selected['Image'])){
                            unlink($selected['Image']);
                        }
                        $imagePath = $target;
                    }
                }

                if (isset($_POST['add'])) {
                    $obj->addStaff(
                        $_POST['name'],
                        $_POST['lastname'],
                        $_POST['email'],
                        $_POST['phone'],
                        $_POST['location'],
                        $_POST['specialization'],
                        $imagePath
                    );
                }
                if (isset($_POST['update']) && $postId) {
                    $obj->updateStaff(
                        $postId,
                        $_POST['name'],
                        $_POST['lastname'],
                        $_POST['email'],
                        $_POST['phone'],
                        $_POST['location'],
                        $_POST['specialization'],
                        $imagePath
                    );
                }
                if (isset($_POST['delete']) && $postId) {
                    if(!empty($selected['Image']) && file_exists($selected['Image'])){
                        unlink($selected['Image']);
                    }
                    $obj->deleteStaff($postId);
                }

                if ($postId) $selected = $obj->getStaffById($postId);
            }

            $rows = $obj->getAllStaff();
        break;

        case 'news':
            $obj = new NewsClass($con);
                
            $postId = $_POST['id'] ?? $id ?? null;

            $selected = $postId ? $obj->getNewsById($postId) : null;

            $imagePath = $selected['Image'] ?? null;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_FILES['image']['name'])) {
                    $uploadDir = 'uploads/news/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

                    $fileName = uniqid('news_') . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $target = $uploadDir . $fileName;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        if (!empty($imagePath) && file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                        $imagePath = $target;
                    }
                }

                if (isset($_POST['add'])) {
                    $obj->addNews($_POST['title'], $_POST['content'], $imagePath, $_SESSION['user_id']);
                }

                if (isset($_POST['update']) && $postId) {
                    $obj->updateNews($postId, $_POST['title'], $_POST['content'], $imagePath);
                }

                if (isset($_POST['delete']) && $postId) {
                    if (!empty($selected['Image']) && file_exists($selected['Image'])) {
                        unlink($selected['Image']);
                    }
                    $obj->deleteNews($postId);
                    $postId = null;
                }

                $selected = $postId ? $obj->getNewsById($postId) : null;
            }

            $rows = $obj->getAllNews();
        break;

        case 'feedback':
            $obj = new Feedback($con);
            if ($id) $selected = $obj->getFeedbackById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && $_POST['id']) {
                $obj->deleteFeedback($_POST['id']);
            }

            $rows = $obj->getAllFeedback();
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
                'Specialization' => 'Specialization'
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
                <form method="post" enctype="multipart/form-data" id="dashboard-form">
                    <?php $hiddenId = $postId ?? ($selected[$pk] ?? ''); ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($hiddenId) ?>">
                    
                    <?php if ($type === 'users'): ?>
                        <div class="dashboard-inputs">
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
                        </div>
                        
                        <div class="buttons">
                            <button class="dashbtn" type="submit" name="update">Update</button>
                            <button class="dashbtn" type="submit" name="delete" onclick="return confirm('Delete this user?')">Delete</button>
                        </div>
                    
                    <?php elseif ($type === 'staff'): ?>
                        <div class="dashboard-inputs">
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
                                <label for="Specialization">Specialization</label>
                                <input id="specialization" type="text" name="specialization" value="<?= htmlspecialchars($selected['Specialization'] ?? '') ?>">
                            </div>

                            <div>
                                <label for="image">Profile Picture</label>
                                <input id="image" type="file" name="image" accept="image/*">
                            </div>

                            <?php if (!empty($selected['Image'])): ?>
                                <div>
                                    <label>Current Image</label><br>
                                    <img src="<?= htmlspecialchars($selected['Image']) ?>" width="120">
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="buttons">
                            <button class="dashbtn" type="submit" name="add">Add</button>
                            <button class="dashbtn" type="submit" name="update">Update</button>
                            <button class="dashbtn" type="submit" name="delete" onclick="return confirm('Delete this staff?')">Delete</button>
                        </div>
                    
                    <?php elseif ($type === 'news'): ?>
                        <div class="dashboard-inputs">
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
                        </div>

                        <div class="buttons">
                            <button class="dashbtn" type="submit" name="add">Add</button>
                            <button class="dashbtn" type="submit" name="update" <?= empty($selected) ? 'disabled' : '' ?>>Update</button>
                            <button class="dashbtn" type="submit" name="delete" <?= empty($selected) ? 'disabled' : '' ?> onclick="return confirm('Delete this news?')">Delete</button>
                        </div>
                        
                    <?php elseif ($type === 'feedback'): ?>
                        <div class="dashboard-inputs">
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
                        </div>

                        <div class="buttons">
                            <button class="dashbtn" type="submit" name="delete" onclick="return confirm('Delete this feedback?')">Delete</button>
                        </div>
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