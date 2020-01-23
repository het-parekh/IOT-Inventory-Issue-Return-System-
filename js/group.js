$(document).ready(function () {
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
    var head = "<tr><td><hr></td></tr><tr><td style='min-width:200px;width:500px;text-align:left;padding-bottom:20px'>Group ID<input id='grp_name' required placeholder='Unique Group Name'type='text' class='form-control form-control-sm'/></td></tr><tr><td style='min-width:200px;text-align:left;padding-bottom:20px'>Group Count<input type='range' required style='outline:none' value='1' class='custom-range grp' min='1' max='5' id='customRange2'></td></tr>";
    $("#main1").append(head).append("<div align='left'>Enter Roll Number(s)</div>");
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
        $("#main1").append(row);

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
                } else {
                    location.href = "groupForm.html";
                    roll = [];
                }

            }

        });
    }


});