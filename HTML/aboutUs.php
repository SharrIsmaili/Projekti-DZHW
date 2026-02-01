<?php
    $pageTitle = 'About Us';
    require_once 'header.php';
    require_once 'database.php';

    require_once 'staff.php';

    $db = new Database();
    $conn = $db->getConnection();
    $staff = new Staff($conn);

    $doctors = $staff->getByProfession('Doctor');
    $nurses = $staff->getByProfession('Nurse');
?>

    <main id="aboutMain">
        <section id="content">
            <div class="section" id="ourStory">
                <div class="aboutTitle">
                    <h1>Our Story</h1>
                </div>

                <div class="aboutText">
                    <p>
                        VitalDrop was created with a simple idea but a strong mission - to make a real impact through
                        blood donation. What started as a small concept became a committed project built through
                        research, planning, and genuine dedication. Our team worked hard to understand the needs of
                        hospitals, speak with medical professionals, and design a system that could truly support
                        patients who depend on donated blood.
                        We believe every donation carries a story - one that begins with a donor's kindness and
                        continues
                        in the care of someone who needs it most. That belief guided every step of building this
                        organization. We wanted to create more than a service; we wanted to build a community of
                        awareness, compassion, and action.
                        Today, patients undergoing surgeries, facing medical conditions, or dealing with emergencies
                        rely on timely blood donations. Knowing this need exists is what pushed us to build VitalDrop
                        with purpose and commitment. Anyone who meets the guidelines can donate, and each donation
                        becomes a meaningful part of someone else's recovery.
                        VitalDrop stands as proof that effort, teamwork, and compassion can create real change. Our
                        mission is simple: to make donating easier, raise awareness, and encourage more people to join
                        us in helping save lives.
                    </p>
                </div>
            </div>

            <div class="section" id="founders">
                <div class="aboutTitle">
                    <h1>The Founders</h1>
                </div>

                <div class="cards" id="founderCards">
                    <div class="card">
                        <img src="../images/about-us/founders/founder1.jpg" alt="Fatime Shahini">

                        <h2>Fatime Shahini</h2>
                    </div>

                    <div class="card">
                        <img src="../images/about-us/founders/founder2.jpg" alt="Besnik Haxhia">

                        <h2>Besnik Haxhia</h2>
                    </div>
                </div>
            </div>

            <div class="section" id="staff">
                <div class="aboutTitle">
                    <h1>Our Medical Staff</h1>
                </div>

                <div class="aboutText">
                    <p>Our medical staff is the heartbeat of our care - dedicated, skilled, and deeply compassionate.
                        Every doctor, nurse, technician, and support team member brings not just expertise, but a
                        genuine commitment to making every patient feel seen, safe, and cared for.

                        Everyday, they meet challenges with resilience and teamwork, going beyond treatments to
                        offer comfort, guidance, and hope. Their dedication to learning and innovation ensures our care
                        is always advanced, precise, and compassionate.

                        We are proud of our medical professionals, whose unwavering commitment transforms lives,
                        inspires confidence, and reminds us that medicine is not just a science but it's an act of
                        humanity, empathy, and unwavering care.</p>
                </div>
                <div class="doctors-card-section" id="doctors">
                    <div class="doctors">
                        <div class="aboutTitle">
                            <h1>Our Doctors</h1>
                        </div>


                        <?php foreach($doctors as $d): ?>
                            <div class="card">
                                <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">

                                <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="nurses-card-section" id="nurses">
                    <div class="nurses">
                        <div class="aboutTitle">
                            <h1>Our Nurses</h1>
                        </div>

                        <?php foreach($nurses as $n): ?>
                            <div class="card">
                                <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">

                                <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="section" id="comments">
                <div class="aboutTitle">
                    <h1>Comments</h1>
                </div>

                <div id="comments-div">
                    <div class="wrapper">
                        <img src="../images/icons/prevBtn.png" alt="Previous Button" id="previousButton" class="buttons">

                        <ul class="carousel">
                            <li class="comment">
                                <div class="text">
                                    <div class="rating">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                    </div>

                                    <h3 class="commentHeading">The best blood donation booking site</h3>

                                    <p class="commentText">
                                        Great experience, easy to book. Paying for treatments is so convenient — no cash
                                        or cards needed!
                                    </p>
                                </div>

                                <div class="commenter">
                                    <img src="../images/icons/blank-pfp.jpg" alt="User Profile Picture" class="pfp">

                                    <div class="userInfo">
                                        <p class="userName">Arsa Ismaili</p>
                                        <p class="city">Prishtinë</p>
                                    </div>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="text">
                                    <div class="rating">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                    </div>

                                    <h3 class="commentHeading">Easy to use & explore</h3>

                                    <p class="commentText">
                                        The VitalDrop website makes it so much easier to book appointments and pick
                                        doctors that I feel comfortable with.
                                    </p>
                                </div>

                                <div class="commenter">
                                    <img src="../images/icons/blank-pfp.jpg" alt="User Profile Picture" class="pfp">

                                    <div class="userInfo">
                                        <p class="userName">Shpëtim Hasangjekaj</p>
                                        <p class="city">Lipjan</p>
                                    </div>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="text">
                                    <div class="rating">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                    </div>

                                    <h3 class="commentHeading">Great at finding quick information about the process of
                                        donating blood</h3>

                                    <p class="commentText">
                                        VitalDrop is my go-to app for infomation in blood and the donation process. I
                                        can easily find and book appointments near me — I love it!
                                    </p>
                                </div>

                                <div class="commenter">
                                    <img src="../images/icons/blank-pfp.jpg" alt="User Profile Picture" class="pfp">

                                    <div class="userInfo">
                                        <p class="userName">Artana Noli</p>
                                        <p class="city">Prizren</p>
                                    </div>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="text">
                                    <div class="rating">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                    </div>

                                    <h3 class="commentHeading">Quickest way to donate blood</h3>

                                    <p class="commentText">
                                        I've been using VitalDrop for two years and it's by far the best blood donation
                                        website I've used. Highly recommend it!
                                    </p>
                                </div>

                                <div class="commenter">
                                    <img src="../images/icons/blank-pfp.jpg" alt="User Profile Picture" class="pfp">

                                    <div class="userInfo">
                                        <p class="userName">Hekur Ymeri</p>
                                        <p class="city">Mitrovicë</p>
                                    </div>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="text">
                                    <div class="rating">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                    </div>

                                    <h3 class="commentHeading">Great way to learn something new</h3>

                                    <p class="commentText">
                                        Recently moved to a new city and didn't know any donation places. VitalDrop gave
                                        me a whole new list to choose from!
                                    </p>
                                </div>

                                <div class="commenter">
                                    <img src="../images/icons/blank-pfp.jpg" alt="User Profile Picture" class="pfp">

                                    <div class="userInfo">
                                        <p class="userName">Rrona Vulaj</p>
                                        <p class="city">Gjilan</p>
                                    </div>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="text">
                                    <div class="rating">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                        <img src="../images/about-us/star.png" alt="star icon" class="star">
                                    </div>

                                    <h3 class="commentHeading">Sleek website</h3>

                                    <p class="commentText">
                                        Such a sleek and powerful website. I highly recommend booking your appointments
                                        on VitalDrop.
                                    </p>
                                </div>

                                <div class="commenter">
                                    <img src="../images/icons/blank-pfp.jpg" alt="User Profile Picture" class="pfp">

                                    <div class="userInfo">
                                        <p class="userName">Mali Cana</p>
                                        <p class="city">Pejë</p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <img src="../images/icons/nextBtn.png" alt="Next Button" id="nextButton" class="buttons">
                    </div>
                </div>
            </div>

            <div class="section" id="usNow">
                <div class="aboutTitle">
                    <h1>Where We Are Now</h1>
                </div>

                <div class="aboutText">
                    <p>Today, we stand as a beacon of hope and care in our community, building on years of dedication,
                        growth, and innovation. Our facilities are equipped with modern technology, and our services
                        span a wide range of medical needs, ensuring that every patient receives timely and high -
                        quality
                        care.

                        We have grown not just in size, but in impact - touching lives, saving lives, and fostering
                        trust
                        through our unwavering commitment to excellence. Our team continues to adapt, learn, and
                        innovate, staying at the forefront of medicine while keeping compassion at the center of
                        everything we do.

                        Where we are now is a reflection of the dedication of our staff, the trust of our patients, and
                        our shared mission to make healthcare accessible, effective, and human. Every day, we strive to
                        be a place where care meets hope, science meets empathy, and every patient feels supported and
                        valued.</p>
                </div>
                <img src="../images/about-us/whereWeAre.jpg" alt="Where we are now">
            </div>
        </section>

        <aside id="sidebar" class="sidebar">
            <ul id="mainSections" type="none">
                <li><a href="#ourStory">Our Story</a></li>
                <li><a href="#founders">The Founders</a></li>
                <li>
                    <a href="#staff" id="staffDrop">Medical Staff</a>
                    <ul id="subSections" type="none">
                        <li><a href="#doctors">Doctors</a></li>
                        <li><a href="#nurses">Nurses</a></li>
                    </ul>

                </li>

                <li><a href="#comments">Comments</a></li>
                <li><a href="#usNow">Where We Are Now</a></li>
            </ul>
        </aside>
    </main>

<?php
    require_once 'footer.php';
?>