<?php
  include("../dbconnect/dbconnect_covid.php");
  $location = "np_c";
  $str_loc = "Northport C";
  include("queries/query_loc.php");
  include("loc_detail.php");
?>