<html>
<head>
<title>Test</title>
<style type="text/css">
.block{
   width:200px;
   height:300px;
   //border:1px solid red;
}
.content{
   background-image:url('images/BlockContent-c.png');
   background-repeat:repeat-y;
   background-position: top left;
}
.blockHeader{
   width:100%;
   height:30px;
   background-image:url('images/BlockHeader.png');
   background-repeat:no-repeat;
   background-position: middle center;
   text-align:center;
   padding-top:5px;
}
.tl{
   position:absolute;
   width:200; height:8px;
   background-image:url('images/Block-tl.png');
   background-repeat:no-repeat;
   background-position: top left;
}
.tr{
   position:absolute;
   width:208; height:8px;
   background-image:url('images/Block-tr.png');
   background-repeat:no-repeat;
   background-position: top right;
}
.cl{
   position:absolute;
   width:208px; height:292px;
   background-image:url('images/Block-cl.png');
   background-repeat:repeat-y;
   background-position: top left;
}
.cr{
   position:absolute;
   width:208px; height:292px;
   background-image:url('images/Block-cr.png');
   background-repeat:repeat-y;
   background-position: top right;
}
.bl{position:relative; bottom: 8px;
   width:200; height:8px;
   background-image:url('images/Block-bl.png');
   background-repeat:no-repeat;
   background-position: bottom left;
}
.br{position:relative; bottom: 16px;
   width:208; height:8px;
   background-image:url('images/Block-br.png');
   background-repeat:no-repeat;
   background-position: bottom right;
}
</style>
</head>
<body>
<div class="block">
   <div class="tl"></div> <div class="tr"></div>

   <div class="cl"></div> <div class="cr"></div>
      <div class="content">
         <div class="blockHeader">Header</div>

         <table width="100%" height="265"><tr><td valign="top" style="padding:10px 20px;">
            Something to display
            <br /><br /><br /><br />
         </td></tr></table>

      </div>
   <div class="bl"></div> <div class="br"></div>
</div>

<br /><br /><br /><br />

<div class="block">
   <div class="tl"></div><div class="tr"></div>
   <div class="cl"></div><div class="cr"></div>
   <div class="bl"></div><div class="br"></div>
</div>
</body>
</html>