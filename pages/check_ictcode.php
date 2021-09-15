<?php

$con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

if(isset($_POST['check_submit_btn']))
      {
          $ictcode = $_POST['ictcode_id'];

            $ictcode_query = "SELECT * FROM employees WHERE ict_property_code='$ictcode'";
            $ictcode_query_run = mysqli_query($con, $ictcode_query);

                if(mysqli_num_rows($ictcode_query_run) > 0)
                {
                   echo "ICT code already exists! Please try another.";
                }else{
                    
                    echo "ICT code is available.";
                }
      }
?>