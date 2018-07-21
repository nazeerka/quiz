<?php if(!empty($user)){?>
<!--<div class=" container">
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
</div>-->
<?php }?>

<div class="cards ecommerce-page">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
        <?php if(!empty($user)){?>
            <div class="pull-right">
               <a href="<?php echo base_url().'quiz/new_quiz'?>">
                 <input type="button" class="btn btn-primary gradi" id="new_quiz" value="New Quiz">
               </a>
            </div>
        <?php }?>
       <h3 class="section-title">Find what you need</h3>
       <div class="row searching_div">
           <div class="">
               <div class="card card-refine">
                   <div class="card-content">
                       <!-- <h4 class="card-title col-md-4"> -->
                           <div class="form-group col-md-2" style="margin:21PX 0PX;padding-bottom:0PX;">
                               <input id="search_input" name="search_input" type="text" class="form-control" placeholder="Search" required>
                           </div>
                       <!-- </h4> -->
                       <div class="panel panel-default panel-rose col-md-3">
                           <div class="panel-heading" role="tab" id="headingTwo">
                               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   <h4 class="panel-title">Category</h4>
                                   <i class="material-icons">keyboard_arrow_down</i>
                               </a>
                           </div>

                           <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                               <div class="panel-body">
                                        <div class="checkbox">
                                            <label>
                                                <input id="ALL" type="checkbox" value="" data-toggle="checkbox">
                                                All
                                            </label>
                                        </div>
                                        <?php
                                            for($i=0;$i<count($category);$i++)
                                            {
                                                $checked="";
                                                if($category[$i]['id']==$current_category)
                                                    $checked="checked";
                                                echo "<div class='checkbox'>
                                                        <label>
                                                            <input type='checkbox' id='".$category[$i]['id']. "' value='".$category[$i]['id']. "' data-toggle='checkbox' $checked>
                                                                ".$category[$i]['name']."
                                                        </label>
                                                      </div>";
                                            }
                                        ?>
                                    </div>
                                </div>
                       </div>
                       <div class="panel panel-default panel-rose col-md-3">
                           <div class="panel-heading" role="tab" id="headingThree">
                               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                   <h4 class="panel-title">Type</h4>
                                   <i class="material-icons">keyboard_arrow_down</i>
                               </a>
                           </div>
                           <!--<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">-->
                           <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                       <div class="checkbox">
                                           <label>
                                               <input id="ALL" type="checkbox" value="" data-toggle="checkbox" checked="">
                                               All
                                           </label>
                                       </div>
                                       <?php
                                           for($i=0;$i<count($type);$i++)
                                           {
                                               echo "<div class='checkbox'>
                                                       <label>
                                                           <input type='checkbox' id='".$type[$i]['id']. "' value='".$type[$i]['id']. "' data-toggle='checkbox'>
                                                               ".$type[$i]['name']."
                                                       </label>
                                                     </div>";
                                           }
                                       ?>
                                  </div>
                              </div>
                      </div>
                       <div class="panel panel-default panel-rose col-md-3">
                           <div class="panel-heading" role="tab" id="headingFour">
                               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                   <h4 class="panel-title">Group</h4>
                                    <i class="material-icons">keyboard_arrow_down</i>
                               </a>
                           </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                               <div class="panel-body">
                                       <div class="checkbox">
                                           <label>
                                               <input id="ALL" type="checkbox" value="" data-toggle="checkbox" checked="" value="All">
                                               All
                                          </label>
                                       </div>
                                      <?php
                                           for($i=0;$i<count($groups);$i++)
                                           {
                                               echo "<div class='checkbox'>
                                                       <label>
                                                           <input type='checkbox' id='".$groups[$i]['id']. "' value='".$groups[$i]['id']. "' data-toggle='checkbox'>
                                                               ".$groups[$i]['name']."
                                                       </label>
                                                     </div>";
                                           }
                                       ?>
                                   </div>
                            </div>
                       </div>
                   </div>
                   <div class="col-md-1">
                       <!--<form action="<?php echo base_url()?>quiz/search_quiz" method="post" enctype="multipart/form-data">-->
                           <!--<button id="search" name="search" rel="tooltip" class="btn btn-rose btn-round">search...</button>-->
                           <input type="hidden" id="category_search" name="category_search">
                           <input type="hidden" id="type_search" name="type_search">
                           <input type="hidden" id="group_search" name="group_search">
                           <input type="hidden" id="name_search" name="name_search">
                           <input type="submit" id="search" name="search" rel="tooltip" class="btn btn-round gradi" value="search">
                       <!--</form>-->
                   </div>
               </div><!-- end card -->
           </div>
       </div>
    </div>
  </div>
    <!--<h2 class="title wow bounceIndown" id="hide" data-wow-duration="2s"  data-wow-offset="50" style="text-align:center;">-->
     <!--Quizes For <?php echo $category['0']['name']?></h2>-->
    <div class="row">
          <?php
          if(count($quiz)>0){ ?>
        <div id="quiz_div" class="col-md-12">
            <div class="row">
            <?php for ($j=0;$j < 4;$j++){ ?>
              <div class="col-md-3">
                <?php
              for ($i=$j;$i < count($quiz);$i+=3){?>
                  <div class="card card-profile " id="<?php echo $quiz[$i]['id']?>">
                  <div class="card-image">
                    <a>
                      <img class="img" src="<?php echo base_url();?>images/quiz_img/<?php echo $quiz[$i]['image']?>" />
                  <div class="card-title">
                        <?php echo $quiz[$i]['count_question']?> Questions
                      </div>
                    </a>
                  </div>
                  <div class="card-content">
                    <h6 class="category text-info"><?php echo $quiz[$i]['title']?></h6>
                    <p class="card-description">
                      <?php echo $quiz[$i]['description_full']?>
                    </p>
                    <div class="footer">
                        <div class="author" style="float: left;">
                        <a>
                           <img src="<?php echo base_url();?>images/image_profile/<?php echo $quiz[$i]['user_image']?>" alt="..." class="avatar img-raised">
                           <span><?php echo $quiz[$i]['user_name']?></span>
                        </a>
                        </div>
                        <?php 
                        $disabled="disabled";
                        if(!empty($user)){
                            $disabled="";
                         }?>
                        <div class="stats">
                            <div style="color:#e01d5f;text-align: right;font-size: 20px;"><?php echo $quiz['0']['count_played'];?></div><i class="fa fa-dribbble" style="color:#e01d5f;text-align: right;font-size: 19px;padding:0px 2px 2px;"></i>
                             <button class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right favourite" style="width: 20px;min-width: 15px;"  rel="tooltip" title="<?php if(isset($quiz[$i]['is_favorite']))echo "Remove from wishlist"; else echo "Add To wishlist" ;?>" data-placement="left" <?php echo $disabled ;?>>
                                <i class="material-icons"><?php if(isset($quiz[$i]['is_favorite']))echo $quiz[$i]['is_favorite']; else echo "favorite_border" ;?></i> 
                             </button><div style="color:#e01d5f;text-align: right;font-size: 20px;"><?php echo $quiz[$i]['count_favorite']?></div>
			</div>
                    </div>
                     <a href="<?php echo base_url().'quiz/quiz_full_details/'.$quiz[$i]['id']?>" class="btn btn-info btn-round " style=" width:100%; text-align:center; " id="<?php echo $quiz[$i]['id']?>">Play</a>
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
                  .card .footer .stats .button .material-icons{
                          position: relative;
                          top: 4px;
                          font-size: 18px;
                  }
                   .card .footer .stats .button .material-icons div{
                          
                          color: inherit;
                  }
                  .btn.btn-fab, .navbar .navbar-nav > li > a.btn.btn-fab{
                      width: 0px;
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
    $('.card-refine').on('focusout', function () {
//    $('#collapseTwo').removeClass('collapse in');
//    $('#collapseTwo').addClass('collapse');
//    $('#collapseThree').removeClass('collapse in');
//    $('#collapseThree').addClass('collapse');
//    $('#collapseFour').removeClass('collapse in');
//    $('#collapseFour').addClass('collapse');
  });
    $('#quiz_div button.favourite').click(function(){
//       var quiz_id =  $(this).parent().prev('a').attr('id');
        var quiz_id =  $(this).parent().parent().parent().parent().attr('id');
        var icon_text = $(this).text();
        if(icon_text.trim()!='favorite'){
            $(this).children('i').text("favorite");
            $.ajax({
            type: "POST",
            url: base_url+"quiz/add_favourite_quiz",
            data: {quiz_id:quiz_id},
            dataType: "text",
            cache:false,
            async: false,
            success:
                    function(data){
                        $(this).children('i').text("favorite_border");
                    }
            });
        }
        else{
            $(this).children('i').text("favorite_border");
            $.ajax({
            type: "POST",
            url: base_url+"quiz/delete_favourite_quiz",
            data: {quiz_id:quiz_id},
            dataType: "text",
            cache:false,
            async: false,
            success:
                    function(data){
                        $(this).children('i').text("favorite");
                    }
            });
        }
    });
    
    $("#search").click(function(){
        $('#collapseTwo').removeClass('collapse in');
        $('#collapseTwo').addClass('collapse');
        $('#collapseThree').removeClass('collapse in');
        $('#collapseThree').addClass('collapse');
        $('#collapseFour').removeClass('collapse in');
        $('#collapseFour').addClass('collapse');
//        $( 'input[type="checkbox"]' ).prop('checked', true);
        var search =$("#search_input").val();
        var category = [];
        var type = [];
        var groups = [];
//        var isBreak1 =false;
//        $('#collapseThree input:checked').each(function() {
//                if($(this).attr('id')=='ALL'){
//                     isBreak1=true;
//                     type = [];
//                }else if(!isBreak1){
//                     type.push($(this).attr('id'));
//                }
//        });
        $('#collapseTwo input:checked').each(function() {
                if($(this).attr('id')=='ALL'){
                     return false;
                }else {
                     category.push($(this).attr('id'));
                }
        });
//        category.push(<?php echo $category['0']['id']?>);
        $('#collapseThree input:checked').each(function() {
                if($(this).attr('id')=='ALL'){
                     return false;
                }else {
                     type.push($(this).attr('id'));
                }
        });
        $('#collapseFour input:checked').each(function() {
                if($(this).attr('id')=='ALL'){
                     return false;
                }else {
                     groups.push($(this).attr('id'));
                }
        });
        $("#category_search").val(category);
        $("#type_search").val(type);
        $("#group_search").val(groups);
        $("#name_search").val(search);
        $.ajax({
        type: "POST",
        url: base_url+"quiz/search_quiz1",
        data: {name_search:$("#search_input").val(),category_search:category,type_search:type,group_search:groups},
        dataType: "text",
        cache:false,
        success:
            function(data){
              data=JSON.parse(data);
               $("#quiz_div").empty();
                if(data.length>0){
                    $.each(data, function () {
                             $('#quiz_div').append('<div class="col-md-3"> <div class="card card-profile"><div class="card-image"><a><img class="img" src="'+ base_url +'images/quiz_img/'+ this.image + '"/><div class="card-title">'+ this.count_question + ' Questions</div></a></div><div class="card-content"><h6 class="category text-info">'+this.title+'<h6><p class="card-description">'+this.description_full+'</p><div class="footer"><div class="author" style="float: left;"><a><img src="'+ base_url +'images/image_profile/'+this.user_image+'" alt="..." class="avatar img-raised"><span>'+this.user_name+'</span></a></div><?php $disabled="disabled"; if(!empty($user)){ $disabled=""; }?><div class="stats"><div style="color:#e01d5f;text-align: right;font-size: 20px;">'+this.count_played+'</div><i class="fa fa-dribbble" style="color:#e01d5f;text-align: right;font-size: 19px;padding:0px 2px 2px;"></i><button class="btn btn-rose btn-simple btn-fab btn-fab-mini btn-round pull-right favourite" style="width: 20px;min-width: 15px;"  rel="tooltip" title="Add To wishlist" data-placement="left" <?php echo $disabled ;?>><i class="material-icons">'+this.is_favorite+'</i></button><div style="color:#e01d5f;text-align: right;font-size: 20px;">'+this.count_favorite+'</div></div></div></div><a href="'+base_url+'quiz/quiz_full_details/'+this.id+'" class="btn btn-info btn-round " style=" width:100%; text-align:center; " id="'+this.id+'">Play</a></div></div>');
                        });
                }else{
                   $('#quiz_div').append('<div><img class="img-responsive" src="'+base_url+'images/No-result.png"></div>');
                }
            }  
        });
    });
});
</script>
