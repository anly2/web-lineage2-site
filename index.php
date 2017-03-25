<?php
$headers = glob('images/headers/*.jpg');
$header  = $headers[array_rand($headers)];


ob_start();

if(isset($_REQUEST['connect'])){
   echo <<<EOT
<h3>How to play on L2 Blackstar</h3>

<ol>
   <li>You will need Lineage 2 - Gracia Epiloge installed.<br />
       If you still don\'t have you can download it from <a><b>here</b></a> and install.<br />
       (You might need to run the official updater (<i>Your_Lineage2_Folder</i>/Lineage2.exe))
   <li>Download our system folder.
   <br />
      <dd><a><b>mirror1</b></a> <a><b>mirror2</b></a></dd>
      <i>If you don\'t want to lose any of your screenshots/data, rename your current system folder (eg. to "system1") and place our\'s in its place.</i>
</ol>

 &nbsp;&nbsp;&nbsp; Your Lineage2 Client is now ready, but you\'ll need to open an account.
<ol>
<li>Register on our site, AFTER reading the <a>Server Rules</a>.
    This will be your Forum Account <b><u>and</u></b> Game Account
</ol>
<br />
Have fun and don\'t cheat !!!!!
<br /><br /><br />
L2Blackstar administration
EOT;
}
else

if(isset($_REQUEST['rules'])){
echo <<<EOT
<h3>L2Blackstar Server Rules</h3>
<br />
<div>L2Blackstar staff is always trying to make the server more enjoyable and free of people<br> who do not follow rules.<br>
Please be advised that any infractions will result in warnings, kicks, or bans.<br>
If a GM is not on at the time you see someone perching, buff scamming, etc.,<br>please post your screen shot(s) at our Forums.<br />
Be sure to include the player's name that is disobeying the rules and any relevant information.
</div>

<br><br>

<strong>These are the main rules</strong>
<br />
<ol>
   <li>Respect all L2Blackstar Staff.
   <li>Do not impersonate staff.
   <li>No bug exploiting. If you notice a bug report it right away
   <li>Do not use a modification or third party scripts/programs.
   <li>No hateful, nazi comments or racial slurs.
   <li>Do not spam chat.
   <li>Do not ask to become a GM.
   <li>Do not beg for adena or items.
   <li>Selling items to other players by real money NOT allowed on our server.<br>
   Players that try to sell or buy items by real money will be banned without prior warning.
   <li>Do not kill NPC's.
</ol>

<br /><br />

<strong>Account Rules</strong>
<br>
<ol>
   <li>AGAIN, Third party scripts/programs isn't allowed and if caught using it, you will be banned immediately.
   <li>Sharing accounts is allowed, but you are responsible for giving out your information.<br>
   Give your information out at your own risk.
   <li>GMs do not restore lost or dropped items.
   <li>Due to a Wipe or Rollback your characters or any other of your lost data will NOT be restored.<br>
</ol>

<br /><br>

<strong>Player vs Player (PvP) Rules</strong>
<br>
<ol>
   <li>This is L2 PvP server.
   <li>PK on your own risk.
   <li>Overbuffing NOT allowed.
   <li>GMs do NOT police non-peace zones.
   <li>You are in a combat zone as soon as you leave a spawn area of the map.
</ol>

<br><br><br>
<ul><strong>L2Blackstar staff reserves the right to modify this agreement without prior notice.</strong></ul>
EOT;
}
else

if(isset($_REQUEST['vote'])){
echo <<<EOT
<h3>Vote for us</h3>
<br /></br />

<a>RageZone</a> &nbsp; <a>Top MMO</a>
EOT;
}
else

if(isset($_REQUEST['castles'])){
//   mysql_connect();
//   mysql_select_db("l2jdb");
//
//   $q = mysql_query("Select * from castle order by id");
//   for($i=0;$i<mysql_num_rows();$i++){
//      $name       = mysql_result($q, $i, "name");
//      $tax        = mysql_result($q, $i, "taxPercent");
//
//      $qc = mysql_query('SELECT clan_name FROM clan_data WHERE hasCastle='.$i);
//      $owner = (mysql_num_rows($qc)>0)? mysql_result($qc, 0) : 'Unclaimed';
//
//      $siege_date = mysql_result($q, $i, "siegeDate");
//      $siege_date = date('l jS \of F Y h:i:s A', $siege_date);
//
//      $castle[$i] = array("name"=>$name, "owner"=>$owner, "tax"=>$tax, "siege_date"=>$siege_date);
//   }

   // When granted a real DB, delete this
   // This serves as example result while the DB results are missing
   $castle = array();
   $castle[] = array("name"=>'rune', "owner"=>'NightSentinels', "tax"=>'8%', "siege_date"=>'Sun, 7 Mar 2010', "siege_hour"=> '16:00 GMT +1');
   $castle[] = array("name"=>'innadril', "owner"=>'MaskOf42', "tax"=>'15%', "siege_date"=>'Sun, 7 Mar 2010', "siege_hour"=> '16:00 GMT +1');
   $castle[] = array("name"=>'aden', "owner"=>'Fear', "tax"=>'15%', "siege_date"=>'Sun, 7 Mar 2010', "siege_hour"=> '16:00 GMT +1');

   echo '<h3>Castle Status</h3>'."\n";
   echo '<br /><br />'."\n";
   echo "\n";
   echo '<div align="center">'."\n";

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

   echo '</div>'."\n";
}
else

