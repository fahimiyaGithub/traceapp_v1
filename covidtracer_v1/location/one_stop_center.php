<?php
  include("../dbconnect/dbconnect_covid.php");
  $location = "one_stop_center";
  $str_loc = "One Stop Center";
  include("queries/query_loc.php");
  include("loc_detail.php");
?>