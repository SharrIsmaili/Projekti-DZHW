<?php
    $pageTitle = 'Contact Us';
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
            </div>

            <div class="right-side">
                <div class="utils">
                    <input type="search" id="searchBar" name="search" placeholder="Search">
                    <div id="searchSuggestions" class="suggestions"></div>
                    <a href="contact.php" class="link" id="contactBtn">Contact Us</a>
                </div>


                <div id="profile">
                    <a href="login.php"><img src="../images/icons/blank-pfp.jpg" alt="Blank Profile Picture"></a>
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
                    <form id="inputs">
                        <input type="text" name="name" id="contact-name" class="input" placeholder="Name"><br>
                        <input type="text" name="lasname" id="contact-lastname" class="input"
                            placeholder="Lastname"><br>
                        <input type="email" name="email" id="contact-email" class="input" placeholder="Email"><br>
                        <div id="contactEmailError" class="error" aria-live="polite"></div>


                        <select name="city" id="selectCity">
                            <option disabled selected hidden>Select a city...</option>
                            <option class="city" value="prishtina">Prishtinë</option>
                            <option class="city" value="mitrovica">Mitrovicë</option>
                            <option class="city" value="peja">Pejë</option>
                            <option class="city" value="prizren">Prizren</option>
                            <option class="city" value="ferizaj">Ferizaj</option>
                            <option class="city" value="gjilan">Gjilan</option>
                            <option class="city" value="gjakova">Gjakovë</option>
                        </select><br>
                        <div id="cityError" class="error" aria-live="polite"></div>


                        <textarea name="message" id="message"
                            placeholder="Write your message..."></textarea><br>
                        <div id="msgError" class="error" aria-live="polite"></div>


                        <input type="submit" name="sendMessage" id="formBtn" value="Send Message">
                        <div id="msgSuccess" class="success" role="status" aria-live="polite"></div>

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