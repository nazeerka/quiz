    <!DOCTYPE html>
    <html>
      <head>

    <!-- strat jameel-->

    <meta charset="utf-8" />
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Quiz Website</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>css/material-kit.css?v=1.2.1" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url();?>css/vertical-nav.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/animate.css">
     <link rel="stylesheet" href="<?php echo base_url();?>css/css/style.css">
<!--     <link rel="stylesheet" href="<?php echo base_url();?>css/mathquill.css">-->
       <!-- end jameel-->
       
       
       

        <!-- strat jameel-->

        <!--   Core JS Files   -->
    	<script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"></script>
    	<script src="<?php echo base_url();?>js/bootstrap.min.js" type="text/javascript"></script>
    	<script src="<?php echo base_url();?>js/material.min.js"></script>

    	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    	<script src="<?php echo base_url();?>js/moment.min.js"></script>

    	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    	<script src="<?php echo base_url();?>js/bootstrap-datetimepicker.js" type="text/javascript"></script>

    	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    	<script src="<?php echo base_url();?>js/bootstrap-selectpicker.js" type="text/javascript"></script>

    	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
    	<script src="<?php echo base_url();?>js/bootstrap-tagsinput.js"></script>

    	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    	<script src="<?php echo base_url();?>js/jasny-bootstrap.min.js"></script>

    	<!-- Plugin For Google Maps
    	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
        
    	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    	<script src="<?php echo base_url();?>js/material-kit.js?v=1.2.1" type="text/javascript"></script>

    	<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
    	<script src="<?php echo base_url();?>js/modernizr.js" type="text/javascript"></script>
    	<script src="<?php echo base_url();?>js/vertical-nav.js" type="text/javascript"></script>
<!--    	<script src="<?php echo base_url();?>js/mathquill.js" type="text/javascript"></script>-->
        
        <!--<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>-->
        
    <script type="text/javascript">
        var base_url = '<?php echo base_url();?>';
    </script>
    <script src="<?php echo base_url();?>js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="<?php echo base_url();?>js/jquery.nicescroll.js"></script>
<script>
    $("#nav ul li a[href^='#']").on('click', function(e) {

       // prevent default anchor click behavior
       e.preventDefault();

       // store hash
       var hash = this.hash;

       // animate
       $('html, body').animate({
           scrollTop: $(hash).offset().top
         }, 1000, function(){

           // when done, add hash to url
           // (default click behaviour)
           window.location.hash = hash;
         });
    });
