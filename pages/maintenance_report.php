<?php

require_once('class/ICT_Maintenance_db.php');
$reports = $store->get_reports();
$store->update_status_inactive($_POST);
$store->update_status_active($_POST);
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
                <a href="search_taorcor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TA and Corrective Record</p>
                </a>
              </li>
            </ul>
          </li>

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
          
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">ICT maintenance report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->


      <section class="content">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              


              <?php
                  
                  $search = "";
                  $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

                  if(isset($_POST['search'])){
                  $search = $_POST['search'];
                }
                  
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                $sql = "SELECT * FROM employees WHERE ict_property_code LIKE '%$search%' || enduser LIKE '%$search%' ORDER BY enduser ASC";
                $accom = $con->query($sql,);
                $row = $accom->fetch_assoc();
                
                ?>


                  <div class="col-md-12">
                  <div class="card-tools">
                  
                  <form method="post" action="" id="search_form">
                  <div class="input-group" id="parent_">
                  <input type="search" name="search" id="search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                  <button type="submit" id="output" name="output" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  <button name="refresh_data" class="btn btn-primary"><i class="fas fa-redo-alt"></i></button>
                  </div>
                  </div>
                    </div>
                    </div>

                    </form>
                  
                  </div>
                  


                  <div class="card-tools">
              <div class="table-responsive p-0" style="height: 400px;">

              <table id="table" class="table table-bordered text-nowrap">

                <thead style="background-color:#A4A4A4;">
                  <tr>
                    <th>ICT Property code</th>
                    <th>Enduser</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>reason</th>
                    <th style="width: 10px">Date of change status</th>
                    <th style="width: 10px">Action</th>
                
                  </tr>
                </thead>
                <tbody>

                <?php if($row > 0){
                
                do{ ?>
                
                <tr>
                <td><?php echo $row['ict_property_code']?></td>
                <td><?php echo $row['enduser']?></td>
                <td>
                  <?php
                  if($row['status']=="Active"){
                  echo "<span class='badge badge-success'>Active</span>";
                  }elseif($row['status']=="Inactive"){
                  echo "<span class='badge badge-danger'>Inactive</span>";
                  }else{
                  echo "<span class='badge badge-dark'>No Action</span>";
                  }
                  ?>
                  </td>
                <td><?php echo $row['action']?></td>
                <td><?php echo $row['reason']?></td>
                <td><?php echo date("M d, Y", strtotime($row['date_of_changestatus']))?></td>
                <td>
                <a type="button" class="btn btn-info btn-sm" href="maintenance_log.php?id=<?php echo $row['id']?>"><i class="fas fa-arrow-right"></i> Select</a>
                <?php
                  if($row['status']=="Active"){
                  echo "<a class = 'btn btn-success btn-sm' data-toggle='modal' data-target='#activestatus". ($row['id'])."'><i class='fas fa-pencil-alt'></i> Change status</a>";
                  }elseif($row['status']=="Inactive"){
                  echo "<a class = 'btn btn-danger btn-sm' data-toggle='modal' data-target='#inactivestatus". ($row['id'])."'><i class='fas fa-pencil-alt'></i> Change status</a>";
                  }else{
                  echo "<span class='badge badge-dark'>No Action</span>";
                  }
                  ?>
                  
                  
                <!-- <a class = "btn btn-warning btn-sm"  href="" data-toggle="modal" data-target="#status<?php echo $row['id']?>"><i class="fas fa-pencil-alt"></i> Change status</a></td> -->
                </td>
                
              
               
                  </tr>
                
                </div>


                    
          <div class="modal fade" id="activestatus<?php echo $row['id']?>">
        <div class="modal-dialog modal-lg">
        
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h2 class="modal-title"><small>Current status:</small> <span class="badge badge-warning"><strong>Active</strong></span></h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="">
            <div class="card-body">


            <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label>ICT property code:</label>
                        <input type="text" class="form-control" value="<?php echo $row['ict_property_code'];?>" name="" id="" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>End user:</label>
                        <input type="text" class="form-control" name="" value="<?php echo $row['enduser'];?>" id="" disabled>
                      </div>
                    </div>
                    </div> 
                    <hr>
                    

            
              <div class="row">
                     
                      <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id']?>" required="required">
                      


                    <div class="col-sm-4">
                      <div class="form-group">
                      <label>Status:</label>
                      <input type="text" id="" value="Inactive" name="status" class="form-control" readonly>
                        </select>
                    
                      </div>
                    </div>


                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Date:</label>
                        <input type="date" value="" class="form-control" name="date" id="date" required="required">
                      </div>
                    </div>

                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Action Status:</label>
                        <select id="" class="form-control" name="action" required="required">
                          <option value="">--Select--</option>
                          <option value="Transferred to PDOHO">Transferred to PDOHO</option>
                          <option value="Transferred to RLED">Transferred to RLED</option>
                          <option value="For disposal">For disposal</option>
                          <option value="Returned to supply">Returned to supply</option>
                          <option value="Defective">Defective</option>
                        </select>
                        </div>
                      </div>
                  <div class="col-sm-12">
                  <div class="form-group">
                  <label>Reason:</label>
                  
                  <input type="text" class="form-control" name="reason" id="reason" placeholder="Enter ..." required="required">
                </div>
                </div>
      
                      </div>      
              
              
            <!-- /.card-body -->
          
            

          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updateactive" class="btn btn-danger"><i class="fas fa-check"></i> Update to inactive</button>
            </div>
          </div>
          </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



               
      <div class="modal fade" id="inactivestatus<?php echo $row['id']?>">
        <div class="modal-dialog modal-lg">
        
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h2 class="modal-title">Current status: <span class="badge badge-warning"><strong>Inactive</strong></span></h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="">
            <div class="card-body">


            <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label>ICT property code:</label>
                        <input type="text" class="form-control" value="<?php echo $row['ict_property_code'];?>" name="" id="" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>End user:</label>
                        <input type="text" class="form-control" name="" value="<?php echo $row['enduser'];?>" id="" disabled>
                      </div>
                    </div>
                    </div> 
                    <hr>
                    

            
              <div class="row">
                  

                  
                     
                      <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id']?>" required="required">
                      


                    <div class="col-sm-4">
                      <div class="form-group">
                      <label>Status:</label>
                        <input type="text" id="" value="Active" name="status" class="form-control" readonly>
                          
                          
                        </select>
                    
                      </div>
                    </div>


                    <div class="col-sm-34">
                      <div class="form-group">
                        <label>Date:</label>
                        <input type="date" value="" class="form-control" name="date" id="date" required="required">
                      </div>
                    </div>

                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Action Status:</label>
                        <select id="" class="form-control" name="action" required="required">
                        <option value="">--Select--</option>
                          <option value="Working again">Working again</option>
                          <option value="Repaired">Repaired</option>
                        </select>
                        </div>
                      </div>
                  <div class="col-sm-12">
                  <div class="form-group">
                  <label>Reason:</label>
                  
                  <input type="text" class="form-control" name="reason" id="reason" placeholder="Enter ..." required="required">
                </div>
                </div>
      
                      </div>
              
              
            <!-- /.card-body -->
          
            

          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updateinactive" class="btn btn-success"><i class="fas fa-check"></i> Update to active</button>
            </div>
          </div>
          </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   
    


      <?php
                
                }while($row = $accom->fetch_assoc())?>

                <?php } ?>
   
                  
                  <!-- </div> -->
                  
                  
                </tbody>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="../plugins/sweetalert/sweetalert.min.js"></script>


<script>


// function random_function3()

              
//             {
              
//                 var a=document.getElementById("inputstatus").value;
                
//                   // element.addEventListener('inputstatus', ()=> {
//                 if(a==="Active")
//                 {
//                     var arr=[" ", "Working again", "Working well"];
//                 }
//                 else if(a==="Inactive")
//                 {
//                     var arr=[" ", "Transfered to PDOHO", "Transfered to RLED", "Returned to supply", "For disposal", "Defective"];
//                 }
            
//                 var string="";
                
//                 for(i=0;i<arr.length;i++)
//                 {
                  
                    
                  
//                     string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
//                 }
//                 document.getElementById("outputstatus").innerHTML=string;
           
//               // });
            
              
//             }


</script>




<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.12312'
      })
    });
  });
  
    </script>


</body>
</html>
