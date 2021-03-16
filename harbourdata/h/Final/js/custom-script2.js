if($('#planprice').length>'0'){
	document.getElementById("planprice").value= document.getElementById('subbrtor').text();
}
$(".pop-call").hover(function(){$('.pop-call').toggleClass('myTip');});

$(document).ready(function() {

    $(".rpt_foot").click(function(){
    	if($(this).attr('data-value')=='10'){
    	//////////////////////////////////
		if($(this).parent('.rpt_plan').find('input[class=rtyu]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu]:checked').length=='0'){

			alert("Select OS to proceed");return false;

		}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length=='0'){

			alert("Select Platform  to proceed");return false;

		}

		////////////////////////////////////	

			var plan="CLOUD HOSTING"
			var subplan = "Cloud Server"
			//var cpu_total = parseInt(t_cpu_total);

		var os = $('select[name=cloud_server_os]').val();
		var os_t = $('select[name=cloud_server_os] option:selected').text();
		var backup = $('select[name=cloud_server_backup]').val();
		var ip_num=$('input[name=cloud_server_ip_num]').val();

		var backup_total = backup*$('input[name=backup_price10]').val();
		var ip_total = ip_num*$('input[name=ip_price10]').val();
		//$ip = $('select[name=selector]').val();
		var total = parseInt($('span[id=cloud_server_total]').text());

		var database = $('select[name=cloud_server_db]').val();
		var database_t = $('select[name=cloud_server_db] option:selected').text();

		if(document.getElementById('cloud_server_c1').textContent>'0'){

			var cpu_total=parseInt(document.getElementById('cloud_server_c1').textContent);
			var cpu=$('#container').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var cpu_total='0';}
		if(document.getElementById('cloud_server_c2').textContent>'0'){

			var ram_total=parseInt(document.getElementById('cloud_server_c2').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var ram=$('#container2').jqxKnob('value');
		}else{var ram_total='0';}
		if(document.getElementById('cloud_server_c3').textContent>'0'){

			var space_total=parseInt(document.getElementById('cloud_server_c3').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var space=$('#container3').jqxKnob('value');
		}else{var space_total='0';}
		if(document.getElementById('cloud_server_c4').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_c4').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var data=$('#container4').jqxKnob('value');
		}else{var data_total='0';}
		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&cpu='+cpu+'&ram_total='+ram_total+'&ram='+ram+'&data_total='+data_total+'&data='+data+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&os='+os+'&os_t='+os_t+'&ip_num='+ip_num+'&backup='+backup+'&database='+database+'&database_t='+database_t+'&total='+total,


					success: function(result){

						$('#sumaryslide').prepend(result);

						totalupdating();

						

					}

				});

			}else{

				if($(this).attr('data-action')=='0'){

					$.ajax({

						url: 'plans/pricing.php',

						type: "POST",

						cache:false,

						async:false,

						data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&ram_total='+ram_total+'&data_total='+data_total+'&space_total='+space_total,

						success: function(result){

							$('#sumaryslide').prepend(result);

							totalupdating();

							

						}

					});

				}

			}

			$(this).text('ADDED TO CART');

			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

			}else{

				$(this).attr('data-action','1');

				$selectplan=$(this).parents('.rpt_plan');

				$selectplan.children('.selectplan').fadeIn();

			}

			$(".rt-ord-summary").addClass("summary-show");

			$("#ordsum-icon").addClass("icon-addclass");

			$("#cart-img").addClass("imgmove");

		}else if($(this).attr('data-value')=='11'){
			//////////////////////////////////
		if($(this).parent('.rpt_plan').find('input[class=rtyu]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu]:checked').length=='0'){

			alert("Select OS to proceed");return false;

		}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length=='0'){

			alert("Select Platform  to proceed");return false;

		}

		////////////////////////////////////	

			var plan="CLOUD HOSTING"
			var subplan = "Virtual Dedicated Server"
			//var cpu_total = parseInt(t_cpu_total);

		var os = $('select[name=virtual_server_os]').val();
		var os_t = $('select[name=virtual_server_os] option:selected').text();
		var backup = $('select[name=virtual_server_backup]').val();
		
		//$ip = $('select[name=selector]').val();
		var ip_num=$('input[name=virtual_server_ip_num]').val();
		//var database = $('select[name=virtual_server_db]').val();
		//var database_t = $('select[name=virtual_server_db] option:selected').text();
var total = parseInt($('span[id=virtual_server_total]').text());
		if(document.getElementById('cloud_server_v1').textContent>'0'){

			var cpu_total=parseInt(document.getElementById('cloud_server_v1').textContent);
			var cpu=$('#container5').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var cpu_total='0';}
		if(document.getElementById('cloud_server_v2').textContent>'0'){

			var ram_total=parseInt(document.getElementById('cloud_server_v2').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var ram=$('#container6').jqxKnob('value');
		}else{var ram_total='0';}
		if(document.getElementById('cloud_server_v3').textContent>'0'){

			var space_total=parseInt(document.getElementById('cloud_server_v3').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var space=$('#container7').jqxKnob('value');
		}else{var space_total='0';}
		if(document.getElementById('cloud_server_v4').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_v4').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var data=$('#container8').jqxKnob('value');
		}else{var data_total='0';}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&cpu='+cpu+'&ram_total='+ram_total+'&ram='+ram+'&data_total='+data_total+'&data='+data+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&os='+os+'&os_t='+os_t+'&ip_num='+ip_num+'&backup='+backup+'&total='+total,


					success: function(result){

						$('#sumaryslide').prepend(result);

						totalupdating();

						

					}

				});

			}else{

				if($(this).attr('data-action')=='0'){

					$.ajax({

						url: 'plans/pricing.php',

						type: "POST",

						cache:false,

						async:false,

						data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&ram_total='+ram_total+'&data_total='+data_total+'&space_total='+space_total,

						success: function(result){

							$('#sumaryslide').prepend(result);

							totalupdating();

							

						}

					});

				}

			}

			$(this).text('ADDED TO CART');

			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

			}else{

				$(this).attr('data-action','1');

				$selectplan=$(this).parents('.rpt_plan');

				$selectplan.children('.selectplan').fadeIn();

			}

			$(".rt-ord-summary").addClass("summary-show");

			$("#ordsum-icon").addClass("icon-addclass");

			$("#cart-img").addClass("imgmove");

		}else if($(this).attr('data-value')=='12'){

				//////////////////////////////////
		if($(this).parent('.rpt_plan').find('input[class=rtyu]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu]:checked').length=='0'){

			alert("Select OS to proceed");return false;

		}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length=='0'){

			alert("Select Platform  to proceed");return false;

		}

		////////////////////////////////////	

			var plan="CLOUD HOSTING"
			var subplan = "Enterprise Dedicated Servers - E3"
			//var cpu_total = parseInt(t_cpu_total);
		
		//$ip = $('select[name=selector]').val();
		var ip_num=$('input[name=e3_ip_num]').val();
		var cpu = $('select[name=e3_cpu]').val();
		var cpu_total = cpu*$('input[name=cpu_price12]').val();
		var ram = $('select[name=e3_ram]').val();
		var ram_total = ram*$('input[name=ram_price12]').val();
		var total = parseInt($('span[id=cloud_server_e3_total]').text());
		
		//var database = $('select[name=virtual_server_db]').val();
		//var database_t = $('select[name=virtual_server_db] option:selected').text();
		/*
		if(document.getElementById('cloud_server_v1').textContent>'0'){

			var cpu_total=parseInt(document.getElementById('cloud_server_v1').textContent);
			var cpu=$('#container5').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var cpu_total='0';}
		if(document.getElementById('cloud_server_v2').textContent>'0'){

			var ram_total=parseInt(document.getElementById('cloud_server_v2').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var ram=$('#container6').jqxKnob('value');
		}else{var ram_total='0';}*/
		if(document.getElementById('cloud_server_e31').textContent>'0'){

			var space_total=parseInt(document.getElementById('cloud_server_e31').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var space=$('#container9').jqxKnob('value');
		}else{var space_total='0';}
		if(document.getElementById('cloud_server_e32').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_e32').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var data=$('#container10').jqxKnob('value');
		}else{var data_total='0';}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&cpu='+cpu+'&ram_total='+ram_total+'&ram='+ram+'&data_total='+data_total+'&data='+data+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&ip_num='+ip_num+'&total='+total,


					success: function(result){

						$('#sumaryslide').prepend(result);

						totalupdating();

						

					}

				});

			}else{

				if($(this).attr('data-action')=='0'){

					$.ajax({

						url: 'plans/pricing.php',

						type: "POST",

						cache:false,

						async:false,

						data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&ram_total='+ram_total+'&data_total='+data_total+'&space_total='+space_total,

						success: function(result){

							$('#sumaryslide').prepend(result);

							totalupdating();

							

						}

					});

				}

			}

			$(this).text('ADDED TO CART');

			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

			}else{

				$(this).attr('data-action','1');

				$selectplan=$(this).parents('.rpt_plan');

				$selectplan.children('.selectplan').fadeIn();

			}

			$(".rt-ord-summary").addClass("summary-show");

			$("#ordsum-icon").addClass("icon-addclass");

			$("#cart-img").addClass("imgmove");


		}else if($(this).attr('data-value')=='14'){
					//////////////////////////////////
		if($(this).parent('.rpt_plan').find('input[class=rtyu]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu]:checked').length=='0'){

			alert("Select OS to proceed");return false;

		}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length=='0'){

			alert("Select Platform  to proceed");return false;

		}

		////////////////////////////////////	

			var plan="CLOUD HOSTING"
			var subplan = "Enterprise Dedicated Servers - E5"
			//var cpu_total = parseInt(t_cpu_total);
		
		//$ip = $('select[name=selector]').val();
		var ip_num=$('input[name=e5_ip_num]').val();
		var cpu = $('select[name=e5_cpu]').val();
		var cpu_total = cpu*$('input[name=cpu_price14]').val();
		var ram = $('select[name=e5_ram]').val();
		var ram_total = ram*$('input[name=cpu_price14]').val();
		var total = parseInt($('span[id=cloud_server_e5_total]').text());

		//var database = $('select[name=virtual_server_db]').val();
		//var database_t = $('select[name=virtual_server_db] option:selected').text();
		/*
		if(document.getElementById('cloud_server_v1').textContent>'0'){

			var cpu_total=parseInt(document.getElementById('cloud_server_v1').textContent);
			var cpu=$('#container5').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var cpu_total='0';}
		if(document.getElementById('cloud_server_v2').textContent>'0'){

			var ram_total=parseInt(document.getElementById('cloud_server_v2').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var ram=$('#container6').jqxKnob('value');
		}else{var ram_total='0';}*/
		if(document.getElementById('cloud_server_e51').textContent>'0'){

			var space_total=parseInt(document.getElementById('cloud_server_e51').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var space=$('#container11').jqxKnob('value');
		}else{var space_total='0';}
		if(document.getElementById('cloud_server_e52').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_e52').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var data=$('#container12').jqxKnob('value');
		}else{var data_total='0';}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&cpu='+cpu+'&ram_total='+ram_total+'&ram='+ram+'&data_total='+data_total+'&data='+data+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&ip_num='+ip_num+'&total='+total,


					success: function(result){

						$('#sumaryslide').prepend(result);

						totalupdating();

						

					}

				});

			}else{

				if($(this).attr('data-action')=='0'){

					$.ajax({

						url: 'plans/pricing.php',

						type: "POST",

						cache:false,

						async:false,

						data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&ram_total='+ram_total+'&data_total='+data_total+'&space_total='+space_total,

						success: function(result){

							$('#sumaryslide').prepend(result);

							totalupdating();

							

						}

					});

				}

			}

			$(this).text('ADDED TO CART');

			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

			}else{

				$(this).attr('data-action','1');

				$selectplan=$(this).parents('.rpt_plan');

				$selectplan.children('.selectplan').fadeIn();

			}

			$(".rt-ord-summary").addClass("summary-show");

			$("#ordsum-icon").addClass("icon-addclass");

			$("#cart-img").addClass("imgmove");



		}else if($(this).attr('data-value')=='15'){
			//////////////////////////////////
		if($(this).parent('.rpt_plan').find('input[class=rtyu]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu]:checked').length=='0'){

			alert("Select OS to proceed");return false;

		}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length=='0'){

			alert("Select Platform  to proceed");return false;

		}

		////////////////////////////////////	

			var plan="ELASTIC STORAGE"
			var subplan = "Enterprise Cloud Storage"
			//var cpu_total = parseInt(t_cpu_total);
		if(document.getElementById('ec_disk').textContent>'0'){

			var space_total=parseInt(document.getElementById('ec_disk').textContent);
			var space=$('#container13').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var space_total='0';}
		var min_months = 3;
		var total = parseInt($('span[id=ec_disk_total]').text());
		//$ip = $('select[name=selector]').val();
		//var ip_num=$('input[name=e5_ip_num]').val();
		//var cpu = $('select[name=e5_cpu]').val();
		//var cpu_total = cpu*100;
		//var ram = $('select[name=e5_ram]').val();
		//var ram_total = ram*100;
		//var database = $('select[name=virtual_server_db]').val();
		//var database_t = $('select[name=virtual_server_db] option:selected').text();
		/*
		if(document.getElementById('cloud_server_v1').textContent>'0'){

			var cpu_total=parseInt(document.getElementById('cloud_server_v1').textContent);
			var cpu=$('#container5').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var cpu_total='0';}
		if(document.getElementById('cloud_server_v2').textContent>'0'){

			var ram_total=parseInt(document.getElementById('cloud_server_v2').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var ram=$('#container6').jqxKnob('value');
		}else{var ram_total='0';}
		if(document.getElementById('cloud_server_e51').textContent>'0'){

			var space_total=parseInt(document.getElementById('cloud_server_e51').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var space=$('#container11').jqxKnob('value');
		}else{var space_total='0';}
		if(document.getElementById('cloud_server_e52').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_e52').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var data=$('#container12').jqxKnob('value');
		}else{var data_total='0';}*/

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&min_months='+min_months+'&total='+total,


					success: function(result){

						$('#sumaryslide').prepend(result);

						totalupdating();

						

					}

				});

			}else{

				if($(this).attr('data-action')=='0'){

					$.ajax({

						url: 'plans/pricing.php',

						type: "POST",

						cache:false,

						async:false,

						data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&ram_total='+ram_total+'&data_total='+data_total+'&space_total='+space_total,

						success: function(result){

							$('#sumaryslide').prepend(result);

							totalupdating();

							

						}

					});

				}

			}

			$(this).text('ADDED TO CART');

			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

			}else{

				$(this).attr('data-action','1');

				$selectplan=$(this).parents('.rpt_plan');

				$selectplan.children('.selectplan').fadeIn();

			}

			$(".rt-ord-summary").addClass("summary-show");

			$("#ordsum-icon").addClass("icon-addclass");

			$("#cart-img").addClass("imgmove");

		}
		else if($(this).attr('data-value')=='16'){
			//////////////////////////////////
		if($(this).parent('.rpt_plan').find('input[class=rtyu]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu]:checked').length=='0'){

			alert("Select OS to proceed");return false;

		}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length=='0'){

			alert("Select Platform  to proceed");return false;

		}

		////////////////////////////////////	

			var plan="ELASTIC STORAGE"
			var subplan = "Dedicated Disk Storage"
			//var cpu_total = parseInt(t_cpu_total);
		if(document.getElementById('dd_disk').textContent>'0'){

			var space_total=parseInt(document.getElementById('dd_disk').textContent);
			var space=$('#container14').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var space_total='0';}
		//$ip = $('select[name=selector]').val();
		//var ip_num=$('input[name=e5_ip_num]').val();
		//var cpu = $('select[name=e5_cpu]').val();
		//var cpu_total = cpu*100;
		//var ram = $('select[name=e5_ram]').val();
		//var ram_total = ram*100;
		var drive = $('select[name=dd_drive]').val();
		var total = parseInt($('span[id=dd_disk_total]').text());
		
		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&space_total='+space_total+'&space='+space+'&drive='+drive+'&plan='+plan+'&subplan='+subplan+'&total='+total,


					success: function(result){

						$('#sumaryslide').prepend(result);

						totalupdating();

						

					}

				});

			}else{

				if($(this).attr('data-action')=='0'){

					$.ajax({

						url: 'plans/pricing.php',

						type: "POST",

						cache:false,

						async:false,

						data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&ram_total='+ram_total+'&data_total='+data_total+'&space_total='+space_total,

						success: function(result){

							$('#sumaryslide').prepend(result);

							totalupdating();

							

						}

					});

				}

			}

			$(this).text('ADDED TO CART');

			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

			}else{

				$(this).attr('data-action','1');

				$selectplan=$(this).parents('.rpt_plan');

				$selectplan.children('.selectplan').fadeIn();

			}

			$(".rt-ord-summary").addClass("summary-show");

			$("#ordsum-icon").addClass("icon-addclass");

			$("#cart-img").addClass("imgmove");
		}
		else
			{
			if($(this).parent('.rpt_plan').find('input[class=rtyu]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu]:checked').length=='0'){

			alert("Select OS to proceed");return false;

		}

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length=='0'){

			alert("Select Platform  to proceed");return false;

		}

		////////////////////////////////////	

			var plan="CO-LOCATION"
			var subplan = "Servers Co-Location"
			//var cpu_total = parseInt(t_cpu_total);
		if(document.getElementById('sc_server').textContent>'0'){

			//var space_total=parseInt(document.getElementById('sc_server').textContent);
			var server=$('#container15').jqxKnob('value');
			var server_total=server*$('input[name=server_price17]').val();
			//var cpu_total = parseInt(t_cpu_total);
		}else{var server_total='0';}
		if(document.getElementById('sc_power').textContent>'0'){

			//var space_total=parseInt(document.getElementById('sc_server').textContent);
			var power=$('#container16').jqxKnob('value');
			var power_total=power*$('input[name=power_price17]').val();
			//var cpu_total = parseInt(t_cpu_total);
		}else{var power_total='0';}

		if(document.getElementById('sc_data').textContent>'0'){

			//var space_total=parseInt(document.getElementById('sc_server').textContent);
			var data=$('#container17').jqxKnob('value');
			var data_total=data*$('input[name=data_price17]').val();
			//var cpu_total = parseInt(t_cpu_total);
		}else{var data_total='0';}
		//$ip = $('select[name=selector]').val();
		var ip_num=$('input[name=sc_ip_num]').val();
		var total = parseInt($('span[id=sc_total]').text());
		//var cpu = $('select[name=e5_cpu]').val();
		//var cpu_total = cpu*100;
		//var ram = $('select[name=e5_ram]').val();
		//var ram_total = ram*100;
		
		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&data='+data+'&data_total='+data_total+'&server='+server+'&server_total='+server_total+'&power='+power+'&power_total='+power_total+'&ip_num='+ip_num+'&plan='+plan+'&subplan='+subplan+'&total='+total,


					success: function(result){

						$('#sumaryslide').prepend(result);

						totalupdating();

						

					}

				});

			}else{

				if($(this).attr('data-action')=='0'){

					$.ajax({

						url: 'plans/pricing.php',

						type: "POST",

						cache:false,

						async:false,

						data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&ram_total='+ram_total+'&data_total='+data_total+'&space_total='+space_total,

						success: function(result){

							$('#sumaryslide').prepend(result);

							totalupdating();

							

						}

					});

				}

			}

			$(this).text('ADDED TO CART');

			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

			}else{

				$(this).attr('data-action','1');

				$selectplan=$(this).parents('.rpt_plan');

				$selectplan.children('.selectplan').fadeIn();

			}

			$(".rt-ord-summary").addClass("summary-show");

			$("#ordsum-icon").addClass("icon-addclass");

			$("#cart-img").addClass("imgmove");

		}

	}); 

    $("#ordsum-icon").click(function(){

		$(".rt-ord-summary").toggleClass("summary-show");

		$("#ordsum-icon").toggleClass("icon-addclass");

		$("#cart-img").toggleClass("imgmove");

	});

	$('#scrollbox4').enscroll({

		verticalTrackClass: 'track4',

		verticalHandleClass: 'handle4',

		minScrollbarLength: 28

	});

	

	

	$(document).on('click', '.close-pro,.green-close, .finclose', function(event){

		$india=$(this).parents('.qwesr');

		$india.remove();

		var asert=$(this).attr('data-value');

		$andhra=$("a[data-value='" + asert +"']");

		$andhra.text('ADD TO CART');

		$('.close-pro,.green-close, .finclose').html('<img src="images/close-bold-icon.png">');

		$('.green-close').html('<img src="images/close-bold-icon.png"> Remove');

		$andhra.attr('data-action','0');

		$selectplan=$andhra.parents('.rpt_plan');

		$selectplan.children('.selectplan').fadeOut();

		totalupdating();

		//if($india.text=='1'){$('.gr-total').prepend('<center><div class="row-cart"><h3 class="bold">Start Shopping</h3></div></center>');}

	});

