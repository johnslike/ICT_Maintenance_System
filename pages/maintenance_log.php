<?php

require_once('class/ICT_Maintenance_db.php');
$id = $_GET['id'];
$store->add_parts($_POST);
// $reports = $store->get_parts();
$status = $store->get_all_log($id);
$user = $store->get_single_property_code($id);
$parts = $store->get_single_parts($id);

$userdetails = $store->get_userdata();

if(isset($userdetails)){
    if($userdetails['access'] !="Admin"){
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ICT Maintenance Record System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- SweetAlert2 -->
     <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->


  <div class="wrapper">
  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      </ul>
      <div class="col-sm-12">
            <h1><center><b>ICT MAINTENANCE REPORT</b><center></h1>
          </div>
</nav>
</div>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/ict.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block"><?php echo $userdetails['fullname'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
              ICT maintenance record
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_enduser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="search_property_code.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maintenance Record</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="taandcorrective.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TA and Corrective Record</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                ICT maintenance record
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_employee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maintenance record list</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="search_property_code.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add task done</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="maintenance_report.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ICT Maintenance Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="taandcorrective.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TA and Corrective Report</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin_register.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="setting_library.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Library</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
              
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>ICT Maintenance Record</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Maintenance Report</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
      
      <div class="col-md-2">
        <div class="card card-success">
          <a class = "btn btn bg-gradient-secondary btn-md" href = "maintenance_report.php"><i class = "fas fa-search"></i> Search user</a>
          </div>
          </div>
          <div class="col-md-2">
          <div class="card card-primary">
          <a class = "btn btn-block bg-gradient-primary btn-md" href="" data-toggle="modal" data-target="#addparts"><i class = "fas fa-plus"></i>  Add replace parts</a>
        </div>
    </div>

    

    <div class="col-md-2">
          <div class="card card-primary">
          <a class = "btn btn-block bg-gradient-info btn-md" target="_blank" href="print_maintenance_log.php?id=<?php echo $user['id']?>"><i class = "fas fa-print"></i>  Print record</a>
          
        </div>
    </div>
    </div>
      </div><!-- /.container-fluid -->


    <section class="content">



    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!-- <i class="fas fa-text-width"></i> -->
                  <center>ICT MAINTENANCE REPORT</center>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


              <dl class="row ">
              <dd class="col-sm-2">ICT PROPERTY CODE:</dt>
              <dt class="col-sm-4"><?= $user['ict_property_code']?></dd>
              <dd class="col-sm-2">SERIAL NO:</dt>
              <dt class="col-sm-4"><?= $user['serial_no']?></dd>
              <dd class="col-sm-2">TYPE:</dt>
              <dt class="col-sm-2"><?= $user['type']?></dd>
              <dd class="col-sm-2">BRAND:</dt>
              <dt class="col-sm-2"><?= $user['brand']?>
              <dd class="col-sm-2">BRIEF SPECS:</dt>
              <dt class="col-xs-2"><?= $user['brief_specs']?>
              <dd class="col-sm-2">DATE ACQUIRED:</dt>
              <dt class="col-sm-2"><?= $user['date_acquired']?>
              <dd class="col-sm-2">MODE OF ACQUISITION:</dt>
              <dt class="col-sm-2"><?= $user['acquisition']?>
              <dd class="col-sm-2">END-USER:</dt>
              <dt class="col-xs-2"><?= $user['enduser']?>
              <dd class="col-sm-2">DIVISION:</dt>
              <dt class="col-sm-2"><?= $user['division']?>
              <dd class="col-sm-2">SECTION:</dt>
              <dt class="col-sm-2"><?= $user['section']?>
              </dd>
            </dl>


            <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Status log</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>

                  
                  
                    <tr>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Reason</th>
                      <th>Date of status</th>
                    </tr>
                  </thead>
                  <tbody>
                
                  <?php
                  if (is_array($status) || is_object($status))
                   foreach($status as $statu){?>
                    <tr>
                      
                      <td><?= $statu['status'];?></td>
                      <td><?= date("M d, Y", strtotime($statu['date']));?></td>
                      <td><?= $statu['action'];?></td>
                      <td><?= $statu['reason'];?></td>
                      
                    </tr>
                    
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Replace Parts</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Replace parts</th>
                      <th>Date</th>
                      <th>Done by</th>
                      <th>Affirmed by</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  if (is_array($parts) || is_object($parts))
                  foreach($parts as $part){?>
                  <tr>
                    <td><?= $part['parts'];?></td>
                    <td><?= date("M d, Y", strtotime($part['date']));?></td>
                    <td><?= $part['doneby'];?></td>
                    <td><?= $part['affirmedby'];?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
     
     
      </div><!-- /.container-fluid -->
    </section>
              

      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>





  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <b>Department of Health</b> <small>SOCCSKSARGEN Region</small>
    </div>
    <strong>ICT Maintenance Record System</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page Script -->
<script src="../plugins/sweetalert/sweetalert.min.js"></script>



<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  // $('.nav-tabs a:#custom-content-above-home').tab('show')
  // $('.nav-tabs a[href="#custom-content-above-messages"]').tab('show')
  
  
</script>


<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.saveSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Task successfully saved'
      })
    });
  });

  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.updateSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Successfully updated'
      })
    });
  });


  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultError').click(function() {
      Toast.fire({
        type: 'error',
        title: 'Successfully deleted'
      })
    });
  });
  
    </script>


<div class="modal fade" id="addparts">
        <div class="modal-dialog modal-lg">
        
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD REPLACE PARTS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="">
            <div class="card-body">
            
              <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                  <span style="color:red">* </span><label>Add replace parts:</label>
                  <input type="hidden" class="form-control" name="employee_id" id="employee_id" value="<?= $user['id'];?>">
                  <input type="text" class="form-control" name="parts" id="parts" placeholder="Enter ..." required="required">
                  <!-- <select id="" class="select2bs4" name="task" multiple="multiple" data-placeholder="Select a task done"
                          style="width: 100%;">
                    <option value="Checked disk,">Checked disk, </option>
                    <option value="Update antivirus,">Update antivirus, </option>
                    <option value="Activate operating system,">Activate operating system, </option>
                    <option value="Activate microsoft office,">Activate microsoft office, </option>
                  </select> -->
                </div>
                </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Date:</label>
                        <input type="date" value="" class="form-control" name="date" id="date" required="required">
                      </div>
                    </div>

                      </div>


                      <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Done by:</label>
                        <input type="text" class="form-control" name="doneby" id="doneby" placeholder="Enter ...">
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
              <button type="submit" name="add_parts" class="btn btn-primary">Save data</button>
            </div>
          </div>
          </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



</body>
</html>
