<?php
function get_headers_img($path = 'images/headers/'){
   $dir = opendir($path);
   while($file = readdir($dir)){
      if($file == "." || $file == "..") continue;
      $headers[] = $file;
   }

   return $headers;
}

$header = get_headers_img();
$header_code = '<img src="images/headers/'.$header[array_rand($header)].'" class="header" />';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
 <head>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index,follow" />
  <meta name="keywords" content="lineage, lineage2, 2, l2blackstar, blackstar, black, star, l2, Server, MMORPG, Vote" />
  <meta name="title" content="L2 Blackstar Server" />
  <meta name="author" content="Eternal Aion Staff" />
  <meta name="description" content="A new l2 server dedicated to the players. Constant (but not automatic) events with awesome rewards. A lot of PvP PvE and mostly FUN! Join now!" />

  <script type="text/javascript" src="main.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css" />

   <title>L2 Blackstar</title>
</head>
<body onload="page(<?php echo (isset($_GET['p']))? "'".$_GET['p'].".php'" : ""; ?>);">
<!-- No offence intended when copying the style of Eternal Aion's Site -->
<!-- With best feelings we hope that everything is OK -->

<div align="center">

<div style="width:965px;">
<div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>
<div class="content" style="background-color:#161c20;">

   <div align="center">
      <span class="header"><?php echo $header_code; ?></span>

      <div class="mtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>
      <div class="content">
         <table cellspacing="20" width="100%" style="max-width:960px;" bgcolor="#1c303d">
            <tr>
               <td width="170" valign="top">

                  <!-- NAVIGATION -->
                  <div style="width:200px">
                  <div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>

                     <div class="content" style="background-image: url('images/BlockContent-c.png');">

                           <table style="margin-left:20px;" class="navigation">
                              <tr><th align="center"> Navigation </th></tr>
                              <tr><td align="left" width="130">
                                 <!-- Navigation content -->

                                       <li><a onclick="page('home.php');">Home</a></li>
                                       <li><a onclick="page('how_to_connect.php');">How to Connect</a></li>
                                       <li><a onclick="page('server_info.php');">Server Info</a></li>
                                       <li><a onclick="page('server_rules.php');">Server Rules</a></li>
                                       <li><a onclick="page('forum/index.php', 1)">Forum</a></li>
                                       <li><a onclick="page('vote/');"><big>Vote</big></a></li>
                                       <li><a onclick="page('castle_status.php');">Castle Status</a></li>
                                       <li><a onclick="page('status_rb.php', 1);">Raid boss Status</a></li>
                                       <li><a onclick="page('forum/register.php', 1);"><big>Register</big></a></li>

                                 <!-- End of navigation content -->
                              </td></tr>
                           </table>

                     </div>

                  <div class="rbottom"><div class="r4"></div><div class="r3"></div><div class="r2"></div><div class="r1"></div></div>
                  </div>
                  <!-- End of NAVIGATION -->

                  <br /><br /><br />

                  <!-- Server Status -->
                  <div style="width:200px;">
                  <div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>

                     <div class="content" style="background-image: url('images/BlockContent-c.png');">

                        <div style="margin-left:20px;" class="server_status">
                           <strong>Server Status</strong>
                           <br /><br />
                           &nbsp;&nbsp;&nbsp;Login Server<br />
                           <dd><font color="red">Off</font><br /></dd>
                           &nbsp;&nbsp;&nbsp;Game Server
                           <dd><font color="red">Off</font><br /></dd>
                        </div>

                     </div>

                  <div class="rbottom"><div class="r4"></div><div class="r3"></div><div class="r2"></div><div class="r1"></div></div>
                  </div>
                  <!-- End of Server Status -->

               </td>
               <td align="left" style="min-width:700px;" height="100%">

                  <table width="100%" height="100%" cellpadding="20" ><tr>
                     <td align="left" height="100%" style="border: 2px solid #FEF3E2;" background="images/BlockContent-c.png" valign="top">

                        <div id="mc" style="min-height:400px;"></div>

                     </td>
                  </tr></table>

               </td>
            </tr>
         <table>
      </div>
      <div class="mbottom"><div class="r4"></div><div class="r3"></div><div class="r2"></div><div class="r1"></div></div>
   </div>


</div>
<div class="rbottom"><div class="r4"></div><div class="r3"></div><div class="r2"></div><div class="r1"></div></div>
</div>

</div>

</body>
</html>
