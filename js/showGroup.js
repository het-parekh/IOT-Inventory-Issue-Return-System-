
$(document).ready(function() {
    function deleted(flag){
        var id_array = []
        $('input[name="del"]').each(function(){
            if (flag == 1){
                if($(this).is(":checked"))
                {
                    id_array.push($(this).attr("id"))
                }
            }
            else{
                id_array.push($(this).attr("id"))
            }
        })
        $.ajax({
            method: "POST",
            url: "includes/deleteGroup.php",
            data: {id_array : JSON.stringify(id_array)},
            success:function(msg){
                if(msg == 1)
                {
                    swal({title:"Group(s) Deleted Successfully",icon: "success"}).then(function() {
                        location.reload()
                    });
                }
                else{
                    alert("Select atleast one student to delete") 
                }
                
            }
        })
    }
    $("#deleted").click(function(){
        if (confirm("Are you sure you want to delete the selected students?"))
        {
            deleted(1)
        }
        else{}
        
    })
    $("#deleteAll").click(function(){
        if (confirm("Are you sure you want to delete the complete group list?"))
        {
            deleted(0)
        }
        else{}
        
    })
    if ($(".table > tr > td").length == 0){
        $(".table").append("<center><i>No Groups Found</i></center>")
    }
})