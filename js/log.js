$(document).ready(function(){

   //$("#log").load("includes/Issue.txt");
   jQuery.get('includes/log.txt', function(data) {
    $('#log').html(data);
 });
});