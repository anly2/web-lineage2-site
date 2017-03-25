<html>
<head>
<title> Reconecting... </title>
<script type="text/javascript" src="getVotes.js.php"></script>
<?php
if(isset($_GET['votesite'])){
   $votesite = $_GET['votesite'];
   echo '<script type="text/javascript">'."\n";
   echo '   var votes = getVotes('. $_GET['votesite'] .');'."\n\n";

   echo 'var nDate = new Date();'."\n";
	echo 'nDate.setTime(nDate.getTime()+60000);'."\n";
   echo 'document.cookie="votesite'. $_GET['votesite'] .'="+votes[0]+";expires="+nDate.toGMTString();'."\n";
   echo 'window.location.href=Sites['.$votesite.'].vLink;'."\n";
   echo '</script>'."\n";
}else exit;
?>
</head>
</html>