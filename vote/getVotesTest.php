<html>
<head>
<title> Vote for L2 BlackStar </title>
<script type="text/javascript" src="getVotes.js.php"></script>
</head>
<body>
<center>

<script type="text/javascript">
for(var k in Sites){
   document.writeln(Sites[k].hostname+'<br />In: '+getVotes(k).join("  |  Out: ")+'<br /><br />');
}
</script>

</center>
</body>
</html>