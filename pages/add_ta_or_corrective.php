<?php

require_once('class/ICT_Maintenance_db.php');
$id = $_GET['id'];
$store->update_taorcorrective($_POST);
$store->delete_taorcorrective($_POST);
$store->add_technical_assistants($_POST);
$store->add_corrective($_POST);
// $store->delete_task($_POST);
// $store->update_task($_POST);
$user = $store->get_single_user($id);
$tasks = $store->get_all_taorcor($id);

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



<div class="modal fade" id="addta">
        <div class="modal-dialog modal-lg">
        
          <div class="modal-content">
          <div class="modal-header bg-success">
            <h5 class="modal-title"><b>TECHNICAL ASSISTANTS </b><br><small class="form-group" font-size="smaller"><i>Note: Add task such as help to setup any online meeting or video edit and layout or design IEC materials and etc.</i></small></h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="">
            <div class="card-body">
            
              <div class="row">
                  
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $user['id'];?>">
                  <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Request by:</label>
                        <input type="text" class="form-control" name="personnel" id="personnel" placeholder="Enter ..." required>
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
                    <div class="col-sm-3">
                  <div class="form-group">
                  <span style="color:red">* </span><label>Date:</label>
                  <input type="date" value="" class="form-control" name="date" id="date" required>

                    </div>
                    </div>

          
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Done by:</label>
                        <input type="text" class="form-control" name="doneby" id="doneby" value="<?php echo $user['fullname'] ?>" readonly>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Task Request:</label>
                        <input type="text" class="form-control" name="task_request" id="task_request" placeholder="Enter ..." required>
                      </div>
                    </div>
                    

          
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Action Taken:</label>
                        <input type="text" class="form-control" name="action_taken" id="action_taken" placeholder="Enter ..." required>
                        <input type="hidden" class="form-control" name="task_type" id="task_type" value="TA" placeholder="Enter ...">
                      </div>
                    </div>
                    </div>  
              
              
            <!-- /.card-body -->
          
            

          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="add_ta" class="btn btn-primary"> <i class="fas fa-save"></i> Save data</button>
            </div>
          </div>
          </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      
    <div class="modal fade" id="addcorrective">
        <div class="modal-dialog modal-lg">
        
          <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title"><b>CORRECTIVE TASK </b><br><small><i>Note: Add any troubleshoot or repaired task such as computer (software, hardware or online), printer and etc.</i></small></h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="">
            <div class="card-body">
            
              <div class="row">
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $user['id'];?>">
                  <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Request by:</label>
                        <input type="text" class="form-control" name="personnel" id="personnel" placeholder="Enter ..." required>
                      </div>
                    </div>
                 
                    
                      <div class="col-sm-4">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Division:</label>
                        <select name="division" id="" class="form-control" onchange="divsec2(this.value);" required>
                                  <option value="">--Select division--</option>
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
                        <select id="poll2" name="section" class="form-control" required>
                        <option value="">Select section</option>
                        </select>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-3">
                  <div class="form-group">
                  <span style="color:red">* </span><label>Date:</label>
                  <input type="date" value="" class="form-control" name="date" id="date" required>

                    </div>
                    </div>

          
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Done by:</label>
                        <input type="text" class="form-control" name="doneby" id="doneby" value="<?php echo $user['fullname'] ?>" readonly>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Task Request:</label>
                        <input type="text" class="form-control" name="task_request" id="task_request" placeholder="Enter ..." required>
                      </div>
                    </div>
                    

          
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Action Taken:</label>
                        <input type="text" class="form-control" name="action_taken" id="action_taken" placeholder="Enter ..." required>
                        <input type="hidden" class="form-control" name="task_type" id="task_type" value="Corrective" placeholder="Enter ...">
                      </div>
                    </div>
                    </div>  
              
              
            <!-- /.card-body -->
          
            

          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="add_corrective" class="btn btn-primary"> <i class="fas fa-save"></i> Save data</button>
            </div>
          </div>
          </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>






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
                <a href="search_taorcor.php" class="nav-link active">
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
              <li class="breadcrumb-item active">Maintenance Record</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
      
        <div class="col-md-2">
          <div class="card card-success">
            <a class = "btn btn bg-gradient-secondary btn-md" href = "search_taorcor.php"><i class = "fas fa-search"></i> Search user</a>
            </div>
            </div>
            <div class="col-md-2">
            <div class="card card-primary">
            <button type="button" class="btn btn-block btn-success btn-md" data-toggle="modal" data-target="#addta">
                    <i class="fas fa-hands-helping"></i> Add Technical Assistant </button>
          </div>
      </div>
      <div class="col-md-2">
            <div class="card card-primary">
            <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#addcorrective">
                    <i class="fas fa-tools"></i> Add Corrective Task </button>
          </div>
      </div>
      <div class="col-md-2">
            <div class="card card-primary">
            
            <!-- <a class = "btn btn-block bg-gradient-info btn-md" target="_blank" href="print_record.php?id=<?php echo $user['id']?>"><i class = "fas fa-print"></i>  Print record</a> -->
            
          </div>
      </div>
      </div>
      </div><!-- /.container-fluid -->



   


    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!-- <i class="fas fa-text-width"></i> -->
                  <center>ICT TECHNICAL ASSISTANT OR CORRECTIVE RECORD</center>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


              <!-- <dl class="row ">
              <dd class="col-sm-2">Fullname:</dt>
              <dt class="col-sm-4"><?= $user['fullname']?></dd>
              </dd>
            </dl> -->
 

              <!-- <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
           
              <div class="card-body"> -->



              <?php
                  
                  $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

                // $sql = "SELECT * FROM user WHERE access = 'User'";
                // $accom = $con->query($sql);
                // $row = $accom->fetch_assoc();
                
             

                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
          
                
                $section  = mysqli_query($con, "SELECT DISTINCT section_name FROM division_section ORDER BY section_name asc" );
                $division  = mysqli_query($con, "SELECT DISTINCT division_name FROM division_section");
                $itpersonnel  = mysqli_query($con, "SELECT DISTINCT itpersonnel FROM task_taandcor");
                // $accom1 = $con->query($edite);
                // $rows = $accom1->fetch_assoc();
                ?>


                <table class="table table-bordered" id='report-list'>
                  <thead style="background-color:#A4A4A4;">                  
                    <tr>
                      <th>Date</th>
                      <th>Done by</th>
                      <th>Request by</th>
                      <th>Division</th>
                      <th>Section</th>
                      <th>Task Requested</th>
                      <th>Action Taken</th>
                      <th>Task type</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                
                  <?php
                  if (is_array($tasks) || is_object($tasks))
                   foreach($tasks as $task){?>
                    
                    
                    <tr>
                      <td><?= date("M d, Y", strtotime($task['date']));?></td>
                      <td><?= $task['itpersonnel'];?></td>
                      <td><?= $task['personnel'];?></td>
                      <td><?= $task['division'];?></td>
                      <td><?= $task['section'];?></td>
                      <td><?= $task['task_request'];?></td>
                      <td><?= $task['action_taken'];?></td>
                      <td>
                        <?php
                              if($task['task_type']=="TA"){
                              echo "<span class='badge badge-success'>TA</span>";
                              }elseif($task['task_type']=="Corrective"){
                              echo "<span class='badge badge-primary'>Corrective</span>";
                              }else{
                              echo "<span class='badge badge-dark'>No Action</span>";
                              }
                        ?>
                        </td>
                  
                     
                      
                      <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $task['id']?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $task['id']?>"><i class="fas fa-trash-alt"></i> Delete</button></td>
                    </tr>

                    <div class="modal fade" id="delete<?php echo $task['id']?>">
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
                        <label>Request by:</label>
                        <input type="hidden" class="form-control" value="<?php echo $task['user_id']?>" name="user_id" id="user_id" placeholder="Enter ...">
                        <input type="hidden" class="form-control" value="<?php echo $task['id'];?>" name="id" id="id">
                        <input type="text" class="form-control" value="<?php echo $task['personnel'];?>" name="personnel" id="personnel" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Task requested:</label>
                        <input type="text" class="form-control" value="<?php echo $task['task_request'];?>" name="task_request" id="task_request" disabled>
                      </div>
                    </div>
                  </div>

            
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button name="delete_taorcorrective" class="btn btn-outline-light">Delete data</button>
            </div>
          </div>
          
          </form>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


             
<div class="modal fade" id="edit<?php echo $task['id']?>">
   <div class="modal-dialog modal-lg">
   
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">TECHNICAL ASSISTANTS</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="post" action="">
       <div class="card-body">
       
         <div class="row">

             <div class="col-sm-4">
             <input type="hidden" class="form-control" value="<?php echo $task['user_id']?>" name="user_id" id="user_id" placeholder="Enter ...">
             <input type="hidden" class="form-control" value="<?php echo $task['id']?>" name="id" id="id" placeholder="Enter ...">
             <!-- <input type="text" class="form-control" value="<?php echo $task['id']?>" name="id_ta" id="id_ta" placeholder="Enter ...">
             <input type="text" class="form-control" value="<?php echo $row3['id']?>" name="id_cor" id="id_cor" placeholder="Enter ..."> -->
                 <div class="form-group">
                   <label>Request by:</label>
                   <input type="text" class="form-control" value="<?php echo $task['personnel']?>" name="personnel" id="personnel" placeholder="Enter ...">
                 </div>
               </div>
            
               
                 <div class="col-sm-4">
                 <div class="form-group">
                   <label>Division:</label>
                   <select name="division" id="" class="form-control">
                            <?php foreach($division as $rows1):?>
                                <option value="<?php echo $rows1['division_name']; ?>"<?php if($task['division'] == $rows1['division_name']) echo 'selected="selected"'; ?>><?php echo $rows1['division_name']; ?></option>
                            <?php endforeach;?>
                         </select>
                   </div>
                 </div>


                 <div class="col-sm-4">
                 <div  class="form-group">
                   <label>Section:</label>
                   <select id="" name="section" class="form-control">
                            <?php foreach($section as $rows):?>
                                  <option value="<?php echo $rows['section_name']; ?>"<?php if($task['section'] == $rows['section_name']) echo 'selected="selected"'; ?>><?php echo $rows['section_name']; ?></option>
                            <?php endforeach;?>
                   </select>
                 </div>
               </div>
               </div>


               <div class="row">
               <div class="col-sm-4">
             <div class="form-group">
             <label>Date:</label>
             <input type="date" value="<?php echo $task['date']?>" class="form-control" name="date" id="date">

               </div>
               </div>


               <div class="col-sm-4">
                 <div class="form-group">
                   <label>Task type:</label>
                        <select class="form-control" name="tasktype" id="tasktype">
                          <option>--Select--</option>
                          <option value = "TA" <?php if($task['task_type'] == "TA"){echo "selected";}?>>TA</option>
                          <option value = "Corrective" <?php if($task['task_type'] == "Corrective"){echo "selected";}?>>Corrective</option>
                        </select>
                      </div>
               </div>

            
               </div>

               <div class="row">
               <div class="col-sm-6">
                 <div class="form-group">
                   <label>Task Request:</label>
                   <input type="text" class="form-control" value="<?php echo $task['task_request']?>" name="task_request" id="task_request" placeholder="Enter ...">
                 </div>
               </div>
               

     
               <div class="col-sm-6">
                 <div class="form-group">
                   <label>Action Taken:</label>
                   <input type="text" class="form-control" value="<?php echo $task['action_taken']?>" name="action_taken" id="action_taken" placeholder="Enter ...">
                 </div>
               </div>
               </div>  
         
         
       <!-- /.card-body -->
     
       

     <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" name="update_taorcorrective" class="btn btn-success"> <i class="fas fa-check"></i> Update data</button>
       </div>
     </div>
     </form>
     </div>
     
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>

                
 <?php } ?>


                    
                  </tbody>
                 

                  
                </div>
                </table>
              
                
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


<noscript>
	<style>
		table#report-list{
			width:100%;
			border-collapse:collapse
		}
		table#report-list td,table#report-list th{
			border:1px solid
		}
        p{
            margin:unset;
        }
		.text-center{
			text-align:center
		}
        .text-right{
            text-align:right
        }
	</style>
</noscript>

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



function divsec2(str) {

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


$('#print').click(function(){
		var _c = $('#report-list').clone();
		var ns = $('noscript').clone();
            ns.append(_c)
		var nw = window.open('','_blank','width=900,height=600')
		nw.document.write('<p class="text-center"><b>Payment Report as of <?php echo date("F, Y",strtotime($startdate,$enddate)) ?></b></p>')
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(() => {
			nw.close()
		}, 500);
	})
  



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








</body>
</html>
