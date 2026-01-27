<?php
    $pageTitle = 'Home';
    require_once 'header.php';
?>

    <main>
        <section class="slider">
            <div class="container">
                <div id="buttons">
                    <img src="../images/icons/prevBtn.png" id="prevBtn" alt="Previous Button">
                    <img src="../images/icons/nextBtn.png" id="nextBtn" alt="Next Button">
                </div>

                <div class="slide">
                    <div class="slideItem">
                        <img src="../images/slider/img4.jpg" class="sliderImg" id="last" alt="First Image">

                        <div class="content">
                            <h1>Do you want to donate blood?</h1>
                            <p>Contact us and schedule a meeting.</p>
                            <a href="contact.php" class="btn">Contact Us</a>
                        </div>
                    </div>

                    <div class="slideItem">
                        <img src="../images/slider/img1.jpg" class="sliderImg" alt="First Image">

                        <div class="content">
                            <h1>Do you want to donate blood?</h1>
                            <p>Contact us and schedule a meeting.</p>
                            <a href="contact.php" class="btn">Contact Us</a>
                        </div>
                    </div>

                    <div class="slideItem">
                        <img src="../images/slider/img2.jpg" class="sliderImg" alt="Second Image">

                        <div class="content">
                            <h1>Do you want to donate blood?</h1>
                            <p>Contact us and schedule a meeting.</p>
                            <a href="contact.php" class="btn">Contact Us</a>
                        </div>
                    </div>

                    <div class="slideItem">
                        <img src="../images/slider/img3.jpg" class="sliderImg" alt="Third Image">

                        <div class="content">
                            <h1>Do you want to donate blood?</h1>
                            <p>Contact us and schedule a meeting.</p>
                            <a href="contact.php" class="btn">Contact Us</a>
                        </div>
                    </div>

                    <div class="slideItem">
                        <img src="../images/slider/img4.jpg" class="sliderImg" alt="Fourth Image">

                        <div class="content">
                            <h1>Do you want to donate blood?</h1>
                            <p>Contact us and schedule a meeting.</p>
                            <a href="contact.php" class="btn">Contact Us</a>
                        </div>
                    </div>

                    <div class="slideItem">
                        <img src="../images/slider/img1.jpg" class="sliderImg" id="first" alt="First Image">

                        <div class="content">
                            <h1>Do you want to donate blood?</h1>
                            <p>Contact us and schedule a meeting.</p>
                            <a href="contact.php" class="btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="aboutUs">
            <h1>Do You Want To Know More About Us?</h1>
            <a href="aboutUs.php" class="btn" id="aboutUsBtn">About Us</a>
        </section>

        <section class="theCards" id="whoCanDonate">
            <div class="title">
                <h1>Who Can Donate Blood?</h1><br>
            </div>

            <div class="cards">
                <div class="homeCard">
                    <img src="../images/who can donate/age-and-weight.png" alt="Save Up To 3 Lives">

                    <h2>Age & Weight Requirements</h2>

                    <p>To donate blood, you must generally be 17 (or 16 with parental consent) and weigh a minimum 50 kg
                        for standard whole blood. Regular, healthy donors often have no upper age limit,
                        but first-time donors may be capped around 65-75. Verify requirements with your local blood
                        center.
                    </p>
                </div>

                <div class="homeCard">
                    <img src="../images/who can donate/health-recovery.png" alt="Health, Illness & Recovery">

                    <h2>Health, Illness & Recovery</h2>

                    <p>
                        Donors must be in good health and well. Active infections require temporary deferral; wait after
                        recovery. Permanent disqualification applies to positive tests for HIV/AIDS or Hepatitis B/C,
                        and certain severe illnesses. Allow 56 days (8 weeks) recovery between whole blood donations.
                    </p>
                </div>

                <div class="homeCard">
                    <img src="../images/who can donate/medication&condition.png" alt="Medication & Medical Contidions">

                    <h2>Medication & Medical Contidions</h2>

                    <p>
                        Disclose all medications. Most are acceptable; some require a wait (e.g., blood thinners).
                        Finish antibiotics and recover. Controlled chronic conditions (diabetes, hypertension) are
                        usually fine. Permanent disqualification applies to certain cancers and positive tests for
                        HIV/Hepatitis B/C. Check with our center.
                    </p>
                </div>

                <div class="homeCard">
                    <img src="../images/who can donate/frequency.png" alt="How Often Can One Donate?">

                    <h2>How Often Can One Donate?</h2>

                    <p>
                        Donation frequency is strictly regulated by component to allow full recovery. Whole Blood is
                        every 56 days. Double Red Cells requires a longer interval: 112 days. Component donations like
                        Platelets can be done every 7 days, and Plasma every 28 days. Donors must adhere to local blood
                        center rules.
                    </p>
                </div>
            </div>
        </section>

        <section class="donation-process" id="donationProcess">

            <h1 class="title">The donation Process & What to Expect</h1>

            <div class="info" id="preparation">
                <div class="text">
                    <h1>Preparation</h1>

                    <p>
                        Preparing for blood donation involves three key areas: hydration, nutrition, and rest. Donors
                        must drink plenty ofwater and non-alcoholic fluids in the 24 hours prior, aiming for at least 16
                        ounces shortly before the appointment,and ensure they get a full night's sleep. It is essential
                        to eat a healthy,

                        <span class="restOfText">
                            non-fatty meal within 2-3 hours of the appointment and focus on iron-rich foods in the days
                            leading up to it, asdonating on an empty stomach is unsafe. On the day, donors should wear
                            loose sleeves, bring their photo ID, andhave a list of all current medications.
                        </span>
                    </p>

                    <button class="link readMore">Read More</button>
                </div>

                <div class="process">
                    <img src="../images/donation process/pre-donation.png" alt="Preparation" class="process-img">
                </div>
            </div>

            <div class="info" id="procedure">
                <div class="text">
                    <h1>The procedure</h1>

                    <p>
                        The blood donation procedure typically lasts about one hour, beginning with registration and a
                        health screening where staff check ID, review a questionnaire, and measure vital signs and
                        hemoglobin levels. Once approved, the actual blood draw takes only 8 to 10 minutes; a sterile
                        needle is inserted, and approximately

                        <span class="restOfText">
                            one pint of blood is collected. After the draw, the needle is removed, a dressing is
                            applied, and the donor is moved to a recovery area where they are required to rest and
                            consume snacks and fluids for about 15 minutes before being released.
                        </span>
                    </p>

                    <button class="link readMore">Read More</button>
                </div>

                <div class="process">
                    <img src="../images/donation process/donating.png" alt="Procedure" class="process-img">
                </div>
            </div>

            <div class="info" id="postDonation">
                <div class="text">
                    <h1>Post Donation Care</h1>

                    <p>
                        After donating blood, proper care is crucial for swift recovery. Immediately, spend about 15
                        minutes in the refreshment area, enjoying provided snacks and fluids to stabilize your blood
                        sugar and fluid levels. For the next few hours, drink extra fluids and avoid alcohol. It is
                        essential to avoid strenuous

                        <span class="restOfText">
                            activity, heavy lifting, or vigorous exercise for the rest of the day. If you feel dizzy or
                            lightheaded, immediately sit or lie down. Keep the bandage ordressing on for several hours,
                            and if the site bleeds later, apply pressure and raise your arm until the bleeding stops.
                        </span>
                    </p>

                    <button class="link readMore">Read More</button>
                </div>

                <div class="process">
                    <img src="../images/donation process/post-donation.png" alt="Post-Donation" class="process-img">
                </div>
            </div>
        </section>

        <section id="bloodTypes">
            <div class="title">
                <h1>Blood Types</h1><br>
            </div>

            <div class="types-cards">
                <div class="types">
                    <div class="type">
                        <h1>A+</h1>
                    </div>

                    <div class="type">
                        <h1>A-</h1>
                    </div>

                    <div class="type">
                        <h1>B+</h1>
                    </div>

                    <div class="type">
                        <h1>B-</h1>
                    </div>

                    <div class="type">
                        <h1>O+</h1>
                    </div>

                    <div class="type">
                        <h1>O-</h1>
                    </div>

                    <div class="type">
                        <h1>AB+</h1>
                    </div>

                    <div class="type">
                        <h1>AB-</h1>
                    </div>
                </div>

                <div class="video">
                    <video src="../Videos/Blood Types.mp4" muted autoplay loop class="active"></video>
                    <video src="../Videos/A+.mp4" autoplay class="hidden"></video>
                    <video src="../Videos/A-.mp4" autoplay class="hidden"></video>
                    <video src="../Videos/B+.mp4" autoplay class="hidden"></video>
                    <video src="../Videos/B-.mp4" autoplay class="hidden"></video>
                    <video src="../Videos/O+.mp4" autoplay class="hidden"></video>
                    <video src="../Videos/O-.mp4" autoplay class="hidden"></video>
                    <video src="../Videos/AB+.mp4" autoplay class="hidden"></video>
                    <video src="../Videos/AB-.mp4" autoplay class="hidden"></video>
                </div>
            </div>
        </section>

        <section class="address-section" id="address">
            <div class="address">
                <div class="adress-text">
                    <h1>Address: </h1>

                    <p><strong>Dukagjini Center - UBT College</strong></p>
                    <p>Rruga Xhevded Doda, Prishtina 10000</p>
                    <p>09:00 - 16:00</p>
                    <p>Monday - Saturday</p><br>

                    <a href="contact.php" class="link" id="contactBtn">Contact Us</a>
                </div>

                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.39399799628!2d21.14424977599555!3d42.65337687116712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549f3f9c98dcad%3A0x34f016cddf4a9928!2sDukagjini%20Center%2Cubt!5e1!3m2!1sen!2s!4v1763923900330!5m2!1sen!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>
    </main>

<?php
    require_once 'footer.php';
?>