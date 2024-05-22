<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap">
    <link rel="stylesheet" href="my.css">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome CSS -->
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: loginpage.html");
        exit();
    }
    ?>
    <div class="hero">
        <nav class="navbar">
            <ul class="navbar-links">
                <li>
                    <a href="levet.html" style="display: flex; justify-content: center;">
                        <span text="H">H</span>
                        <span text="o">o</span>
                        <span text="m">m</span>
                        <span text="e">e</span>
                    </a>
                </li>
                <li>
                    <a href="about.html" style="display: flex; justify-content: center;">
                        <span text="A">A</span>
                        <span text="b">b</span>
                        <span text="o">o</span>
                        <span text="u">u</span>
                        <span text="t">t</span>
                    </a>
                </li>
                <li>
                    <a href="contact.html" style="display: flex; justify-content: center;">
                        <span text="C">C</span>
                        <span text="o">o</span>
                        <span text="n">n</span>
                        <span text="t">t</span>
                        <span text="a">a</span>
                        <span text="C">C</span>
                        <span text="t">t</span>
                    </a>
                </li>
            </ul>
            <img src="download.png" class="download" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="download.png">
                        <h2><?php echo htmlspecialchars($_SESSION['fullname']); ?></h2>
                    </div>
                    <hr>
                    <a href="#" class="sub-menu-link">
                        <img src="setting.png">
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="profile.png">
                        <p>Settings & Privacy</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="help.png">
                        <p>Help & Support</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <img src="logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <script>
        function toggleMenu() {
            let subMenu = document.getElementById("subMenu");
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>
