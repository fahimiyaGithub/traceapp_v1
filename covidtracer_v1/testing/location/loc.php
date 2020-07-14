<?php
  include("../dbconnect/dbconnect_covid.php");
  
  if($_GET['loc_id']){
  	$loc_id = $_GET['loc_id'];
  	include("queries/query_loc.php");
  	// echo $loc_cd;
  	// echo $loc_name;
  	include("loc_detail.php");
  }
?>