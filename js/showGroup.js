
$(document).ready(function() {
    function deleted(){
        var id_array = []
        $('input[name="del"]').each(function(){
            if($(this).is(":checked"))
            {
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
                    alert("Deleted Successfully")
                }
                else{
                    alert("Select atleast one student to delete")
                }
                windows.location="showGroup.php"
            }
        })
    }
    $("#deleted").click(function(){
        deleted()
    })
})