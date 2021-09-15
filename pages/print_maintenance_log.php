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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ICT Maintenance Record System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

  <!-- Main content -->
  
      <!-- /.col --> 
    <!-- info row -->
    <div class="row invoice-info">
      
    
 

    <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!-- <i class="fas fa-text-width"></i> -->
                  <h2><center><b>ICT MAINTENANCE RECORD</b><center></h2>
                </h3>
              </div>
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
              <dt class="col-sm-2"><?= $user['brief_specs']?></dt>
              <dd class="col-sm-2">DATE ACQUIRED:</dd>
              <dt class="col-sm-2"><?= $user['date_acquired']?></dt>
              <dd class="col-sm-2">ACQUISITION:</dd>
              <dt class="col-sm-2"><?= $user['acquisition']?></dt>
              <dd class="col-sm-2">END-USER:</dd>
              <dt class="col-sm-2"><?= $user['enduser']?></dt>
              <dd class="col-sm-2">DIVISION:</dd>
              <dt class="col-sm-2"><?= $user['division']?></dt>
              <dd class="col-sm-2">SECTION:</dd>
              <dt class="col-sm-2"><?= $user['section']?></dt>
            </dl>
                </div>
              


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
      </div>
      </div>
    <!-- /.row -->
  
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
