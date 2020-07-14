<?php
	// include('../dbconnect/dbconnect_covid.php');

	$evt = pg_query("SELECT * FROM nmbtrace.cod_trace_event WHERE evt_name = 'Pandemic Covid-19'");

	while($row = pg_fetch_array($evt)) {
		$evt_cd = $row['evt_cd'];
	}
?>