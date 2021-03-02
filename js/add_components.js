$(document).ready(function () {
    $("#save").click(function (e) { 
        e.preventDefault()
        var formData = new FormData(this);

        $.ajax({
            url: "./includes/add-to-database.php",
            type: 'POST',
            data: formData,
            success: function (msg) {
                if(msg == "component list updated successfully"){
                    swal({title:"Component list updated successfully",icon: "success",timer: 5000}).then(function(){
                        location.reload()
                    })
                }
                if(msg == "invalid file orientation"){
                    swal({title:"File orientation incorrect, make sure you have followed the given instructions properly",icon: "error",timer: 5000}).then(function(){
                        location.reload()
                    })
                }
                if(msg == "invalid format"){
                    swal({title:"File format not supported",icon: "error",timer: 5000}).then(function(){
                        location.reload()
                    })
                }
            },
            
            cache: false,
            contentType: false,
            processData: false
        });
     })

    
    $('#import').change(function () {
        
        if($("#import").val() != ""){
            $('td').prop("contenteditable",false)
            $('td').html("<br />")
            $('.not_first').remove()
            $("#add").prop('disabled',true)
           
        }else{
            $('td').prop("contenteditable",true)
            $("#add").prop('disabled',false)
        }
    });

    var count = 1;
        $('#add').click(function(){
        count = count + 1;
        var html_code = "<tr class='not_first' id='row"+count+"'>";
        html_code += "<td contenteditable='true' class='item_id'></td>";
        html_code += "<td contenteditable='true' class='item_name'></td>";
        html_code += "<td class='item_size'><select name='i_size' id='i_size'><option value='S'>S</option><option value='M'>M</option><option value='L'>L</option></td>";
        html_code += "<td contenteditable='true' class='item_quantity' ></td>";
        html_code += "<td contenteditable='true' class='item_price' ></td>";
        html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
        html_code += "</tr>";  
        $('#crud_table').append(html_code);
        });
        
        $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");
        $('#' + delete_row).remove();
        });
        $('#save').click(function(){
        var item_id = [];
        var item_name = [];
        var item_size = [];
        var item_quantity = [];
        var item_price=[];
        $('.item_id').each(function(){
        item_id.push($(this).text());
        });
        $('.item_name').each(function(){
        item_name.push($(this).text());
        });
        $('.item_size').each(function(){
           item_size.push($(this).find('#i_size :selected').text());
        });
        $('.item_quantity').each(function(){
        item_quantity.push($(this).text());
        });
        $('.item_price').each(function(){
        item_price.push($(this).text());
        });
        $.ajax({
        url:"./includes/add-to-database.php",
        method:"POST",
        data:{item_id:item_id, item_name:item_name, item_size:item_size, item_quantity:item_quantity,item_price:item_price},
        success:function(response){

          var jsonData = JSON.parse(response);
            if(jsonData.success==1){
                $("td[contentEditable='true']").text("");
            for(var i=2; i<= count; i++)
            {
            $('#row'+i).remove();
            }
            swal({title: 'success!',text: 'Data added successfully!',type: 'success'});
            }else if(jsonData.success==2){
                swal({title: 'Oops!',text: 'Please try again!',type: 'error'});  
            }else{
                swal({title: 'Oops!',text: 'All fields are required!',type: 'error'});   
            }
        }
        });
        });


});