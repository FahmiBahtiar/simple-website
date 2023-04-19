<?php include "../config/koneksi.php"; ?>


<?php
// Check if the admin is already logged in, if yes then redirect him to home page
session_start();

// Cek apakah user sudah login atau belum
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Jika belum, redirect ke halaman login
    header('Location: ../login-page/loginPage.php');
    exit;
}

// Get all Articles Data
$stmt = $conn->prepare("SELECT * FROM article, author, category WHERE id_categorie = category_id AND author_id = id_author ORDER BY article_id DESC");
$stmt->execute();
$data = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link type="text/css" rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <title>Add Article</title>
</head>
<style>
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

    <!-- Navbar -->
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
                        <li><a href="../About-page/about.html">About</a></li>
                        <li><a href="https://sociabuzz.com/blimbing/tribe">Donation</a></li>

                        <a href="<?= ($username) ? '../logout.php' : 'login.php'; ?>">
                            <button class="buttoncr"> <?= ($username) ? 'Logout' : 'Sign in'; ?></button></a>
                    </div>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Main -->
    <main class="main">

        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Articles</h1>
        </div>

        <div class="bg-white p-4">

            <div class="row ">

                <div class="col-lg-12 text-center mb-3">
                    <a class="btn btn-info" href="addArticle.php">Add Article</a>
                </div>

            </div>

            <div class="row">
                <table class='table table-striped table-bordered'>

                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Title</th>
                            <th scope='col'>Content</th>
                            <th scope='col'>Image</th>
                            <th scope='col'>Created Time</th>
                            <th scope='col'>Category</th>
                            <th scope='col'>Author</th>
                            <th scope='col' colspan="3">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($data as $row) :
                            echo "<tr>";
                        ?>

                            <td><?= $row['article_id'] ?></td>
                            <td><?= $row['article_title'] ?></td>
                            <td class="text-break"><?= strip_tags(substr($row['article_content'], 0, 40)) . "..." ?></td>
                            <td><img src="../img/article/<?= $row['article_image'] ?>" style="width: 100px; height: auto;"></td>
                            <td><?= $row['article_created_time'] ?></td>
                            <td><?= $row['category_name'] ?></td>
                            <td><?= $row['author_fullname'] ?></td>

                            <td>
                                <a class="btn btn-info" href="singleArticle.php?id=<?= $row['article_id'] ?> ">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="updateArticle.php?id=<?= $row['article_id'] ?> ">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="delete.php?type=article&id=<?= $row['article_id'] ?> ">
                                    <i class="fa fa-trash " aria-hidden="true"></i>
                                </a>
                            </td>

                        <?php
                            echo "</tr>";
                        endforeach;
                        ?>
                    </tbody>

                </table>
            </div>
        </div>


    </main>



</body>



</html>