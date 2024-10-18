<?php 

if (!isset($_GET["id"])) {
    header("location:view_complaint_details.php");
}
else {
    $casenumber = $_GET["id"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cases</title>
    <style>

        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color:#263575;
            color: white;
            ;
        }
        h1 {
            font-family: "DM Sans", sans-serif;
            text-align: center;
        
        
        }
    </style>
 <link rel="stylesheet" href="psys.css?v=<?php echo time(); ?>" />
</head>
<body>
    <h1>Diary of Action Details</h1>
    <?php
    require_once "database.php";

    $sql = "SELECT * FROM diaryofaction where CaseNumber = '$casenumber' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>CaseNumber</th><th>Register_Offense</th><th>Complainant_Name</th><th>Date_Of_Offense</th> <th>Accused_Name</th><th>Incident_Type</th></tr>";
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["CaseNumber"]. "</td><td>" . $row["Register_Offense"]. "</td><td>" . $row["Complainant_Name"]. "</td><td>" . $row["Date_Of_Offense"]. "</td><td>" . $row["Accused_Name"]. "</td><td>" . $row["Incident_Type"]. "</td> </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
 
</body>
</html>