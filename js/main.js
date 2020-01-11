
$(document).ready(function(){

	$("#all").hide();

	if ($("#status").text().length > 0) {
		$("#status").show();
	  }else
	  {
		$(this).hide();
	  }
	  $("#statusp").removeClass("status");
	
	var DOMAIN = "http://localhost/Het";
	
	$("#rollgrp").hide();
	$("#enter_grp").hide();

	$("input[name='check']").change(function(){
			
		if($(this).val()=="Return")
		{
			dept=$("#dept").children("option").filter(":selected").text();
			if(dept=="IT" ){
			$("#rollgrp").hide();
			$("#grp").prop('required',true);
			$("#grp").val("");
			$("#roll").prop('required',false);
			$("#enter_grp").show();
		
			}
			else{
				$("#grp").prop('required',false);
			$("#roll").prop('required',true);
			$("#roll").val("");
			}
		
		}
		else{
			$("#grp").prop('required',false);
			$("#roll").prop('required',true);
			$("#roll").val("");
			$("#enter_grp").hide();
			$("#rollgrp").show();
		}
		
		});
	
	$("#dropbox").change(function(){
	

		var radio=$("input[name=check]:checked").val();
		var dept=$("#dept").children("option").filter(":selected").text().trim();
		
		if(dept=="IT" && radio=="Return" )
		{
			$("#rollgrp").hide();
			$("#grp").prop('required',true);
			$("#roll").prop('required',false);
			$("#enter_grp").show();
			$("#grp").val("");
		}
		else
		{
			$("#grp").prop('required',false);
			$("#roll").prop('required',true);
			$("#enter_grp").hide();
			$("#rollgrp").show();
			$("#roll").val("");
		}
	
			});
	
	
	$("#roll,#grp").keypress(function()
	{
		$('#showalert_r').html("");
		$('#showalert_g').html("");
		$('#showalert_r').removeClass("invalid");
		$('#showalert_g').removeClass("invalid");
	})

	var alert1="";
	function alertme(){	
	$.alert({
			
			title: alert1,
			content:false,
			type: 'red',
			typeAnimated: true,
			icon: 'fa fa-warning',
			animation: 'none',
			buttons :{
				OK:{
					keys:['enter'],
					btnClass: 'btn-dark',
					action:function(){}	
				}
			}
			
			
			
		});
	}
	var rowHead='<thead><th>#</th><th style="text-align:center;">Component Name</th><th style="text-align:center;">Component ID</th><th style="text-align:center;">Quantity</th><th style="text-align:center;">Available Quantity</th></thead>';
	$('#issue_table').append(rowHead);
	var n=0;
	addNewRow();
	function addNewRow(){
		var newRow='<tr class="c_row"><td>'+(++n)+'</td><td style="min-width:10px"><input  spellcheck="false" type="text" required class="form-control form-control-sm c_name"></td><td style="min-width:20px;"><input  readonly type="text"  class="form-control form-control-sm c_id"></td><td style="width:195px"><center><input min="0"  type="number" name="reqqty" required class="form-control form-control-sm req_qty"></center></td><td ><input type="text" readonly class="form-control form-control-sm avail_qty"></td></tr>';
		$('#issue_table').append(newRow);
		auto_complete2();
		max_min_qty();	
	}
	
	
	var dept=$("#dept").children("option").filter(":selected").text().trim();
	var get_dept;
	var get_year;	
			$(".go").click(function(){
				
				
				if($("input[name=check]").is(':checked') && ($(".roll").val()!="" || $("#grp").val()!=""))
				{
					
					$("#status").html("");
					var radio=$("input[name=check]:checked").val();
					if (radio=="Issue")
					{
						get_dept=$("#dept").children("option").filter(":selected").text().trim();
						get_year=$("#s_year").children("option").filter(":selected").text().trim();
						get_student();
						if(get_dept!="IT")
						{
						
							$("#groupx").hide();
						}
						else
						{
							$("#groupx").show();
						}
						
					}
					else if(radio=="Return")
					{
						get_year=$("#s_year").children("option").filter(":selected").text().trim();
						get_dept=$("#dept").children("option").filter(":selected").text().trim();
						transfer();
						
					}
			
				}
				
		
			});
		
		function get_student()
		{
			$("#statusp").removeClass("status");
			var i_dept=$("#dept").children("option").filter(":selected").text();
			var i_roll=$(".roll").val();
			var i_year=$("#s_year").children("option").filter(":selected").text();
			$.ajax({
				url: DOMAIN+"/includes/send_details.php",
				method: "POST",
				data: {issueroll:i_roll,issuedept:i_dept,issueyear:i_year},
				success: function(data){
					if(data=="error")
					{
						$("#all").hide();
						$('#showalert_r').html("Roll Number Not Found, try again...");
						$('#showalert_r').addClass("invalid");
						
					}
					else
					{
						$("#return_table").replaceWith($("#issue_table"));
						$("#all").slideDown(400,"linear");	
						$("#add").show();
						$("#remove").show();
						$("#return_date").replaceWith($("#issue_date"));
						$(".go").prop("disabled", true);
						$(".go").hide();
						$("input[name=check]").prop('disabled', true);
						
						$('#drop').replaceWith('<input type="text" style="background-color:lightgrey;text-align:center"readonly value='+i_year+'-'+i_dept+'>');
						$('#submit1').replaceWith($('#submit2'));
						$("#roll").prop('readonly',true);
						var item=JSON.parse(data);
						$("#groupid").val(item);
					}
				}
			});
		}


		function transfer(){
			$("#statusp").removeClass("status");
			var ajxgrp=$("#grp").val();
			var ajxdept=$("#dept").children("option").filter(":selected").text();
			var ajxroll=$("#roll").val();
			var ajxyear=$("#s_year").children("option").filter(":selected").text();;
			$.ajax({

				url : DOMAIN+"/includes/get_details.php",
				method : "POST",
				data : {group:ajxgrp,dept:ajxdept,roll:ajxroll,s_year:ajxyear},
				success : function(data){
					
					if(data==1)
					{
						$("#all").hide();
						$('#showalert_g').html("GroupID Not Found, try again...");
						$('#showalert_g').addClass("invalid");
					}
					else if(data==2)
					{
						$("#all").hide();
						$('#showalert_r').html("Roll Number Not Found, try again...");
						$('#showalert_r').addClass("invalid");
					}
					else
					{

						$("#issue_table").replaceWith($("#return_table"));
						$("#issue_date").replaceWith($("#return_date"));
					
						$("#all").slideDown(400,"linear");	
						$("#add").hide();
						$("#remove").hide();
						$("#groupx").hide();
						$(".go").prop("disabled", true);
						$(".go").hide();
						$("input[name=check]").prop('disabled', true);
						$('#submit2').replaceWith($('#submit1'));
						$('#drop').replaceWith('<input type="text" id="replace_drop" style="background-color:lightgrey;text-align:center"readonly value='+ajxyear+'-'+ajxdept+'>');
						$("#grp").prop('readonly',true);
						$("#roll").prop('readonly',true);
					var item=JSON.parse(data);
					var row="";
					var head='<thead><tr style="background-color:#cc99ff;height:55px;min-width:105%;"><th><input type="checkbox" id="sel_all"></th><th style="text-align:center;">Component ID</th><th style="text-align:center;">Component Name</th><th style="text-align:center;">Quantity</th></tr></thead>'
					for(i=0;i<item.comp_id.length;i++)
					{
						row+="<tr class='r_row' ><td><input type='checkbox' class='cbox' name='send' id="+"ch"+i+"></td><td>"+item.comp_id[i]+"</td><td >"+item.description[i]+"</td><td><center><input class='form-control form-control-sm send_qty' onkeydown='return false' min='0' style='min-width:70px;max-width:70px' required max='"+item.quantity[i]+"' value='"+item.quantity[i]+"' type='number'/><center></td><td></tr>";
					}	
					$("#return_table").append(head).append(row);
					$('#sel_all').change(function(){
						if($(this).prop('checked')){
							$('#return_table input[name="send"]').each(function(){
								$(this).prop('checked', true);
								$(this).parents('tr').removeClass('r_row').addClass('highlight');
							});
						}else{
							$('#return_table input[name="send"]').each(function(){
								$(this).prop('checked', false);
								$(this).parents('tr').removeClass('highlight').addClass('r_row');
							});
						}
					});

					$('#return_table input[name="send"]').change(function()
					{
						if($(this).prop('checked')==true)
						{
							$(this).parents('tr').removeClass('r_row').addClass('highlight');
	
					
						}
						else
						{
							$(this).parents('tr').removeClass('highlight').addClass('r_row');

						}
					});
				}
				}
				
				});
				
		}
		var TableData=[];
		TableData["id"]=[];
		TableData["name"]=[];
		TableData["qty"]=[];
		
		
		$("#submit1").click(function(e)
		{
			e.preventDefault();
			if(window.confirm("Are you sure?")){
			var radio=$("input[name=check]:checked").val();
		
			if(radio=="Return")
			{
				
				$('#return_table input[name=send]:checked').each(function(){
					
					
					var row = $(this).parent().parent();
					 var rowcells1 = row.find("td:eq(1)").text();
					 var rowcells2 = row.find("td:eq(2)").text();
					var	rowcells3 = row.find(".send_qty").val();
					
					TableData.id.push(rowcells1);
					TableData.name.push(rowcells2);
					TableData.qty.push(rowcells3);

				});
				done();
				
				
			}
			}
		
		
			
		});
		var issueData=[];
		 issueData["c_id"]=[];
		 issueData["req_qty"]=[];
	
		
		$("form#main").on('click', 'button#submit2', function(e) {
			var count=0;
			$
			$('.c_id').each(function()
			{	
				++count;
			})
			if(!window.confirm("Are you sure?"))
			{
				e.preventDefault();
			}
			else if(count==0)
			{
				e.preventDefault();
				alert1="Issue Atleast One Component";
				alertme();
			}
			else{
				
			$('.c_id').each(function(){

				var thisRow=$(this).parents("tr");
				 var rowcells1 = $(this).val();
				 var rowcells2 = thisRow.find(".req_qty").val();

				issueData.c_id.push(rowcells1);
				issueData.req_qty.push(rowcells2);

			});
			
			issue();
			}
		});
		

		function issue()
		{
			var roll=$("#roll").val();
			var cur_dept=get_dept;
			var cur_year=get_year;
			var grp=$("#groupid").val();
			$.ajax({
				method: "POST",
				url: DOMAIN+"/includes/process.php",
				data: {c_id1:JSON.stringify(issueData.c_id),req_qty1:JSON.stringify(issueData.req_qty),roll1:roll,dept1:cur_dept,grp1:grp,year1:cur_year},
				success: function(msg){
					
					if(msg==10)
					{	
						alert1="Remove Duplicates";
						alertme();
						issueData["c_id"]=[];
		 				issueData["req_qty"]=[];
					}
					else if(msg==3)
					{
						//do nothing
						issueData["c_id"]=[];
		 				issueData["req_qty"]=[];
					}
					else if(msg==4)
					{
						alert1="Quantity cannot be zero";
						alertme();
						issueData["c_id"]=[];
		 				issueData["req_qty"]=[];
					}
					else{
						location.href="Issue_and_Return.php" ;
						
					}
				
				}
			});
		}
		
		$("#status").val("Issue Successfull");	
		function done()
		{
			var roll=$("#roll").val();
			var group=$("#grp").val();
			var dept=get_dept;
			var year=get_year;

			$.ajax({
				method: "POST",
				url: DOMAIN+"/includes/process.php",
				data: {table:JSON.stringify(TableData.id),qty:JSON.stringify(TableData.qty),roll2:roll,group2:group,dept2:dept,year2:year},
				success: function(msg){
				
					if(msg==1)
					{
						
						alert1="Select Atleast One Component!";
						alertme();
					}
					else if(msg==2)
					{
					
						alert1="Quantity Cannot be zero!";
						alertme();
						TableData["id"]=[];
						TableData["qty"]=[];

					}
					else{
						location.href="Issue_and_Return.php" ;
						
					}
				
				}
			});
		}
		

	$("#add").click(function(){
		
				addNewRow();
	})
	
	
	function max_min_qty(){
	$('.req_qty').change(function()
	{
		var min = parseInt($(this).prop('min'));
		var thisRow=$(this).parents("tr");
		var max=parseInt(thisRow.find(".avail_qty").val());
	
		if ($(this).val() < min)
          {
              $(this).val(min);
		  } 
		  if($(this).val()>max)
		  {
			$(this).val(max);
		  }
		  
	});
}



	$("#remove").click(function(){
		if(n>0){
		--n;
		$("#issue_table").children("tr:last").remove();
		}
		

	})
/*
function auto_complete(){
	$(".c_name").autocomplete({
        source: "includes/autocomplete.php",
        autoFocus:true,
        minLength: 1,
        change: function(event, ui) {
            if (ui.item == null) {
                $(this).val("");
                $(this).focus();
            }
        }
       
	});  
	
}
*/



function auto_complete2()
{
	$(".c_name").autocomplete({
		min:1,
		autoFocus:true,
		source: function( request, response ) {
		
		  var searchText = extractLast(request.term);
		  $.ajax({
			 url: DOMAIN+"/includes/autocomplete.php",
			 method: 'post',
			 dataType: "json",
			 data: {
			   term: searchText
			 },
			 success: function( data ) {
			   response( data );
			 }
		   });
		},
		select: function( event, ui ) {
			var terms = split( $(this).val() );
			
			terms.pop();
					
			terms.push( ui.item.label );
					
			terms.push( "" );
			$(this).val(terms.join( "" ));
			var thisRow=$(this).parents("tr");
	
			terms = split( thisRow.find(".c_id").val() );
					
			terms.pop();
					
			terms.push( ui.item.value1 );
					
			terms.push( "" );
			thisRow.find(".c_id").val(terms.join(""));

			terms = split( thisRow.find(".c_id").val() );
					
			terms.pop();
					
			terms.push( ui.item.value2 );
					
			terms.push( "" );
			thisRow.find(".avail_qty").val(terms.join( "" ));
			
			terms.pop();
			terms.pop();
			terms.push(0);
			var thisRow=$(this).parents("tr");
			thisRow.find(".req_qty").val(terms.join(""));
			return false;
			},
			change: function(event, ui) {
				var thisRow=$(this).parents("tr");
				if (ui.item == null) {
					
					
					thisRow.find(".c_name").val("");
					thisRow.find(".c_id").val("");
					thisRow.find(".req_qty").val("");
					thisRow.find(".avail_qty").val("");
					thisRow.find(".c_name").focus();
					thisRow.find(".c_name").focus();
				}
				var max1=parseInt(thisRow.find(".avail_qty").val());
				thisRow.find(".req_qty").prop('max',max1);
			}
		 
			   
	 });
	
	function split( val ) {
		return val.split();
	}
	function extractLast( term ) {
	   return split( term ).pop();
	}
	
}
});