</script>
        <!-- End jameel-->
     </head>
    <body class="grd" data-spy="scroll" data-target="#navbar" data-offset="70" style="height:90%;">
    <?php  if (empty($user)){ ?>
    <nav class=" navbar navbar-default navbar-fixed-top" >
         <div class="container">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse">
                 <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php echo base_url();?>home/main_page">Main Page</a>
             </div>
             <div class="collapse navbar-collapse">

               <ul class="nav navbar-nav navbar-right" >
                    
                     <li>
                         <a href="<?php echo base_url();?>#section-home">
                             Home
                         </a>
                     </li>
                     <li>
                         <a href="<?php echo base_url();?>#section-about">
                             About Us
                         </a>
                     </li>
<!--                     <li>
                        <?php if (!empty($user)){ ?>
                             <a href="<?php echo base_url();?>quiz/user_quiz">
                             My Quiz
                         </a>
                       <?php }else{ ?>
                        <a href="<?php echo base_url();?>home/log">
                             My Quiz
                         </a>
                       <?php } ?>
                     </li>-->
                     <li>
                         <a href="<?php echo base_url();?>#section-quiz">
                             Category
                         </a>
                     </li>
                     <li>
                         <a href="<?php echo base_url();?>#section-contact">
                             Contact Us
                         </a>
                     </li>

                     <li>
                         <a href="<?php echo base_url();?>home/log" class="btn btn-raised btn-round gradi" >
                               Register
                         </a>
                     </li>
                </ul>
             </div>
         </div>
       </nav>
        <?php } else { ?>
        <!--         inverse navbar with notifications     -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation-demo">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo base_url();?>home/main_page">Main Page</a>
                </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navigation-example-2">
                  <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url();?>quiz/new_quiz">
                                New Quiz
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>quiz/user_quiz">
                                My Quiz
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>quiz/user_favourite_quiz">
                                Favourite
                            </a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#pablo" class="profile-photo dropdown-toggle" data-toggle="dropdown">
                                <div class="profile-photo-small" >
                                    <img src="<?php echo base_url();?>images/image_profile/<?php echo $user["image_profile"]?>" alt="Circle Image" class="img-circle img-responsive">
<!--                                    <div style="margin-left:45px;display: inline-block;"><?php echo $user["user_name"]?> </div> -->
                                </div>  
                            </a>
                            <ul class="dropdown-menu">
<!--                                <li class="dropdown-header">
                                    Dropdown header
                                </li>-->
<!--                                <li>
                                    <a href="#pablo">Me</a>
                                </li>-->
                                <li>
                                    <a href="<?php echo base_url(); ?>home/profile">Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>home/logout">Log out</a></li>
                            </ul>
                        </li>
                        <li> <a  class="not-active"  style="padding-left:5px;padding-top: 15px;" ><?php echo $user["user_name"]?></a></li>
<!--                        <li style="text-align: center;">
                            <a>
                            <?php echo $user["user_name"]?>
                            </a>
                        </li>-->
                   </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-->
            </nav>
         <?php }?>
    <div class="main main-raised bg" style="background-color:rgba(255,255,255,0.9);min-height:100%;">
      <div class="section-basic ">
    <header class="main-header margi">
    <style>
    .my-card{
      margin:4% 4% 3%;
      padding-left:4%;
      padding-right:4%;
      padding-bottom: 5%;
      background: #fff;
      border-radius: 6px;
      box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }
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
    .my-main{


    }
    .main-raised{
      margin-top:4%;


    }
    .bg{
      background-image: url(<?php echo base_url();?>images/background00.png);
      background-repeat: repeat;
      background-clip: padding-box;
      width: auto;
      height: auto;

    }
    .margi{
      padding-top: 2%;
    }
    .navbar.navbar-inverse{
       
        color:black;
    }
    .togglebutton label input[type=checkbox]:checked + .toggle{
        background-color:#00bcd4;
    }
      /* .grd{
      background: linear-gradient(180deg, #3498db, #9b59b6, #2ecc71, #1abc9c);
      background-size: 800% 800%;

      -webkit-animation: AnimationName 2s ease infinite;
      -moz-animation: AnimationName 2s ease infinite;
      -o-animation: AnimationName 2s ease infinite;
      animation: AnimationName 2s ease infinite;

      @-webkit-keyframes AnimationName {
          0%{background-position:51% 0%}
          50%{background-position:50% 100%}
          100%{background-position:51% 0%}
      }
      @-moz-keyframes AnimationName {
          0%{background-position:51% 0%}
          50%{background-position:50% 100%}
          100%{background-position:51% 0%}
      }
      @-o-keyframes AnimationName {
          0%{background-position:51% 0%}
          50%{background-position:50% 100%}
          100%{background-position:51% 0%}
      }
      @keyframes AnimationName {
          0%{background-position:51% 0%}
          50%{background-position:50% 100%}
          100%{background-position:51% 0%}
      }
    } */
    body, .gradi{
      background-color: #e74c3c;
      animation: bg-color 30s infinite;
      -webkit-animation: bg-color 30s infinite;
    }

    @-webkit-keyframes bg-color {
      0% { background-color: #e74c3c; }
      20% { background-color: #f1c40f; }
      40% { background-color: #1abc9c; }
      60% { background-color: #3498db; }
      80% { background-color: #9b59b6; }
      100% { background-color: #e74c3c; }
    }

    @keyframes bg-color {
      0% { background-color: #e74c3c; }
      20% { background-color: #f1c40f; }
      40% { background-color: #1abc9c; }
      60% { background-color: #3498db; }
      80% { background-color: #9b59b6; }
      100% { background-color: #e74c3c; }
    }
    </style>
        <!--     *********     HEADER 3      *********      -->

        <!-- <div class="header-3">
        </div> -->

        <!--     *********    END HEADER 3      *********      -->
    <!--<body class="skin-blue sidebar-mini">-->
