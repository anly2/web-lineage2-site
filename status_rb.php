<html>
<head>
<title>Raid Boss Status</title>
</head>
<body>

<?php
require"connection.php";

$q = mysql_query("SELECT boss_id,loc_x,loc_y,loc_z,respawn_time FROM raidboss_spawnlist");
$online = mysql_num_rows($q);

echo '<img src="images/world_map.jpg" style="position:absolute;top:0px;left:0px" />';

while ($res=mysql_fetch_array($q)){
	$id=$res['boss_id'];
	$valx=$res['loc_x'];
	$valy=$res['loc_y'];
	$valz=$res['loc_z'];
	$respawn=$res['respawn_time'];
	
	$boss_name=mysql_query("SELECT name FROM npc WHERE id='$id'");
	$name = mysql_fetch_row( $boss_name );
	
	$boss_level=mysql_query("SELECT level FROM npc WHERE id='$id'");
	$level = mysql_fetch_row( $boss_level );
	
   if($respawn > 0){
      $respawntime = date('D M j G:ia T',($respawn / 1000));
      $respawn_time = 'will respawn '.$respawntime.'';
   }
	
   $x=116+($valx+107823)/200;
   $y=2580+($valy-255420 )/200;
  
   if($respawn == "0")
	  echo '<img src="images/up.png" title="Level '.$level[0].' '.$name[0].' is Alive!" style="position:absolute;top:'.$y.'px;left:'.$x.'px" />';
   else 		
	  echo '<img src="images/down.png" title="Level '.$level[0].' '.$name[0].' '.$respawn_time.'" style="position:absolute;top:'.$y.'px;left:'.$x.'px" />';
}

mysql_close();
?>
</body>
</html>