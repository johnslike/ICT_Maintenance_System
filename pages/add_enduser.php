<?php

require_once('class/ICT_Maintenance_db.php');
$store->add_employee($_POST);
$store->update_employee($_POST);
$store->delete_employee($_POST);

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
            <h1><center><b>LIST OF EMPLOYEE</b><center></h1>
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
          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
              ICT maintenance record
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_enduser.php" class="nav-link active">
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
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
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
                <a href="search_property_code.php" class="nav-link">
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
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li> -->
              
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
        <div class="row mb-12">
          <!-- <div class="col-sm-12">
            <h1><center><b>LIST OF EMPLOYEE</b><center></h1>
          </div> -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Users List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                
              <div class="row">
                  <div class="col-md-2">
                    
                    <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#add_employee">
                    <i class="fas fa-user-plus"></i> Add new</button>
                    
                    </div>
                
                <?php
                  
                  $search = "";
                  $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

                  if(isset($_POST['search'])){
                  $search = $_POST['search'];
                }
                  
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                $sql = "SELECT * FROM employees WHERE ict_property_code LIKE '%$search%' || enduser LIKE '%$search%' ORDER BY enduser ASC";
                $accom = $con->query($sql);
                $row1 = $accom->fetch_assoc();
              

                
                $section  = mysqli_query($con, "SELECT DISTINCT section_name FROM division_section ORDER BY section_name asc");
                $division  = mysqli_query($con, "SELECT DISTINCT division_name FROM division_section");
                // $accom1 = $con->query($edite);
                // $rows = $accom1->fetch_assoc();
                ?>

                    
                    <div class="col-md-10">
                  <div class="card-tools">
                  
                  <form method="post" action="" id="search_form">
                  <div class="input-group" id="parent_">
                  <input type="search" name="search" id="search" class="form-control float-right" placeholder="Search by end user or ICT property code">
                  <div class="input-group-append">
                  <button type="submit" id="output" name="output" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  <button name="refresh_data" class="btn btn-primary"><i class="fas fa-redo-alt"></i></button>
                  </div>
                  </div>
                    </div>
                    </div>

                    </form>
                  </div>
                  </div>
                  
                  
 
              <div class="table-responsive p-0" style="height: 500px;">
              
                <table id="table" class="table table-bordered text-nowrap">
              
                  <thead style="background-color:#A4A4A4;">
                    <tr>
                      <th>ICT property code</th>
                      <th>End User</th>
                      <th>Serial no</th>
                      <th>Type</th>
                      <th>Date Acquired</th>
                      <th>Acquisition</th>
                      <th>Division</th>
                      <th>Section</th>
                      <th>Status</th>
                      <th style="width:10px">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php if($row1 > 0){

                  do{ ?>
                  <tr>
                  <td><?php echo $row1['ict_property_code'];?></td>
                  <td><?php echo $row1['enduser'];?></td>
                  <td><?php echo $row1['serial_no'];?></td>
                  <td><?php echo $row1['type'];?></td>
                  <td><?php echo date("M d, Y", strtotime($row1['date_acquired']))?></td>
                  <td><?php echo $row1['acquisition'];?></td>
                  <td><?php echo $row1['division'];?></td>
                  <td><?php echo $row1['section'];?></td>
                  <td>
                  <?php
                  if($row1['status']=="Active"){
                  echo "<span class='badge badge-success'>Active</span>";
                  }elseif($row1['status']=="Inactive"){
                  echo "<span class='badge badge-danger'>Inactive</span>";
                  }else{
                  echo "<span class='badge badge-dark'>No Action</span>";
                  }
                  ?>
                  </td>
                  <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $row1['id']?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row1['id']?>"><i class="fas fa-trash-alt"></i> Delete</button></td>
                     
                  </tr>


          <div class="modal fade" id="delete<?php echo $row1['id']?>">
          <div class="modal-dialog modal-lg">

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
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ICT property code:</label>
                        <input type="hidden" class="form-control" value="<?php echo $row1['id'];?>" name="id" id="id">
                        <input type="text" class="form-control" value="<?php echo $row1['ict_property_code'];?>" name="code" id="code" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Serial no.:</label>
                        <input type="text" class="form-control" value="<?php echo $row1['enduser'];?>" name="enduser" id="enduser" disabled>
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

          <div class="modal fade" id="edit<?php echo $row1['id']?>">
          <div class="modal-dialog modal-lg">

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
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ICT property code:</label>
                        <input type="hidden" class="form-control" value="<?php echo $row1['id'];?>" name="id" id="id">
                        <input type="text" value="<?php echo $row1['ict_property_code'];?>" name="code" id="" class="form-control" readonly>
                 
                      </div>
                    </div>
                    

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Serial no.:</label>
                        <input type="text" class="form-control" value="<?php echo $row1['serial_no'];?>" name="sno" id="sno">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Type:</label>
                        <select class="form-control" name="type" id="type">
                          <option>--Select--</option>
                          <option value = "Desktop" <?php if($row1['type'] == "Desktop"){echo "selected";}?>>Desktop</option>
                          <option value = "Laptop/Notebook" <?php if($row1['type'] == "Laptop/Notebook"){echo "selected";}?>>Laptop/Notebook</option>
                          <option value = "Printer" <?php if($row1['type'] == "Printer"){echo "selected";}?>>Printer</option> 
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Brand:</label>
                        <input type="text" class="form-control" value="<?php echo $row1['brand'];?>" name="brand" id="brand">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Brief specs:</label>
                        <input type="text" class="form-control" value="<?php echo $row1['brief_specs'];?>" name="specs" id="specs">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>Date Acquired:</label>
                        <input type="date" class="form-control" value="<?php echo $row1['date_acquired'];?>" name="acquired" id="acquired">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Mode of Acquisition:</label>
                        <select class="form-control" name="acquisition" id="acquisition">
                          <option value="">--Select--</option>
                          <option value = "Purchased" <?php if($row1['acquisition'] == "Purchased"){echo "selected";}?>>Purchased</option>
                          <option value = "Donated" <?php if($row1['acquisition'] == "Donated"){echo "selected";}?>>Donated</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                        <label>End-user:</label>
                        <input type="text" class="form-control" value="<?php echo $row1['enduser'];?>" name="enduser" id="enduser">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Division:</label>
                        
                        <select name="division" id="" class="form-control">
                        <?php foreach($division as $rows1):?>
                        <option value="<?php echo $rows1['division_name']; ?>"<?php if($row1['division'] == $rows1['division_name']) echo 'selected="selected"'; ?>><?php echo $rows1['division_name']; ?></option>
                    <?php endforeach;?>
                              </select>  
                      </div>
                    </div>
                 
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Section:</label>
                        <select class="form-control" name="section" id="">
                        <?php foreach($section as $rows):?>
                        <option value="<?php echo $rows['section_name']; ?>"<?php if($row1['section'] == $rows['section_name']) echo 'selected="selected"'; ?>><?php echo $rows['section_name']; ?></option>
                    <?php endforeach;?>
                        
                        </select> 

                        <input type="hidden" class="form-control" value="<?php echo $row1['date_added'];?>" name="date_added" id="date_added">
                      </div>
                    </div>
                  

                 
                    </div>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button name="update" class="btn btn-success"> <i class="fas fa-check"></i> Update data</button>
            </div>
            
          </div>
          
          </form>

          
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      

                    
                  <?php
                  
                  }while($row1 = $accom->fetch_assoc())?>
                    <?php } else{?>
                      <tr><?php echo "<center><b> No data found";?></tr>
                      
                    <?php } ?>
                    
                    <!-- </div> -->
                    
                    
                  </tbody>
                  </table>
              <!-- /.card-body -->
            
            <!-- /.card -->
         
            <!-- /.card -->
       
          <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
      
    </section>

    <!-- /.content -->
  </div>


      <div class="modal fade" id="add_employee">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><strong>Add end user</strong></h4>
            </div>
            <form method = "post">
            <div class="card-body">
                    <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Type:</label>
                        <select id="inputtype" name="type" class="form-control" onchange="random_function_test()">
                                  <option value="">-- Select option --</option>
                                  <option value="Printer">Printer</option>
                                  <option value="Desktop">Desktop</option>
                                  <option value="Laptop/Notebook">Laptop/Notebook</option>
                              </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                      <span style="color:red">* </span><label>ICT property code:</label>
                        <!-- <input type="text" value=CHD12-ICT-MSD-NBK- class="form-control" name="code" id="code" placeholder="Enter ..." required="requred"> -->
                      
                        <input id="outputtype" name="code" class="form-control check_ictcode">
                        <small class="error_ictcode" style="color: red;"></small>

                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Serial no.:</label>
                        <input type="text" class="form-control" value="" name="sno" id="sno" placeholder="Enter ..." required="requred">
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Brand:</label>
                        <input type="text" class="form-control" value="" name="brand" id="brand" placeholder="Enter ..." required="requred">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Brief specs:</label>
                        <input type="text" class="form-control" value="" name="specs" id="specs" placeholder="Enter ..." required="requred">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Date Acquired:</label>
                        <input type="date" class="form-control" value="" name="acquired" id="acquired" placeholder="Enter ..." required="requred">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Mode of Acquisition:</label>
                        <select class="form-control" name="acquisition" id="acquisition" required="requred">
                          <option value="">-- Select --</option>
                          <option value="Purchased">Purchased</option>
                          <option value="Donated">Donated</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>End-user:</label>
                        <input type="text" class="form-control" value="" name="enduser" id="enduser" placeholder="Enter ..." required="requred">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Division:</label>                 
                        <select name="division" id="" class="form-control" onchange="divsec(this.value);" required>
                                  <option value="">-- Select division --</option>
                                  <!-- <option value="MSD">MSD</option>
                                  <option value="LHSD">LHSD</option> -->
                                  <option value="MSD">MSD</option>
                                  <option value="LHSD">LHSD</option>
                              </select>

                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div  class="form-group">
                      <span style="color:red">* </span><label>Section:</label>
                        <select id="poll" name="section" class="form-control" required>
                        <option value="">-- Select section --</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                  <div class="col-sm-8">
                        
                        <input type="hidden" class="form-control" value="Active" name="status" id="status" placeholder="Enter ...">
                      </div>
                   

                  <div class="col-sm-8">
                   
                        
                        <input type="hidden" class="form-control" name="reason" id="reason" placeholder="Enter ...">
                      </div>
                    
            
            </div>
            
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="add_employee" class="btn btn-primary"><i class="fas fa-save"></i> Save data</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script>
	


