<div class="container">
    <div class="row">
            <!-- <h2 class="title col-md-offset-1">Game Name</h2> -->
        <div class="col-md-12">
            <div class="card" style="margin-top: 6%;margin-bottom: 0px;">
                <div class="col-md-4 col-sm-6 ">
                    <div class="card-image">
                        <a href="#pablo">
                            <img class="img-respoonsive" src="<?php echo base_url();?>images/quiz_img/<?php echo $quiz['0']['image']?>" style="width:100%;height:280px;background-size:cover;"/>
                        </a>
                    </div>
                </div>
                <div class=" col-md-5 col-sm-4">
                    <div class="card-content">
                        <h3 class="card-title"><?php echo $quiz['0']['title']?></h3>


                        <p class="card-description card-title "><b>Description:</b>
                            <?php echo $quiz['0']['description']?>
                        </p>

                        <p class="card-description"><b>Full Description:</b>
                             <?php echo $quiz['0']['description_full']?>
                        </p>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-2" style="padding-top:15px;">
                    <div class="card-content">
                        <h6 class="card-title category text-muted">Created At : <?php echo $quiz['0']['created_at']?></h6>

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
<!--         <div class="card" style="width: 50%">-->
       
<!--             </div>-->
<div class="row">
    <div class="col-md-8 col-sm-8 col-md-offset-2">
        <h3 class="card-title">Questions</h3>
        
           <?php if(count($question)>0){?>
           <?php for($i=0;$i< count($question);$i++){?>
            <div class="card" style="margin: 1%;">
               <div class="col-sm-3 col-sm-offset-1 hidden-xs" style="margin:15px;">
                   <img src="<?php echo base_url();?>images/question_img/<?php echo $question[$i]['image']?>" alt="..." class="img-thumbnail" style="height: 100%"/>
               </div>
               <div class="col-sm-6 col-xs-4" style="margin-top:10px;">
                 <h4  class="text-center card-title" ><?php echo $question[$i]['text']?></h4>
               </div>
                <div class="col-xs-2 " style="margin-top:30px;">
                    <h3 class="card-title" style="color:#00bcd4;"><?php echo $question[$i]['time']?>&nbsp;Sec</h3>
                </div>
            </div>
           <?php } ?>
           <?php }else{ ?>
       <style media="screen">
         #hide{
           display: none;
         }
       </style>
          <div><img class="img-responsive" src="<?php echo base_url();?>images/No-question.png"/> </div>
      <?php  }?>
    </div>
   </div>
</div>