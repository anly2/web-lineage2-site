<?php
$headers = glob('images/headers/*.jpg');
$header  = $headers[array_rand($headers)];


ob_start();

if(isset($_REQUEST['connect'])){
   echo <<<EOT
<h3>How to play on L2 Blackstar</h3>

<ol>
   <li>You will need Lineage 2 - Freya installed.</li>
   <br />
       If you still don't have it you can download it from <a><b>here</b></a> and install.<br />
       <small><i>You might need to run the official updater (<i>Your_Lineage2_Folder</i>/Lineage2.exe)</i></small>

   <br /><br /><br />

   <li>Download our system folder.</li>
   <br />
      <dd><a><b>mirror1</b></a> <a><b>mirror2</b></a></dd>
      <small><i>If you don't want to lose any of your screenshots/data, rename your current system folder (eg. to "system1") and place our's in <u>its place</u>.</i></small>
</ol>

 <br /><br />
 &nbsp;&nbsp;&nbsp; Your Lineage2 Client is now ready, but you'll need to open an account.
 <br /><br />

<ol start="3">
<li>Game Account registering is automated but you'll need to register an account on the forums</li>
</ol>
<br />
Have fun and don't cheat !!!!!
<br /><br /><br />
<i>L2Blackstar administration</i>
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
   <li>PK sucks.
   <li>Overbuffing sucks.
   <li>GMs cennot police all zones...
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

Page will be updated soon.<br />
<b>Thank you for the attempt!</b>
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
      echo '<table style="border-top: 1px solid #808c96;">'."\n";
      echo '   <tr>'."\n";
      echo '      <td>'."\n";
      echo '         <img src="images/castles/'.strtolower($castle_info['name']).'.jpg" alt="'.$castle_info['name'].'" width="150" height="100" />'."\n";
      echo '      </td>'."\n";
      echo '      <td align="left" style="padding:20px">'."\n";
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
   $ana = <<<EOT
<h3>Server Info</h3>

<strong>Server Rates</strong>
<ul>
   20x xp<br />
   25x sp<br />
   2x  party<br />
   14x Spoil<br />
   200x Adena<br />
   5x Quest droprate<br />
</ul>

<br />

<strong><big>Server Features</big></strong>
<ul>
   Leveling and Gearing is hard (like in a Low Rate Server) <br />
   <big>On parallel,</big> in every event your character is temporally boosted<br />

   <br />

   In events you <b>start with</b>:
   <ul>
      <li>Max level (85)</li>
      <li>S80 Armors</li>
      <li>S80 Weapons</li>
      <li>all skills learned</li>
   </ul>

   <br />

   You can earn (event rewards):
   <ul>
      <li>enchanted gear for inside the events</li>
      <li>enchanted skills for inside the events</li>
      <li>starting potions for each event</li>
      <li>and more</li>
   </ul>

   <br />

   <i>Note:</i> The Event version of your character gets a seperate skill bar.<br />

   <br />

   To Ease the pain and annoyance of crafting:<br />
   <ul>
      <li>Craft Chance is 100% (no chance for failure)</li>
      <li>Foundation Craft Chance - 20%</li>
      <li>Double Craft Chance - 20% (you get double the result items)</li>
   </ul>
</ul>

<br />

<strong>Miscellaneous</strong>
<ul>
   No auto-learning Skills<br />
   Auto Class Changer for free<br />
   Auto Pickup<br />
   No Subclass Quest<br />
   Nobless Quest required<br />
   Nobless Quest ingredients exchangable<br />
</ul>

<br />

<strong>Custom NPCs</strong>
<ul>
   Limited GM Shop with misc items and low grade B and A<br />
   Limited Global GK with all normal ports gathered in one NPC<br />
</ul>

<br />

<strong>Custom Buffer</strong>
<ul>
   NPC Buffer with buffs up until Third Class<br />
   Pet buffer<br />
   Buff Schemes<br />
   Auto-buffing when near the Buffer and are not buffed<br />
   Limited Buff Slots - 24 + 12 Dances/Songs<br />
   2h buffs excluding resistances<br />
</ul>

<br />

<strong>Enchanting</strong>
<ul>
   Max Enchant Weapon 25<br />
   Max Enchant Armor/Jewelry 20<br />
   Safe Enchant 4<br />
   Enchant Success Normal Scrolls 60%<br />
   Enchant Success Blessed Scrolls 85%<br />
</ul>

<br />

<strong>Common Features</strong>
<ul>
   Offline shop available<br />
   PvP armors working<br />
   MyTeleport working<br />
   Elemental Weapon Enchant working<br />
</ul>

<br />

<strong>Some of the Events</strong>
<br />
<table style="margin-left:35px;">
   <tr><td width="100"></td><td></td><td></td></tr>
   <tr><td>(Automated)</td><td> Team vs Team </td><td>(TvT)</td></tr>
   <tr><td>(Automated)</td><td> Team vs Team vs Team </td><td>(TvTvT)</td></tr>
   <tr><td>(Automated)</td><td> Deathmatch </td><td>(DM)</td></tr>
   <tr><td>(Automated)</td><td> Last Man Standing </td><td>(LMS)</td></tr>
   <tr><td>(Automated)</td><td> Team Deathmatch </td><td>(TDM)</td></tr>
   <tr><td>(Automated)</td><td> Capture the Flag </td><td>(CtF)</td></tr>
   <tr><td>(Automated)</td><td> Seek Out </td><td>(SO)</td></tr>
   <tr><td>(Automated)</td><td> World Race </td><td>(WR)</td></tr>
   <tr><td>(Automated)</td><td> King of the Hill </td><td>(KotH)</td></tr>
   <tr><td>(Automated)</td><td> Area Dominance </td><td>(AD)</td></tr>
   <tr><td>(Automated)</td><td> VIP Escort </td><td>(VE)</td></tr>
   <tr><td>(Automated)</td><td> VIP Team Fight </td><td>(VTF)</td></tr>
   <tr><td>(Automated)</td><td> Fortress Siege </td><td>(FS)</td></tr>
   <tr><td>(Automated)</td><td> Castle Siege </td><td>(CS)</td></tr>
   <tr><td>(Automated)</td><td> Town Siege </td><td>(TS)</td></tr>
   <tr><td>(Automated)</td><td> Town Invasion </td><td>(TI)</td></tr>
   <tr><td>(GM Event)</td><td> Ranked PvP </td><td>(PvP)</td></tr>
   <tr><td>(GM Event)</td><td> Ranked TvT </td><td>(rTvT)</td></tr>
   <tr><td>(GM Event)</td><td> Hide 'n' Seek </td><td>(HnS)</td></tr>
   <tr><td>(GM Event)</td><td> Raid Boss Event </td><td>(RB)</td></tr>
   <tr><td>(GM Event)</td><td> Quiz Event </td><td>(Quiz)</td></tr>
   <tr><td>(GM Event)</td><td> Spy Event </td><td>(Spy)</td></tr>
   <tr><td>(Persistent)</td><td> Chest of Fortune</td></tr>
   <tr><td>(Persistent)</td><td> Clan War Severity</td></tr>
   <tr><td>(Persistent)</td><td> Chaotic Weapon Mastery</td></tr>
   <tr><td>(Persistent)</td><td> Most Wanted (PlayerKiller)</td></tr>
</table>

<br /><br />

<strong>Server Machine</strong>
<ul>
   Hosted in Germany<br />
   Intel Core i7-920 Quad-Core<br />
   8 GB DDR3 RAM<br />
</ul>
EOT;

echo isset($_REQUEST['ana'])? $ana : <<<EOT
<h3>Server Info</h3>

<strong>Rates</strong><br />
<ul>
   42x xp<br />
   42x sp<br />
   2x party<br />
   14x Spoil<br />
   100x Adena<br />
   5x Quest drop rate<br />
</ul>
<br />

<strong>Class Related</strong><br />
<ul>
   No Subclass Quest<br />
   Subclass Max Level - 80<br />
   Class Transfer for free<br />
   Auto learn ALL skills<br />
</ul>
<br />

<strong>Items and Farming</strong><br />
<ul>
   Custom Farm Areas<br />
   GM Shop<br />
   A+ Armors require Unsealing with Ancient Adena (Enchanting is preserved)<br />
   Weapon Special Abilities Retial-like with Soul Stones (Enchanting is preserved)<br />
</ul>
<br />

   <strong>Buffs and Convenience</strong><br />
<ul>
   Global Gatekeeper (Special for Nobless)<br />
   MyTeleport Working (reward from events)<br />
   NPC Buffer<br />
   Premade Buff Schemes and ability to create custom ones<br />
   Pet Buffer<br />
</ul>
<br />

<strong>Enchanting</strong><br />
<ul>
   Safe Enchant - 4<br />
   Max Enchant Weapon - 25<br />
   Max Enchant Armor / Jewel - 20<br />
   Enchant Rate - 60%<br />
   Blessed Enchant Rate - 80%<br />
   Blessed Scrolls are availavle from Spoil<br />
</ul>
<br />

<strong>Miscellaneous</strong><br />
<ul>
   Some Raids are made stronger to be match the rewards<br />
   A lot of accessories for custom appearance<br />
   A lot of funny Auto events like TvT, CTF, DM<br />
   Donations only for style (name colours, special accessory etc.) and more comfortable gameplay(nobless, clan items, all-in-one item)<br />
</ul>
<br />
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
      margin: 50px 10%;
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
      background-image: url('images/Storm_Jewel_by_NitroX72.png');
      /*background-attachment: fixed; */
      padding:  5px;

      width:    auto;
      overflow: auto;
   }
   .left{
      float: left;
   }
   .left>*{
      border-radius: 10px;
      /*background-color: #161c20;*/
      background-image: url('images/BlockContent-c.png');
      width:   170px;
      margin:  20px;
      padding: 10px;
   }
   .main{
      margin:      20px;
      margin-left: 240px;

      border: 2px solid #808c96;
      border-radius: 10px;

      /*background-color: #161c20;*/
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

   footer{
      text-align:center;
      font-size: xx-small;
      color:gray;
   }
   footer a{
      color:inherit;
   }
   footer a:hover{
      text-decoration: underline;
      opacity: 0.7;
   }
   </style>
</head>
<body>

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
               <li><a href="forum/" target="_BLANK">Forum</a></li>
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
<footer>
   Design by <a href="http://87.126.47.72:22080/">Andy 'Nightheart' Anchev</a><br />
   Background image - "<a href="http://fav.me/d1b0tay">Storm Jewel</a>" by <a href="http://nitrox72.deviantart.com/">NitroX72</a>
</footer>
</html>