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
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a>
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

  </div>
  <!-- form section -->
  <div class="formheader">
    <span>Fill in the details to add a new case</span>
    <a href="view_complaint_details.php">View Cases</a>
  </div>

  <div class="form_container">
   <?php
   $uniqueId = uniqid();
   ?>
    <form action="process.php" method="POST">
      <div class="complaint_details">
        <div class="input_box">
          <span class="details">CaseNumber</span>
          <input type="text" name="caseNum" value='<?php echo $uniqueId;?>' ><br><br>
        </div>
        <div class="input_box">
          <span class="details">Full Name</span>
          <input type="text" name="fullName" required>
        </div>

        <div class="input_box">
          <span class="details">Address</span>
          <input type="text" name="Address" required>
        </div>

        <div class="input_box">
          <span class="details">Contact</span>
          <input type="text" name="text_number" required>
        </div>
        <div class="input_box">
          <span class="details">Place of incident</span>
          <input type="text" name="p_o_i" required>
        </div>


        <div class="input_box">
          <span class="details">Suspect Name</span>
          <input type="text" name="SuspectName" required>
        </div>



        <div class="input_box">
          <span class="details">Date Reported</span>
          <input type="date" name="Date_Reported" required>
        </div>
        <div class="input_box">
          <span class="details">Time of Incident</span>
          <input type="time" id="time" name="time">
        </div>
        <div class="input_box">
          <span class="details">Incident Type</span>
          <select name="incidentType" required>
            <option value="Robbery">Robbery</option>
            <option value="Theft">Theft</option>
            <option value="Assault">Assault</option>
            <option value="Kidnapping">Kidnapping</option>
            <option value="Fraud">Fraud</option>

          </select>

        </div>
        <div class="input_box">
          <p><label for="Pof">Particulars of offense</label></p>
          <textarea name="pof" id="part_of_offense" rows="5" cols="57.5"></textarea>
        </div>

        <div class="form_button">
          <input type="Submit" name=Submit value="Submit">
        </div>

      </div>







    </form>

  </div>
</body>

</html>