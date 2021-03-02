$(document).ready(function () {
    $("#update_user_table").on('click','.edit_user_btn',function(){
        $(".edit-user-cont").addClass("active")
        var val = $(this).val().split(",")
        var username = val[0]
        var email = val[1]
        var role = val[2]

        $("#edit_email").val(email)
        $("#edit_username").val(username)
        $("#edit_role").val(role)

    
    })
    
    $("#delete_user").click(function(){
        var users_to_delete = []
        $("input:checked").each(function(){
            var email = ($(this).attr("id")).split(" ")[1]
            users_to_delete.push(email)
        })
        
        $.post("./includes/manage_users_db.php",{users_to_delete: JSON.stringify(users_to_delete)}, function( data ) {
            swal({title:"User(s) Deleted Successfully",icon: "success"}).then(function() {
                location.reload()
            });
          });
    })
    $("#add_user").click(function(){
        $(".add-user-cont").addClass("active")
    })
    $("#close-modal").click(function(){
        $(".add-user-cont").removeClass("active")
    })

    $("#close-modal2").click(function(){
        $(".edit-user-cont").removeClass("active")
    })

    $("#image , #edit_image").change(function() {
        if(this.files[0].size > 2097152){
            swal({title:"File size should not exceed 2 MB",icon: "error"})
           this.value = "";
        }
        });

        
    $("#confirm").keyup(function () { 
        if($("#password").val() == $("#confirm").val() && ($("#password").val()).length>0){
            $("#err2").text("Passwords match")
            $("#err2").removeClass("invalid").addClass("valid") 
        }
        else{
            $("#err2").text("Passwords do not match")
            $("#err2").removeClass("valid").addClass("invalid") 
        }
    });

    $("#submit_user_edit").click(function(){
        swal({title:"User Profile Updated Successfully",icon: "success"}).then(function() {
            $("#edit_user_form").submit()
        });
    })

    $("#sumbit_user").click(function(){
        
        var pass = $("#password").val()

        if(pass.length < 8){
            $("#err").text("Password must be greater than 8 letters")
            $("#err").removeClass("valid").addClass("invalid") 
            $("#password").val("")
            $("#confirm").val("")
        }
        
        else if(!(new RegExp(".*[0-9]").test(pass))){
            $("#err").text("Password must have atleast one digit")
            $("#err").removeClass("valid").addClass("invalid") 
            $("#password").val("")
            $("#confirm").val("")
            
        }

        else if(!(new RegExp("(?=.*[A-Z])").test(pass))){
            $("#err").text("Password must have atleast one capital letter")
            $("#err").removeClass("valid").addClass("invalid") 
            $("#password").val("")
            $("#confirm").val("")
        }
        else if(pass !== $("#confirm").val()){
            $("#err").text("Passwords do not match")
            $("#err").removeClass("valid").addClass("invalid") 

        }
        else{
            swal({title:"User added Successfully",icon: "success"}).then(function() {
                $("#add_user_form").submit()
            });
            
        }
    })  


});