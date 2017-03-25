<?php
session_start();

function db_connect($db='vote_test', $Host='localhost', $User='viewer', $Password='ju44rff')
{
  $link = mysql_connect($Host, $User, $Password) or die("Unable to connect to $Host");
  $database = mysql_select_db($db, $link) or die(mysql_error());
}

function redirect($to = 'back', $delay = 0, $and_parent = 0)
{
  if($to=='back') $to = $_SERVER['HTTP_REFERER'];
  if(strlen(trim($to)) == 0) $to = __FILE__;

  if( !$and_parent )
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="'.$delay.'; URl='.$to.'">'."\n";
  else{
    echo '<Script type="text/javascript">'."\n";
    echo '   setTimeout("window.parent.location=\''.$to.'\'", '.($delay*1000).')'."\n";
    echo '</Script>'."\n";
  } 
}
function encode(&$password)
{
  if (strlen(trim($password)) > 0) {
    $passhash = md5($password);
    $password = str_repeat(chr(32), strlen($password));
  }
  else return false;

  return $passhash;
}

   db_connect();
   $ses = session_id();
   $query = mysql_query("SELECT Username FROM Accounts WHERE Session='".$ses."'");
   $matches = mysql_num_rows($query);

   if($matches == 1)
      $logged = mysql_result($query, 0);
   else
      $logged = false;

   define('logged', $logged, true);


function login(){
    $ses = session_id();
    $remove = array("'",";"," ",")","(","/","\\");
  $Form['username'] = strtoupper(str_replace($remove,"",$_POST['Username']));
  $Form['password'] = encode($_POST['Password']);

  $query_username = mysql_query("SELECT * FROM Accounts WHERE Username='".$Form['username']."'") or die(mysql_error());
  if( mysql_num_rows($query_username) == 0 ) return false;

  $sql = "UPDATE Accounts SET Session='".$ses."' WHERE Username='".$Form['username']."' AND Password='".$Form['password']."'";
  $query_login = mysql_query($sql) or die(mysql_error());
  if( mysql_affected_rows() == 0 ) return false;

  redirect();
}
function login_form(){
   echo '<div align="center">'."\n";
   echo "Please fill in your<br /><br />\n";
   echo '<form action="login.inc.php?a=login" method="POST">'."\n";
   echo '  <label>'."\n";
   echo '     <b><i>Username</i></b>:<br />'."\n";
   echo '    <input type="text" name="Username" tabindex="1" /><br />'."\n";
   echo '  </label>'."\n";
   echo '  <label>'."\n";
   echo '     <i>and <b>Password</b></i>:<br />'."\n";
   echo '    <input type="Password" name="Password" tabindex="2" /><br />'."\n";
   echo '  </label>'."\n";
   echo '  <input type="submit" name="Submit" value="Login" tabindex="3" />'."\n";
   echo '</form>'."\n";
   echo '</div>'."\n";
   exit;
}
function logout(){
   $logged = $GLOBALS['logged'];
   $query_sesClean = mysql_query("UPDATE Accounts SET Session=DEFAULT WHERE Username='$logged'") or die(mysql_error());

   if( $query_sesClean ){
     session_unset();
     session_destroy();

     exit("done");
   }
}
   
if(!logged && $_GET['a']!='login')
    $_GET['a'] = 'login_form';

if(isset($_GET['a']) && strlen(trim($_GET['a']))>0){
   $_GET['a']();
}

?>