<?php
	//query_loc
	$query_loc = pg_query("SELECT * FROM public.cod_trace_loc WHERE loc_cd = '$loc_id'");

	while($row = pg_fetch_array($query_loc)) {
		$loc_cd = $row['loc_cd'];
		$loc_name = $row['loc_name'];
	}
?>