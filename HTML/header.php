<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalDrop | <?php echo isset($pageTitle) ? $pageTitle : ''; ?></title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../images/vital-drop/Drop.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#staffDrop").click(function () {
                $("#subSections").slideToggle();
            });
        });

    </script>
</head>

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
            
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>