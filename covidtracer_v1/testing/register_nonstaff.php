<?php
  include("header.php");
  include("dbconnect/dbconnect_covid.php");
  session_start();
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $entry_timestamp = date('Y-m-d H:i:s', time());
  $timez = date('d M Y G:ia', time());
  $cookie_name = "new_user";
  $cookie_phonenum = "phone_num";
  $cookie_non_staff = "non_staff";
  
  //receive location var from location.php
  //hold into var
  $loc_id = $_COOKIE["loc_id"];
  $non_staff = "non_staff";

  include('event/qry_evt.php');
  include('location/queries/query_loc.php');

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
          $phone_num = pg_escape_string($_POST['phone_num']);
          $company_name = pg_escape_string($_POST['comp_name']);
          $appoint_with = pg_escape_string($_POST['appoint_with']);
          $verification = $_POST['verification'];

          setcookie($cookie_name, $name, time() + 30, "/"); //60 sec = 1 min
          setcookie($cookie_phonenum, $phone_num, time() + 30, "/");
          setcookie($cookie_non_staff, $non_staff, time() + 30, "/");

          //insert into table trx_trace_users
          $insert = pg_query("INSERT INTO public.trx_trace_visitor(visitor_name, visitor_contact, loc_cd, visitor_company, visitor_reason, visitor_verified, evt_cd, entry_dtm) VALUES ('$name', '$phone_num', '$loc_cd', '$company_name','$appoint_with', '$verification', '$evt_cd', '$entry_timestamp')");
          
          //navigate to page location.php
          header("Location: location/loc.php?loc_id=$loc_id");

          //close connection
          include("../dbconnect/dbclose_covid.php");
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
        <h2>NORTHPORT TRACKER <br>(Visitor)</h2>

        <form method="POST">
          <h4>Please fill in the details for registration.</h4>
          <div style="height: 270px; overflow: scroll;">
            <input id="name" class="input" type="text" name="name" placeholder="Full Name" maxlength="50" pattern="[a-zA-Z\s@`'\/\\\-]+" required>
            <input id="comp_name" class="input" type="text" name="comp_name" placeholder="Company Name" maxlength="50" pattern="[a-zA-Z0-9\s@`'\/\\.]+" required>
            <input id="phone_num" class="input" type="text" name="phone_num" placeholder="Phone Number eg: 01********" pattern="[0][1]\d*" minlength="10" maxlength="13" required>
            <input id="appoint_with" class="input" type="text" name="appoint_with" placeholder="Reasons" maxlength="50" pattern="[a-zA-Z0-9\s@`'\/\\]+" required>
          
            <!-- Verification questionaire -->
            <br><br>
            <hr>

            <p class="note">
              <b><u>Note:</u></b>
              <br>
              i) In light of the current situation of COVID-19 outbreak, all of our employees, customers, contactors, service providers, port users and visitors are required to undergo a drive-through body temperature screening before being allowed to enter into Northport premises.
              <br>
              ii) We are not able to meet you face-to-face for this time if you have visited any of the affected countries such as China, Singapore, France and Italy or any other countries declared as high risk by MOH.
              <br>
              iii) Kindly seek immediate medical attention if you are feeling unwell.
              <br>
              iv) Information captured is used for contact tracing if required. Thank you.
            </p>
            <br>
            <input type="checkbox" name="verification" value="yes" required> I hereby understand the terms & conditions as stated above and confirms that the info I provided is valid.
          </div>
          
          <br><br>
          <div class="text-center">
            <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LdPrKUZAAAAAH5i5suqSQwTfTjoFNKcAZKu7dPe"></div>
          </div>
          
          <br>
          <button class="login-button" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript" src="assets/js/input_filterNonstaff.js"></script>