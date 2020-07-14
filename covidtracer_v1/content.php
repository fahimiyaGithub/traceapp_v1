<?php  
  include("header.php");
  session_start();
  date_default_timezone_set('Asia/Kuala_Lumpur');

  //pull cookies timestamp
  $timestamp = $_COOKIE["timestamp"];
  $str_loc = $_SESSION['location_string'];

  if(!isset($_COOKIE["new_user"])){
    header("Location: index.html");
  }
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tracker - Location</title>
  <link rel="icon" href="assets/imgs/fav.png">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="login">
    <div class="login_form">
      <img class="login_logo" src="assets/imgs/np_logo.PNG">
      <center>
        <b>Verification Receipt</b>
      </center>
      <p>
        <i>"Thank you for participating in the prevention of the Covid-19 outbreak"</i>
        <br><br>
        The safety of our employees, vendors and visitors remain as our top priority. We are taking all the necessary precautionary measure against the spread of COVID-19 pandemic outbreak.
        <br><br>
        You are required to provide your information prior entering Northport premises. Your personal information will be kept strictly confidential and will not be sold, reused, rented, loaned, or otherwise disclosed.
      </p>
      <br>
      <h2>Date: <?php echo $timestamp; ?></h2>
      <h2>Location: <?php echo "$str_loc, Northport (Malaysia) Bhd." ?></h2>
      <br>
    </div>
  </div>
</body>
</html>