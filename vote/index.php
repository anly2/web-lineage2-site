<?php
include "login.inc.php";
?><html>
<head>
<title> Vote for L2 BlackStar </title>
<script type="text/javascript" src="getVotes.js.php"></script>
<script type="text/javascript">
      function getCookie(c_name)
      {
         if (document.cookie.length>0){
           c_start=document.cookie.indexOf(c_name + "=");
           if (c_start!=-1)
           {
             c_start=c_start + c_name.length+1;
             c_end=document.cookie.indexOf(";",c_start);
             if (c_end==-1) c_end=document.cookie.length;
             return unescape(document.cookie.substring(c_start,c_end));
           }
         }
         return false;
      }
      function deleteCookie(cookie_name){
        var cookie_date = new Date ( );  // current date & time
        cookie_date.setTime ( cookie_date.getTime() - 1 );
        document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
      }

         function isAbleToVote(votesite){
            loadXMLDoc("request.sql.php?d=getAvailability&p="+votesite);
            return xmlhttp.responseText;
         }
         function register_vote(votesite){
            loadXMLDoc("request.sql.php?d=register_vote&p="+votesite);
         }


function Reward(votesite){
   loadXMLDoc("request.sql.php?d=add_votepoint");
   alert("You have received a votepoint for voting in "+Sites[votesite].hostname+".");
}
function RegisterVote(votesite){
   deleteCookie("votesite"+votesite);
   //  Make user unable to vote again for the next 12/24 hours
   register_vote(votesite);
}

for(var ci in Sites){
   if(isAbleToVote(ci)){
      if((prev_votes = getCookie("votesite"+ci)) != false){
         cur_votes = getVotes(ci);
         if(prev_votes < cur_votes[0]){
            Reward(ci);
            RegisterVote(ci);
         }
      }
   }
}
</script>
</head>
<body>
<center>

<script type="text/javascript">
for(var k in Sites){
   if(isAbleToVote(k))
      document.writeln('<a href="mediumVote.php?votesite='+k+'"><img src="'+Sites[k].vImg+'" border="0"></a>');
   else{
      loadXMLDoc("request.sql.php?d=getVotePenelty&f&p="+k);
      document.writeln('You can vote again in <b><em>'+Sites[k].hostname+'</em></b> after <strong>'+xmlhttp.responseText+'</strong>');
   }
   document.writeln("<br /><br />");
}
</script>

</center>
</body>
</html>