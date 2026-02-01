<?php
    require_once 'auth.php';
    requireLogin();

    require_once 'users.php';
    require_once 'database.php';

    $db = new Database();
    $con = $db->getConnection();

    $obj = new Users($con);
    
    $userId = $_SESSION['user_id'] ?? null;
    $selected = $userId ? $obj->getUserById($userId) : null;

    if (!$selected) {
        die("User not found!");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $obj->updateUser(
            $userId,
            $_POST['name'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['phone'],
            null,
            $selected['isAdmin']
        );

        $selected = $obj->getUserById($userId);
        $_SESSION['name'] = $selected['Name'];
        $_SESSION['lastname'] = $selected['Lastname'];

        $message = "Profile updated successfully!";
    }

    require_once 'header.php';
?>
    <main id="dashboard-main">
        <section id="information">
            <div id="top-section">
                <div id="left-side">
                    <h1>Welcome, <?= htmlspecialchars(trim(($_SESSION['name'] ?? '') . ' ' . ($_SESSION['lastname'] ?? ''))) ?>!</h1>
                </div>

                <div id="right-side"><a href="logout.php">Log out</a></div>
            </div>

            <div id="middle-section">
                <form method="post" enctype="multipart/form-data" id="dashboard-form">
                    <div class="dashboard-inputs">
                        <label for="name">Name:</label>
                        <input id="name" type="text" name="name" value="<?= htmlspecialchars($selected['Name'] ?? '') ?>" required><br><br>
                        <label for="lastname">Lastname:</label>
                        <input id="lastname" type="text" name="lastname" value="<?= htmlspecialchars($selected['Lastname'] ?? '') ?>" required><br><br>
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" value="<?= htmlspecialchars($selected['Email'] ?? '') ?>" required><br><br>
                        <label for="phone">Phone Number:</label>
                        <input id="phone" type="text" name="phone" value="<?= htmlspecialchars($selected['Phone_Number'] ?? '') ?>"><br><br>
                    </div>
                    
                    <div class="buttons">
                        <button class="dashbtn" type="submit" name="update">Update</button>
                    </div>
                </form>

                <?php if (!empty($message)): ?>
                    <p style="color:green"><?= htmlspecialchars($message) ?></p>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php
    require_once 'footer.php';
?>