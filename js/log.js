$(document).ready(function(){

   //$("#log").load("includes/Issue.txt");
   $.get('includes/log.txt', function(data) {
    $('#log').append(data).append("</tbody>");
   });

   $("#download-btn").click(function(){
      var date = new Date().toLocaleString()
      $("#log").table2excel({
         filename:'Iot Inventory Log ' + date + '.xls',
         preserveColors: true
      })
      
   })


});