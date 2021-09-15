<?php
require_once('class/ICT_Maintenance_db.php');
$store->add_user($_POST);
$store->update_account($_POST);
$store->delete_account($_POST);
$users=$store->getUsers();


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
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link active">
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
              <li class="breadcrumb-item active">Add Account</li>
              
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
                  
              
                    
                    <!-- <div class="col-md-11">
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
                  </div> -->
                  
                 
                
 
              <div class="table-responsive p-0" style="height: 700px;">
              <div class="col-md-1">
                    
                    <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#add_account">
                    <i class="fas fa-user-plus"></i> Add</button>
                    
                    </div>
                    <hr>
              
                <table id="table" class="table table-bordered text-nowrap">
              
                  <thead style="background-color:#A4A4A4;">
                    <tr>
                      <th>Full name</th>
                      <th>User name</th>
                      <th>Password</th>
                      <th>Access</th>
                      <th>Date Added</th>
                      <th style="width: 10px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  
                  <?php if (is_array($users) || is_object($users))
                  foreach($users as $user){?>
                  <tr>
                  <td><?php echo $user['fullname'];?></td>
                  <td><?php echo $user['username'];?></td>
                  <td><?php echo $user['password'];?></td>
                  <td><?php echo $user['access'];?></td>
                  <td><?php echo date("M d, Y", strtotime($user['date_added']))?></td>
                  <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $user['id']?>"><i class="fas fa-pencil-alt"></i> Edit info</button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $user['id']?>"><i class="fas fa-trash-alt"></i> Delete account</button></td>
                     
                  </tr>


          <div class="modal fade" id="delete<?php echo $user['id']?>">
          <div class="modal-dialog modal-md">

          <div class="modal-content bg-danger">

            <div class="modal-header">
              <h4 class="modal-title">Are you sure you want to delete this account?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method = "post" action="">
            <input type="hidden" class="form-control" value="<?php echo $user['id'];?>" name="id" id="id">
            <div class="card-body">
            <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Full name:</label>
                        <input type="hidden" class="form-control" value="<?php echo $user['id'];?>" name="id" id="id">
                        <input type="text" class="form-control" value="<?php echo $user['fullname'];?>" name="fullname" id="fullname" disabled="disabled">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>User name:</label>
                        <input type="text" class="form-control" value="<?php echo $user['username'];?>" name="username" id="username" disabled="disabled">
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

          <div class="modal fade" id="edit<?php echo $user['id']?>">
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
                    <div class="col-sm-5">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Full name:</label>
                        <input type="hidden" class="form-control" value="<?php echo $user['id'];?>" name="id" id="id">
                        <input type="text" class="form-control" value="<?php echo $user['fullname'];?>" name="fullname" id="fullname" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>User name:</label>
                        <input type="text" class="form-control" value="<?php echo $user['username'];?>" name="username" id="username">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Password:</label>
                        <input type="text" class="form-control" value="<?php echo $user['password'];?>" name="password" id="password">
                        <input type="hidden" class="form-control" value="<?php echo $user['access'];?>" name="access" id="access">
                        
                      </div>
                    </div>
                  </div>
            
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button name="update" class="btn btn-success"><i class="fas fa-check"></i> Update data</button>
            </div>
            
          </div>
          
          </form>

          
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


    
                      
                    <?php } ?>
                    
                    <!-- </div> -->
                    
                    
                  </tbody>
                  </table>
              <!-- /.card-body -->
            
            <!-- /.card -->
          </div>
            <!-- /.card -->
          </div>
        </div>
          <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="add_account">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW ACCOUNT</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method = "post">
            <div class="card-body">
                    <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                      <span style="color:red">* </span><label>Full name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname"placeholder="Enter ..." required="required">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                      <span style="color:red">* </span><label>User name:</label>
                        <input type="text" class="form-control check_username" id="" name="username" placeholder="Enter ..." required="required">
                        <small class="error_username" style="color: red;"></small>
                      </div>
                      </div>
                      <div class="col-sm-2">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter ..." required="required">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                      <span style="color:red">* </span> <label>Access:</label>
                        <select class="form-control" name="access" id="access" required>
                          <option value="">--Select--</option>
                          <option value="Admin">Admin</option>
                          <option value="User">User</option>
                        </select>
                        </div>
                      </div>
                    
                  </div>
                  
            
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="add_user" id="" class="btn btn-primary">Save data</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->






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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="../plugins/sweetalert/sweetalert.min.js"></script>


<script>

 $(document).ready(function(){

$('.check_username').keyup(function(e){

  var username = $('.check_username').val();
    // alert(username);

    $.ajax({
      type: "POST",
      url: "check_username.php",
      data: {
        "check_submit_btn": 1,
        "username_id": username,
      },
      success: function (response){
        // alert(response);
        $('.error_username').text(response);
      }


    });
    

});

});



</script>



<script type="text/javascript">
 
 


// $(function(){
// 		$('#register').click(function(e){

// 			var valid = this.form.checkValidity();

// 			if(valid){


// 			var fullname 	= $('#fullname').val();
// 			var username	= $('#username').val();
// 			var password 	= $('#password').val();
// 			var access = $('#access').val();
			

// 				e.preventDefault();	

// 				$.ajax({
// 					type: 'POST',
// 					url: 'class/ICT_Maintenance_db.php',
// 					data: {fullname: fullname,username: username,password: password,access: access},
// 					success: function(data){
// 					Swal.fire({
// 								'title': 'Successful',
// 								'text': data,
// 								'type': 'success'
// 								})
							
// 					},
// 					error: function(data){
// 						Swal.fire({
// 								'title': 'Errors',
// 								'text': 'There were errors while saving the data.',
// 								'type': 'error'
// 								})
// 					}
// 				});

				
// 			}else{
				
// 			}

			



// 		});		

		
// 	});





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
        title: 'New account successfully saved'
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
        title: 'Account successfully updated'
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
        title: 'Account successfully deleted'
      })
    });
  });
  
    </script>

  
</body>
</html>
