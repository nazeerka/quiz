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

<div class="container">
              <div class="row">
                <div class="col-md-12">
              <div class="box-header">
                  <h2 class="title">Questions
                  <div class="pull-right">
                      <a href="<?php echo base_url()?>question/new_question/<?php echo $quiz['0']['id']?>"><input type="button" class="btn btn-primary gradi" id="new_question" value=" New Question"></a>
                  </div></h2>
              </div>
              </div>
              </div>
              <div class="row">
            <div class="col-md-12">
              <?php if(count($question)>0){?>
              <table id="cart" class="table table-hover table-condensed card" >
                <thead>
                  <tr>
                    <th style="width:62%">Text</th>
                    <th style="width:10%">Source</th>
                    <th style="width:10%">Time</th>
                    <th style="width:6%" class="text-center">Edit</th>
                    <th style="width:6%" class="text-center">Remove</th>
                    <th style="width:6%" class="text-center">Duplicate</th>
                  </tr>
                </thead>
                <tbody>
                    <?php for($i=0;$i< count($question);$i++){?>
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="<?php echo base_url();?>images/question_img/<?php echo $question[$i]['image']?>" alt="..." class="img-thumbnail" /></div>
                        <div class="col-sm-10">
                          <h4 class="nomargin"><?php echo $question[$i]['text']?></h4>
                        </div>
                      </div>
                    </td>
                    <td>
                        <?php echo $question[$i]['source']?>
                    </td>
                    <td class="text-center">
                        <label>
                          <?php echo $question[$i]['time']?>
                        </label>
                    </td>
                    <td class="actions">
                      <a href="<?php echo base_url().'question/show_edit_question/'.$question[$i]['id']?>"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a>
                      </td>
                     <td class="actions">

                      <a id="delete_question" href="<?php echo base_url().'question/delete_question/'.$question[$i]['id']?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>

                    </td>
                     <td class="actions">
                        <a href="<?php echo base_url().'question/duplicate_question/'.$question[$i]['id']?>"><button class="btn btn-success btn-xs"><i class="fa fa-files-o"></i></button></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
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

<style>
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
    vertical-align: middle;
    }

    @media screen and (max-width: 600px) {
    table#cart tbody td .form-control {
    width: 20%;
    display: inline !important;
    }
    .actions .btn {
    width: 36%;
    margin: 1.5em 0;
    }
    .actions .btn-info {
    float: left;
    }
    .actions .btn-danger {
    float: right;
    }
    table#cart thead {
    display: none;
    }
    table#cart tbody td {
    display: block;
    padding: .6rem;
    min-width: 320px;
    }
    table#cart tbody tr td:first-child {
    background: #333;
    color: #fff;
    }
    table#cart tbody td:before {
    content: attr(data-th);
    font-weight: bold;
    display: inline-block;
    width: 8rem;
    }
    table#cart tfoot td {
    display: block;
    }
    table#cart tfoot td .btn {
    display: block;
    }
    }
</style>
<script>
$(document).ready(function() {
        $('#delete_question').click(function(){

        $('#smallAlertModal').modal('show');
//        $.ajax({
//        type: "POST",
//        url: base_url+"sub_task/make_sub_task_done",
//        data: {id:$("#sub_task_id").val()},
//        dataType: "text",
//        cache:false,
////        async: false,
//        success:
//            function(data){
//                $('#complete_sub_task').modal('hide');
//                $("#jqGrid").setGridParam({rowNum:20,datatype:"json" }).trigger('reloadGrid');
//            }
//        });
    });
});
</script>
