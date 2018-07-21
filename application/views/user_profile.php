<div class="container">
<div class="row">
        <div class="col-md-3" style="margin-top: 2%;">
		<!-- Profile Image -->
		<div class="box my-card">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>images/image_profile/<?php echo $user["image_profile"]?>" alt="User profile picture">
				<h3 class="profile-username text-center"><?php echo $user["user_name"]?></h3>
				<p class="text-muted text-center">Member since <?php echo date("j F Y", strtotime($user["created_at"]))?></p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
					<b>User Name</b> <a class="pull-right"><?php echo $user["user_name"]?></a>
					</li>
					<li class="list-group-item">
					<b>Email</b> <a class="pull-right"><?php echo $user["email"]?></a>
					</li>
				</ul>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
	<div class="col-md-9">
		<div class="my-card">
                    <ul class="nav nav-tabs " >
                        <li class="active"><a href="#settings" data-toggle="tab">Information</a></li>
                        <li><a href="#passwords" data-toggle="tab">Password</a></li>
                    </ul>
			<div class="tab-content">
				<div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="<?php echo base_url()?>home/update_info" method="post" enctype="multipart/form-data">
                                        <div class="form-group" style="margin-bottom: 10px;">
						<label for="full_name" class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-10">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name" value="<?php echo $user['first_name'];?>" required>
						</div>
					</div>
                                        <div class="form-group" style="margin-bottom: 10px;">
						<label for="full_name" class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-10">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name" value="<?php echo $user['last_name'];?>" required>
						</div>
					</div>
                                        <div class="form-group" style="margin-bottom: 10px;">
						<label for="full_name" class="col-sm-2 control-label">User Name</label>
						<div class="col-sm-10">
                                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="user name" value="<?php echo $user['user_name'];?>" required>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 10px;">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email'];?>" required>
						</div>
					</div>
                                        <div class="form-group">
						<label for="upload_picture" class="col-sm-2 control-label">Image Profile</label>
						<div class="col-sm-10">
                                                    <div id="profile-container">
                                                        <input type="file" id="imageUpload" name="imageUpload">
                                                        <image id="profileImage" name="profileImage" src="<?php echo base_url();?>images/image_profile/<?php echo $user["image_profile"]?>" />
                                                    </div>
                                                    
						</div>
					</div>
					<div class="form-group" style="margin-top: 10px;">
						<div class="col-sm-offset-1 col-sm-11">
						<button type="submit" class="btn btn-info">Update</button>
						</div>
					</div>
                                    </form>
				</div><!-- /.tab-pane -->
				<div class="tab-pane" id="passwords">
                                    <form class="form-horizontal" onsubmit="return validate_password()">
					<div class="form-group" style="margin-bottom: 15px;">
						<label for="old_password" class="col-sm-2 control-label">Old Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 15px;">
						<label for="password" class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 15px;">
						<label for="re_password" class="col-sm-2 control-label">Repeat Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="re_password" name="re_password" placeholder="Repeat Password" required>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 15px;">
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-info">Update</button>
						</div>
					</div>
                                            <div id="status_message" style="display: none; width:60%"></div>
                                    </form>
				</div><!-- /.tab-pane -->
			</div><!-- /.tab-content -->
		</div><!-- /.nav-tabs-custom -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.row -->
<script>
	function validate_password()
	{
//            $.ajax({
//                    type: "POST",
//                    url: base_url+"home/validate_password", 
//                    data: {password:$('#old_password').val()},
//                    dataType: "text",
//                    cache:false,
//                    success: 
//                    function(data){
//                            if(data)
//                            {
//                                    if($('#password').val() === $('#re_password').val())
//                                    {
//                                            $.ajax({
//                                                    type: "POST",
//                                                    url: base_url+"home/change_password", 
//                                                    data: {password:$('#password').val()},
//                                                    dataType: "text",  
//                                                    cache:false,
//                                                    success: 
//                                                    function(data){
//                                                            if(data)
//                                                            {
//                                                                    $('#status_message').html('<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(\'#status_message\').hide()" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password has been saved successfully!</div>');
//                                                                    $("#status_message").fadeTo(2000, 500).slideUp(500);
//                                                            }
//                                                    }	
//                                            });
//                                    }
//                                    else
//                                    {
//                                            $('#status_message').html('<div class="alert alert-info alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(\'#status_message\').hide()" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password and repeat password fields must match!</div>');
//                                            $("#status_message").fadeTo(4000, 500).slideUp(500);
//                                    }
//                            }
//                            else
//                            {
//                                    $('#status_message').html('<div class="alert alert-danger alert-dismissable fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(\'#status_message\').hide()" aria-label="Close"><span aria-hidden="true">&times;</span></button>The Old Password Not Correct! Please insert the correct password and try again.</div>');
//                                    $("#status_message").fadeTo(4000, 500).slideUp(500);
//                            }
//                    }	
//            });
            return false;
	}
        
        $("#profileImage").click(function(e) {
            $("#imageUpload").click();
        });

        function fasterPreview( uploader ) {
            if ( uploader.files && uploader.files[0] ){
                  $('#profileImage').attr('src',
                     window.URL.createObjectURL(uploader.files[0]) );
            }
        }

        $("#imageUpload").change(function(){
            fasterPreview( this );
        });
</script>
<style>
#imageUpload
{
    display: none;
}

#profileImage
{
    cursor: pointer;
}

#profile-container {
    width: 150px;
    height: 150px;
    overflow: hidden;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
}

#profile-container img {
    width: 150px;
    height: 150px;
}
</style>