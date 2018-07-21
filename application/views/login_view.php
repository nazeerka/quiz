
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>css/fontawesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    <style>
    #background {
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -100;
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        background: no-repeat;
        background-size: cover;
    }
    .card{
      display: inline-block;
      position: relative;
      width: 100%;
      margin-bottom: 0px;
      border-radius: 6px;
      color: rgba(0,0,0, 0.87);
      background: #fff;
      padding: 20px 25px;
      margin-top: 0%;
      text-align: center;
      box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
      }
    </style>
  </head>

  <body class="login">
      <section >

    <video autoplay loop muted id="background">
       <source src="<?php echo base_url();?>images/bg1.mp4" type="video/mp4">
    </video>



    <div >
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content card ">
              <form class="" action="<?php echo base_url()?>home/login_validation" method="POST">
                <h1 style="font-size:35px;">Login</h1>
                    <div>
                        <input type="text" name="user_name" class="form-control" placeholder="Username" required="" id="form-username" value="<?php echo $this->input->post('user_name')?>">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" id="form-password" value="<?php echo $this->input->post('password')?>">
                    </div>
                    <button type="submit" class="btn btn-default submit">Log in</button>
                         <?php if(isset($error)){?>
                         <div style="color:red"><?php echo $error;?></div>
                         <?php }?>
                    <div><?php echo validation_errors();?></div>
              </form>
                <div class="clearfix"></div>
                <div class="separator">
                  <p class="change_link">New to site?
                    <a href="#signup" class="to_register"> Create Account </a>
                  </p>
                  <div class="clearfix"></div>
                  <br />
                  <div>
                    <h1>logo Quiz</h1>

                  </div>
                </div>
          </section>
        </div>
        <div id="register" class="animate form registration_form">

          <section class="login_content card">
            <h1 style="font-size:35px;">Create Account</h1>
            <form id="create_account" action="<?php echo base_url()?>home/register_validation" method="POST" enctype="multipart/form-data">
              <div>
                <input id="form-firstname" name="firstname" type="text" class="form-control" placeholder="First Name" required="" />
              </div>
              <div>
                <input id="form-lastname" name="lastname" type="text" class="form-control" placeholder="Last Name" required="" />
              </div>
              <div>
                <input id="form-username2" name="user_name2" type="text" class="form-control" placeholder="User Name" required="" />
              </div>
              <div>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input  id="form-password2" name="password2" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Submit</button>
              </div>
                     <?php if(isset($error2)){?>
                     <div style="color:red"><?php echo $error2;?></div>
                     <?php }?>
                <div><?php echo validation_errors();?></div>
                </form>
                <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                    <h1>logo Quiz</h1>

                </div>
              </div>
          </section>
        </div>
      </div>
    </div>
    </section>
  </body>
</html>
