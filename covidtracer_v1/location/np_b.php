<?php
  include("../dbconnect/dbconnect_covid.php");
  $location = "np_b";
  $str_loc = "Northport B";
  include("queries/query_loc.php");
  include("loc_detail.php");
?>