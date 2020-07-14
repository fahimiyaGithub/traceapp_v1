<?php
  header("X-Content-Type-Options: nosniff");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  header("X-XSS-Protection: 1; mode=block");
  header('X-Frame-Options: DENY');
  
  error_reporting(0);
?>