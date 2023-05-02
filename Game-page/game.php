<?php
include "../config/koneksi.php";

session_start();

// Cek apakah user sudah login atau belum
if ((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) || (isset($_COOKIE['key']))) {
    $loggedin = true;
}    else {
    // Jika belum, redirect ke halaman login
    header('Location: ../Login-page/loginPage.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="game.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,500,700,900">
    <title>Rock Paper Scissors</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <img class="mx-5" src="../images/back.svg" style="cursor: pointer;" alt="Back" onclick="goToHome()">
        <img src="../images/logo.png" alt="Logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link nav-title mx-5" href="#">Rock Paper Scissors</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <div class="player-text">PLAYER 1</div>
            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <div class="player-text">COM</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <img src="../images/batu.png" id="player-batu" onclick="rpsClicked('rock')" alt="Batu" class="icon rps img-batu">
            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <img src="../images/batu.png" id="enemy-batu" alt="Batu" class="rps img-batu">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <img src="../images/kertas.png" id="player-kertas" onclick="rpsClicked('paper')" alt="Kertas" class="icon rps img-kertas">
            </div>
            <div class="col-sm" class="result-show">
                <div id="result" class="vs-text my-5">VS</div>
            </div>
            <div class="col-sm">
                <img src="../images/kertas.png" id="enemy-kertas" alt="Kertas" class="rps img-kertas">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <img src="../images/gunting.png" id="player-gunting" onclick="rpsClicked('scissors')" alt="Gunting" class="icon rps img-gunting">
            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <img src="../images/gunting.png" id="enemy-gunting" alt="Gunting" class="rps img-gunting">
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <img src="../images/refresh.png" onclick="refreshGame()" alt="Refresh" class="icon img-refresh">
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
    <script src="game.js"></script>
</body>

</html>
