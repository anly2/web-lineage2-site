<?php

mysql_connect();
mysql_select_db("l2jdb");

$q = mysql_query("Select * from castle order by id");
for($i=0;$i<mysql_num_rows();$i++){
   $name       = mysql_result($q, $i, "name");
   $tax        = mysql_result($q, $i, "taxPercent");

   $qc = mysql_query('SELECT clan_name FROM clan_data WHERE hasCastle='.$i);
	$owner = (mysql_num_rows($qc)>0)? mysql_result($qc, 0) : 'Unclaimed';

   $siege_date = mysql_result($q, $i, "siegeDate");
   $siege_date = date('l jS \of F Y h:i:s A', $siege_date);

   $castle[$i] = array("name"=>$name, "owner"=>$owner, "tax"=>$tax, "siege_date"=>$siege_date);
}

// When granted a real DB, delete this
// This serves as example result while the DB results are missing
$castle = array();
$castle[] = array("name"=>'rune', "owner"=>'NightSentinels', "tax"=>'8%', "siege_date"=>'Sun, 7 Mar 2010', "siege_hour"=> '16:00 GMT +1');
$castle[] = array("name"=>'innadril', "owner"=>'MaskOf42', "tax"=>'15%', "siege_date"=>'Sun, 7 Mar 2010', "siege_hour"=> '16:00 GMT +1');
$castle[] = array("name"=>'aden', "owner"=>'Fear', "tax"=>'15%', "siege_date"=>'Sun, 7 Mar 2010', "siege_hour"=> '16:00 GMT +1');
?>
<address>
<img src="images/PostHeaderIcon.gif" align="right" width="60" height="60">

<big><strong>Castle Status</strong></big>

<br /><br /><br /><br />

<div align="center">
<?php
foreach($castle as $castle_info){
   echo '<table style="border: 1px solid #FEF3E2;">'."\n";
   echo '   <tr>'."\n";
   echo '      <td>'."\n";
   echo '         <img src="images/castles/'.strtolower($castle_info['name']).'.jpg" alt="'.$castle_info['name'].'" width="150" height="100" />'."\n";
   echo '      </td>'."\n";
   echo '      <td align="left">'."\n";
   echo '            <table>'."\n";
   echo '               <tr>'."\n";
   echo '                  <td align="left"><strong>Castle Name:</strong></td>'."\n";
   echo '                  <td align="left"><big><strong>'.ucfirst(strtolower($castle_info['name'])).'</strong></big></td>'."\n";
   echo '               </tr>'."\n";
   echo '               <tr>'."\n";
   echo '                  <td align="left"><strong>Holding Clan:</strong></td>'."\n";
   echo '                  <td align="left"><big><strong>'.$castle_info['owner'].'</strong></big></td>'."\n";
   echo '               </tr>'."\n";
   echo '               <tr>'."\n";
   echo '                  <td align="left"><strong>Tax Rate:</strong></td>'."\n";
   echo '                  <td align="left"><big><strong>'.$castle_info['tax'].'</strong></big></td>'."\n";
   echo '               </tr>'."\n";
   echo '               <tr>'."\n";
   echo '                  <td align="left"><strong>Next Siege Date:</strong></td>'."\n";
   echo '                  <td align="left"><big><strong>'.$castle_info['siege_date'].'</strong></big></td>'."\n";
   echo '               </tr>'."\n";
//   echo '               <tr>'."\n";
//   echo '                  <td align="left"><strong>Next Siege Time(Hour):</strong></td>'."\n";
//   echo '                  <td align="left"><big><strong>'.$castle_info['siege_hour'].'</strong></big></td>'."\n";
//   echo '               </tr>'."\n";
   echo '            </table>'."\n";
   echo '      </td>'."\n";
   echo '   </tr>'."\n";
   echo '</table>'."\n";
}
?>
</div>

</address>