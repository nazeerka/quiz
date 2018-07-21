<div class="container">
      <h2 class="title wow bounceInUp " data-wow-duration="2s"  data-wow-offset="100" style="text-align:center;">
     All Categories</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php for ($i=0;$i < count($category);$i++)
                {?>
                <div class="col-md-4">
                        <div class="card card-background zoom-effect" style="background-image: url('<?php echo base_url();?>images/category_img/<?php echo $category[$i]['image']?>')">
                                <div class="card-content">
                                        <!--<h6 class="category text-info"><?php echo $category[$i]['name']?></h6>-->
                                        <h2 class="card-title" style="margin-top:50px;"><?php echo $category[$i]['name']?></h2>
                                        <a href="<?php echo base_url().'quiz/quiz_category/'.$category[$i]['id']?>" class="btn btn-danger btn-round" style="margin-top:40px;">
                                                <i class="material-icons">subject</i> More
                                        </a>
                                </div>
                        </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<style>
.zoom-effect {
    background-position: center center;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -moz-transition: all 0.5s;
    background-size: 400px 400px;
}

.zoom-effect:hover {
    background-size: 600px 500px;
    background-position: center center;
     background-color: rgba(0, 0, 0, 0.7);
}

</style>