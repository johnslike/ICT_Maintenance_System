<?php

require_once('class/ICT_Maintenance_db.php');
$store->add_section($_POST);
$store->update_section($_POST);
$store->delete_section($_POST);
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
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
            <h1><center><b>ICT MAINTENANCE RECORD</b><center></h1>
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
                <a href="search_taorcor.php" class="nav-link">
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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="maintenance_report.php" class="nav-link">
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
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
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
                <a href="setting_library.php" class="nav-link active">
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
          <!-- <div class="col-sm-6">
            <h1>Project Add</h1>
          </div> -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Library</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add section</h3>

              <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div> -->
            </div>
            <div class="card-body">
              <form method="POST">
              <div class="form-group">
              <span style="color:red">* </span><label for="inputStatus">Division</label>
                <select class="form-control custom-select" name="division" required>
                  <option value="">-- Select division --</option>
                  <option value="MSD">MSD</option>
                  <option value="LHSD">LHSD</option>
                </select>
              </div>
              <div class="form mb-1">
                    
                </div>
              <div class="form-group">
              <span style="color:red">* </span><label for="inputClientCompany">Section <small class="error_section" style="color: red;"></small></label>
                
                <input type="text" name="section" id="inputClientCompany" class="form-control check_section" required>
              </div>
           

              <div class="row">
                  <div class="col-12">
                    <a type="reset" class="btn btn-secondary">Cancel</a>
                    <input type="submit" name="add_section" value="Add section" class="btn btn-success float-right">
                  </div>
                </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


        <?php
                  
                  $search = "";
                
                  $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

                  if(isset($_POST['search'])){
                  $search = $_POST['search'];
                }
                  
                // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                // $sql = "SELECT * FROM user WHERE fullname LIKE '%$search%'ORDER BY fullname ASC";
                // $accom = $con->query($sql,);
                // $row = $accom->fetch_assoc();
                
                ?>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of section</h3>
              

              <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div> -->
            </div>
            <div class="card-body">


            
                  <form method="post" action="" id="search_form">
                  <div class="input-group" id="parent_">
                  <input type="search" name="search" id="search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                  <button type="submit" id="output" name="output" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  <button name="refresh_data" class="btn btn-primary"><i class="fas fa-redo-alt"></i></button>
                  </div>
                  
               
                    </div>

                    <br>

            <div class="card-tools">
              <div class="table-responsive p-0" style="height: 400px;">

              <table id="report-list" class="table table-bordered text-nowrap">

              <!-- <table class="table table-bordered" id='report-list'> -->
                    <thead>
                        <tr>
                            <th style="width: 5px;" class="text-center">#</th>
                            <th style="width: 3px;">Division</th>
                            <th>Section</th>
                            <th style="width: 5px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
			          <?php
                      $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');
                      $i = 1;
                      $payments = $con->query("SELECT * FROM division_section WHERE section_name LIKE '%$search%' ORDER BY section_name ASC");
                      if($payments->num_rows > 0):
			                while($row = $payments->fetch_array()):

			          ?>
			          <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td>
                            <p> <?php echo $row['division_name'] ?></p>
                        </td>
                        <td>
                            <p> <?php echo $row['section_name'] ?></p>
                        </td>
                       
                        <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['id']?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['id']?>"><i class="fas fa-trash-alt"></i> Delete</button></td>
                       

                    </tr>


                    
                    <div class="modal fade" id="delete<?php echo $row['id']?>">
          <div class="modal-dialog modal-md">

          <div class="modal-content bg-danger">

            <div class="modal-header">
              <h4 class="modal-title">Are you sure you want to delete this data?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method = "post" action="">
            <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Division:</label>
                        <input type="hidden" class="form-control" value="<?php echo $row['id'];?>" name="id" id="id">
                        <input type="text" class="form-control" value="<?php echo $row['division_name'];?>" name="division" id="division" disabled>
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <div class="form-group">
                        <label>Section:</label>
                        <input type="text" class="form-control" value="<?php echo $row['section_name'];?>" name="section" id="section" disabled>
                      </div>
                    </div>
                  </div>

            
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button name="delete" class="btn btn-outline-light">Delete data</button>
            </div>
          </div>
          
          </form>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      

          <div class="modal fade" id="edit<?php echo $row['id']?>">
          <div class="modal-dialog modal-md">

          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Edit info</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method = "post" action="">
            <div class="card-body">
            <div class="row">


            <div class="col-sm-3">
                      <div class="form-group">
                        <label>Division:</label>
                        <select class="form-control" value="" name="division" id="division">
                          <option>--Select--</option>
                          <option value="MSD" <?php if($row['division_name'] == "MSD"){echo "selected";}?>>MSD</option>
                          <option value="LHSD" <?php if($row['division_name'] == "LHSD"){echo "selected";}?>>LHSD</option>
                        </select>
                        </div>
                      </div>

                  <div class="col-sm-9">
                  <div class="form-group">
                  <label>Section:</label>
                  <input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id'];?>">
                  <input type="text" name="section" value="<?= $row['section_name'];?>" class="form-control" id="task">
                </div>
                </div>

                      </div>
               
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button name="update" class="btn btn-success"> <i class="fas fa-edit"></i> Update data</button>
            </div>
            
          </div>
          
          </form>

          
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




                    <?php 
                        endwhile;
                        else:
                    ?>
                    <tr>
                            <th class="text-center" colspan="10">No Data.</th>
                    </tr>
                    <?php 
                        endif;
                    ?>
			        </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th colspan="5" class="text-right">Total</th>
                            <th class="text-right"><?php echo ($total) ?></th>
                            <th class="text-right"><?php echo ($total1) ?></th>
                            <th></th>
                        </tr>
                    </tfoot> -->
                </table>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->

<script src="../plugins/sweetalert/sweetalert.min.js"></script>


<script>

 $(document).ready(function(){

$('.check_section').keyup(function(e){

  var section = $('.check_section').val();
    // alert(username);

    $.ajax({
      type: "POST",
      url: "check_section.php",
      data: {
        "check_submit_btn": 1,
        "section_id": section,
      },
      success: function (response){
        // alert(response);
        $('.error_section').text(response);
      }


    });
    

});

});
</script>





<script type="text/javascript">


  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.updatetSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Status uccessfully updated'
      })
    });
  });
  
    </script>


</body>
</html>
