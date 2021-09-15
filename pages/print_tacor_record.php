<?php

require_once('class/ICT_Maintenance_db.php');
// $id = $_GET['id'];
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
             


              <?php
              $search = "";
              if(isset($_POST['search'])){
                $search = $_POST['search'];
              }
    $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
?>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card_body">
            <div class="row justify-content-center pt-4">
                <label for="" class="mt-2">Month</label>
                <div class="col-sm-3">
                    <input type="month" name="month" id="month" value="<?php echo $month ?>" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center pt-4">
            <form method="post" action="" id="search_form">
                  <div class="input-group" id="parent_">
                  <input type="search" name="search" id="search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                  <button type="submit" id="output" name="output" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  <button name="refresh_data" class="btn btn-primary"><i class="fas fa-redo-alt"></i></button>
            </div>
            </div>

            <hr>
            <div class="col-md-12">
                <table class="table table-bordered" id='report-list'>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Date</th>
                            <th>Done by</th>
                            <th>Request by</th>
                            <th>Division</th>
                            <th>Section</th>
                            <th>Task Requested</th>
                            <th>Action Taken</th>
                            <th>Task type</th>
                            <th style="width: 10px">Signature</th>
                         
                        </tr>
                    </thead>
                    <tbody>
			          <?php
                      $con = mysqli_connect('localhost','root','123456','ict_maintenance_db');
                      $i = 1;
                      $total = 0;
                      $total1 = 0;
                      $payments = $con->query("SELECT * FROM task_taandcor WHERE date_format(`date`,'%Y-%m') = '$month' and itpersonnel LIKE '%$search%' order by unix_timestamp(`date`) asc ");
                      if($payments->num_rows > 0):
			                while($row = $payments->fetch_array()):

			          ?>
			          <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td>
                            <p> <b><?= date("M d, Y", strtotime($row['date']));?></b></p>
                        </td>
                        <td>
                            <p> <b><?php echo $row['personnel'] ?></b></p>
                        </td>
                        <td>
                            <p> <b><?php echo $row['itpersonnel'] ?></b></p>
                        </td>
                        <td>
                            <p> <b><?php echo $row['division'] ?></b></p>
                        </td>
                        <td>
                            <p> <b><?php echo $row['section'] ?></b></p>
                        </td>
                        <td>
                            <p> <b><?php echo $row['task_request'] ?></b></p>
                        </td>
                        <td>
                            <p> <b><?php echo $row['action_taken'] ?></b></p>
                        </td>
                        <td>
                            <p> <b><?php echo $row['task_type'] ?></b></p>
                        </td>
                        <td>
                         
                        </td>

                    </tr>
                    <?php 
                        endwhile;
                        else:
                    ?>
                    <tr>
                            <th class="text-center" colspan="7">No Data.</th>
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
                <hr>
                <div class="col-md-12 mb-4">
                    <center>
                        <button class="btn btn-success btn-sm col-sm-3" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                    </center>
                </div>
            </div>
            </div>
        </div>
    </div>
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






      </div>
    <!-- /.row -->
  
  <!-- /.content -->
</div>
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
  // window.addEventListener("load", window.print());
</script>
<script>
$('#month').change(function(){
    location.replace('print_tacor_record.php?month='+$(this).val())
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
</body>
</html>
