<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Multi Step Form | CodingNepal</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
   <div class="container">
      <header>Signup Form</header>
      <div class="progress-bar">
         <div class="step">
            <p>
               Name
            </p>
            <div class="bullet">
               <span>1</span>
            </div>
            <div class="check fas fa-check"></div>
         </div>
         <div class="step">
            <p>
               Contact
            </p>
            <div class="bullet">
               <span>2</span>
            </div>
            <div class="check fas fa-check"></div>
         </div>
         <div class="step">
            <p>
               Birth
            </p>
            <div class="bullet">
               <span>3</span>
            </div>
            <div class="check fas fa-check"></div>
         </div>
         <div class="step">
            <p>
               Submit
            </p>
            <div class="bullet">
               <span>4</span>
            </div>
            <div class="check fas fa-check"></div>
         </div>
      </div>
      <div class="form-outer">
         <form action="registerController.php" method="post">
            <div class="page slide-page">
               <div class="title">
                  Basic Info:
               </div>
               <div class="field">
                  <div class="label">
                     First Name
                  </div>
                  <input type="text" class="form-control" name="firstName" max="15" required>
               </div>
               <div class="field">
                  <div class="label">
                     Last Name
                  </div>
                  <input type="text" class="form-control" name="lastName" max="15" required>
               </div>
               <div class="field">
                  <button class="firstNext next">Next</button>
               </div>
            </div>
            <div class="page">
               <div class="title">
                  Contact Info:
               </div>
               <div class="field">
                  <div class="label">
                     Email Address
                  </div>
                  <input type="text" class="form-control" name="email" max="15" required>
               </div>
               <div class="field">
                  <div class="label">
                     Phone Number
                  </div>
                  <input type="Number" class="form-control" name="phoneNumber">
               </div>
               <div class="field btns">
                  <button class="prev-1 prev">Previous</button>
                  <button class="next-1 next">Next</button>
               </div>
            </div>
            <div class="page">
               <div class="title">
                  Date of Birth:
               </div>
               <div class="field">
                  <div class="label">
                     Date
                  </div>
                  <input type="text" class="form-control" name="birth" max="15" required>
               </div>
               <div class="field">
                  <div class="label">
                     Gender
                  </div>
                  <!-- <input type="text" class="form-control" name="gender" max="15" required> -->
                  <select name="gender" max="15" required id="cars">
                     <option value="Laki - Laki">Laki - Laki</option>
                     <option value="Perempuan">Perempuan</option>
                  </select>
               </div>
               <div class="field btns">
                  <button class="prev-2 prev">Previous</button>
                  <button class="next-2 next">Next</button>
               </div>
            </div>
            <div class="page">
               <div class="title">
                  Login Details:
               </div>
               <div class="field">
                  <div class="label">
                     Username
                  </div>
                  <input type="text" class="form-control" name="username" max="15" required>
               </div>
               <div class="field">
                  <div class="label">
                     Password
                  </div>
                  <input type="password" class="form-control" name="password" max="15" required>
               </div>
               <div class="field btns">
                  <button class="prev-3 prev">Previous</button>
                  <button type="submit" name="submit" class="submit">Submit</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <script src="script.js"></script>
</body>

</html>