<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="<?php echo base_url();?>assets/bootstrap.min.css" rel="stylesheet">
	<script
	src="<?php echo base_url();?>assets/jquery-3.3.1.min.js"
	 ></script>
	<script src="<?php echo base_url();?>assets/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/bootstrap3-typeahead.min.js"></script> 
</head>
<body>
	<div id="container">
		<div class="col-md-3 verticalLine">
			<div class="tags-default device-lable-color">
				<input type="text" id="device-search" class="form-control input-lg" autocomplete="off" placeholder="Device" />
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$('#device-search').typeahead({  
		items: 10,  
		source: function(query, result)
		{
			$.ajax({
				url:"<?php echo site_url('welcome/get_type_dt')?>",
				method:"POST",
				data:{query:query,},
				dataType:"json",
				success:function(data)
				{
					result($.map(data, function(item){
						return item;
					}));
				}
			})
		},
		updater: function(item) {
			/*do your codeing here*/
			return item;

		}
	})
</script>
</html>