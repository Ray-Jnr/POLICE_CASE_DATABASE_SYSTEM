<table >
    <tr>
        <th>Register Offense</th>
        <th>Complainant Name</th>
        <th>Date of Offense</th>
        <th>Accused Name</th>
        <th>Incident Type</th>
        <th>Case Number</th>
    </tr>

<?php
    require_once "database.php";
    $sql = "SELECT diaryofaction.*, complaintdetails.CaseNumber
    FROM diaryofaction
    JOIN complaintdetails ON diaryofaction.complainant_id  = complaintdetails.id";
    
    $result = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        ?>
                <tr>
                    <td><?php echo $row ['Register_Offense']?></td>
                    <td><?php echo $row ['Complainant_Name']?></td>
                    <td><?php echo $row ['Date_Of_Offense']?></td>
                    <td><?php echo $row ['Accused_Name']?></td>
                    <td><?php echo $row ['Incident_Type']?></td> 
                    <td><?php echo $row ['CaseNumber']?></td> 
                </tr>


        <?php


    }



?>