function myFunctionconfirm() {

    var txt;

    var r = confirm("Press a button!");

    if (r == true) {

        txt = "You pressed OK!";

    } else {

        txt = "You pressed Cancel!";

    }

    document.getElementById("demo").innerHTML = txt;

}

function totalupdating(){

	var sum = 0;

	$('.subbrtor').each(function(){sum += parseFloat($(this).text());});

	$('.grandtrunk').text(sum);



}

	$(document).on('change', '.changepricing', function(event){priceuopdating($(this).parents('.jaganindia'));});

	$(document).on('focus', '.changepricings', function(event){priceuopdating($(this).parents('.jaganindia'));});

	$(document).on('click', '.addinc_cart', function(event){ 

        $infiad=$(this).parent().find('.incss');

		if($infiad.val()!='') var uphde=parseInt($infiad.val())+1;else var uphde=1;

		$infiad.val(uphde);

		priceuopdating($(this).parents('.jaganindia'));

	});

	$(document).on('click', '.servadrs', function(event){

		$infiad=$(this).parent().find('.incss');

		if((parseFloat($infiad.val())+1) >'1')$(this).parent().find('.minuinc').fadeIn();

		else $(this).parent().find('.minuinc').hide();

	});

	$(document).on('click', '.servless', function(event){ 

		$infiad=$(this).parent().find('.incss');

		if((parseFloat($infiad.val())-1) >'1')$(this).parent().find('.minuinc').fadeIn();

		else $(this).parent().find('.minuinc').hide();

 	});



	$(document).on('click', '.minuinc_cart', function(event){ 

        $infiad=$(this).parent().find('.incss');

		if($infiad.val()!='') var uphde=parseInt($infiad.val())-1;else var uphde=0;

		if(uphde<=0)uphde=0;

		$infiad.val(uphde);

		priceuopdating($(this).parents('.jaganindia'));

	});



	function priceuopdating($india){
		var months = parseFloat($india.find('.changepricing').val());
		var cpu = parseFloat($india.find('.packcpu').val());
		var ram = parseFloat($india.find('.packram').val());
		var data = parseFloat($india.find('.packdata').val());
		var space = parseFloat($india.find('.packspace').val());
		var ips = parseFloat($india.find('.packips').val());
		var packbackup = parseFloat($india.find('.packbackup').val());
		var ips = parseFloat($india.find('.packips').val());
		var price=parseFloat($india.find('.packprice').val());
		var pr=parseFloat('100');

		if(months=='24'){price=price-(price*0.05);}

		else if(months=='36'){price=price-(price*0.10);}

		else if(months=='48'){price=price-(price*0.20);}

		else {price=parseFloat($india.find('.packprice').val());}

		var price_tot=months*price;

		//var i=prc*(servaval-1)*mns;

		$india.find('.subbrtor').text(parseFloat(Math.round(price_tot)));
		//$india.find('.itplanprice').text(parseFloat(Math.round(price_tot)));

		totalupdating();	

	}

totalupdating();

});


$("#static-cart").click(function(){

		$(".rt-ord-summary").toggleClass("summary-show");

		$("#cart-img").toggleClass("imgmove");	

	});
