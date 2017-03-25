function round_edge(side, radius, color, return_result){
   // Set defaults
   if(side != 'bottom') side = 'top';
   if(radius == null) radius = 5;
   if(color == null) color = "#ccc";
   if(return_result == null) return_result = false;


   //Initialize code string
   var code = '<div style="display: block;"> ';

   //Calc levels -> ['margin'] , ['height']
   var levels = new Array();

   //CHANGE, this is hardcoded for radius=5
   // Need to find the function with which the values are got
   levels[0] = new Array();
   levels[0]['height'] = 1;
   levels[0]['margin'] = 5;
   levels[1] = new Array();
   levels[1]['height'] = 1;
   levels[1]['margin'] = 3;
   levels[2] = new Array();
   levels[2]['height'] = 1;
   levels[2]['margin'] = 2;
   levels[3] = new Array();
   levels[3]['height'] = 2;
   levels[3]['margin'] = 1;

   // If the edges are for the bottom side of an element, reverse the array (== flip the result element)
   if(side == 'bottom') levels.reverse();

   // For each level set a div with the appropriate height/color/margin
   for(k in levels){
      code += ' <div style="display: block; overflow: hidden; height: '+levels[k]['height']+'px; background: '+color+'; margin: 0 '+levels[k]['margin']+'px;"></div> ';
   }

   // End the code string
   code += ' </div>';

   // Use the result code_string
   // Default is to dwrite (document.write) the code
   //    but you may want to choose to return it instead
   if(return_result) return code; else document.write(code);
}