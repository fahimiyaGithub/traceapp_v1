<?php
  include("../dbconnect/dbconnect_covid.php");
  $location = "surau_alhidayah";
  $str_loc = "Surau Al-Hidayah";
  include("queries/query_loc.php");
  include("loc_detail.php");
?>