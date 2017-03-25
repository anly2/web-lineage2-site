<?php
if(isset($_GET['url']))
   $url = $_GET['url'];
else exit;

echo file_get_contents($url);
?>