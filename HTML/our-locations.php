<?php
    $pageTitle = 'Our Locations';
    require_once 'header.php';
    require_once 'database.php';
    require_once 'staff.php';

    $db = new Database();
    $conn = $db->getConnection();
    $staff = new Staff($conn);

    $doctors_prishtine = $staff->getByLocationAndProfession('Prishtine', 'Doctor');
    $doctors_mitrovice = $staff->getByLocationAndProfession('Mitrovice', 'Doctor');
    $doctors_peje = $staff->getByLocationAndProfession('Peje', 'Doctor');
    $doctors_prizren = $staff->getByLocationAndProfession('Prizren', 'Doctor');
    $doctors_ferizaj = $staff->getByLocationAndProfession('Ferizaj', 'Doctor');
    $doctors_gjilan = $staff->getByLocationAndProfession('Gjilan', 'Doctor');
    $doctors_gjakove = $staff->getByLocationAndProfession('gjakove', 'Doctor');

    $nurses_prishtine = $staff->getByLocationAndProfession('Prishtine', 'Nurse');
    $nurses_mitrovice = $staff->getByLocationAndProfession('Mitrovice', 'Nurse');
    $nurses_peje = $staff->getByLocationAndProfession('Peje', 'Nurse');
    $nurses_prizren = $staff->getByLocationAndProfession('Prizren', 'Nurse');
    $nurses_ferizaj = $staff->getByLocationAndProfession('Ferizaj', 'Nurse');
    $nurses_gjilan = $staff->getByLocationAndProfession('Gjilan', 'Nurse');
    $nurses_gjakove = $staff->getByLocationAndProfession('gjakove', 'Nurse');
?>

    <main id="locationsMain">
        <section id="map-hero">
            <div class="map">
                <img src="../images/locations/map.png" alt="Map" draggable="false">
            </div>

            <div class="location-btn">
                <a href="#prishtine" class="cityBtn">Prishtinë</a>
                <a href="#mitrovice" class="cityBtn">Mitrovicë</a>
                <a href="#peje" class="cityBtn">Pejë</a>
                <a href="#prizren" class="cityBtn">Prizren</a>
                <a href="#ferizaj" class="cityBtn">Ferizaj</a>
                <a href="#gjilan" class="cityBtn">Gjilan</a>
                <a href="#gjakove" class="cityBtn">Gjakovë</a>
            </div>
        </section>

        <section id="prishtine" class="hospital">
            <div class="hospital-img">
                <img src="../images/locations/Qendra_Klinike_Universitare_e_Kosovës.jpg" alt="Spitali i Prishtines">
                <h2>Prishtinë</h2>
            </div>

            <div class="doctors">
                <?php foreach($doctors_prishtine as $d): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">
                        <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="nurses">
                <?php foreach($nurses_prishtine as $n): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">
                        <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="mitrovice" class="hospital">
            <div class="hospital-img">
                <img src="../images/locations/spitali-mitrovice.png" alt="Spitali i Mitrovices">
                <h2>Mitrovicë</h2>
            </div>

            <div class="doctors">
                <?php foreach($doctors_mitrovice as $d): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">
                        <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="nurses">
                <?php foreach($nurses_mitrovice as $n): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">
                        <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="peje" class="hospital">
            <div class="hospital-img">
                <img src="../images/locations/spitali-i-pejes.jpeg" alt="Spitali i Pejes">
                <h2>Pejë</h2>
            </div>

            <div class="doctors">
                <?php foreach($doctors_peje as $d): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">
                        <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="nurses">
                <?php foreach($nurses_peje as $n): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">
                        <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="prizren" class="hospital">
            <div class="hospital-img">
                <img src="../images/locations/SpitaliPrizrenit.jpg" alt="Spitali i Prizrenit">
                <h2>Prizren</h2>
            </div>

            <div class="doctors">
                <?php foreach($doctors_prizren as $d): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">
                        <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="nurses">
                <?php foreach($nurses_prizren as $n): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">
                        <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="ferizaj" class="hospital">
            <div class="hospital-img">
                <img src="../images/locations/spitali-ferizajit.jpeg" alt="Spitali i Ferizajit">
                <h2>Ferizaj</h2>
            </div>

            <div class="doctors">
                <?php foreach($doctors_ferizaj as $d): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">
                        <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="nurses">
                <?php foreach($nurses_ferizaj as $n): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">
                        <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="gjilan" class="hospital">
            <div class="hospital-img">
                <img src="../images/locations/Gjilan.jpg2.jpg" alt="Spitali i Gjilanit">
                <h2>Gjilan</h2>
            </div>

            <div class="doctors">
                <?php foreach($doctors_gjilan as $d): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">
                        <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="nurses">
                <?php foreach($nurses_gjilan as $n): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">
                        <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="gjakove" class="hospital">
            <div class="hospital-img">
                <img src="../images/locations/spitali i gjakoves.jpg" alt="Spitali i Gjakoves">
                <h2>Gjakovë</h2>
            </div>

            <div class="doctors">
                <?php foreach($doctors_gjakove as $d): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($d['Image']) ?>" alt="<?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?>">
                        <h3><?= htmlspecialchars($d['Name'].' '.$d['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="nurses">
                <?php foreach($nurses_gjakove as $n): ?>
                    <div class="card">
                        <img src="<?= htmlspecialchars($n['Image']) ?>" alt="<?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?>">
                        <h3><?= htmlspecialchars($n['Name'].' '.$n['Lastname']) ?></h3>

                        <a href="contact.php" class="appointment">Book Appointment</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

<?php
    require_once 'footer.php';
?>