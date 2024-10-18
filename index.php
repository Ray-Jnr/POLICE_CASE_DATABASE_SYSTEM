
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
      <form action="index.php" method="post">
        <!-- checking if login button is submitted for data collection -->
        <?php
       
       session_start();
       
       if (isset($_POST["login"])) {
           $ServiceNumber = $_POST['ServiceNumber'];
           $Password = $_POST['Password'];
           
           $passwordHash = md5($Password);
           
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE ServiceNumber = '$ServiceNumber'";
           $result = mysqli_query($conn, $sql);
           $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
           if ($user) {
               $dbpass = $user["password"];
       
               if ($passwordHash == $dbpass) {
                $_SESSION['ServiceNumber'] = $ServiceNumber;
                $_SESSION['Role'] = $user['Role'];
    
                switch ($user['Role']) {
                    case 'CID':
                        header("location:pysystem_followup.php");
                        break;
                    case 'POLICE_WRITER':
                        header("location:pysystem_addcase.php");
                        break;
                    case 'DOA':
                        header("location:psystem_diary.php");
                        break;
                    case 'ADMIN':
                        header("location:psystem_homepage.php");
                        break;
                    default:
                        header('Location: psystem_homepage.php');
                        break;
                }
                exit();
            } else {
                   echo "<div class='alert alert-success'><span style='color:#FF0000';>Password does not match.</span></div>";
               }
           } else {
               echo "<div class='alert alert-success'><span style='color:#FF0000';>Service Number does not match!.</span></div>";
           }
       }
       ?>
       
        <div class="input_group">
          <div class="input_field">
            <i class="fa-solid fa-user"></i>
            <input type="number" placeholder="ServiceNumber" name="ServiceNumber" id="ServiceNumber">
          </div>

          <div class="input_field">
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="Password" name="Password" id="Password">
            <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i>
          </div>
          <div class="input_rank">
            <select name="Role">
              <option>Rank</option>
              <option value="CID">CID</option>
              <option value="POLICE_WRITER">POLICE_WRITER</option>
              <option value="DOA">DOA</option>
              <option value="ADMIN">ADMIN</option>

            </select>
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

          <p><a href="#">Forgot Password?</a></p>

        </div>
        <div class="lg_button">
          <input type="submit" id="login" name="login" value="login">

        </div>

        <div class="bottomlogin">
          <p>Do not have an account? <a href="Signup_screen.php">Create Account</a></p>
        </div>
      </form>
    </div>
  </div>
</body>

</html>