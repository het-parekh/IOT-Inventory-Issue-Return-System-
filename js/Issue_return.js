$(document).ready(function(){

    

    $('#all').hide();

    $("input[name='check']").change(function() {    

        var radio=$("input[name=check]:checked").val();
        if(radio=="Issue")
        {
            $('#all').show();
            $("#remove").hide();
            $("#add").show();
        }
        else
        {
            $('#all').show();
            $("#add").hide();
            $("#remove").show();
        
        }
    });

    $('#roll').blur(function(){
		$.ajax({
        type: "POST",
        url: 'autofill.php',
        data: {test : $(this).val()}
			  
		});
	});

    $("#cname").autocomplete({
        source: "autocomplete.php",
        autoFocus:true,
        minLength: 1,
        change: function(event, ui) {
            if (ui.item == null) {
                $("#cname").val("");
                $("#cname").focus();
            }
        }
       
    });  

    
   
   /*
    $( "#cname" ).autocomplete({
        source: function( request, response ) {
         // Fetch data
         $.ajax({
          url: "autocomplete.php",
          type: 'post',
          dataType: "json",
          data: {
           search: request.term
          },
          success: function( data ) {
           response( data );
          }
         });
        },
        select: function (event, ui) {
         // Set selection
         $('#cname').val(ui.item.label); // display the selected text
        
         return false;
        }
       });
      */
    

 

});