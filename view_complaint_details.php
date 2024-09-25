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
    <h1>Police Case Docket Details</h1>
    <?php
    require_once "database.php";

    $sql = "SELECT * FROM complaintdetails";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>CaseNumber</th><th>FullName</th><th>IncidentType</th><th>Place Of Incident</th> <th>Date Reported</th></tr>";
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["CaseNumber"]. "</td><td>" . $row["FullName"]. "</td><td>" . $row["IncidentType"]. "</td><td>" . $row["PlaceOfIncident"]. "</td><td>" . $row["DateReported"]. "</td> </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>