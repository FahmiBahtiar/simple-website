<!-- Include Head -->
<?php include "../config/koneksi.php";?>

<?php

session_start();

// Cek apakah user sudah login atau belum
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Jika belum, redirect ke halaman login
    header('Location: ../login-page/loginPage.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM author");
$stmt->execute();
$authors = $stmt->fetchAll();
?>

<title>All Author</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<link type="text/css" rel="stylesheet" href="style.css" />

<style>
    .fa-twitter,
    .fa-github,
    .fa-linkedin-square {
        font-size: 2.3rem;
    }
</style>
</head>

<body>

    <!-- Main -->
    <main role="main" class="main">
        <div class="jumbotron text-center mb-0">
            <h1 class="display-3 font-weight-normal text-muted">All Author</h1>
        </div>

        <div class="bg-white py-3 px-5">
            <div class="row">

                <div class="col-lg-12 text-center mb-3">
                    <a class="btn btn-info" href="addAuthor.php">Add Author</a>
                </div>

            </div>

            <div class="row">
                <table class='table table-striped table-bordered'>

                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Full Name</th>
                            <th scope='col'>Description</th>
                            <th scope='col'>Avatar</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Twitter</th>
                            <th scope='col'>Github</th>
                            <th scope='col'>Linkedin</th>
                            <th scope='col' colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($authors as $author) :
                            echo "<tr>";
                            ?>

                            <td><?= $author['author_id'] ?></td>
                            <td><?= $author['author_fullname'] ?></td>
                            <td><?= $author['author_desc'] ?></td>
                            <td>
                                <img src="../img/avatar/<?= $author['author_avatar'] ?>" style="width: 100px; height: auto;border-radius: 100%;">
                            </td>
                            <td><?= $author['author_email'] ?></td>
                            <td class="text-center">
                                <a href="https://twitter.com/<?= $author['author_twitter'] ?>" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="https://github.com/<?= $author['author_github'] ?>" target="_blank">
                                    <i class="fa fa-github"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="https://www.linkedin.com/in/<?= $author['author_link'] ?>" target="_blank">
                                    <i class="fa fa-linkedin-square"></i>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-success" href="updateAuthor.php?id=<?= $author['author_id'] ?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="delete.php?type=author&id=<?= $author['author_id'] ?>">
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

    </main><!-- </Main> -->



</body>

</html>