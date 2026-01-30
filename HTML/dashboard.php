<?php
    $pageTitle = 'Dashboard';
    require_once 'header.php';
    require_once 'database.php';
?>

    <main>
        <section id="navbar">
            <div id="title">
                <h3>Dashboard</h3>
            </div>
            <div id="options">
                <ul>
                    <li>Users</li>
                    <li>News</li>
                    <li>Staff</li>
                    <li>News</li>
                    <li>Users</li>
                </ul>
            </div>
        </section>

        <section id="information">
            <div id="top-section">
                <div id="left-side">
                    <h1>Welcome, (admins username)</h1>
                </div>

                <div id="middle">
                    <ul>
                        <li>Home</li>
                        <li>News</li>
                        <li>About Us</li>
                        <li>Our Locations</li>
                    </ul>
                </div>

                <div id="right-side">
                    <img src="../images/icons/blank-pfp.jpg" alt="Users Profile Picture">
                </div>
            </div>

            <div id="bottom-section">
                <table>
                    <thead>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>isAdmin</th>
                    </thead>

                    <tbody>
                        <td>Name1</td>
                        <td>name1@gmail.com</td>
                        <td>User</td>
                        <td>false</td>
                    </tbody>

                    <tbody>
                        <td>Name2</td>
                        <td>name2@gmail.com</td>
                        <td>User</td>
                        <td>false</td>
                    </tbody>

                    <tbody>
                        <td>Name3</td>
                        <td>name3@gmail.com</td>
                        <td>Admin</td>
                        <td>true</td>
                    </tbody>

                    <tbody>
                        <td>Name4</td>
                        <td>name4@gmail.com</td>
                        <td>Admin</td>
                        <td>true</td>
                    </tbody>

                    <tbody>
                        <td>Name5</td>
                        <td>name5@gmail.com</td>
                        <td>User</td>
                        <td>false</td>
                    </tbody>

                    
                </table>
            </div>
        </section>
    </main>

<?php
    require_once 'footer.php';
?>