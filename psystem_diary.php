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
                    <a href="pysystem_settings.php"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</a>
                </li>
                <div class="logout">
                    <li>
                        <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    <!-- creating a div for the main content -->
    <div class="main">
        <div class="main_content">
            <div class="left_main">
                <img src="images/police_logo.jpg" alt="police_logo" />
                <span>CASE DATABASE</span>
            </div>
            <div class="bordered">
                <img src="images/admin_pic.jpg" alt="Example Image" /><span>Administrator</span>
            </div>
        </div>
        <div class="form-diary">
            <h2>Diary of Action</h2>
            <!-- PHP CODE TO INSERT DETAILS OF COMPLAINANTS TO THE DATABASE -->
           
            <form action="psystem_diary.php" method="POST">
                

                <label for="caseNumber">Case Number:</label>
                <input type="text" id="caseNumber" name="caseNumber" value="<?php echo uniqid(); ?>" required>

                <label for="registerOfOffense">Register of Offense:</label>
                <input type="text" id="registerOfOffense" name="registerOfOffense" required>

                <label for="dateOfOffense">Date of Offense:</label>
                <input type="date" id="dateOfOffense" name="dateOfOffense" required>

                <label for="complainant">Complainant:</label>
                <input type="text" id="complainant" name="complainant" required>

                <label for="accused">Accused:</label>
                <input type="text" id="accused" name="accused" required>

                <label for="incident-type">Incident Type:</label>
                <select id="incident-type" name="incident-type">
                    <option value="robbery">Robbery</option>
                    <option value="theft">Theft</option>
                    <option value="assault">Assault</option>
                    <option value="kidnapping">Kidnapping</option>
                    <option value="fraud">Fraud</option>
                </select>
                <div class="button-container">
                    <input type="submit" name="Add" value="Add">

                </div>

            </form>
            <?php


            require_once 'database.php';
            if (isset($_POST['Add'])) {


                //assigning variables    
                $CaseNumber = $_POST['caseNumber'];
                $Register_Of_Offense = $_POST['registerOfOffense'];
                $Date_Of_Offense = $_POST['dateOfOffense'];
                $Complainant = $_POST['complainant'];
                $Accused = $_POST['accused'];
                $Incident_Type = $_POST['incident-type'];

                //inserting the variables collected to the database
                $sql = "INSERT into diaryofaction (CaseNumber,Register_Offense,Complainant_Name,Date_Of_Offense,Accused_Name,Incident_Type) VALUES (' $CaseNumber','$Register_Of_Offense','$Complainant','$Date_Of_Offense','$Accused','$Incident_Type')";
                // Execute the query
                if ($conn->query($sql) === TRUE) {
                    echo '<span style="color: green;">New record created successfully</span>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            ?>
        </div>



</body>

</html>