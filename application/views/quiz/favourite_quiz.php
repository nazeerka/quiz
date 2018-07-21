<div class="cards ecommerce-page">
  <div class="container">
    <h2  class="title wow bounceInUp " data-wow-duration="2s"  data-wow-offset="100" style="text-align:center;">
     My Favorite Quiz</h2>
    <div class="row">
          <?php
          if(count($quiz)>0){ ?>
        <div id="quiz_div" class="col-md-12">
            <div class="row">
            <?php for ($j=0;$j < 4;$j++){ ?>
              <div class="col-md-3">
                <?php
              for ($i=$j;$i < count($quiz);$i+=4){?>
                <div class="card card-profile" id="<?php echo $quiz[$i]['id']?>">
                  <div class="card-image">
                    <a>
                      <img class="img" src="<?php echo base_url();?>images/quiz_img/<?php echo $quiz[$i]['image']?>" />
<!--                      <div class="card-title">
                        Tania Andrew
                      </div>-->
                    </a>
                  </div>
                  <div class="card-content">
                    <h6 class="category text-info"><?php echo $quiz[$i]['title']?></h6>
                    <p class="card-description">
                      <?php echo $quiz[$i]['description_full']?>
                    </p>
                    <div class="footer" style="">
                        <div class="author" style="margin-right: 45%;">
                        <a>
                           <img src="<?php echo base_url();?>images/image_profile/<?php echo $quiz[$i]['user_image']?>" alt="..." class="avatar img-raised">
                           <span><?php echo $quiz[$i]['user_name']?></span>
                        </a>
                        </div>
                        <div class="stats">
                             <button class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right favourite" style="width: 20px;min-width: 15px;"  rel="tooltip" title="Remove from wishlist" data-placement="left">
                                <i class="material-icons">favorite</i> 
                             </button><div style="color:#e01d5f;text-align: right;font-size: 20px;"><?php echo $quiz[$i]['count_favorite']?></div>
			</div>
                    </div>
                        <a href="<?php echo base_url().'quiz/quiz_details/'.$quiz[$i]['id']?>" class="btn btn-info btn-round" style="margin-left: 15%;" id="<?php echo $quiz[$i]['id']?>">Play</a>
                  </div>
                </div>
             <?php } ?>
             </div>
             <?php }
              } else { ?>
                <style media="screen">
                  #hide{
                    display: none;
                  }
                </style>
                <div><img class="img-responsive" src="<?php echo base_url();?>images/No-result.png"/> </div>
             <?php } ?>
            </div>
        </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#quiz_div button.favourite').click(function(){
//       var quiz_id =  $(this).parent().prev('a').attr('id');
       var quiz_id =  $(this).parent().parent().parent().parent().attr('id');
            $(this).children('i').text("favorite");
            $.ajax({
            type: "POST",
            url: base_url+"quiz/delete_favourite_quiz",
            data: {quiz_id:quiz_id},
            dataType: "text",
            cache:false,
            async: false,
            success:
                    function(){
                        $("div.card-profile#"+quiz_id).fadeOut();
                    }
            });
    });
});
</script>
