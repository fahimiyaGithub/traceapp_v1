<?php
	//insert into table trx_trace_users
	$insert = pg_query("INSERT INTO public.trx_trace_visitor(visitor_id, visitor_name, visitor_contact, loc_cd, visitor_company, evt_cd, entry_dtm) VALUES ('$staff_no', '$name', '$phone_num', '$loc_cd','NP Staff', '$evt_cd', '$timestamp')");
?>