<?php
    $pageTitle = 'Contact Us';
    require_once 'database.php';
    require_once 'admin/users.php';
    require_once 'feedback.php';

    require_once 'auth.php';
    requireLogin();

    $db = new Database();
    $con = $db->getConnection();
    $feedback = new Feedback($con);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendMessage'])) {
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if (!empty($subject) && !empty($message)) {
            try {
                $result = $feedback->addFeedback($_SESSION['user_id'], $subject, $message);
                if ($result) {
                    $success = "Your feedback has been sent!";
                    $_POST['subject'] = '';
                    $_POST['message'] = '';
                } else {
                    $error = "Failed to send feedback.";
                }
            } catch (PDOException $e) {
                $error = "Database error: " . $e->getMessage();
            }
        } else {
            $error = "Please type a subject and message.";
        }
    }

    require_once 'formHeader.php';
?>

<body id="top">
    <header id="header">
        <nav class="navbar">
            <a href="home.php"><img src="../images/vital-drop/logo.png" alt="VitalDrop logo" id="logo"></a>

            <div class="links">
                <a href="home.php" class="pages">Home</a>
                <a href="aboutUs.php" class="pages">About Us</a>
                <a href="our-locations.php" class="pages">Our Locations</a>
                <a href="news.php" class="pages">News</a>

                <?php if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']): ?>
                    <a href="dashboard.php" class="pages">Dashboard</a>
                <?php endif;?>
            </div>

            <div class="right-side">
                <div class="utils">
                    <input type="search" id="searchBar" name="search" placeholder="Search">
                    <div id="searchSuggestions" class="suggestions"></div>
                    <a href="contact.php" class="link" id="contactBtn">Contact Us</a>
                </div>


                <div id="profile">
                    <a href="profile.php"><img src="../images/icons/blank-pfp.jpg" alt="Blank Profile Picture"></a>
                </div>
            </div>

            <button id="hamburger">
                <span class="spani"></span>
                <span class="spani"></span>
                <span class="spani"></span>
            </button>
        </nav>
    </header>

    <main id="contactMain">
        <section>
            <div id="contact-container">
                <div id="left">
                    <form id="inputs" method="POST">
                        <input type="text" name="subject" id="contact-subject" class="input" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>" placeholder="Subject">
                        <div id="contactSubjectError" class="error" aria-live="polite"></div>

                        <textarea name="message" id="message" placeholder="Write your message..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        <div id="msgError" class="error" aria-live="polite"></div>

                        <button type="submit" name="sendMessage" id="formBtn" value="Send Message">Send Message</button>
                        <div id="msgSuccess" class="success" role="status" aria-live="polite"><?= $success ?? '' ?></div>
                    </form>
                </div>

                <div id="right">
                    <div class="adress-text">
                        <h1>Address: </h1>
                        <p><strong>Dukagjini Center - UBT College</strong></p>
                        <p>09:00 - 16:00</p>
                        <p>Rruga Xhevded Doda, Prishtina 10000</p>
                        <p>Monday - Saturday</p>
                    </div>

                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.39399799628!2d21.14424977599555!3d42.65337687116712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549f3f9c98dcad%3A0x34f016cddf4a9928!2sDukagjini%20Center%2Cubt!5e1!3m2!1sen!2s!4v1763923900330!5m2!1sen!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
<?php
    require_once 'formFooter.php';
?>