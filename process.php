<?php
if(isset($_POST["Submit"])){
  
   
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Capture form data
    $caseNum = $_POST['caseNum'];
    $fullName = $_POST['fullName'];
    $incidentType = $_POST['incidentType'];
    $p_o_i = $_POST['p_o_i'];
    $Date_Reported = $_POST['Date_Reported'];
    
    // Insert data into database
    $sql = "INSERT INTO complaintdetails (CaseNumber, FullName, IncidentType, PlaceOfIncident, DateReported) VALUES ('$caseNum', '$fullName', '$incidentType', '$p_o_i', '$Date_Reported')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } 
}
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();

    

    ?>


 