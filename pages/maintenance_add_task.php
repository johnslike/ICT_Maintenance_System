<?php

require_once('class/ICT_Maintenance_db.php');
$id = $_GET['id'];
$store->add_task_maintenance($_POST);
$store->href_sign($_POST);
$user = $store->get_single_property_code($id);
$tasks = $store->get_all_task($id);
$user_id = $store->get_userid();
$userdetails = $store->get_userdata();

if(isset($userdetails)){
  if($userdetails['access'] !="User"){
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ICT Maintenance Record System</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> ICT MAINTENANCE RECORD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a type="button" class="btn btn btn-primary" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
              <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <?php
                  
               
                  $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

                
                  
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                $sql = "SELECT * FROM user ";
                $accom = $con->query($sql);
                $row1 = $accom->fetch_assoc();
              


                ?>
    

    <!-- Main content -->
    <div class="content">
      <div class="container">
      <section class="content">
 
 <div class="card-header">
 <div class="row">
 

 <div class="col-md-2">
   <div class="card card-success">

     <a class = "btn btn bg-gradient-info btn-md" href="maintenance.php?id=<?php echo $userdetails['id'];?>"><i class = "fas fa-search"></i> Search user</a>
     </div>
     </div>
     <div class="col-md-2">
     <div class="card card-primary">
     <a class = "btn btn-block bg-gradient-primary btn-md" href="" data-toggle="modal" data-target="#addtask"><i class = "fas fa-user-plus"></i> Add task</a>
     
   <!-- /.card -->
 
   </div>
   </div>
   
</div>
</div>
</section>
<div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          
          <!-- /.card-header -->
          <div class="card-body">


                <dl class="row ">




              <dd class="col-sm-2">ICT PROPERTY CODE:</dd>
              <dt class="col-sm-4"><?= $user['ict_property_code']?></dt>
              <dd class="col-sm-2">SERIAL NO:</dd>
              <dt class="col-sm-4"><?= $user['serial_no']?></dt>
              <dd class="col-sm-2">TYPE:</dd>
              <dt class="col-sm-2"><?= $user['type']?></dt>
              <dd class="col-sm-2">BRAND:</dd>
              <dt class="col-sm-2"><?= $user['brand']?></dt>
              <dd class="col-sm-2">BRIEF SPECS:</dd>
              <dt class="col-xs-2"><?= $user['brief_specs']?></dt>
              <dd class="col-sm-2">DATE ACQUIRED:</dd>
              <dt class="col-sm-2"><?= $user['date_acquired']?></dt>
              <dd class="col-sm-2">MODE OF ACQUISITION:</dd>
              <dt class="col-sm-2"><?= $user['acquisition']?></dt>
              <dd class="col-sm-2">END-USER:</dd>
              <dt class="col-xs-2"><?= $user['enduser']?></dt>
              <dd class="col-sm-2">DIVISION:</dd>
              <dt class="col-sm-2"><?= $user['division']?></dt>
              <dd class="col-sm-2">SECTION:</dd>
              <dt class="col-sm-2"><?= $user['section']?></dt>
            </dl>
         
            <hr>

            <div class="table-responsive p-0" style="height: 500px;">
            <table class="table table-bordered">
              <thead style="background-color:#A4A4A4;">                  
                <tr>
                  <th>TASKS</th>
                  <th style="width: 110px">DATE</th>
                  <th>PREVENTIVE/CORRECTIVE</th>
                  <th>DONE BY</th>
                  <th>AFFIRMED BY END-USER</th>
                  <th>SIGNATURE</th>
                  <th style="width: 140px">ACTION</th>
                </tr>
              </thead>
              <tbody>
              <?php
              if (is_array($tasks) || is_object($tasks))
              foreach($tasks as $task){?>
                <tr>
                  <td><?= $task['tasks'];?></td>
                  <td><?= date("M d, Y", strtotime($task['date']));?></td>
                  <td><?= $task['action_taken'];?></td>
                  <td><?= $task['doneby'];?></td>
                  <td><?= $task['affirmedby'];?></td>
                  <td><center><img src = "photos/<?php echo $task['signature']?>" height = "50" width = "150"/></center></td>
                  <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $row1['id']?>"><i class="fas fa-pencil-alt"></i> Edit</button> -->
                  <td>
                  <div class="row">
                  <form method="post">
                         <input type="hidden" name="task_id" value="<?php echo $task['id'];?>"> </input>
                        <button name="add_sign"  class = "btn btn-success btn-sm" <?php if ($task['signature'] > '0'){ ?> hidden <?php } ?>><i class = "fas fa-signature"></i> Add</button>
                        </form>
                  <a class = "btn btn-info btn-sm" href="sign_update_index.php?id=<?php echo $task['id'];?>" style="margin-left:4px"><i class = "fas fa-edit"></i> Edit</a></td>
                  </div>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            </div>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<div class="modal fade" id="addtask">
        <div class="modal-dialog modal-lg">
        
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD TASK DONE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="">
            <div class="card-body">
            
              <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                  <span style="color:red">* </span><label>Add task done:</label>
                  <input type="hidden" class="form-control" name="employee_id" id="employee_id" value="<?= $user['id'];?>">
                  <input type="text" class="form-control" name="task" id="task" placeholder="Enter ..." required="required">
    
                </div>
                </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Date:</label>
                        <input type="date" value="" class="form-control" name="date" id="date" required="required">
                      </div>
                    </div>
                    
                    <div class="col-sm-3">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Action:</label>
                        <select class="form-control" name="action" id="action" required="required">
                          <option value="">--Select--</option>
                          <option value="Preventive">Preventive</option>
                          <option value="Corrective">Corrective</option>
                        </select>
                        </div>
                      </div>
                      </div>


                      <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                        <span style="color:red">* </span><label>Done by:</label>
                        <input type="text" class="form-control" value="<?php echo $userdetails['fullname'];?>" name="doneby" id="doneby" placeholder="Enter ..." readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Affirmed by:</label>
                        <input type="text" class="form-control" name="affirmed" id="affirmed" placeholder="Enter ..." required="required">
                      </div>
                    </div>
                    </div>       
              
              
            <!-- /.card-body -->
          
            

          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="add_task" class="btn btn-primary">Save data</button>
            </div>
          </div>
          </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script src="../plugins/sweetalert/sweetalert.min.js"></script>

<script type="text/javascript">

$(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 10000
    });

    $('.saveSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Task successfully saved'
      })
    });
  });
  </script>
</body>
</html>
