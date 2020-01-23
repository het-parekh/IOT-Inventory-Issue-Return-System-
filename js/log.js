$(document).ready(function(){
    var DOMAIN = "http://localhost/Het";

   //$("#log").load("includes/Issue.txt");
   jQuery.get('includes/log.txt', function(data) {
    $('#log').html(data);
 });
});