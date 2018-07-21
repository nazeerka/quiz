<div class=" container">
  <h2 class="title wow bounceInUp " data-wow-duration="2s"  data-wow-offset="100" style="text-align:center;margin-bottom:0px;">
     My Quizes</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo base_url().'quiz/new_quiz'?>">
                      <input type="button" class="btn btn-primary gradi" id="new_quiz" value="New Quiz">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start User  games -->

<div class="container">
<div class="row">
     <?php
          if(count($quiz)>0){
     for ($i=0;$i < count($quiz);$i++)
    {?>
    <div class="col-md-6 col-lg-3">
        <div class="rotating-card-container">
            <div class="card card-rotate card-background">
                <div class="front front-background" style="background-image: url('<?php echo base_url();?>images/quiz_img/<?php echo $quiz[$i]['image']?>');">
                    <div class="card-content">
                        <h6 class="category text-info"></h6>
                        <a>
                            <h3 class="card-title"><?php echo $quiz[$i]['title']?></h3>
                        </a>
                        <p class="card-description">
                           <?php echo $quiz[$i]['description']?>
                        </p>
                    </div>
                </div>

                <div class="back back-background" style="background-image: url('<?php echo base_url();?>images/image_information.jpg');">
                    <div class="card-content">
                        <h5 class="card-title">
                            <?php echo $quiz[$i]['title']?>
                        </h5>
                        <p class="card-description"><?php echo $quiz[$i]['description_full']?></p>
                        <div class="footer text-center">
                            <a href="<?php echo base_url().'quiz/quiz_details/'.$quiz[$i]['id']?>" class="btn btn-info btn-just-icon btn-fill btn-round">
                                <i class="material-icons">subject</i>
                            </a>
                            <a href="<?php echo base_url().'quiz/show_edit_quiz/'.$quiz[$i]['id']?>" class="btn btn-success btn-just-icon btn-fill btn-round btn-wd">
                                <i class="material-icons">mode_edit</i>
                            </a>
                            <a href="<?php echo base_url().'quiz/delete_quiz/'.$quiz[$i]['id']?>" class="btn btn-danger btn-just-icon btn-fill btn-round">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <?php } 
            }else { ?>
                <style media="screen">
                  #hide{
                    display: none;
                  }
                </style>
                <div><img class="img-responsive" src="<?php echo base_url();?>images/No-result.png"/> </div>
       <?php }?>
</div>
</div>

<!-- End User  games -->
