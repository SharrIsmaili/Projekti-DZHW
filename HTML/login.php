<?php
    $pageTitle = 'Login';
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
                <form action="home.php" id="login-form">
                    <div id="inputs">
                        <input type="text" name="email" id="login-email" class="input" placeholder="Email">
                        <div id="loginEmailError" class="error" aria-live="polite"></div>
                        <br>
                        <input type="password" name="password" id="login-password" class="input" placeholder="Password">
                        <div id="loginPasswordError" class="error" aria-live="polite"></div>
                        <br>
                        <input type="submit" value="Log In" id="formBtn"><br>
                        <div id="loginSuccess" class="success" role="status" aria-live="polite"></div>

                        <a href="register.php" id="hasAccount">Don't have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>



    <script src="../JS/forms.js"></script>
    <script src="../JS/app.js"></script>
</body>

</html>