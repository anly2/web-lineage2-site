<?php
 if(!isset($_SERVER['HTTP_REFERER'])) exit;
?>

// Create new window with the frameset
// The frameset is hidden and gets the current votes at the specified votesite
// On returning to the main window, it checks if there are cookies
//   If there are check the now-votes on the site from the cookie and compare the votes
//   If votes are more than the first check, and if less than minute has passed
//       Reward();

         // XML functions
         var xmlhttp;
         function GetXmlHttpObject(){
            if (window.XMLHttpRequest){
               // code for IE7+, Firefox, Chrome, Opera, Safari
               return new XMLHttpRequest();
            }
            if (window.ActiveXObject){
            // code for IE6, IE5
            return new ActiveXObject("Microsoft.XMLHTTP");
            }
            alert ("Your browser does not support XMLHTTP!");
            return null;
         }

         function loadXMLDoc(url){
            xmlhttp=GetXmlHttpObject();
            xmlhttp.open("GET",url,false);
            xmlhttp.send(null);
         }

      function trimHtml(text){
         var arr = text.split("<");
         var ar = new Array();
         for(ki in arr){
            ar[ki] = arr[ki].substr(arr[ki].indexOf(">")-(-1));
         }
         return ar.join("");
      }

      function get_tagEnd(str, tag){
         var cur_ind = 0;

         while(1){
            cind = str.indexOf('</'+tag);
            oind = str.lastIndexOf('<'+tag, cind);

            if(oind==-1 || oind==0){
               return cind-(-cur_ind);
               break;
            }
            //cut(str)
            str = str.substr(0,oind) + str.substr(cind-(-tag.length)-(-3));
            cur_ind += (cind-(-tag.length)-(-3)) - oind;
         }
      }

   function parse_xml_votes(xmlDoc, voteObj){
      try{

         var ind = xmlDoc.indexOf(voteObj.voteId);
         var trind = xmlDoc.lastIndexOf('<'+voteObj.tagged+voteObj.att, ind);
         var treind  = get_tagEnd(xmlDoc.substr(trind), voteObj.tagged) -(-trind);

         var html = xmlDoc.substr(trind, (treind-trind));
                           
         // In and Out are always last in the htmlDefinition so start searching <td>s from the end
         var tds = html.split("<"+voteObj.tds);

            //document.write('<textarea rows="20" cols="125">'+tds.join("\n\n---\n\n")+'</textarea><br /><br />');

         var in_td_ind  = (voteObj.IN_td  < 0)? (tds.length-(-voteObj.IN_td))  : voteObj.IN_td-1  ;
         var out_td_ind = (voteObj.OUT_td < 0)? (tds.length-(-voteObj.OUT_td)) : voteObj.OUT_td-1 ;

            //alert("in:"+in_td_ind+"\n "+tds[in_td_ind]+"\n\nout:"+out_td_ind+"\n "+tds[out_td_ind]);

         var votesIn  = trimHtml(tds[in_td_ind]).replace(/^\s+|\s+$/g,"");
         var votesOut = trimHtml(tds[out_td_ind]).replace(/^\s+|\s+$/g,"");

         return [votesIn, votesOut];
      }catch(e){alert("Error while parsing the xml!");alert(e);}
   }

   function getVotes(site){
      loadXMLDoc('feed.php?url='+Sites[site].vList);
      return parse_xml_votes(xmlhttp.responseText, Sites[site]);
   }

   var Sites = new Array();
   // -1 Is the LAST one
   // 1 Is the FIRST NOT the SECOND (NOT 0 -> first)
   
<?php
   include "sites.inc.php";
   foreach($Sites as $key=>$value){
      $prop_str = ''; $comma = 0;
      foreach($value as $prop=>$pValue){
         $prop_str .= (($comma++)? " , " : "") .$prop.": '".$pValue."'";
      }
      $js_str = 'Sites['.$key.'] = {'.$prop_str.'};';
      echo $js_str."\n";
   }
?>