function divsec(str) {

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else{
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange= function(){
		if (this.readyState==4 && this.status==200) {
			document.getElementById('poll').innerHTML = this.responseText;
		}
	}
	xmlhttp.open("GET","ajax_division_section.php?value="+str, true);
	xmlhttp.send();

}



function updatedivsec(str) {

if (window.XMLHttpRequest) {
  xmlhttp = new XMLHttpRequest();
} else{
  xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange= function(){
  if (this.readyState==4 && this.status==200) {
    document.getElementById('poll2').innerHTML = this.responseText;
  }
}
xmlhttp.open("GET","ajax_division_section.php?value="+str, true);
xmlhttp.send();

}

</script>


<script type="text/javascript">






// function section(id){
//     $('#section').html('');
//     // $('#city').html('<option>Select City</option>');
//     $.ajax({
//       type:'post',
//       url: 'ajax_division_section.php',
//       data : { div_id : id},
//       success : function(data){
//          $('#section').html(data);
//       }

//     })
//   }



    </script>


<script>



$(document).ready(function(){

$('.check_ictcode').keyup(function(e){

  var ictcode = $('.check_ictcode').val();
    // alert(username);

    $.ajax({
      type: "POST",
      url: "check_ictcode.php",
      data: {
        "check_submit_btn": 1,
        "ictcode_id": ictcode,
      },
      success: function (response){
        // alert(response);
        $('.error_ictcode').text(response);
      }


    });
    

});

});

$(document).ready(function(){

$('.check_ictcodeupdate').keyup(function(e){

  var ictcode = $('.check_ictcodeupdate').val();
    // alert(username);

    $.ajax({
      type: "POST",
      url: "check_ictcode.php",
      data: {
        "check_submit_btn": 1,
        "ictcode_id": ictcode,
      },
      success: function (response){
        // alert(response);
        $('.error_ictcode').text(response);
      }


    });
    

});

});






function random_function_test()
            
              {
                var a=document.getElementById("inputtype").value;
             //   alert(a);
             var string ="";
                if(a==="Printer")
                {
                  string="CHD12-ICT-MSD-PRI-";
                }
                else if(a==="Desktop")
                {
                  string="CHD12-ICT-MSD-DPC-";
                }
                else if(a==="Laptop/Notebook")
                {
                  string="CHD12-ICT-MSD-NBK-";
                }
             //   var b=document.getElementById("inputtype");
              // var cc="<input value="+a+" />";
              
                document.getElementById("outputtype").value =  string;
            }
            

function random_function()
            {
                var a=document.getElementById("input").value;
                
                if(a==="MSD")
                {
                    var arr=[" ","Personnel","HRDU"];
                }
                else if(a==="LHSD")
                {
                    var arr=[" ", "Non-Com","Family Health Cluster","Support"];
                }
            
                var string="";
            
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
                }
                document.getElementById("output2").innerHTML=string;
            }


            // Sample of my edit code




          
            </script>



<!-- <script type="text/javascript">

function section(id){
    $('#section').html('');
    // $('#city').html('<option>Select City</option>');
    $.ajax({
      type:'post',
      url: 'ajax_division_section.php',
      data : { div_id : id},
      success : function(data){
         $('#section').html(data);

      }

    })
  }




    </script> -->

</body>
</html>
