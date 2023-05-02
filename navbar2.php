<?php
if (!isset($_SESSION)) {
    session_start();
}
$loggedin = false;


// Check if the user is already logged in, if yes then redirect him to welcome page
if ((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) || (isset($_COOKIE['key']))) {
    $loggedin = true;
    $username = $_COOKIE['username'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<style>
    * {
        font-family: 'Open Sans', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    /* Navbar */
    .home-section-navbar {
        /* width: 100%;
    height: 960px; */
        /* background-image: radial-gradient(189.96% 61.18% at 50% 38.82%, rgba(255, 181, 72, 0) 0%, rgba(52, 44, 29, 0.80319) 73.22%, #08090A 99.74%), url('../images/bg\ image\ 1.png'); */
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
        position: relative;
    }

    .nav-container {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        display: flex;
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 30px;
        color: #fff;
        background: rgba(0, 0, 0, 0.5) !important;

    }

    .nav-links a {
        color: #fff;
    }

    .logo {
        font-size: 30px;
        margin-right: 35rem;
    }

    .menu {
        display: flex;
        gap: 30px;
        font-size: 20px;
    }

    .menu li:hover {
        background-color: #F3AF34;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    .menu li {
        padding: 5px 14px;
    }

    .buttoncr {
        font-size: 17;
        border-radius: 5px;
        border: 0px 1px;
        padding: 5px;
        background-color: #F3AF34;
        box-shadow: 4px 3px 0px 0px #fbdc9d;
        text-shadow: 1px 0px 0px;
    }

    .buttoncr:hover {
        background-color: #F3AF34;
        border-radius: 5px;
        transition: 0.6s ease;
        box-shadow: none;
        border-color: #F3AF34;
    }
</style>

<body>
    <div class="home-section-navbar">
        <div id="page-1" class="scroll-container scroll-page"></div>
        <nav class="navbar">
            <div class="nav-container">
                <!-- LOGO -->
                <div class="logo">GAME SUIT</div>
                <!-- NAVIGATION MENU -->
                <ul class="nav-links">
                    <!-- NAVIGATION MENUS -->
                    <div class="menu">
                        <li><a href="#">Home</a></li>
                        <?php if ($loggedin) : ?>
                            <div class="dropdown">
                                <a style="background-color: transparent;" class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Article List
                                </a>

                                <div class="dropdown-menu" style="background-color: #F3AF34;">
                                    <a class="dropdown-item" href="./Article/listArticle.php">List All Article</a>
                                    <a class="dropdown-item" href="./Article/listAuthor.php">List All Author</a>
                                    <a class="dropdown-item" href="./Article/listCategories.php">List All Category</a>
                                </div>
                            </div>
                            <li><a href="./Article/mainArticle.php">Article</a></li>

                        <?php else : ?>
                            <li><a href="https://sociabuzz.com/blimbing/tribe">Donation</a></li>
                            <li><a href="./Article/mainArticle.php">Article</a></li>

                        <?php endif;  ?>
                        <a href="<?= ($loggedin) ? './logout.php' : './Login-page/loginPage.php'; ?>">
                            <button class="buttoncr"> <?= ($loggedin) ? $username : 'Sign in'; ?></button></a>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script>
</body>

</html>