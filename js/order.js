

$(document).ready(function(){
	var DOMAIN = "http://localhost/Het";
	$("#all").hide();
	
		
	var dept=$("#dept").children("option").filter(":selected").text().trim();

	$('#roll').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			event.preventDefault();
			$('#go').trigger('click');  
		}
		else{
			$("#all").hide();
		}
	});
	
		
			$("#go").click(function(){
				
				if($("input[name=check]").is(':checked') && $("#roll").val()!="")
				{
					
					transfer();
				var radio=$("input[name=check]:checked").val();
				
				if (radio==="Issue")
				{
					$("#all").slideDown(400,"linear");	
					
					$("#add").show();
					$("#remove").show();
					$("#order_form").val("Issue");
					dept=$("#dept").children("option").filter(":selected").text();
					if(dept!="IT")
				{
					
					$("#groupx").hide();
				}
				else
				{
					$("#groupx").show();
				}
					
				}
				else
				{
					dept=$("#dept").children("option").filter(":selected").text();
					$("#all").slideDown(400,"linear");	
					$("#add").hide();
					$("#remove").show();
					if(dept!="IT")
				{
					$("#groupx").hide();
				}
				else
				{
					$("#groupx").show();
				}
				}
			
			}
		
		});
	

		function transfer(){
			var ajxroll=$("#roll").val();
			var ajxdept=$("#dept").children("option").filter(":selected").text();
			
			$.ajax({

				url : DOMAIN+"/includes/get_details.php",
				method : "POST",
				data : {roll:ajxroll,dept:ajxdept},
				success : function(data){
					alert(data);
					var response=JSON.parse(data);
					$("#groupid").val(response.group_id);

					
				},
				error:function(info)
				{
					$("#all").hide();
					alert("Roll Number Not Registered");
					
					
				}
				
				});
				
		}

	

		$("input[name='check']").change(function(){

			$("#all").hide();
			});
		$("#dept").change(function(){
				$("#all").hide();
			
				});
		

	addNewRow();

	$("#add").click(function(){
		addNewRow();
	})

	function addNewRow(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getNewOrderItem:1},
			success : function(data){
				$("#invoice_item").append(data);
				var n = 0;
				$(".number").each(function(){
					$(this).html(++n);
				})
			}
		})
	}

	$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	})

	$("#invoice_item").delegate(".pid","change",function(){
		var pid = $(this).val();
		var tr = $(this).parent().parent();
		$(".overlay").show();
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {getPriceAndQty:1,id:pid},
			success : function(data){
				tr.find(".tqty").val(data["product_stock"]);
				tr.find(".pro_name").val(data["product_name"]);
				tr.find(".qty").val(1);
				tr.find(".price").val(data["product_price"]);
				 
				
			}
		})
	})

	




});