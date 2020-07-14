<?php
  include("../dbconnect/dbconnect_covid.php");
  $location = "southpoint";
  $str_loc = "Port Pass Office (Southpoint)";
  include("queries/query_loc.php");
  include("loc_detail.php");
?>