<?php
$db_user = "root";
$db_pass = "42";
$db_name = "l2jdb";
$db_serv = "localhost";
$db_port = "3306";
echo "ok";
mysql_connect ( $db_serv, $db_user, $db_pass );
mysql_select_db ( $db_name );
echo "OK";
?>