if(isset($_REQUEST['raids'])){
   echo '<html>'."\n";
   echo '<head>'."\n";
   echo '<title>Raid Boss Status</title>'."\n";
   echo '</head>'."\n";
   echo '<body>'."\n";

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

   echo '</body>'."\n";
   echo '</html>'."\n";
   exit;
}
else

if(isset($_REQUEST['info'])){
   echo <<<EOT
<h3>Server Info</h3>

<strong>Server Rates</strong>
<br />
42x xp<br />
25x sp<br />
2x  party<br />
14x Spoil<br />
200x Adena<br />
5x Quest droprate<br />

<br /><br />

<strong>Server Features</strong>
<br />
Auto learn Skills<br />
81 and 83 skills no auto learn (still, easy to get)<br />
Auto Class Changer for free<br />
Auto Pickup<br />
No Subclass Quest<br />
GM SHOP<br />
Limited Buff Slots - 24 + 12 Dances/Songs<br />
Max Enchant Weapon 25<br />
Max Enchant Armor/Jewelry 20<br />
Safe Enchant 4<br />
Enchant Success Normal Scrolls 60%<br />
Enchant Success Blessed Scrolls 85%<br />
PVP Armor/Weapon working<br />
S80 Working<br />
You need Noble quest<br />
Global GK<br />
All buffs up until 3rd class buffs at NPC Buffer<br />
2h buffs<br />
Pet buffer<br />
Offline shop available<br />
<br />
Foundation - ON - <b>100% Chance</b><br />
Elemental - ON<br />

<br /><br />

<strong>Server Machine</strong>
<br />
Hosted in Germany<br />
Intel® Core™ i7-920 Quad-Core<br />
8 GB DDR3 RAM<br />
EOT;
}

else{
   echo <<<EOT
<h3>L2 Blackstar Server - Home</h3>
<br /><br />

Welcome to the new Free Private server L2Blackstar !!!
<br />
We are glad to see you here and hope that you will enjoy playing on our server.
EOT;
}

$content = '<img src="images/PostHeaderIcon.gif" style="float:right;" height="60" width="60">'.ob_get_contents();
ob_end_clean();
?>
<html>
<head>
   <title>L2 Blackstar</title>

   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="keywords" content="lineage, lineage2, 2, l2blackstar, blackstar, black, star, l2, Server, MMORPG, Vote" />
   <meta name="title" content="L2 Blackstar Server" />
   <meta name="author" content="L2 Blackstar Staff" />
   <meta name="description" content="A new l2 server dedicated to the players. Constant (but not automatic) events with awesome rewards. A lot of PvP PvE and mostly FUN! Join now!" />

   <style type="text/css">
   body{
      background-color: black;
      color: #FAEDDC;
   }
   a{
      text-decoration:none;
      color: inherit;
   }

   body>div{
      margin-top:   50px;
      margin-left:  10%;
      margin-right: 10%;
      background-color: #161c20;
      padding: 5px;
      border-radius: 10px;
   }

   .header{
      text-align:center;
   }
   .header>img{
      width:  98%;
      height: auto;
   }

   .content{
      border-radius: 10px;
      background-color: #1c303d;
      padding:  5px;

      width:    auto;
      overflow: auto;
   }
   .left{
      float: left;
   }
   .left>*{
      border-radius: 10px;
      background-color: #161c20;
      background-image: url('images/BlockContent-c.png');
      width:   200px;
      margin:  20px;
      padding: 10px;
   }
   .main{
      margin:      20px;
      margin-left: 270px;

      border: 2px solid #FAEDDC;
      border-radius: 10px;

      background-color: #161c20;
      background-image: url('images/BlockContent-c.png');

      padding: 10px;
      min-height: 60px;
   }
   .main h3{
      font-style: italic;
      font-size: x-large;
   }

   .title{
      text-align:center;
      font-weight: bold;
      font-size: large;
   }
   </style>
</head>
<body>
<!-- No offence intended when copying the style of Eternal Aion's Site -->
<!-- With best feelings we hope that everything is OK -->

<div>
   <div class="header"><img src="<?php echo $header; ?>" /></div>

   <div class="content">

      <div class="left">
         <div>
            <div class="title">Navigation</div>
            <ul>
               <li><a href="?">Home</a></li>
               <li><a href="?connect">How to Connect</a></li>
               <li><a href="?info">Server Info</a></li>
               <li><a href="?rules">Server Rules</a></li>
               <li><a href="/forum/" target="_BLANK">Forum</a></li>
               <li><a href="?vote">Vote</a></li>
               <br />
               <!-- <li><a href="?register"><big>Register</big></a></li> -->
               <li><a href="?castles">Castle Status</a></li>
               <li><a href="?raids" target="_BLANK">Raid Boss Status</a></li>
            </ul>
         </div>


         <div>
            <div class="title">Server Status</div>
            <br />

            <div style="text-align:center;">
               Login Server<br />
               <span style="color:red">Offline</span>
               <br />
               Game Server<br />
               <span style="color:red">Offline</span>
            </div>
         </div>
      </div>

      <div class="main">
         <?php echo $content; ?>
      </div>

   </div>
</div>

</body>
</html>