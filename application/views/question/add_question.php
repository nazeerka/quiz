 <!--<link rel="stylesheet" href="<?php echo base_url();?>css/mathquill.css">-->
<!--<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>-->
<form class="colorlib-form" action="<?php echo base_url()?>question/add_question" method="POST" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="padding-left:4%;">
                <h4 class="title">Question Image</h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                        <img src="<?php echo base_url();?>images/image_placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                        <span class="btn btn-raised btn-round btn-default btn-file gradi">
                            <span class="fileinput-new ">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="imageUpload" id="imageUpload" />
                        </span>
                        <a href="" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-md-7 my-card" >
                    <h3 class="title">Question Details</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group label-floating">
                                    <label class="control-label">Text</label>
                                    <input id="text" name="text" type="text" class="form-control" required>
                                    <!--<span id="answer"></span>-->
                                    
<!--                                    <span class="math-tex">\( \sqrt{\frac{a}{b}} \)</span>-->
                                    <!--<textarea name="editor1"></textarea>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group label-floating">
                                    <label class="control-label">Source</label>
                                    <input id="source" name="source" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-2 col-sm-offset-1">
                        <!--<label>Time Limit</label>-->
                            <select  id="time" name="time" class="selectpicker" data-style="select-with-transition"  title="Time Limit" data-size="7" required>
                                <option id="10" name="10">10</option>
                                <option id="20" name="20">20</option>
                                <option id="30" name="30">30</option>
                                <option id="40" name="40">40</option>
                                <option id="50" name="50">50</option>
                                <option id="60" name="60">60</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <h3 class="title">The Answers</h3>
                        <?php for($i=0;$i< 4;$i++){?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Text</label>
                                        <input type="text" class="form-control" id="answer_<?php echo $i+1;?>" name="answer_<?php echo $i+1;?>" <?php if($i+1 <= 2) echo "required";?>>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-2">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Point</label>
                                        <input type="text" class="form-control" id="point_<?php echo $i+1;?>" name="point_<?php echo $i+1;?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-2">
                                    <div class="togglebutton" style="margin: 27px 0 0 0;">
                                        <label>
                                            <input type="checkbox" id="correct_<?php echo $i+1;?>" name="correct_<?php echo $i+1;?>">
                                            WRight ?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="hidden" id ="quiz_id" name="quiz_id" value ="<?php echo $quiz[0]['id']?>" >
                    <input type="hidden" id ="ans_num" name="ans_num" value ="4" >
                    <input type="submit" value="Save" class="btn btn-primary btn-round float-right gradi">
                </div>
            </div>
        </div>
    </div>
</form>

<script>
//        CKEDITOR.plugins.addExternal( 'abbr', '/myplugins/abbr/', 'plugin.js' );
//        config.mathJaxLib = '//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML';
//        CKEDITOR.replace( 'text' );
</script>
<!--<script src="<?php echo base_url();?>js/mathquill.js" type="text/javascript"></script>-->
<script>
    
//    var MQ = MathQuill.getInterface(2);
////  var problemSpan = document.getElementById('text');
////  MQ.StaticMath(problemSpan);
//  var answerSpan = document.getElementById('answer');
//  var answerMathField = MQ.MathField(answerSpan, {
//    handlers: {
//      edit: function() {
//        var enteredMath = answerMathField.latex(); // Get entered math in LaTeX format
////        checkAnswer(enteredMath);
//      }
//    }
//  });
</script>
