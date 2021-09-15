<?php

require_once('class/ICT_Maintenance_db.php');
$id = $_GET['id'];
$store->add_maintenance_corrective($_POST);
$store->add_maintenance_technical_assistants($_POST);
$user_id = $store->get_user_id($id);
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
    <section class="content">
 
   
      <div class="row mb-2">
      
      
            <div class="col-md-3">
            <div class="card card-primary">
            <a class = "btn btn-block bg-gradient-primary btn-md" href="" data-toggle="modal" data-target="#correctiveorta<?= $user_id['id'];?>"><i class = "fas fa-plus"></i> Add current or urgent task</a>
          </div>
      </div>
 
      </div>

      
    </section>



    <div class="modal fade" id="correctiveorta<?= $user_id['id'];?>">
        <div class="modal-dialog modal-xl">
        
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TECHNICAL ASSISTANTS OR CORRECTIVE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="card-body">
            
             
          
            <!-- <div class="row">
                  <div class="col-sm-2">
                  <div class="form-group">
                  <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#addta">Technical Assistants</button>
    
                </div>
                </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                      <button type="button" class="btn btn-block btn-primary btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#addcorrective">Corrective Task</button>
                      </div>
                    </div>
                 
                      </div> -->



                      <section class="content">
      <div class="container-fluid">
       
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                
              <div class="row">
                  <div class="col-md-3">
                    
                  <button type="button" class="btn btn-block btn-success btn-md" data-toggle="modal" data-target="#addta">
                    <i class="fas fa-hands-helping"></i> Add Technical Assistant</button>
                    
                    </div>
                    <div class="col-md-3">
                    
                    <button type="button" class="btn btn-block btn-primary btn-md" data-toggle="modal" data-target="#addcorrective">
                    <i class="fas fa-tools"></i> Add Corrective Task</button>
                    
                    </div>
                
                <?php
                  
                  $search = "";
                  $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

                  if(isset($_POST['search'])){
                  $search = $_POST['search'];
                }
                  
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                $sql = "SELECT * FROM task_taandcor";
                $accom = $con->query($sql);
                $row1 = $accom->fetch_assoc();
              


                ?>
                    
                    <div class="col-md-6">
                  <div class="card-tools">
                  
                  <form method="post" action="">
                  <div class="input-group" id="parent_">
                  <input type="search" name="search" id="search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                  <button type="submit" id="output" name="output" class="btn btn-primary" data-toggle="modal" data-target="#correctiveorta"><i class="fas fa-search"></i></button>
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
                      <th>Date</th>
                      <th>Done by</th>
                      <th>Request by</th>
                      <th>Task Requested</th>
                      <th>Action Taken</th>
                      <th>Task type</th>
                    
                      
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php if($row1 > 0){

                  do{ ?>
                  <tr>
                  <td><?php echo date("M d, Y", strtotime($row1['date']))?></td>
                  <td><?php echo $row1['itpersonnel'];?></td>
                  <td><?php echo $row1['personnel'];?></td>
                  <td><?php echo $row1['task_request'];?></td>
                  <td><?php echo $row1['action_taken'];?></td>
                  <td>
                  <?php
                  if($row1['task_type']=="TA"){
                  echo "<span class='badge badge-success'>TA</span>";
                  }elseif($row1['task_type']=="Corrective"){
                  echo "<span class='badge badge-primary'>Corrective</span>";
                  }else{
                  echo "<span class='badge badge-dark'>No Action</span>";
                  }
                  ?>
                  </td>
                  
                     
                  </tr>
      

                    
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
              
            <!-- /.card-body -->
          
          </div>
         
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


   

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
                  
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $user_id['id'];?>">
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
                        <select id="poll" name="section" class="form-control">
                        <option value="">Select section</option>
                        </select>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-3">
                  <div class="form-group">
                  <span style="color:red">* </span><label>Date:</label>
                  <input type="date" value="" class="form-control" name="date" id="date">

                    </div>
                    </div>

          
                    <div class="col-sm-4">
                      <div class="form-group">
                     <label>Done by:</label>
                        <input type="text" class="form-control" value="<?php echo $userdetails['fullname'];?>" name="doneby" id="doneby" placeholder="Enter ..." readonly>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span> <label>Task Request:</label>
                        <input type="text" class="form-control" name="task_request" id="task_request" placeholder="Enter ...">
                      </div>
                    </div>
                    

          
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Action Taken:</label>
                        <input type="text" class="form-control" name="action_taken" id="action_taken" placeholder="Enter ...">
                        <input type="hidden" class="form-control" name="task_type" id="task_type" value="TA" placeholder="Enter ...">
                      </div>
                    </div>
                    </div>  
              
              
            <!-- /.card-body -->
          
            

          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="add_ta" class="btn btn-success"> <i class="fas fa-save"></i> Save data</button>
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
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $user_id['id'];?>">
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
                        <select id="poll2" name="section" class="form-control">
                        <option>Select section</option>
                        </select>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-3">
                  <div class="form-group">
                  <span style="color:red">* </span><label>Date:</label>
                  <input type="date" value="" class="form-control" name="date" id="date">

                    </div>
                    </div>

          
                    <div class="col-sm-4">
                      <div class="form-group">
                      <label>Done by:</label>
                        <input type="text" class="form-control" value="<?php echo $userdetails['fullname'];?>" name="doneby" id="doneby" placeholder="Enter ..." readonly>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Task Request:</label>
                        <input type="text" class="form-control" name="task_request" id="task_request" placeholder="Enter ...">
                      </div>
                    </div>
                    

          
                    <div class="col-sm-6">
                      <div class="form-group">
                      <span style="color:red">* </span><label>Action Taken:</label>
                        <input type="text" class="form-control" name="action_taken" id="action_taken" placeholder="Enter ...">
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


    

    <!-- Main content -->
    
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                
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
              <div class="table-responsive p-0" style="height: 700px;">

              <table id="table" class="table table-bordered text-nowrap">

              <thead style="background-color:#A4A4A4;">
                  <tr>
                    <th>ICT property code</th>
                    <th>End User</th>
                    <th>Date Acquired</th>
                    <th>Division</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php if($row > 0){
                
                 do{ ?>
                
                <tr>
                <td><?php echo $row['ict_property_code'];?></td>
                <td><?php echo $row['enduser'];?></td>
                <td><?php echo date("M d, Y", strtotime($row['date_acquired']))?></td>
                <td><?php echo $row['division'];?></td>
                <td><?php echo $row['section'];?></td>
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
                <td><a type="button" class="btn btn-info btn-sm" href="maintenance_add_task.php?id=<?php echo $row['id']?>"><i class="fas fa-pencil-alt"></i> Select</a></td>
                </td>
                  </tr>
                
                </div>
 
                <?php
                
                }while($row = $accom->fetch_assoc())?>

                <?php } ?>


              
      
   

        

     
               
   
                  
                  <!-- </div> -->
                  
                  
                </tbody>
                </table>
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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

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

</body>
</html>