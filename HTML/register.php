<?php
    $pageTitle = 'Register';
    require_once 'formHeader.php';


    // include_once 'Database.php';
    include_once 'users.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new Database();
        $connection = $db->getConnection();
        $users = new users($connection);

        // Get form data
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Register the user
        if ($users->register($name, $lastname, $email, $password)) {
            header("Location: home.php"); // Redirect to home-login page
            exit;
        } else {
         echo "Error registering user!";
        }
    }
?>

<body>
    <main>

        <div id="container" class="register-container">
            <img src="../images/icons/backBtn.png" alt="Back Button" id="backArrow">

            <div id="left">
                <img src="../images/vital-drop/Drop.png" alt="Logo" draggable="false">
                <img src="../images/vital-drop/VitalDrop.png" alt="Vital Drop Text" draggable="false">
            </div>

            <div id="right">
                <form action="home.php" id="register-form">
                    <div id="inputs">
                        <input type="text" name="name" id="register-name" class="input" placeholder="Name">
                        <div id="nameError" class="error" aria-live="polite"></div>
                        <br>
                        <input type="text" name="lastname" id="register-lastname" class="input" placeholder="Lastname">
                        <div id="lastNameError" class="error" aria-live="polite"></div>
                        <br>
                        <input type="text" name="email" id="register-email" class="input" placeholder="Email">
                        <div id="emailError" class="error" aria-live="polite"></div>
                        <br>
                        <input type="password" name="password" id="register-password" class="input" placeholder="Password">
                        <div id="passwordError" class="error" aria-live="polite"></div>
                        <br>
                        <input id="register-confirmPassword" name="confirm" type="password" class="input" placeholder="Confirm password" />
                        <div id="confirmError" class="error" aria-live="polite"></div>

                        <input type="submit" value="Register" id="formBtn"><br>
                        <div id="formSuccess" class="success" role="status" aria-live="polite"></div>

                        <a href="login.php" id="hasAccount">Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="../JS/forms.js"></script>
    <script src="../JS/app.js"></script>
</body>

</html>