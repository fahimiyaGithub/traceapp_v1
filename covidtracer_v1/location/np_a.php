<?php
  include("../dbconnect/dbconnect_covid.php");
  $location = "np_a";
  $str_loc = "Northport A";
  include("queries/query_loc.php");
  include("loc_detail.php");
?>