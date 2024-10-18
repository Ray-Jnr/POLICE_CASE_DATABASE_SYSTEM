<?php
        require_once "database.php";

session_start();

if ( $_SESSION['Role'] != 'ADMIN') {
    header("location:unauthorized.php");
    exit;
}


$Name = "";
$Email = "";
$ServiceNumber = "";
$Role = "";
$password = "";
$msg ="";

// Using the post method to show details of users
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // POST method: Update the data of the user
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $ServiceNumber = $_POST['ServiceNumber'];
    $Role = $_POST['Role'];
    $password = $_POST['password'];
    $passwordHash = md5($password);
    // Ensure the fields are not empty
    if (empty($Name) || empty($Email) || empty($ServiceNumber) || empty($Role) || empty($password)) {
        echo "All fields are required";
    }
    
    else {
        // Check if ServiceNumber or Role are arrays and convert to strings if they are
        if (is_array($ServiceNumber)) {
            // Convert the ServiceNumber array to a comma-separated string
            $ServiceNumber = implode(", ", $ServiceNumber);
        }

        if (is_array($Role)) {
            // Convert the Role array to a comma-separated string
            $Role = implode(", ", $Role);
        }

        $sql = "SELECT * FROM users WHERE ServiceNumber = '$ServiceNumber'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
          $msg = "Duplicate Service Number";
        }

else{
        // Update the user's details in the database
        $sql = "INSERT INTO users(Name,Email,password,ServiceNumber,Role)VALUES (?, ?, ?, ?, ?) ";
        $stmt = mysqli_stmt_init($conn);

        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
        if ($preparestmt) {
          mysqli_stmt_bind_param($stmt, "sssss", $Name, $Email, $passwordHash, $ServiceNumber, $Role);
          mysqli_stmt_execute($stmt);

          $msg = "Done";
          header("location:unauthorized.php");

        } 
        
        else {

          $msg = "Something went wrong";

          die("something went wrong");
        }
      }
      
      }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="psys.css?v=<?php echo time(); ?>" />
  <script
    src="https://kit.fontawesome.com/de91a79e69.js"
    crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <!-- creating all the side links -->
  <div class="wrapper">
    <div class="sidebar">
      <h2>CASE SYSTEM</h2>
      <ul>
        <li>
          <a href="psystem_homepage.php"><i class="fa-solid fa-gauge"></i>&nbsp;&nbsp;Dashboard</a>
        </li>
        <li>
          <a href="psystem_diary.php"><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Diary of Action</a>
        </li>
        <li>
          <a href="pysystem_addcase.php"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Case</a>
        </li>
        <li>
          <a href="pysystem_followup.php"><i class="fa-solid fa-arrows-up-down"></i>&nbsp;&nbsp;Follow
            Up</a>
        </li>
        <li>
          <a href="unauthorized.php"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</a>
        </li>
        <div class="logout">
          <li>
            <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a>
          </li>
        </div>
      </ul>
    </div>
 
    <div class="form-container">
    
      

      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >

        <?php   echo "<div class='alert alert-success'><span style='color:#FF0000';> $msg.</span></div>";
?>
        <h2>Add New Administrator</h2>
        <div class="input_num">

          <input type="text" name="Name" placeholder="Name" required>
        </div>
        <div class="input_num">
          <input type="email" name="Email" placeholder="Email" required>
        </div>
        <div class="input_num">
          <input type="number" name="ServiceNumber" placeholder="ServiceNumber" required>
        </div>
        <div class="input_role">
          <select name="Role">
            <option>Select Rank ...</option>
            <option value="CID">CID</option>
            <option value="POLICE_WRITER">POLICE_WRITER</option>
            <option value="DOA">DOA</option>
            <option value="ADMIN">ADMIN</option>
          </select>
        </div>
        <div class="input_num">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input_sub">
          <input type="submit" name="sub_mit" value="Submit">
        </div>
      </form>
    </div>

</body>

</html>

