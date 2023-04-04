<?php
include "../config/koneksi.php";



if (isset($_POST['submit'])) {
  $firstName = htmlspecialchars($_POST['firstName']);
  $lastName = htmlspecialchars($_POST['lastName']);
  $email = htmlspecialchars($_POST['email']);
  $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
  $birth = htmlspecialchars($_POST['birth']);
  $gender = htmlspecialchars($_POST['gender']);
  $username = strtolower(stripslashes($_POST["username"]));
  $password =  mysqli_real_escape_string($conn, $_POST['password']);

  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "
			<script>
				alert('username sudah terdaftar')
			</script>
		";
    return false;
  }else{
    echo "
      <script>
        alert('AKUN BERHASIL DITAMBAHKAN!');
        document.location.href = '../Login-page/loginPage.php';
      </script>
      ";
  }

  

  // enkripsi password

  // tambahkan user baru di database
  //query instert data
  $query = "INSERT INTO users (username, password, firstName, lastName, email, phoneNumber, birth, gender) VALUES ('$username', '$password','$firstName','$lastName','$email','$phoneNumber','$birth','$gender')";
  mysqli_query($conn, $query);
}
