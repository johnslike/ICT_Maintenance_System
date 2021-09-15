<?php

$con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

if(isset($_POST['check_submit_btn']))
      {
          $section = $_POST['section_id'];

            $section_query = "SELECT * FROM division_section WHERE section_name='$section'";
            $section_query_run = mysqli_query($con, $section_query);

                if(mysqli_num_rows($section_query_run) > 0)
                {
                   echo "(Section already exists! Please try another.)";
                }else{
                    
                    echo "(Section is available.)";
                }
      }
?>