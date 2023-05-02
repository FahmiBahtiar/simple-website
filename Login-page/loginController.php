<?php
include "../config/koneksi.php";



if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../index.php");
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

    // setcookie('id', $id, time()+60);
    // setcookie('key', hash('sha256', $username), time()+60);

    $cookie_name = "key";
    $cookie_value = hash('sha256', $username);
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 hari
    setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 hari


    // Redirect ke halaman home
    echo "
    <script>
    alert('BERHASIL LOGIN!');
    document.location.href = '../index.php';
    </script>
    ";
      exit;
  } else {
    echo "
    <script>
    alert('USERNAME/PASSWORD YANG DIMASUKKAN SALAH!');
    document.location.href = 'loginPage.php';
    </script>
    ";
  }
}
