$(document).ready(function () {
    $("#header").load("header.html"); 

    $("#footer-section").load("footer.html");


    var DOMAIN = "http://localhost/final";

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

    var row;
    $("#head").append("<div align='left'>Enter Roll Number(s)</div>");
    var val = $(".grp").val();
    addRoll();
    $(".grp").change(function () {
        row = "";
        val = $(".grp").val();
        $(".roll").replaceWith(addRoll());

    });

    function addRoll() {
        for (i = 1; i <= val; i++) {
            row += "<td class='roll' style='text-align:left;min-width:40px;padding-bottom:15px;padding-right:10px'><input name='transfer' type='number' required placeholder='Roll Number'   min='1' class='form-control form-control-sm rollno' /></td>";
        }
        $("#tail").append(row);

        $(".rollno").change(function () {
            $(this).val(($(this).val() < 1) ? 1 : $(this).val());//This actually works!
        })

    }

    $("#go").click(function () {

        transfer();
    });

    function transfer() {
        var grp_name = $("#grp_name").val().toUpperCase();
        var year = $("#year1").children("option").filter(":selected").text().trim();
        var roll = [];
        $(".rollno").each(function () {
            var value = $(this).val();
            roll.push(value);
        });
        
        $.ajax({
            method: "POST",
            url: DOMAIN + "/includes/groupForm.php",
            data: {roll_no: JSON.stringify(roll), grp: grp_name, year: year},
            success: function (msg) {
                if (msg == 3) {
                    //do nothing
                    roll = [];
                } else if (msg == 1) {
                    alertme("Duplicate RollNo. cant exist");
                    roll = [];

                } else if (msg == 4) {
                    alertme("Group ID already exist for a Different Year");
                    roll = [];
                } else if (msg == 2) {
                    alertme("RollNo. Not found...Try Again");

                    roll = [];
                } else if(msg == "Already Exists"){
                    swal({title:"Some Rollno(s) GroupID already exists and could not be altered. Go to modify Group page to change it.",icon: "error"}).then(function() {
                        window.location = "GroupForm.php";
                    });
                }
                else {
                    
                    swal({title:"Group Created Succesfully",icon: "success"}).then(function() {
                        window.location = "GroupForm.php";
                    });

                }

            }

        });
    }


    
});