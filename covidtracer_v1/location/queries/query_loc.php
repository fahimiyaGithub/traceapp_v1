<?php

	//query_loc
	$query_loc = pg_query("SELECT * FROM nmbtrace.cod_trace_loc WHERE loc_name = '$str_loc'");

	while($row = pg_fetch_array($query_loc)) {
		$loc_cd = $row['loc_cd'];
	}
?>