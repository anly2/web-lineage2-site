var xmlhttp;
function loadXMLDoc(url){
   if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
   if(window.ActiveXObject)  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   xmlhttp.open("GET",url,false);
   xmlhttp.send(null);
   return xmlhttp;
}

function page(url, blank){
   if(url == null) url = 'home.php';
   if(blank){
      window.open(url, "_blank");
      return true;
   }

   loadXMLDoc(url);
   document.getElementById("mc").innerHTML = xmlhttp.responseText;
   return xmlhttp.responseText;
}