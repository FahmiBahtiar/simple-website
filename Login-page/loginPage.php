<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<title> Responsive Login and Signup Form </title>-->

        <!-- CSS -->
        <link rel="stylesheet" href="login.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>
                    <form action="loginController.php" method="post">

                        <div class="field input-field">
                            <input type="username" placeholder="username" class="input" name="username" required>
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" name="password" required>
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="submit">Login</button>
                        </div>
                    </form>


                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="../Register-page/registerPage.php" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>REGISTER</span>
                    </a>
                </div>

            </div>


        </section>

        <!-- JavaScript -->
        <script src="login.js"></script>
    </body>
</html>
