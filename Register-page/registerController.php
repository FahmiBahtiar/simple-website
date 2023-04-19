<?php
include "../config/koneksi.php";



// Jika form registrasi disubmit
if(isset($_POST['submit'])) {
    // Ambil data dari form
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $birth = htmlspecialchars($_POST['birth']);
    $gender = htmlspecialchars($_POST['gender']);
    $username = strtolower(stripslashes($_POST["username"]));
    $password =  htmlspecialchars($_POST['password']);

    // Cek apakah nama sudah ada di database
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Jika sudah ada, tampilkan pesan error
    if($stmt->rowCount() > 0) {
        echo "Username sudah terdaftar. Silakan gunakan username lain.";
    } else {
        // Hash password menggunakan bcrypt
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Siapkan query untuk menyimpan data ke database
        $sql = "INSERT INTO users (firstName, lastName, email, phoneNumber, birth, gender, username, password) VALUES (:firstName, :lastName, :email, :phoneNumber, :birth, :gender, :username, :password)";
        $stmt = $conn->prepare($sql);

        // Bind parameter ke query
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);

        // Jalankan query
        if($stmt->execute()) {
          $_SESSION['username'] = $username;
            // Redirect ke halaman login
            header('Location: ../Login-page/loginPage.php');
            exit;
        } else {
            echo "Gagal menyimpan data";
        }
    }
}
?>