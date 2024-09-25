<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="psys.css?v=<?php echo time(); ?>" />
  <title>Document</title>
  <script
    src="https://kit.fontawesome.com/de91a79e69.js"
    crossorigin="anonymous"></script>
</head>

<body>
  <!-- login_container creation -->
  <div class="login_container">

    <div class="login_header">
      <h1>Police Case System</h1>
      <span class="line"><img src="images/login_logo.png" alt="login_logo"></span>
      <?php
      //conditional statement to execute the error code only if the submit button is pressed
      if (isset($_POST['SignUp'])) {
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $ServiceNumber = $_POST['ServiceNumber'];
        $Password = $_POST['Password'];
        $passwordHash = md5($Password);
        $errors = array();
        //conditional statement to check for empty fields
        if (empty($Name) || empty($Email) || empty($ServiceNumber) || empty($Password)) {
          array_push($errors, "<span style='color:#FF0000';>All fields are required</span>");
        }
        //conditional statement to check for validation of email
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
          array_push($errors, "<span style='color:#FF0000';>Email is not valid</span>");
        }
        //condtional statement to check for passwords
        if (strlen($Password) < 6) {
          array_push($errors, "<span style='color:#FF0000';>Password must be at least 8 characters long</span>");
        }


        //checking for duplicate serviceNumber
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE ServiceNumber = '$ServiceNumber'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
          array_push($errors, "<span style='color:#FF0000';>ServiceNumber already exist</span>");
        }

        if (count($errors) > 0) {
          foreach ($errors as $error) {
            echo "<div class= '<span style='color:#FF0000';>alert alert-danger;</span>'>$error<>";
          }
        } else {
          require_once "database.php";
          $sql = "INSERT INTO users(Name,Email,password,ServiceNumber)VALUES (?, ?, ?, ?) ";
          $stmt = mysqli_stmt_init($conn);
          $preparestmt = mysqli_stmt_prepare($stmt, $sql);
          if ($preparestmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $Name, $Email, $passwordHash, $ServiceNumber);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'><span style='color:#02590F';>You have successfully signed up.</span></div>";
          } else {
            die("something went wrong");
          }
        }
      }; ?>
      <form action="Signup_screen.php" method="post">

        <div class="input_group">
          <div class="input_field">
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="Name" name="Name" id="Name">
          </div>
          <div class="input_field">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" placeholder="Email" name="Email" id="Email">
          </div>
          <div class="input_field">
            <i class="fa-regular fa-hashtag"></i>
            <input type="number" placeholder="ServiceNumber" name="ServiceNumber" id="ServiceNumber">
          </div>
          <div class="input_field">
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="Password" name="Password" id="Password" required>
            <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i>
          </div>
          <!-- script to toggle the icon -->
          <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#Password');

            togglePassword.addEventListener('click', function(e) {
              // toggle the type attribute
              const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
              password.setAttribute('type', type);

              // toggle the eye / eye-slash icon
              this.classList.toggle('fa-eye-slash');
            });
          </script>

        </div>
        <div class="signup_bottom">
          <input type="submit" id="SignUp" name="SignUp" value="SignUp">
        </div>

        <div class="bottomlogin">
          <p>Already have an account? <a href="index.php">Login</a></p>
        </div>
      </form>
    </div>
  </div>
</body>

</html>