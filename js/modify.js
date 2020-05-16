
 
$(document).ready(function(){

    $( window ).on( "load", function() { 
        prv_grp();
        get_newgrp();
     })

    var DOMAIN = "http://localhost/final";

    $("#go").click(function () {
        transfer();
    });

 
    $("#roll_no").focusout(function(){
        prv_grp();
    })

    $("#year1").change(function(){
        get_newgrp()
        prv_grp()
    })

    //-----------------------------------------------------------------------------------------------

    function prv_grp(){
        var year = $("#year1").children("option").filter(":selected").text().trim();
        var roll = $("#roll_no").val();
        $.post( DOMAIN + "/includes/modify_data.php", { year1: year, roll1: roll,validate_prvgrp:"ok" })
            .done(function( data ) {
                if(data!=null)
                {
                    $("#basic-addon2").text((data.replace(/['"]+/g, '')));
                }
                else{
                    $("#basic-addon2").text("Prv-Group");
                }
        });
    }

    function get_newgrp(){
        var year = $("#year1").children("option").filter(":selected").text().trim();

        $.ajax({
            method: "POST",
            url: DOMAIN + "/includes/modify_data.php",
            data: {year1:year,validate_newgrp:"ok" },
            success: function (msg) {
                if(msg){
                    data = JSON.parse(msg);
                    data.sort()
                    item = $.unique(data)
                    var option = '';
                    for (var i=0;i<item.length;i++){
                       option += '<option value="'+ item[i] + '">' + item[i] + '</option>';
                    }
                    $('#new_grp').empty().append(option);
                }
                else{
                    $('#new_grp').empty().append('<option value="N/A">N/A</option>');
                }
                
                }
            }
        );
    }
    

    function transfer() {
        var year = $("#year1").children("option").filter(":selected").text().trim();
        var roll = $("#roll_no").val()
        var grp = $("#new_grp").val()

        $.ajax({
            method: "POST",
            url: DOMAIN + "/includes/modify_data.php",
            data: {roll: roll,year:year,grp:grp},
            success: function (msg) {
                if (msg == 1) {
                    alertme("Entered Roll No. doesn't exist");
                    return
                } 
                else {
                    swal({title:"Group Changed Succesfully",icon: "success"}).then(function() {
                        window.location = "modify.php";
                    });
                }
            }
        });
    }


//------------------------------Warning Alert--------------------------------------------------------
    function alertme(alert1) {
        $.alert({

            title: alert1,
            content: false,
            type: 'red',
            typeAnimated: true,
            icon: 'fa fa-warning',
            animation: 'none',
            buttons: {
                OK: {
                    keys: ['enter'],
                    btnClass: 'btn-dark',
                    action: function () {
                    }
                }
            }
        });
    }

})