<?php
    session_start();
    $pageTitle = 'Login';

    require_once 'database.php';
    require_once 'users.php';

    $error = "";

    if(isset($_SESSION['user_id'])){
        header("Location: home.php");
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $db = new Database();
        $connection = $db->getConnection();
        $users = new Users($connection);

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $users->login($email, $password);

        if($user !== false){
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['isAdmin'] = $user['isAdmin'];

            if(isset($_SESSION['redirect_after_login'])){
                $redirect = $_SESSION['redirect_after_login'];
                unset($_SESSION['redirect_after_login']);
                header("Location: $redirect");
            }else{
                header("Location: home.php");
            }
            exit;
        }else{
            $error = "Incorrect email or password!";
        }
    }

    require_once 'formHeader.php';
?>

<body>
    <main>
        <div id="container" class="login-container">
            <img src="../images/icons/backBtn.png" alt="Back Button" id="backArrow">

            <div id="left">
                <img src="../images/vital-drop/Drop.png" alt="Logo" draggable="false">
                <img src="../images/vital-drop/VitalDrop.png" alt="Vital Drop Text" draggable="false">
            </div>

            <div id="right">
                <form action="login.php" id="login-form" method="POST">
                    <div id="inputs">
                        <input type="text" name="email" id="login-email" class="input" placeholder="Email">
                        <div id="loginEmailError" class="error" aria-live="polite"></div>
                        <br>
                        <input type="password" name="password" id="login-password" class="input" placeholder="Password">
                        <div id="loginPasswordError" class="error" aria-live="polite"></div>
                        <br>

                        <input type="submit" value="Log In" id="formBtn"><br>

                        <?php if(!empty($error)):?>
                            <div class="error" role="alert"><?= htmlspecialchars($error) ?></div>
                        <?php endif;?>

                        <a href="register.php" id="hasAccount">Don't have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="../JS/forms.js"></script>
</body>
</html>