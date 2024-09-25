<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="psys.css?v=<?php echo time(); ?>" />
    <script
      src="https://kit.fontawesome.com/de91a79e69.js"
      crossorigin="anonymous"
    ></script>
    <title>Document</title>
  </head>
  <body>
    <!-- creating all the side links -->
    <div class="wrapper">
      <div class="sidebar">
        <h2>CASE SYSTEM</h2>
        <ul>
          <li>
            <a href="pysystem_homepage.php"
              ><i class="fa-solid fa-gauge"></i>&nbsp;&nbsp;Dashboard</a
            >
          </li>
          <li>
            <a href="psystem_diary.php"
              ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Diary of Action</a
            >
          </li>
          <li>
            <a href="pysystem_addcase.php"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Case</a>
          </li>
          <li>
            <a href="pysystem_followup.php"
              ><i class="fa-solid fa-arrows-up-down"></i>&nbsp;&nbsp;Follow
              Up</a
            >
          </li>
          <li>
            <a href="pysystem_settings.php"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</a>
          </li>
          <div class="logout">
            <li>
              <a href="index.php"
                ><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a
              >
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
          <img src="images/admin_pic.jpg" alt="Example Image" /><span
            >Administrator</span
          >
        </div>
      </div>
      <!-- creating two divs (Comoplaint & Suspect) -->
      
      <div class="complaint">
        <ul>
        <div class="complain">
          <li>
            <a href="pysystem_newcase.php"
              ><span>COMPLAINANT</span>
              <i class="fa-sharp-duotone fa-solid fa-pen"></i></a>
          </li>
        </div>
        <div class="suspect">
          <li>
            <a href="pysystem_suspectcase.php"
              ><span>SUSPECT</span>
              <i class="fa-duotone fa-solid fa-handcuffs"></i></a>
          </li>
        </div>
        </ul>
      </div>
    </div>
  </body>
</html>
