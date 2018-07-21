<form class="colorlib-form" action="<?php echo base_url()?>quiz/add_quiz" method="POST" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="padding-left:4%;">
                <h4 class="title">Quiz Image</h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                        <img src="<?php echo base_url();?>images/image_placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                        <span class="btn btn-raised btn-round btn-default btn-file gradi">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="imageUpload" id="imageUpload"/>
                        </span>
                        <a href="" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-md-7 my-card">
                    <!--                 inputs -->
                    <h3 class="title">Quiz Details</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input id="title" name="title" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                    <label class="control-label">Source</label>
                                    <input id="source" name="source" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div >
                                <h3 class="title">DESCRIPTION</h3>
                            </div>
                            <div class="form-group label-floating">
                                    <label class="control-label"> You can write your text here...</label>
                                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="title">
                                <h3 class="title">Full Description</h3>
                            </div>
                            <div class="form-group label-floating">
                                    <label class="control-label"> You can write your text here...</label>
                                    <textarea id="description_full" name="description_full" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                      </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <select  id="category_id" name="category_id" class="selectpicker" data-style="select-with-transition"  title="Choose Category" data-size="7" required>
                                    <?php
//                                     $first_key = key($category);
//                                        echo $first_key;
                                        for($i=0;$i<count($category);$i++)
                                        {
                                            $selected = '';
                                            if($i==0)
                                              $selected = 'selected';
                                            echo "<option value='".$category[$i]['id']. "' ".$selected.">".$category[$i]['name']. "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select  id="type_id" name="type_id" class="selectpicker" data-style="select-with-transition"  title="Choose Type" data-size="7" required>
                                    <?php
                                        for($i=0;$i<count($type);$i++)
                                        {
                                            $selected = '';
                                            if($i==0)
                                            $selected = 'selected';
                                            echo "<option value='".$type[$i]['id']. "' ".$selected.">".$type[$i]['name']. "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select  id="groups_id" name="groups_id" class="selectpicker" data-style="select-with-transition"  title="Choose Group" data-size="7" required>
                                    <?php
                                        for($i=0;$i<count($groups);$i++)
                                        {
                                            $selected = '';
                                            if($i==0)
                                            $selected = 'selected';
                                            echo "<option value='".$groups[$i]['id']. "' ".$selected.">".$groups[$i]['name']. "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-4">
<!--                               <div class="togglebutton">
                                   <label>
                                       <input id="visibility" name="visibility" type="checkbox" checked>
                                           Visibility (Public or Private)
                                   </label>
                               </div>-->
                                <select  id="visibility" name="visibility" class="selectpicker" data-style="select-with-transition" data-size="7" required>
                                    <option id="public" name='public' selected="selected">public</option>
                                    <option id="private" name='private'>private</option>
                                </select>
                           </div>
                       </div>
                        <input type="submit" value="Save" class="btn btn-primary btn-round float-right gradi">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
