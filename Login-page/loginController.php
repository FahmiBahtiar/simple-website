<?php
include "../config/koneksi.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: index.php");
  exit;
}
//input data
if(isset($_POST['submit'])) {
  // Ambil data dari form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Cari user berdasarkan nama
  $sql = "SELECT * FROM users WHERE username = :username";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Jika user ditemukan dan password benar, buat session
  if($user && password_verify($password, $user['password'])) {
    session_start();

    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;


      // Redirect ke halaman home
      header('Location: ../Main-page/index.php');
      exit;
  } else {
      echo "Nama atau password salah";
  }
}
?>
  