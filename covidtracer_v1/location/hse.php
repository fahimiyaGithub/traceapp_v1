<?php
  include("../dbconnect/dbconnect_covid.php");
  $location = "hse";
  $str_loc = "HSSE";
  include("queries/query_loc.php");
  include("loc_detail.php");
?>