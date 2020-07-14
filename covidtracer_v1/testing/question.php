<?php
  include("header.php");

  if(!isset($_COOKIE['loc_id'])){
    header("Location: index.html");
  }

  if(isset($_POST['quest_1'])){
    $quest_1 = pg_escape_string($_POST['quest_1']);
    $quest_2 = pg_escape_string($_POST['quest_2']);
    $quest_3 = pg_escape_string($_POST['quest_3']);

    //reject condition
    if($quest_1 == 'yes' || $quest_2 == 'yes' || $quest_3 == 'yes'){
      //navigate to page reject.html
      header("Location: reject.html");
    }

    else{
      header("Location: register_nonstaff.php");
    }
  }
?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracker - Register</title>
    <link rel="icon" href="assets/imgs/fav.png">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="login">
      <div class="login_form">
        <img class="login_logo" src="assets/imgs/np_logo.PNG">
        <h2>NORTHPORT TRACKER <br>(Visitor)</h2>

        <form method="POST">
          <div style="height: 270px; overflow: scroll;">
            <!-- Verification questionaire -->
            <p>1. Have you travelled overseas in the past 1 month?</p>
            Yes: <input type="radio" name="quest_1" value="yes" required>
            No: <input type="radio" name="quest_1" value="no">

            <br><br>
            <p>2. Have you had any possible close contact with anyone that had been quarantined due to suspicion or confirmed cases of COVID-19?</p>
            Yes: <input type="radio" name="quest_2" value="yes" required>
            No: <input type="radio" name="quest_2" value="no">

            <br><br>
            <p>3. Do you have/had any symptoms during the past 14 days?</p>
            <!-- <input class="input" type="text" placeholder="Example: 'Fever' or 'None'" name="quest_3" required> -->
            <!-- Sample  -->
            Yes: <input type="radio" name="quest_3" value="yes" required>
            No: <input type="radio" name="quest_3" value="no">
            <br><br>
          </div>
          <button class="login-button" type="submit" name="submit">Next</button>
        </form>
      </div>
    </div>
  </body>
</html>