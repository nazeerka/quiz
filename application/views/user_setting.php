<div style="margin-left:10px">
    <h3 class="title">User Name : <?php echo $user[0]['user_name'];?></h3>
	<hr />
	<table>
		<tr>
			<td style="width:200px">
				<label>User Name:</label>
			</td>
			<td>
				<input style="width:200px" class="form-control" type="text" name="user_name1" id="user_name1" value="<?php echo $user[0]['user_name'];?>"/>
			</td>
		</tr>
		<tr>
			<td style="width:200px">
				<label for="email">Email:</label>
			</td>
			<td>
                                <input style="width:200px" class="form-control" type="email" name="email" id="email" value="<?php echo $user[0]['email'];?>"/>
			</td>
		</tr>
		<tr>
			<td style="width:200px">
				<label for="password">New Password:</label>
			</td>
			<td>
				<input style="width:200px" class="form-control" type="password" name="new_password" id="new_password" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="re_password">Repeat Password:</label>
			</td>
			<td>
				<input style="width:200px" class="form-control" type="password" name="re_password" id="re_password" />
			</td>
		</tr>
		<tr>
			<td>
				<button type="button" class="btn btn-info" id="btn_edit" onclick="validateInputs()">
					<span class="glyphicon glyphicon-ok"></span> Save
				</button>
			</td>	
		</tr>
	</table>
	<div id="status_message" style="display: none;width:400px"></div>
</div>
<script>
	function validateInputs()
	{
		if($('#new_password').val()!="" && ($('#new_password').val() == $('#re_password').val()))
		{
			$.ajax({
				type: "POST",
				url: base_url+"user/save_settings", 
				data: {id:'<?php echo $user[0]['id'];?>',user_name:$('#user_name1').val(),email:$('#email').val(), password:$('#new_password').val()},
				dataType: "text",  
				cache:false,
				success: 
				function(data){
					if(data)
					{
						$('#status_message').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(\'#status_message\').hide()">&times;</button>Password has been saved successfully!</div>');
						$('#status_message').slideDown();
					}
				}	
			});
		}
		else
		{
			$('#status_message').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(\'#status_message\').hide()">&times;</button>Password and repeat password fields must match!</div>');
			$('#status_message').slideDown();
		}
	}
</script>