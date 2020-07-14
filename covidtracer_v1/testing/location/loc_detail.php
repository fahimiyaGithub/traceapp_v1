<?php 
  include("../header.php");
  include("../dbconnect/dbconnect_covid.php");
  include("../event/qry_evt.php");
  session_start();
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $timestamp = date('Y-m-d H:i:s', time());
  $timez = date('d M Y G:ia', time());
  $cookie_time = "timestamp";
  $cookie_location = "loc_id";
  $location = $loc_id;

  setcookie($cookie_time, $timez, time() + (86400 * 1), "/");
  setcookie($cookie_location, $location, time() + (86400 * 1), "/");

  if(!isset($_COOKIE["new_user"])){
    //pass location var to register.php
    $_SESSION['location'] = $loc_id;
    $_SESSION['location_string'] = $loc_name;
    header("Location:../register.php");
  }

  else{
    if(isset($_COOKIE["non_staff"])){
      //do nothing
    }

    else{
      //insert data to database here//
      //cookies
      $name = $_COOKIE["new_user"];
      $staff_no = $_COOKIE["staff_no"];
      $phone_num = $_COOKIE["phone_num"];

      //query insert to db staff
      include("queries/query.php");

      //close connection
      include("../dbconnect/dbclose_covid.php");

      //session_destroy();
    }
    $_SESSION['location_string'] = $loc_name;
    header("Location: ../content.php");
  }
?>