<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$Name = "";
$Email = "";
$ServiceNumber = "";
$Role = "";
$password = "";

// Using the GET method to show details of users
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location:unauthorized.php");
        exit;
    }
    $id = $_GET["id"];
    // Reading the row of the selected client from the database
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:unauthorized.php");
        exit;
    }
    $id = $row["id"];
    $Name = $row["Name"];
    $Email = $row["Email"];
    $ServiceNumber = $row["ServiceNumber"];
    $Role = $row["Role"];
    $password = $row["password"];
} else {
    // POST method: Update the data of the user
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $ServiceNumber = $_POST['ServiceNumber'];
    $Role = $_POST['Role'];
    $password = $_POST['password'];

    do {
        if (empty($Name) || empty($Email) || empty($ServiceNumber) || empty($Role) || empty($password)) {
            echo "All fields are required";
            break;
        } else {
            $sql = "UPDATE users SET Name='$Name', Email='$Email', ServiceNumber='$ServiceNumber', Role='$Role', password='$password' WHERE id='$id'";
            $result = $connection->query($sql);

            if (!$result) {
                echo "Invalid query: " . $connection->error;
                break;
            } 
            echo "Client updated successfully";
            header("location:unauthorized.php");
            exit;
        }
    } while (true);
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
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        <!-- creating a class for new users -->
        <div class="form-container2">


            <form  method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h2>Add New Administrator</h2>
                <div class="input_num">
                    <input type="text" name="Name" placeholder="Name" value="<?php echo $Name; ?>" required>
                </div>
                <div class="input_num">
                    <input type="email" name="Email" placeholder="Email" value="<?php echo $Email; ?> " required>
                </div>
                <div class="input_num">
                    <input type="number" name="ServiceNumber" placeholder="ServiceNumber" value="<?php echo $ServiceNumber; ?>" required>
                </div>
                <div class="input_role">
                    <select name="Role" value="<?php echo $Role; ?>">
                        
                        <option>Rank</option>
                        <option value="CID" <?php echo $Role == 'CID' ? 'selected' : ''; ?>>CID</option>
                        <option value="POLICE_WRITER" <?php echo $Role == 'POLICE_WRITER' ? 'selected' : ''; ?>>POLICE_WRITER</option>
                        <option value="DOA" <?php echo $Role == 'DOA' ? 'selected' : ''; ?>>DOA</option>
                        <option value="ADMIN" <?php echo $Role == 'ADMIN' ? 'selected' : ''; ?>>ADMIN</option>
                    </select>
                </div>
                <div class="input_num">
                    <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
                </div>
                <div class="input_sub">
                    <input type="submit" name="sub_mit" value="Update">
                </div>
                <div class="input_cancel">
                    <input type="submit" name="sub_mit" value="Cancel">
                </div>
            </form>
        </div>

</body>

</html>