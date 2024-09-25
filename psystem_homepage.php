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
      <div class="bordered" id="redirectDiv">
        <img src="images/admin_pic.jpg" alt="Example Image" /><span>Administrator</span>
      </div>
      <!-- script that directs the bordered div to pysystem_settings whenever is being clicked -->
      <script>
        document.getElementById('redirectDiv').addEventListener('click', function() {
            window.location.href = 'pysystem_settings.php';
        });
    </script>
    </div>
    <!-- Editing the cases cards -->
    <div class="main_cards">
      <!-- php code to display total number of cases -->

    
      <div class="cards">
        <i class="fa-sharp fa-solid fa-list-check"></i>
        <span>Total Cases</span>
        <i class="fa-solid fa-circle-plus"></i>
        <p>  <?php
      //including the database file
      include_once "database.php";
      //selecting all the cases from the diaryofaction table
      $sql = "SELECT COUNT(*) as total_cases FROM diaryofaction";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "Total Cases: " . $row["total_cases"];
        }
      } else {
        echo "0 results";
      }

      $conn->close();

      ?> <br><i class="fa-solid fa-arrow-up-long"></i></p>
      </div>
      <div class="closed_cards">
        <i class="fa-sharp fa-solid fa-list-check"></i>
        <span>Closed Cases</span>
        <i class="fa-solid fa-circle-plus"></i>
        <p>3 cases <br> <i class="fa-solid fa-arrow-up-long"></i></p>
      </div>
      <div class="open_cards">
        <i class="fa-sharp fa-solid fa-list-check"></i>
        <span>Open Cases</span>
        <i class="fa-solid fa-circle-plus"></i>
        <p>2 cases <br><i class="fa-solid fa-arrow-up-long"></i></p>
      </div>
      <div class="stop_cases">
        <i class="fa-sharp fa-solid fa-list-check"></i>
        <span>Stop Cases</span>
        <i class="fa-solid fa-circle-plus"></i>
        <p>1 cases <br> <i class="fa-solid fa-arrow-up-long"></i></p>
      </div>
    </div>

    <!-- Image & RecCASESent Cases Section -->
    <div class="dash">
      <img src="images/pp.png" alt="dashboard img" />
      <div class="recentcases">
        <h2>RECENT CASES</h2>
        <ul>
          <div class="recentcases_details">
            <li>
              <span>theft</span>
              <p><span>27/06/2022</span>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; <span class="text">Open</span></p>
            </li>
          </div>
          <div class="recentcases_details">
            <li>
              <span>theft</span>
              <p><span>27/06/2022</span>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; <span class="text">Open</span></p>
            </li>
          </div>
          <div class="recentcases_details">
            <li>
              <span>theft</span>
              <p><span>27/06/2022</span>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; <span class="text">Open</span></p>
            </li>
          </div>
          <div class="recentcases_details">
            <li>
              <span>theft</span>
              <p><span>27/06/2022</span>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; <span class="text">Open</span></p>
            </li>
          </div>

        </ul>
      </div>
    </div>
  </div>