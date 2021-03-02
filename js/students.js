$(document).ready(function () {
    
    $("#submit").click(function(){
        if($("#import").val() != ""){
            $('.form-control').prop("required",false)
            $("#input_form").submit()
        }
    })

    $("#import_form").submit(function (e) { 
        e.preventDefault()
        var formData = new FormData(this);

        $.ajax({
            url: "./includes/students.php",
            type: 'POST',
            data: formData,
            success: function (msg) {
                if(msg == "Student list updated successfully"){
                    swal({title:"Student list updated successfully",icon: "success",timer: 5000}).then(function(){
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
            $('.form-control').prop("readonly",true)
            $('.form-control').val("")
           
        }else{
            $('.form-control').prop("readonly",false)
        }
    });






});