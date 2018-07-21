<form class="colorlib-form" action="<?php echo base_url()?>question/edit_question" method="POST" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 " style="padding-left:4%;">
                <h4><small>Question Image</small></h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                        <img src="<?php echo base_url();?>images/question_img/<?php echo $question[0]["image"]?>" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                        <span class="btn btn-raised btn-round btn-default btn-file gradi">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="imageUpload" id="imageUpload" />
                        </span>
                        <a href="" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-md-7 my-card">
                    <h3>Question Details</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                    <label class="control-label">Text</label>
                                    <input id="text" name="text" type="text" class="form-control" required value="<?php echo $question[0]["text"]?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                    <label class="control-label">Source</label>
                                    <input id="source" name="source" type="text" class="form-control" value="<?php echo $question[0]["source"]?>">
                            </div>
                        </div>
                    </div>
                   
                        <div class="row">
                            <div class="col-md-3">
                            <!--<label>Time Limit</label>-->
                                <select  id="time" name="time" class="selectpicker" data-style="select-with-transition"  title="Time Limit" data-size="7" required>
                                    <option id="10" name="10" <?php if($question['0']['time'] == '10') echo "selected";?>>10</option>
                                    <option id="20" name="20" <?php if($question['0']['time'] == '20') echo "selected";?>>20</option>
                                    <option id="30" name="30" <?php if($question['0']['time'] == '30') echo "selected";?>>30</option>
                                    <option id="40" name="40" <?php if($question['0']['time'] == '40') echo "selected";?>>40</option>
                                    <option id="50" name="50" <?php if($question['0']['time'] == '50') echo "selected";?>>50</option>
                                    <option id="60" name="60" <?php if($question['0']['time'] == '60') echo "selected";?>>60</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h3>The Answers</h3>
                            <?php for($i=0;$i< count($answer);$i++){?>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-8">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Text</label>
                                            <input type="text" class="form-control" id="answer_<?php echo $i+1;?>" name="answer_<?php echo $i+1;?>" value="<?php echo $answer[$i]['text'];?>" <?php if($i+1 <= 2) echo "required";?>/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Point</label>
                                            <input type="text" class="form-control" id="point_<?php echo $i+1;?>" name="point_<?php echo $i+1;?>" value="<?php echo $answer[$i]['point'];?>"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-2">
                                        <div class="togglebutton" style="margin: 27px 0 0 0;">
                                            <label>
                                                <input type="checkbox" id="correct_<?php echo $i+1?>" name="correct_<?php echo $i+1?>" <?php if($answer[$i]['correct'] == '1') echo "checked";?>/>
                                                WRight ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                             for($i=count($answer);$i< 4 ;$i++){?>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-8">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Text</label>
                                            <input type="text" class="form-control" id="answer_<?php echo $i+1?>" name="answer_<?php echo $i+1?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Point</label>
                                            <input type="text" class="form-control" id="point_<?php echo $i+1?>" name="point_<?php echo $i+1?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-2">
                                        <div class="togglebutton" style="margin: 27px 0 0 0;">
                                            <label>
                                                <input type="checkbox" id="correct_<?php echo $i+1?>" name="correct_<?php echo $i+1?>">
                                                WRight ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <input type="hidden" id ="question_id" name="question_id" value ="<?php echo $question[0]['id']?>" >
                        <input type="hidden" id ="quiz_id" name="quiz_id" value ="<?php echo $question[0]['quiz_id']?>" >
                        <input type="hidden" id ="ans_num" name="ans_num" value ="4" >
                        <input type="submit" value="Save" class="btn btn-primary btn-round float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
