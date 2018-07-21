
<!-- small modal -->
<div class="modal fade" id="smallAlertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-small ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
      <div class="modal-body text-center">
        <h5>Are you sure you want to delete this question ? </h5>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-simple" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success btn-simple">Confirm</button>
      </div>
    </div>
  </div>
</div>

<div class=" container" style="margin-top:6%;">
<!-- <div class="row">
  <div class="col-md-12">
<div class="box-header">
    <div class="pull-right">
        <a href="<?php echo base_url()?>question/new_quetion/<?php echo $quiz['0']['id']?>"><input type="button" class="btn btn-primary gradi" id="new_quiz" value=" New Question"></a>
    </div>
</div>
</div>
</div> -->
</div>
<div class="container">
    <div class="row">
            <!-- <h2 class="title col-md-offset-1">Game Name</h2> -->
        <div class="col-md-12">
            <div class="card " style="margin-bottom: 0px;">
                <div class="col-md-4 col-sm-6 ">
                    <div class="card-image">
                        <a href="#pablo">
                            <img class="img-respoonsive" src="<?php echo base_url();?>images/quiz_img/<?php echo $quiz['0']['image']?>" style="width:100%;height:280px;background-size:cover;"/>
                        </a>
                    </div>
                </div>
                <div class=" col-md-4 col-sm-3">
                    <div class="card-content">
                        <h4 class="card-title"><?php echo $quiz['0']['title']?></h4>
                        <h6 class="category text-muted">Created At : <?php echo $quiz['0']['created_at']?></h6>

                        <p class="card-description"><b>Description:</b>
                            <?php echo $quiz['0']['description']?>
                        </p>
                        <div class="footer">
                            <button class="btn btn-primary btn-round float-right gradi"><a href="<?php echo base_url().'quiz/show_edit_quiz/'.$quiz[0]['id']?>" style="color:white;">Edit</a></button>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4 col-sm-3">
                    <div class="card-content">
                        <p class="card-description"><b>Full Description:</b>
                             <?php echo $quiz['0']['description_full']?>
                        </p>
                        <h4 class="card-title"><b>Favorite</b>&nbsp;&nbsp;
                            <?php echo $quiz['0']['count_favorite']?>
                            <i class="material-icons" style="color: red">favorite</i>
                        </h4>
                        <h4 class="card-title"><b>Played</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $quiz['0']['count_played']?>
                            <!--<i class="material-icons"><img src="<?php echo base_url();?>images/play.png"></i>-->
                            <i class="fa fa-dribbble"></i>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-header">
        <div class="pull-right">
            <a href="<?php echo base_url()?>question/quiz_question/<?php echo $quiz['0']['id']?>"><input type="button" class="btn btn-primary gradi" value=" Questions"></a>
        </div></h2>
    </div>
</div>