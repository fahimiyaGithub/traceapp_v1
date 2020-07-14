<?php
  include("header.php");
  include("dbconnect/dbconnect_hcms.php");
  session_start();
  $cookie_name = "new_user";
  $cookie_staffno = "staff_no";
  $cookie_phonenum = "phone_num";

  //receive location var from location.php
  //hold into var
  $var_loc = $_COOKIE["loc_id"];
  $str_loc = $_SESSION['location_string'];

  if(!isset($_SESSION['location_string'])){
    header("Location: index.html");
  }

  if(isset($_POST['submit'])){
    if(isset($_POST['g-recaptcha-response'])){
      $captcha = $_POST['g-recaptcha-response'];
    }

    if(!$captcha){
      echo '<script type="application/javascript">alert("Please check the captcha form"); window.location.href = "'.'";</script>';
    }

    else{
      $secretKey = '6LdPrKUZAAAAAN9nKMTnwW86XGB_V7babeUTNuKr';
      $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
      $response = file_get_contents($url);
      $responseKeys = json_decode($response, true);

      if($responseKeys['success']){
        if(!isset($_COOKIE['loc_id'])){
          header("Location: index.html");
        }

        if(isset($_POST['name'])){
          $name = pg_escape_string($_POST['name']);
          $staff_no = pg_escape_string($_POST['staff_no']);
          $phone_num = pg_escape_string($_POST['staff_phone_num']);

          //validate staff number with agathae db
          $validate = sqlsrv_query($dbconnect_hcms,"SELECT DISTINCT (empno) empno, empname, active FROM dbo.v_hrms_contrak_staff WHERE active = 'Y' AND empno = '$staff_no'");
          $row = sqlsrv_fetch_array($validate);
          $empno_hcms = $row['empno'];

          if($empno_hcms != null){
            setcookie($cookie_name, $name, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_staffno, $staff_no, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($cookie_phonenum, $phone_num, time() + (86400 * 30), "/"); // 86400 = 1 day

            //navigate to page location.php
           header("Location: location/loc.php?loc_id=$var_loc");
          }

          else{
            echo '<script type="application/javascript">alert("Invalid credentials."); window.location.href = "'.'";</script>';
          }
          include("dbconnect/dbclose_hcms.php");
        }
      }
    }
  }
?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracker - Register</title>
    <link rel="icon" href="assets/imgs/fav.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  </head>
  <body>
    <div class="login">
      <div class="login_form">
        <img class="login_logo" src="assets/imgs/np_logo.PNG">
        <h2>NORTHPORT TRACKER</h2>
        <h3>Now you're at : <?php echo $str_loc; ?></h3>

        <form method="POST" >
          <div id="inp1" style="display: block;">
            <p for="staffnot">Are you a staff?</p>
            <button onclick="myFunction()">Yes</button>
            <button onclick="location.href='question.php'">No</button>
            <br>
          </div>

          <div id="inp2" style="display: none;">
            <h4>One-step registration only!</h4>
            <input class="input" id="number" type="text" name="staff_no" placeholder="Staff Number" maxlength="6" required>
            <input class="input" type="text" name="name" placeholder="Full Name" pattern="[a-zA-Z\s@`'\/\\]+" maxlength="50" required>
            <input class="input" id="number2" type="text" name="staff_phone_num" placeholder="Phone Number eg: 01********" pattern="[0][1]\d*" minlength="10" maxlength="13" required>
            
            <br><br>
            <div class="text-center">
              <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LdPrKUZAAAAAH5i5suqSQwTfTjoFNKcAZKu7dPe"></div>
            </div>

            <br>
          <button class="login-button" type="submit" name="submit">Submit</button>
          </div>
        </form>
        
      </div>
    </div>
  </body>
</html>
<script type="text/javascript" src="assets/js/input_filter.js"></script>