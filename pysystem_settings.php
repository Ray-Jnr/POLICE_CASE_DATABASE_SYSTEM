<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="psys.css?v=<?php echo time(); ?>"/>
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
            <a href="psystem_homepage.php"
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
      <!-- creating a class for new users -->
      <div class="form-container">
        
        <form action="add_admin.php" method="post">
            <h2>Add New Administrator</h2>
            <div class="input_num">
              <input type="number" name="ServiceNumber" placeholder="ServiceNumber" required>
            </div>
            <div class="input_num">
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input_sub">
              <input type="submit"name="sub_mit" value="Submit">
            </div>
        </form>
    </div>

      </body>
      </html>