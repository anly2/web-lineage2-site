<?php
include "connection.php";
?>
<img src="images/PostHeaderIcon.gif" align="right" width="60" height="60">

<big><strong><h2>Castle Status</h2></strong></big>

<br /><br /><br /><br />

<div align="center">

<?php
// Too complex and it only matches the castles that are already captured
//$rowdata = mysql_query("select a.clan_name, a.clan_level, a.clan_id, a.ally_name, a.leader_id, b.char_name, b.accesslevel, c.siegeDate, c.taxPercent, c.id as idcastel, c.name FROM clan_data as a, characters as b, castle as c WHERE ((a.clan_id = b.clanId) AND (b.accesslevel = 0) AND (c.id = a.hasCastle)) ORDER BY name ASC");

// Fetch the main data needed
$castles = mysql_query("select name,siegeDate,taxPercent from castle order by id asc") or die("Stage 0 Error: <br />\t".mysql_error());
$castle = array();

for($mi=0;$mi<mysql_num_rows($castles);$mi++){

   // Fill the $castle variable
   $castle[$mi]['name']       = mysql_result($castles, $mi, 'name');
   $castle[$mi]['taxPercent'] = mysql_result($castles, $mi, 'taxPercent');
   $castle[$mi]['siegeDate']  = mysql_result($castles, $mi, 'siegeDate');

   // Fetch the secondary data
   $clan_data = mysql_query("select clan_name, clan_level, ally_name, leader_id from clan_data where hasCastle = '".$mi."'") or die("Stage 1 Error: <br />\t".mysql_error());
   $leader    = mysql_query("select char_name from characters where charId = '".mysql_result($clan_data, 0, 'leader_id')."'") or die("Stage 2 Error: <br />\t".mysql_error());

   // Check if castle is owned by anyone
   $owned = (mysql_num_rows($clan_data) > 0);

   // Fill in the secondary data
   $castle[$mi]['owning_clan']['name']   = ($owned)? mysql_result($clan_data, 0, 'clan_name')  : 'NPC';
   $castle[$mi]['owning_clan']['level']  = ($owned)? mysql_result($clan_data, 0, 'clan_level') : '-/-';
   $castle[$mi]['owning_clan']['leader'] = ($owned)? mysql_result($leader, 0)                  : '-/-';
   $castle[$mi]['owning_clan']['ally']   = ($owned)? mysql_result($clan_data, 0, 'ally_name')  : '-/-';
}

if(count($castle) > 0 ){
   // Initiative HTML
	echo '<table rules="rows">';

   foreach($castle as $id => $data) {

   // Apply HTML styling
	   echo '   <tr>'."\n";
	   echo '      <td width="230"><img src="images/castles/'.strtolower($data['name']).'.jpg" /></td>'."\n";
      echo '      <td width="310">'."\n";
      echo '         <h2 style="font-size:14px; color:#F63; font-weight:bold;">'.$data['name'].' Castle</h2>'."\n";
		echo '         <strong>Next Siege : </strong>'.date('D\ j M Y H\:i',$data['siegeDate']/1000).'<br />'."\n";
		echo '         <strong>Owning Clan: </strong>'.$data['owning_clan']['name'].'<br />'."\n";
		echo '         <strong>Clan Level : </strong>'.$data['owning_clan']['level'].'<br />'."\n";
      echo '         <strong>Leader : </strong>'.    $data['owning_clan']['leader'].'<br />'."\n";
		echo '         <strong>Tax : </strong>'.       $data['taxPercent'].'%<br />'."\n";
		echo '         <strong>Alliance : </strong>'.  $data['owning_clan']['ally'].'<br />'."\n";
		echo '         <br /><br />'."\n";
		echo '      </td>'."\n";
		echo '   </tr>'."\n";
	}
	
	// Fhinishing HTML
	echo "</table>";
	}else{
	   // In case something is broken
	   echo "<br />No records in the database.";
	}
?>

</div>