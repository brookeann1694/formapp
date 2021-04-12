<html>

   <head>
          <title>Harvest Yield Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      * {
      box-sizing: border-box;
      }
      html, body {
      min-height: 100vh;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px; 
      color: #666;
      }
      input, textarea { 
      outline: none;
      }
      body {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background: #5a7233;
      }
      h1 {
      margin-top: 0;
      font-weight: 500;
      }
      form {
      position: relative;
      width: 80%;
      border-radius: 30px;
      background: #fff;
      }
      .form-left-decoration,
      .form-right-decoration {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 20px;
      background: #5a7233;
      }
      .form-left-decoration {
      bottom: 60px;
      left: -30px;
      }
      .form-right-decoration {
      top: 60px;
      right: -30px;
      }
      .form-left-decoration:before,
      .form-left-decoration:after,
      .form-right-decoration:before,
      .form-right-decoration:after {
      content: "";
      position: absolute;
      width: 50px;
      height: 20px;
      border-radius: 30px;
      background: #fff;
      }
      .form-left-decoration:before {
      top: -20px;
      }
      .form-left-decoration:after {
      top: 20px;
      left: 10px;
      }
      .form-right-decoration:before {
      top: -20px;
      right: 0;
      }
      .form-right-decoration:after {
      top: 20px;
      right: 10px;
      }
      .circle {
      position: absolute;
      bottom: 80px;
      left: -55px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #fff;
      }
      .form-inner {
      padding: 40px;
      }
      .form-inner input,
      .form-inner textarea {
      display: block;
      width: 100%;
      padding: 15px;
      margin-bottom: 10px;
      border: none;
      border-radius: 20px;
      background: #d0dfe8;
      }
	  .form-innerselect select,
      .form-innerselect textarea {
      display: block;
      width: 100%;
      padding: 15px;
      margin-bottom: 10px;
      border: none;
      border-radius: 20px;
      background: #d0dfe8;
      }
      .form-inner textarea {
      resize: none;
      }
      button {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      border-radius: 20px;
      border: none;
      border-bottom: 4px solid #3e4f24;
      background: #5a7233; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
	  
      button:hover {
      background: #3e4f24;
      } 
      @media (min-width: 568px) {
      form {
      width: 60%;
      }
      }
    </style>
   </head>

   <body>
      <?php
        //Set Database Connection String
         if(isset($_POST['add'])) {
            $dbhost = 'db-mysql-sfo3-70323-do-user-8812855-0.b.db.ondigitalocean.com:25060';
            $dbuser = 'doadmin';
            $dbpass = 'hdtvkle2drdbbajr';
            $dbname = 'dream_harvest_yield';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
          //Test Database Connection
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
               //echo "Database Connection Failed";
            }
                        
          //Set variables for POST data
	$employee_name = $_POST['employee_name'];
	$date_stamp = $_POST['date_stamp'];
	$usable = $_POST['usable'];
	$tray_id = $_POST['tray_id'];
	$plant_type = $_POST['plant_type'];
	$add_comments = $_POST['add_comments'];
            
          //Insert Data into Table from Form
            mysqli_select_db($conn, $dbname);
            $sql = "INSERT INTO daily_yield_entry (employee_name, date_stamp, usable, tray_id, plant_type, add_comments)
            VALUES
            ('$employee_name','$date_stamp','$usable','$tray_id','$plant_type','$add_comments')";
            //('$_POST[employee_name]','$_POST[date_stamp]','$_POST[usable]','$_POST[tray_id]','$_POST[plant_type]','$_POST[add_comments]')";

          //Validate if Query completed successfully.
            if (!mysqli_query($conn,$sql))
            {
             die('Error: ' . mysql_error());
             //echo "Failed to write to the database";
            } 
            //echo "successfully added record to database";
           
          //Close mysql connection
            mysqli_close($conn);       
          
          //Redirect back to app form or any browser
           //header("Location: https://form-application-gyqlb.ondigitalocean.app/");
           header("Location: index.php");
            
           exit;
            
         } else {
      ?>
   
      <form method = "post" action = "<?php $_PHP_SELF ?>" class="decor">
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
	  
        <h1>Usable Harvest Yield Form</h1>
		
		 <div class="form-innerselect">
		 <select name="employee_name" id="employee_name" required>
           <option value="Select Name"></option>
		    <option value="" disabled selected>Name</option>
          <option value="Spongebob">Spongebob</option>
          <option value="Squidward">Squidward</option>
          <option value="Patrick">Patrick</option>
		   </div>
		   
      <div class="form-inner">
		<input type="date" name="date_stamp" id="date_stamp" step="1" required>
		 <input type="text" name="usable" placeholder="Usable Yield Weight" id="usable" required>
		 <input type="text" name="tray_id" placeholder="Tray ID" id="tray_id" required>
		 
		  <div class="form-innerselect">
		 <select name="plant_type" id="plant_type" required>
		 <option value="" disabled selected>Plant Type</option>
           <option value="Select Plant Type"></option>
          <option value="Amnemonemomne">Amnemonemomne</option>
          <option value="Kelp">Kelp</option>
          <option value="Tacos">Tacos</option>
		   </div>
		   
		  <input type="text" name="add_comments" placeholder="*NOT REQUIRED* Additional comments" id="add_comments">
		 </div>
	
        <button type="submit" >Submit</button>
      </div>
    </form>
   <?php
      }
   ?>
   </body>
</html>
