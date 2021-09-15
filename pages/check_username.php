<?php

$con = mysqli_connect('localhost','root','123456','ict_maintenance_db');

if(isset($_POST['check_submit_btn']))
      {
          $username = $_POST['username_id'];

            $username_query = "SELECT * FROM user WHERE username='$username'";
            $username_query_run = mysqli_query($con, $username_query);

                if(mysqli_num_rows($username_query_run) > 0)
                {
                   echo "Username already exists! Please try another.";
                }else{
                    
                    echo "Username is available.";
                }
      }
?>