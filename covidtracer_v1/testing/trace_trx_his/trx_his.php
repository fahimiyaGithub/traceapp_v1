<?php
include('../dbconnect/dbconnect_covid.php');

date_default_timezone_set("Asia/Kuala_Lumpur");

$now = date('Y-m-d H:i:s', time());
$upd_cd = 'system';

$qry_entry_dtm = pg_query("SELECT * FROM nmbtrace.trx_trace_visitor");

while($row = pg_fetch_array($qry_entry_dtm)){
	$visitor_id = $row['visitor_id'];
	$visitor_name = $row['visitor_name'];
	$visitor_contact = $row['visitor_contact'];
	$loc_cd = $row['loc_cd'];
	$visitor_company = $row['visitor_company'];
	$visitor_reason = $row['visitor_reason'];
	$visitor_verified = $row['visitor_verified'];
	$evt_cd = $row['evt_cd'];
	$entry_dtm = $row['entry_dtm'];
	//$exit_dtm = $row['exit_dtm'];
	$record_id = $row['record_id'];

	if(strtotime($entry_dtm) < strtotime('-1 day')){
		$qry_his = pg_query("INSERT INTO nmbtrace.his_trace_visitor(upd_dtm, upd_cd, visitor_id, visitor_name, visitor_contact, loc_cd, visitor_company, visitor_reason, visitor_verified, evt_cd, entry_dtm) VAlUES('$now', '$upd_cd', '$visitor_id', '$visitor_name', '$visitor_contact', '$loc_cd', '$visitor_company', '$visitor_reason', '$visitor_verified', '$evt_cd', '$entry_dtm')");

		if($qry_his){
			$qry_log = pg_query("INSERT INTO nmbtrace.log_trace_visitor(upd_dtm, upd_cd, visitor_id, visitor_name, visitor_contact, loc_cd, visitor_company, evt_cd, action_type) VALUES('$now', '$upd_cd', '$visitor_id', '$visitor_name', '$visitor_contact', '$loc_cd', '$visitor_company', '$evt_cd', 'data moved from trx to his')");
		}

		$qry_del = pg_query("DELETE FROM nmbtrace.trx_trace_visitor WHERE record_id = '$record_id'");
	}
}

?>