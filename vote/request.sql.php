<?php
include "login.inc.php";

function add_votepoint(){
   $query = mysql_query("UPDATE Accounts SET Votepoints=Votepoints+1 WHERE Username='".$GLOBALS['logged']."' AND Session='".$GLOBALS['ses']."'") or die(mysql_error());
   if(mysql_affected_rows() != 1) return false;

   return true;
}

function register_vote(){
   if(!isset($_GET['p']) || strlen(trim($_GET['p']))<=0)
       return false;
   $votesite = $_GET['p'];

   $query = mysql_query("UPDATE Accounts SET Votesite_".$votesite."='".(time() + 86400)."' WHERE Username='".$GLOBALS['logged']."' AND Session='".$GLOBALS['ses']."'") or die(mysql_error());
   if(mysql_affected_rows() != 1) return false;

   return true;
}

function getAvailability(){
   if(!isset($_GET['p']) || strlen(trim($_GET['p']))<=0)
       return false;
   $votesite = $_GET['p'];

   $avail = mysql_query("SELECT Votesite_".$votesite." FROM Accounts WHERE Username='".$GLOBALS['logged']."'");
   $penelty_expire = mysql_result($avail, 0);
   $now = time();

   if($penelty_expire < $now){
      echo true;
      return true;
   }

   echo false;
   return false;
}

function getVotePenelty(){
   if(!isset($_GET['p']) || strlen(trim($_GET['p']))<=0)
       return false;
   $votesite = $_GET['p'];

   $avail = mysql_query("SELECT Votesite_".$votesite." FROM Accounts WHERE Username='".$GLOBALS['logged']."'");
   $penelty_expire = mysql_result($avail, 0);
   $penelty = $penelty_expire - time();

   if(!isset($_GET['f'])){
      echo $penelty;
      return $penelty;
   }

   $hours   = round($penelty/3600);
   $minutes = round(($penelty % 3600) / 60);
   $seconds = ($penelty % 3600) % 60;

   echo $hours.":".$minutes.":".$seconds;
   return $hours.":".$minutes.":".$seconds;
}


if(isset($_GET['d']) && strlen(trim($_GET['d']))>0){
   $_GET['d']();
}
?>