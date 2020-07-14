<?php
$serverName = "10.8.221.32, 49158"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"AgathaeHR-Integration", "UID"=>"CONTRAKUser", "PWD"=>"CONTRAKUser1");
$dbconnect_hcms = sqlsrv_connect( $serverName, $connectionInfo);

if( $dbconnect_hcms ) {
     //echo "Connection established.<br />";
}
 //else{
//      echo "Connection could not be established.<br />";
//      die( print_r( sqlsrv_errors(), true));
// }

// sqlsrv_close( $conn );
?>