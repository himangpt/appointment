<?php include_once 'include/config.php'; 
session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";
}
?>
<?php include_once 'header.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-5">
                        <h4 class="page-title">Departments</h4>
                    </div>
                    <div class="col-sm-7 col-7 text-right m-b-30">
                        <a href="" class="btn btn-primary btn-rounded"  name="add" id="add" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Department</a>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="insert_form">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input class="form-control" type="text" name="departmentname" id="departmentname">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="description" id="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Department Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" checked>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="m-t-20 text-center"> 
                            <button class="btn btn-primary submit-btn" name="insert" id="insert">Create Department</button>
                            <input type="hidden" name="departmentid" id="departmentid" /> 
                            </div>
                        </form>
      </div>
    </div>
  </div>
</div>

                </div>
                   <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">  
                            <div class="form-group">
                                <label>Department Name</label>
                                <input class="form-control" type="text" name="update_departmentname" id="update_departmentname">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="update_description" id="update_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Department Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_status" id="product_active" value="Active" checked>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="update_status" id="product_inactive" value="Inactive">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="m-t-20 text-center"> 
                            <button class="btn btn-primary submit-btn" name="edit" id="edit">Edit Department</button>
                            <input type="text" name="hidden_departmentid" id="hidden_departmentid" /> 
                            </div>
                        </form>
      </div>
    </div>
  </div>
</div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        <th>Department Description</th>
                                        <th>Status</th>
                                     <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $query=mysqli_query($con,"SELECT * from department ORDER BY departmentid");
                      $sn=0;
                      while($row=mysqli_fetch_array($query)){
                      extract($row);              
                          ?>
                       <tr>
                        <td><?php 
                          $sn = $sn+1; 
                          echo $sn;
                      ?></td>
                             
                                        <td><?= $departmentname; ?></td>
                                        <td><?= $description; ?></td>
                                        <?php if($status=='Active'){ ?>
                                        <td><span class="custom-badge status-green"><?=$status;?></span></td>
                                        <?php } ?>
                                        <?php if($status=='Inactive'){ ?>
                                            <td><span class="custom-badge status-red"><?=$status;?></span></td>
                                        <?php } ?>
                                         <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item edit_data" href="#" id="<?php echo $departmentid; ?>"  ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" id="mybutton" href="" data-toggle="modal" data-target="#delete_department" data-id="<?=$departmentid; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>  
                                    </tr>
                                    <?php } ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="delete_department" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Department?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger" id="confirmbutton" >Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once 'footer1.php'; ?>
<script type="text/javascript">
 $(document).ready(function(){
$(document).on('click', '.edit_data', function() {
        var departmentid = $(this).attr('id');
       $('#hidden_departmentid').val(departmentid);
        $.ajax({
            url: "depbackend.php",
            method: "POST",
            data: {
                   departmentid: departmentid
            },
            success: function(data) {
                var user = JSON.parse(data);
                $('#update_departmentname').val(user.departmentname);
                $('#update_description').val(user.description);
                $('#product_active').val(user.status);
                $('#product_inactive').val(user.status);
                $('#update_modal').modal("show");

            }
        });
    });
$('#edit').click(function(){
var departmentname = $('#update_departmentname').val();
  var description =  $('#update_description').val();
  var status = $('input[name="update_status"]:checked').val();
  var hidden_departmentid =$('#hidden_departmentid').val();
  $.post(
         "depbackend.php",
         {hidden_departmentid : hidden_departmentid,
          departmentname : departmentname,
          description : description,
          status : status,
          },
          function(data){
            $("#update_modal").modal("hide");
            window.location.href='department.php';
          }
    );
});
$('#insert').click(function(){
var departmentname = $('#departmentname').val();
var description = $('#description').val();
var status = $("input[name='status']:checked").val();
$.ajax({
url : "depbackend1.php",
type : "POST",
data : { departmentname : departmentname,
         description : description,
         status : status,
       },
 success : function(response){
           console.log(response);
           if(response == 1)
    {
        swal("Email already exist","try another","error");
    }
      else if(response == 2)
      {
        swal("Registration successfull","please login","success");
        $('#exampleModal').modal('hide');
        window.open('department.php','_self');
          
      }
      else
      {
       console.log("error");
      }
         
 }      
});
});
$(document).on('click', '#mybutton', function(){
    var ID = $(this).data('id');
    $('#confirmbutton').data('id', ID); //set the data attribute on the modal button
});
$('#confirmbutton').click(function(){
    var ID = $(this).data('id');
    $.ajax({
        url: "depbackend.php",
        type: "POST",
        data:{id : ID},
        success: function (data) {
          console.log(data);
          $("#delete_department").modal('hide');
          window.location.href='department.php';
        }
      });
});
});   
</script>