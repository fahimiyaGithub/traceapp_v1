<?php
	//local db
	// $host = "130.2.88.204";
	// $port ="5432";
	// $dbname = "covid19";
	// $user = "postgres";
	// $passw = "abc123";

	//test db
	$host = "10.8.223.239";
	$port ="5432";
	$dbname = "np";
	$user = "nmbintra";
	$passw = "nmbintra1";

	// $host = "localhost";
	// $port ="6432";
	// $dbname = "tracedb";
	// $user = "traceapp";
	// $passw = "traceapp1";


	//pre-prod db
	// $host = "10.8.223.246";
	// $port ="6432";
	// $dbname = "npctrace";
	// $user = "ctraceapp";
	// $passw = "ctraceapp1";
	
	$connection = 'host='.$host.' port='.$port.' dbname='.$dbname.' user='.$user.' password='.$passw;
	
	$dbconnect_covid = pg_connect($connection);

	if(!$dbconnect_covid){
		echo "db is not established";
	}
?>