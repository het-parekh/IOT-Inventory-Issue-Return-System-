$(document).ready(function(){

   //$("#log").load("includes/Issue.txt");
   $.get('includes/log.txt', function(data) {
    $('#log').append(data).append("</tbody>");
   });

   $("#download-btn").click(function(){
      
      $("#log").table2excel({
         filename:'Iot Inventory Log.xls',
         preserveColors: true
      })
      
   })


});