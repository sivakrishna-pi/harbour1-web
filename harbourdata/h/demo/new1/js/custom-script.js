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

			var plan="CLOUD HOSTING";
			var subplan = "Cloud Server";
			//var cpu_total = parseInt(t_cpu_total);
			

		var os = $('select[name=cloud_server_os]').val();
		var os_t = $('select[name=cloud_server_os] option:selected').text();
		var backup = $('select[name=cloud_server_backup]').val();
		var ip_num=$('input[name=cloud_server_ip_num]').val();

		var packos_total = parseInt($('input[name=cloud_hosting_os]').val());
                var packbackup_total = parseInt($('input[name=cloud_hosting_backup]').val());
                var packdatabase_total = parseInt($('input[name=cloud_hosting_db]').val());
                var packip_total = parseInt($('input[name=cloud_hosting_ip]').val());

		//var backup_total = backup*$('input[name=backup_price10]').val();
		//var ip_total = ip_num*$('input[name=ip_price10]').val();
		//$ip = $('select[name=selector]').val();
		var total = parseInt($('span[id=cloud_server_total]').text());

		var database = $('select[name=cloud_server_db]').val();
		var database_t = $('select[name=cloud_server_db] option:selected').text();

		var tenure_price = space_total+ram_total+cpu_total+data_total;
		var tenure= $('select[name=cloud_hosting_tenure]').val();

		if(document.getElementById('cloud_server_c1').textContent>'0'){

			var cpu_total=parseInt(document.getElementById('cloud_server_c1').textContent);
			var val = parseInt($("#handle1").roundSlider("option", "value"));
          //alert(val);
          var cpu=parseInt(myvalue(val,'2-16'));
          //alert(value);
          //var result =  $.inArray( value, [ 2, 4, 6, 8,12,16] );
			//var cpu=$('#container').jqxKnob('value');
			

			//var cpu_total = parseInt(t_cpu_total);
		}else{var cpu_total='0';}
		if(document.getElementById('cloud_server_c2').textContent>'0'){

			var ram_total=parseInt(document.getElementById('cloud_server_c2').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var val = parseInt($("#handle2").roundSlider("option", "value"));
          //alert(val);
          var ram=parseInt(myvalue(val,'4-32'));
			//var ram=$('#container2').jqxKnob('value');
		}else{var ram_total='0';}
		if(document.getElementById('cloud_server_c3').textContent>'0'){

			var space_total=parseInt(document.getElementById('cloud_server_c3').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var val = parseInt($("#handle3").roundSlider("option", "value"));
          //alert(val);
          var space=parseInt(myvalue(val,'50-5000'));
			//var space=$('#container3').jqxKnob('value');
		}else{var space_total='0';}
		if(document.getElementById('cloud_server_c4').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_c4').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			//var data=$('#container4').jqxKnob('value');
			var val = parseInt($("#handle4").roundSlider("option", "value"));
          //alert(val);
          var data=parseInt(myvalue(val,'50-10000'));
		}else{var data_total='0';}
		var tenure_price = cpu_total+ram_total+space_total+data_total;
		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&cpu='+cpu+'&ram_total='+ram_total+'&ram='+ram+'&data_total='+data_total+'&data='+data+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&os='+os+'&os_t='+os_t+'&ip_num='+ip_num+'&backup='+backup+'&database='+database+'&database_t='+database_t+'&total='+total+'&tenure='+tenure+'&tenure_price='+tenure_price+'&packos_total='+packos_total+'&packdatabase_total='+packdatabase_total+'&packbackup_total='+packbackup_total+'&packip_total='+packip_total,


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

			var tenure= $('select[name=virtual_hosting_tenure]').val();

		var os = $('select[name=virtual_server_os]').val();
		var os_t = $('select[name=virtual_server_os] option:selected').text();
		var backup = $('select[name=virtual_server_backup]').val();


		var packos_total = parseInt($('input[name=virtual_server_os]').val());
                var packbackup_total = parseInt($('input[name=virtual_server_backup]').val());
                var packdatabase_total = parseInt($('input[name=virtual_server_db]').val());
                var packip_total = parseInt($('input[name=virtual_server_ip]').val());
		
		//$ip = $('select[name=selector]').val();
		var ip_num=$('input[name=virtual_server_ip_num]').val();
		//var database = $('select[name=virtual_server_db]').val();
		//var database_t = $('select[name=virtual_server_db] option:selected').text();
var total = parseInt($('span[id=virtual_server_total]').text());
		if(document.getElementById('cloud_server_v1').textContent>'0'){

			var cpu_total=parseInt(document.getElementById('cloud_server_v1').textContent);
			var cpu=parseInt(myvalue(parseInt($("#handle5").roundSlider("option", "value")),'2-16'));
			//var cpu_total = parseInt(t_cpu_total);
		}else{var cpu_total='0';}
		if(document.getElementById('cloud_server_v2').textContent>'0'){

			var ram_total=parseInt(document.getElementById('cloud_server_v2').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var ram=parseInt(myvalue(parseInt($("#handle6").roundSlider("option", "value")),'4-32'));
			//var c
		}else{var ram_total='0';}
		if(document.getElementById('cloud_server_v3').textContent>'0'){

			var space_total=parseInt(document.getElementById('cloud_server_v3').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var space=parseInt(myvalue(parseInt($("#handle7").roundSlider("option", "value")),'50-5000'));
			//var c
		}else{var space_total='0';}
		if(document.getElementById('cloud_server_v4').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_v4').textContent);
			//var cpu_total = parseInt(t_cpu_total);
			var data=parseInt(myvalue(parseInt($("#handle8").roundSlider("option", "value")),'50-10000'));
			//var c
		}else{var data_total='0';}
		var tenure_price = cpu_total+ram_total+space_total+data_total;

		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&cpu_total='+cpu_total+'&cpu='+cpu+'&ram_total='+ram_total+'&ram='+ram+'&data_total='+data_total+'&data='+data+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&os='+os+'&os_t='+os_t+'&ip_num='+ip_num+'&backup='+backup+'&total='+total+'&tenure='+tenure+'&tenure_price='+tenure_price+'&packos_total='+packos_total+'&packdatabase_total='+packdatabase_total+'&packbackup_total='+packbackup_total+'&packip_total='+packip_total,


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
			
		var ip_num=$('input[name=e3_ip_num]').val();
		var ip=parseInt($('input[name=e3_ip]').val());
		var cpu = $('select[name=e3_cpu]').val();
		var ram = $('select[name=e3_ram]').val();
		var space = $('select[name=e3_disk]').val()+"000";
		var os =$('select[name=e3_os]').val();
		

		var tenure_price = $('input[name=e3_plan]').val();

		var tenure= $('select[name=e3_tenure]').val();

		var total = parseInt($('span[id=cloud_server_e3_total]').text());
		if(document.getElementById('cloud_server_e32').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_e32').textContent);
			var val = parseInt($("#handle9").roundSlider("option", "value"));
          var data=parseInt(myvalue(val,'50-10000'));
			
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

					data: 'x='+$(this).attr('data-value')+'&tenure_price='+tenure_price+'&tenure='+tenure+'&cpu_e='+cpu+'&ram_e='+ram+'&data_total='+data_total+'&data='+data+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&ip_num='+ip_num+'&total='+total+'&os='+os+'&os_t='+os+'&ip='+ip,


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
		

		var ip_num=$('input[name=e5_ip_num]').val();
		var cpu = $('select[name=e5_cpu]').val();
		var ram = $('select[name=e5_ram]').val();
		var ip=parseInt($('input[name=e5_ip]').val());


		var tenure_price = $('input[name=e5_plan]').val();

		var tenure= $('select[name=e5_tenure]').val();
		
		var space = $('select[name=e5_disk]').val()+"000";
		var os =$('select[name=e5_os]').val();
		
		var total = parseInt($('span[id=cloud_server_e5_total]').text());
		if(document.getElementById('cloud_server_e52').textContent>'0'){

			var data_total=parseInt(document.getElementById('cloud_server_e52').textContent);
			var val = parseInt($("#handle11").roundSlider("option", "value"));
          var data=parseInt(myvalue(val,'50-10000'));
			
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

					data: 'x='+$(this).attr('data-value')+'&tenure_price='+tenure_price+'&tenure='+tenure+'&cpu_e='+cpu+'&ram_e='+ram+'&data_total='+data_total+'&data='+data+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&ip_num='+ip_num+'&total='+total+'&os='+os+'&os_t='+os+'&ip='+ip,


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
			var val = parseInt($("#handle13").roundSlider("option", "value"));
          //alert(val);
          var space=parseInt(myvalue(val,'500-5000'));

      	}else{var space_total='0';}

      	var drive = $('select[name=cs_drive] option:selected').text();
      	var drive_code = $('select[name=cs_drive]').val();

		var min_months = 3;

		var tenure_price = space_total;

		var tenure= $('select[name=ec_tenure]').val();

		var total = parseInt($('span[id=ec_disk_total]').text());
		
		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&tenure='+tenure+'&tenure_price='+tenure_price+'&drive='+drive+'&drive_code='+drive_code+'&space_total='+space_total+'&space='+space+'&plan='+plan+'&subplan='+subplan+'&min_months='+min_months+'&total='+total,


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
			if($('select[name=dd_drive]').val()!='SSD'){
		if(document.getElementById('dd_disk').textContent>'0'){

			var space_total=parseInt(document.getElementById('dd_disk').textContent);
			var val = parseInt($("#handle14").roundSlider("option", "value"));
          //alert(val);
          var space=parseInt(myvalue(val,'500-5000'));
			//var space=$('#container14').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var space_total='0';}
	}else{
		if(document.getElementById('dd_data2').textContent>'0'){

			var space_total=parseInt(document.getElementById('dd_data2').textContent);
			var val = parseInt($("#handle10").roundSlider("option", "value"));
          //alert(val);
          var space=parseInt(myvalue(val,'128-512'));
			//var space=$('#container14').jqxKnob('value');
			//var cpu_total = parseInt(t_cpu_total);
		}else{var space_total='0';}


	}
		//var drive = $('select[name=dd_drive]').val();
		var total = parseInt($('span[id=dd_disk_total]').text());

		var drive = $('select[name=dd_drive] option:selected').text();
      	var drive_code = $('select[name=dd_drive]').val();

		var min_months = 3;

		var tenure_price = space_total;

		var tenure= $('select[name=dd_tenure]').val();

		
		if($(this).parent('.rpt_plan').find('input[class=rtyu_a]').length>'0' &&  $(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').length>'0'){

			var platfrm=$(this).parent('.rpt_plan').find('input[class=rtyu_a]:checked').val();
		}else{var platfrm='0';}
			if($(this).attr('data-value')=='10' ||$(this).attr('data-value')=='11' ||$(this).attr('data-value')=='12' ||$(this).attr('data-value')=='14' ||$(this).attr('data-value')=='15' ||$(this).attr('data-value')=='16' ||$(this).attr('data-value')=='17' ||$(this).attr('data-value')=='18' ||$(this).attr('data-value')=='19' ||$(this).attr('data-value')=='20' ||$(this).attr('data-value')=='21'){

				$.ajax({

					url: 'plans/pricing.php',

					type: "POST",

					cache:false,

					async:false,

					data: 'x='+$(this).attr('data-value')+'&tenure='+tenure+'&tenure_price='+tenure_price+'&drive='+drive+'&drive_code='+drive_code+'&space_total='+space_total+'&space='+space+'&drive='+drive+'&plan='+plan+'&subplan='+subplan+'&total='+total,


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
	$('.grandtax').text(sum*0.15);



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

	function ajaxprice2(table_name, column, my_column, value) {
              //alert(lj_cpu_price+''+cpu+''+ch+'.'+value);
              var my_result;
              $.ajax({
                  url: 'http://pidatacenters.com/pidata/p/plans/myprice.php',
                  type: "POST",
                  cache: false,
                  async: false,
                  data: 'table_name=' + table_name + '&&column=' + column + '&&my_column=' + my_column + '&&value=' + value,
                  success: function (result) {
                      my_result = result;
                  }

              });

              //setTimeout(function,3000);
              return my_result;
          }
          
          function e2_total_update(plan,tenure, enterprise, ip,data) {
              //alert(lj_cpu_price+''+cpu+''+ch+'.'+value);
              if(plan=='e3'){
                 var v_totalcost = document.getElementById('cloud_server_e3_total');
                 var tenure_price=0;
                 if(tenure<3){
                    tenure_price = enterprise;
                    //alert();

                 }else if(tenure==3){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '3_tenure', enterprise));
                 }else if(tenure==6){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '6_tenure', enterprise));
                 }else if(tenure==12){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '12_tenure', enterprise));
                 }else if(tenure==24){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '24_tenure', enterprise));
                 }else if(tenure==36){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '36_tenure', enterprise));
                 }
                  

                    return data + (tenure_price*tenure) + ip;

              }else if(plan=='e5'){
                 var v_totalcost = document.getElementById('cloud_server_e5_total');
                 var tenure_price=0;
                 if(tenure<3){
                    tenure_price = enterprise;

                 }else if(tenure==3){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '3_tenure', enterprise));
                }else if(tenure==6){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '6_tenure', enterprise));
                }else if(tenure==12){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '12_tenure', enterprise));
                }else if(tenure==24){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '24_tenure', enterprise));
                }else if(tenure==36){
                   tenure_price = parseInt(ajaxprice2('lj_enterprise_price', 'price', '36_tenure', enterprise));
                }

             return  data + (tenure_price*tenure) + ip;
              //var ch_total=0;
             }
         }
         function s2_total_price(plan,tenure,enterprise){
    if(plan=='cs'){
        //ec_tenure
        //var v_totalcost = document.getElementById('ec_disk_total');
                 var tenure_price=0;
                 if(tenure<3){
                    tenure_price = enterprise;
                    //alert();

                 }else if(tenure==3){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ecs', 'ecs_3_tenure', enterprise));
                 }else if(tenure==6){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ecs', 'ecs_6_tenure', enterprise));
                 }else if(tenure==12){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ecs', 'ecs_12_tenure', enterprise));
                 }else if(tenure==24){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ecs', 'ecs_24_tenure', enterprise));
                 }else if(tenure==36){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ecs', 'ecs_36_tenure', enterprise));
                 }
                  

                    return   (tenure_price*tenure);



    }else if(plan=='emc'){

         //var v_totalcost = document.getElementById('ec_disk_total');
                 var tenure_price=0;
                 if(tenure<3){
                    tenure_price = enterprise;
                    //alert();

                 }else if(tenure==3){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'pcs', 'pcs_3_tenure', enterprise));
                 }else if(tenure==6){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'pcs', 'pcs_6_tenure', enterprise));
                 }else if(tenure==12){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'pcs', 'pcs_12_tenure', enterprise));
                 }else if(tenure==24){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'pcs', 'pcs_24_tenure', enterprise));
                 }else if(tenure==36){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'pcs', 'pcs_36_tenure', enterprise));
                 }
                  

                    return  (tenure_price*tenure);

    }
    else if(plan=='SATA'){
       // dd_tenure
        //var v_totalcost = document.getElementById('dd_disk_total');
                 var tenure_price=0;
                 if(tenure<3){
                    tenure_price = enterprise;
                    //alert();

                 }else if(tenure==3){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sata', 'sata_3_tenure', enterprise));
                 }else if(tenure==6){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sata', 'sata_6_tenure', enterprise));
                 }else if(tenure==12){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sata', 'sata_12_tenure', enterprise));
                 }else if(tenure==24){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sata', 'sata_24_tenure', enterprise));
                 }else if(tenure==36){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sata', 'sata_36_tenure', enterprise));
                 }
                  

                    return  (tenure_price*tenure);


    }
    else if(plan=='SAS'){
       // var v_totalcost = document.getElementById('dd_disk_total');
                 var tenure_price=0;
                 if(tenure<3){
                    tenure_price = enterprise;
                    //alert();

                 }else if(tenure==3){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sas', 'sas_3_tenure', enterprise));
                 }else if(tenure==6){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sas', 'sas_6_tenure', enterprise));
                 }else if(tenure==12){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sas', 'sas_12_tenure', enterprise));
                 }else if(tenure==24){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sas', 'sas_24_tenure', enterprise));
                 }else if(tenure==36){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'sas', 'sas_36_tenure', enterprise));
                 }
                  

                    return  (tenure_price*tenure);

    }
    else if(plan=='SSD'){
       // var v_totalcost = document.getElementById('dd_disk_total');
                 var tenure_price=0;
                 if(tenure<3){
                    tenure_price = enterprise;
                    //alert();

                 }else if(tenure==3){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ssd', 'ssd_3_tenure', enterprise));
                 }else if(tenure==6){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ssd', 'ssd_6_tenure', enterprise));
                 }else if(tenure==12){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ssd', 'ssd_12_tenure', enterprise));
                 }else if(tenure==24){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ssd', 'ssd_24_tenure', enterprise));
                 }else if(tenure==36){
                   tenure_price = parseInt(ajaxprice2('lj_diskspace_price', 'ssd', 'ssd_36_tenure', enterprise));
                 }
                  

                    return  (tenure_price*tenure);

    }
}




	function priceuopdating($india){
		var months = parseFloat($india.find('.changepricing').val());
		var cpu = parseFloat($india.find('.packcpu').val());
		var cpu1 = parseFloat($india.find('.packcpu1').val());
		var cpu2 = parseFloat($india.find('.packcpu2').val());
		var cpu3 = parseFloat($india.find('.packcpu3').val());
		var cpu4 = parseFloat($india.find('.packcpu4').val());
		var ram = parseFloat($india.find('.packram').val());
		var data = parseFloat($india.find('.packdata').val());
		var space = parseFloat($india.find('.packspace').val());
		var ips = parseFloat($india.find('.packipn').val());

		var ip_total=parseFloat($india.find('.packip_total').val());
		var backup_total=parseFloat($india.find('.packbackup_total').val());
		var database_t=parseFloat($india.find('.packdatabase_total').val());
		var os_t=parseFloat($india.find('.packos_total').val());

		var packbackup = parseFloat($india.find('.packbackup').val());
		//var ips = parseFloat($india.find('.packips').val());
		var price=parseFloat($india.find('.packprice').val());
		var price1=parseFloat($india.find('.packprice1').val());
		var planprice=parseFloat($india.find('.planprice').val());

		var tenure=parseFloat($india.find('.packtenure').val());
		var packdrive_code=$india.find('.packdrivecode').val();

		var tenure_price=parseFloat($india.find('.packtenureprice').val());

		var plan = $india.find('.packselectedsub').val();
		if(plan=='Cloud Server'){

		var price1 = ip_total+backup_total+database_t+os_t;
		 //alert('cloud');
		//var pr=parseFloat('100');
		if(months=='3'){price=price*0.85;}
		else if(months=='6'){price=price*0.70;}
		else if(months=='12'){price=price*0.65;}
		else if(months=='24'){price=price*0.50;}

		else if(months=='36'){price=price*0.50;}

		else if(months=='48'){price=price*0.50;}

		else {price=parseFloat($india.find('.packprice').val());}

		var price_tot=(months*price)+price1;
		$india.find('.planprice').val(parseFloat(Math.round(price_tot)));

		//$india.find('.hello12').text(price1+"price1,"+price+"price");
		//$india.find('.planprice').val(price_tot);
		//$india.getElementById('planprice2').val(price_tot);
	}else if(plan=='Virtual Dedicated Servers'){
		//alert('cloud2');

		var price1 = ip_total+backup_total+database_t+os_t;
		//var pr=parseFloat('100');
		if(months=='3'){price=price*0.85;}
		else if(months=='6'){price=price*0.70;}
		else if(months=='12'){price=price*0.65;}
		else if(months=='24'){price=price*0.50;}

		else if(months=='36'){price=price*0.50;}

		else if(months=='48'){price=price*0.50;}

		else {price=parseFloat($india.find('.packprice').val());}

		var price_tot=(months*price)+price1;
		$india.find('.planprice').val(parseFloat(Math.round(price_tot)));

		//$india.find('.planprice').val(price_tot);
		//$india.getElementById('planprice2').val(price_tot);
		//$('input[name=planprice[]').val(price_tot);

	}else if((plan=='Enterprise Dedicated Servers - E3')||(plan=='Enterprise Dedicated Servers - E5')){

		 price = tenure_price;
		 //alert('cloud3');

		if(months=='3'){price=price;}
		else if(months=='6'){price=price;}
		else if(months=='12'){price=price;}
		else if(months=='24'){price=price;}

		else if(months=='36'){price=price;}

		else if(months=='48'){price=price;}

		else {price=parseFloat($india.find('.packprice').val());}

		//var price_tot=(months*price)+ips+data_total;
		if(plan=='Enterprise Dedicated Servers - E3'){

		var price_tot =	e2_total_update('e3',months, price, ips,cpu4);

		}
		else if(plan=='Enterprise Dedicated Servers - E5'){

			var price_tot =	e2_total_update('e5',months, price, ips,cpu4);
		}

		$india.find('.planprice').val(parseFloat(Math.round(price_tot)));


	}else if((plan=='Enterprise Cloud Storage')||(plan=='Dedicated Disk Storage')){
		 //price = price -ips;
		 //alert('cloud3');

		/*if(months=='3'){price=price;}
		else if(months=='6'){price=price;}
		else if(months=='12'){price=price;}
		else if(months=='24'){price=price;}

		else if(months=='36'){price=price;}

		else if(months=='48'){price=price;}

		else {price=parseFloat($india.find('.packprice').val());}*/

		//price = tenure_price;
		//var price_tot=s2_total_price(drive_code,months,tenure_price);
		
		var price_tot=s2_total_price(packdrive_code,months,tenure_price);

		//$india.find('.planprice').val(parseFloat(Math.round(price_tot)));
		$india.find('.planprice').val(price_tot);


	}else{
		 /*price = price -ips;
		 //alert('cloud3');

		if(months=='3'){price=price;}
		else if(months=='6'){price=price;}
		else if(months=='12'){price=price;}
		else if(months=='24'){price=price;}

		else if(months=='36'){price=price;}

		else if(months=='48'){price=price;}

		else {price=parseFloat($india.find('.packprice').val());}

		var price_tot=((months*price)+ips)*0;*/
		var price_tot=0;
		$india.find('.planprice').val(parseFloat(Math.round(price_tot)));


	}

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
