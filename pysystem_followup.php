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
            >Administrator</span>
        </div>
      </div>
   
    </div>
    <!-- form section -->
     <div class="formheader">
      <span>Fill in the details to add a new case</span>
      <a href=""> Follow Up List</a>
     </div>

     <div class="form_container">
        <form action="#">
          <div class="complaint_details">
            <div class="input_box">
              <span class="details">Case Number</span>
              <input type="text"  required>
            </div>
            <div class="input_box">
              <span class="details">Incident Type</span>
              <input type="text" required>
            </div>
            <div class="input_box">
              <span class="details">Followed Up By</span>
              <input type="text"  required>
            </div>
            <div class="input_box">
              <span class="details">Date</span>
              <input type="date"  required>
            </div>
            <div class="input_box">
              <span class="details">Time of Incident</span>
              <input type="time"  required>
            </div>
            <div class="input_box">
            <p><label for="Pof">Action Taken </label></p>
            <textarea name="pof" id="part_of_offense" rows="5" cols="57.5"></textarea>
            <p>Status</p>
                <select name="status" id="stat">
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
            <div class="input_box">
                
            </div>
            <div class="form_button">
              <button type="button">Submit</button>
            </div>

          </div>







        </form>
      
     </div>
  </body>
</html>
