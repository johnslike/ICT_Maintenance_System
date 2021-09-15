<?php

require_once('class/ICT_Maintenance_db.php');
$store->delete_taorcorrective($_POST);
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
            <h1><center><b>TA AND CORRECTIVE REPORT</b><center></h1>
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
          <li class="nav-item has-treeviewn">
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
              <a href="maintenance_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ICT Maintenance Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="taandcorrective.php" class="nav-link active">
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
     
       

  
        <div class="row">
          <div class="col-sm-6">
            <!-- <h1>ICT Maintenance Record</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="add_enduser.php">User List</a></li> -->
              <li class="breadcrumb-item active">TA and Corrective Report</li>
            </ol>
          </div>
          <!-- <div class="col-md-2">
        <div class="card card-primary">
        <a class = "btn btn-block bg-gradient-primary btn-md" href="taandcorrective.php"><i class = "fas fa-plus"></i> Add current or urgent task</a>
        </div>
        </div> -->
        </div>
      </div><!-- /.container-fluid -->
 



    <section class="content">
      <div class="container-fluid">
        <div class="col-md-8">
          <div class="card card-primary card-outline">
            <div class="card-header">
            <?php
                  
                  $search = "";
                  $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
                  $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

                  if(isset($_POST['search'])){
                  $search = $_POST['search'];
                }
                  
                // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                // $sql = "SELECT * FROM user WHERE fullname LIKE '%$search%'ORDER BY fullname ASC";
                // $accom = $con->query($sql,);
                // $row = $accom->fetch_assoc();
                
                ?>

            <div class="row">
            <label for="" class="mt-2">Month</label>
                  <div class="col-md-2">
                    
                  <input type="month" name="month" id="month" value="<?php echo $month ?>" class="form-control">
               
                    
                    </div>


                  <!-- <div class="col-md-6">
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
                    </div> -->
                    
                    <div class="col-md-3">
                    
                    <button class="btn btn-success btn-md" type="button" id="print"><i class="fa fa-print"></i> Print</button>
               
                    
                    </div>

                    </form>
                    </div>
                  </div>
                  


                  <div class="card-tools">
              <div class="table-responsive p-0" style="height: 400px;">

              <table id="report-list" class="table table-bordered text-nowrap">

              <!-- <table class="table table-bordered" id='report-list'> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <!-- <th class="">ID</th> -->
                            <th class="text-center">IT Personnel</th>
                            <th class="text-center">TA</th>
                            <th class="text-center">Corrective</th>
                         
                        </tr>
                    </thead>
                    <tbody>
			          <?php
                      $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');
                      $i = 1;
                      $total = 0;
                      $total1 = 0;
                      $payments = $con->query("SELECT `user_id`, itpersonnel, sum((case when task_type= 'TA' then 1 else 0 end)) as totalta,
                      sum((case when task_type= 'Corrective' then 1 else 0 end)) as totalcor
                      FROM `task_taandcor`
                      WHERE date_format(`date`,'%Y-%m') = '$month' GROUP by `user_id`, itpersonnel");
                      if($payments->num_rows > 0):
			                while($row = $payments->fetch_array()):
                        $total += $row['totalta'];
                        $total1 += $row['totalcor'];

			          ?>
			          <tr>
               
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td>
                            <p> <b><?php echo $row['itpersonnel'] ?></b></p>
                        </td>
                        <td class="text-center">
                            <p> <b><?php echo $row['totalta'] ?></b></p>
                        </td>
                        <td class="text-center">
                            <p> <b><?php echo $row['totalcor'] ?></b></p>
                        </td>

                    </tr>
                    <?php 
                        endwhile;
                        else:
                    ?>
                    <tr>
                            <th class="text-center" colspan="4">No Data.</th>
                    </tr>
                    <?php 
                        endif;
                    ?>
			        </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-right">Total</th>
                            <th class="text-center"><?php echo ($total) ?></th>
                            <th class="text-center"><?php echo ($total1) ?></th>
                           
                        </tr>
                    </tfoot>
                </table>
                <div class="col-md-3">
                    
                    <a class="btn btn-secondary btn-md" type="button" href="taandcorrective.php"><i class="fas fa-arrow-circle-left"></i> Back</a>
               
                    
                    </div>
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
      </div>
    </section>
    <!-- /.content -->
  </div>

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



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
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
$('#month').change(function(){
    location.replace('print_total_taorcor.php?month='+$(this).val())
})
$('#print').click(function(){
		var _c = $('#report-list').clone();
		var ns = $('noscript').clone();
            ns.append(_c)
		var nw = window.open('','_blank','width=900,height=600')
		nw.document.write('<p class="text-center"><b>Task Report as of <?php echo date("F, Y",strtotime($month)) ?></b></p>')
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(() => {
			nw.close()
		}, 500);
	})
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
