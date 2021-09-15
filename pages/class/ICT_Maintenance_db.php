
<?php

Class JOS {

    private $server = "mysql:host=localhost;dbname=ict_maintenance_db";
    private $user = "root";
    private $pass = "123456";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>
    PDO::FETCH_ASSOC);
    protected $con;

    public function openConnection()
    {
        try{
            
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;

        }
            catch(PDOException $e)
            {
                echo "There is some problem in connection :".$e->getMessage();
            }
        }

    public function closeConnection()
    {
        $this->con - null;
    }



    public function getUsers()
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM user");
        $stmt->execute();
        $users = $stmt->fetchAll();
        $userCount = $stmt->rowCount();

        if($userCount > 0){
            return $users;
        }else{
            return 0;
        }

    }


    // public function check_user_login($access){


    //     $connection = $this->openConnection();
    //             $stmt = $connection->prepare("SELECT * FROM user WHERE access = ? && ");
    //             $stmt->execute([$access]);
    //             $total = $stmt->rowCount();

    //             return $total;
    // }



    public function login(){

        
            if(!isset($_SESSION)){
                session_start();
            }  

        
    
        if(isset($_POST['login'])){

            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            

                $connection = $this->openConnection();
                $stmt = $connection->prepare("SELECT * FROM user WHERE username = ? AND `password` = ?");
                $stmt->execute([$username, $password]);
                $user = $stmt->fetch();
                $total = $stmt->rowCount();

                
                if($total > 0){
                    $user_id = $user['id'];
                    
                        if($user['access'] !="Admin"){
                              header("Location: maintenance.php?id=$user_id");
                          }else{
                          header("Location: index.php");
                      }
                          
                      
                    $this->set_userdata($user);
                }else{
                    $_SESSION['status'] = "Username or password is incorrect";
                $_SESSION['status_code'] = "error";
                
                }
        }
    }


    public function set_userdata($array)
    {
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['userdata'] = array(
            "fullname" => $array['fullname'],
            "access" => $array['access'],
            "id" => $array['id']
        );

        return $_SESSION['userdata'];

    }



    public function get_userdata()

    {
        if(!isset($_SESSION)){
            session_start();
        }  

        if(isset ($_SESSION['userdata'])){
            return $_SESSION['userdata'];
        }else{
            return null;
        }
     
    }


    public function logout()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['userdata'] = null;
        unset($_SESSION['userdata']);
    }




    public function check_user_exist($username){


        $connection = $this->openConnection();
                $stmt = $connection->prepare("SELECT * FROM user WHERE username = ?");
                $stmt->execute([$username]);
                $total = $stmt->rowCount();

                return $total;
    }



    public function add_user()
    {
        if(isset($_POST['add_user']))
        {

            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $access = $_POST['access'];

            if($this->check_user_exist($username) == 0)
            {
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO user(`fullname`, `username`, `password`, `access`) VALUES(?,?,?,?)");
                $stmt->execute([$fullname, $username, $password, $access]);

                echo header ("Location: admin_register.php");
            }else{
              
               echo header ("Location: admin_register.php"); 
        }
            
        }
    }


    public function check_section_exist($section){


        $connection = $this->openConnection();
                $stmt = $connection->prepare("SELECT * FROM division_section WHERE section_name = ?");
                $stmt->execute([$section]);
                $total = $stmt->rowCount();

                return $total;
    }


    public function add_section()
    {
        if(isset($_POST['add_section']))
        {

            $division = $_POST['division'];
            $section = $_POST['section'];

            if($this->check_user_exist($section) == 0)
            {
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO division_section(`division_name`, `section_name`) VALUES(?,?)");
                $stmt->execute([$division, $section]);

                echo header ("Location: setting_library.php");
            }else{
              
               echo header ("Location: setting_library.php"); 
        }
            
        }
    }


    public function check_ictcode_exist($code){

                $connection = $this->openConnection();
                $stmt = $connection->prepare("SELECT * FROM employees WHERE ict_property_code = ?");
                $stmt->execute([$code]);
                $total = $stmt->rowCount();

                return $total;
    }


    public function add_employee(){
        
  
        if(isset($_POST['add_employee'])){
            
            $code = $_POST['code'];
            $sno = $_POST['sno'];
            $type = $_POST['type'];
            $brand = $_POST['brand'];
            $specs = $_POST['specs'];
            $acquired = $_POST['acquired'];
            $acquisition = $_POST['acquisition'];
            $enduser = $_POST['enduser'];
            $division = $_POST['division'];
            $section = $_POST['section'];
            $status = $_POST['status'];
            $reason = $_POST['reason'];
            
        
            if($this->check_ictcode_exist($code) == 0)
            {
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO `employees`(`ict_property_code`, `serial_no`, `type`, `brand`, `brief_specs`, `date_acquired`, `acquisition`, `enduser`, `division`, `section`, `status`, `reason`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->execute([$code, $sno, $type,$brand,$specs,$acquired,$acquisition,$enduser,$division,$section,$status,$reason]);

                echo header("Location:../pages/add_enduser.php");
            }else{

                echo header("Location:../pages/add_enduser.php");
            }
                
            
            
        }
        
    }

    public function add_task(){

  
        if(isset($_POST['add_task'])){
            
            $employee_id = $_POST['employee_id'];
            $task = $_POST['task'];
            $date = $_POST['date'];
            $action = $_POST['action'];
            $doneby = $_POST['doneby'];
            $affirmed = $_POST['affirmed'];
            
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO `maintenance_record`(`employee_id`, `tasks`, `date`, `action_taken`, `doneby`, `affirmedby`) VALUES(?,?,?,?,?,?)");
                $stmt->execute([$employee_id,$task, $date, $action,$doneby,$affirmed]);

            
                echo header("Location:../pages/add_task_done.php?id=".$employee_id);
            
        }
        
    }


    public function add_technical_assistants(){

  
        if(isset($_POST['add_ta'])){
            
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];
            $personnel = $_POST['personnel'];
            $division = $_POST['division'];
            $section = $_POST['section'];
            $doneby = $_POST['doneby'];
            $task_request = $_POST['task_request'];
            $action_taken = $_POST['action_taken'];
            $task_type = $_POST['task_type'];
            
                $connection = $this->openConnection();
                $stmt2 = $connection->prepare("INSERT INTO `task_taandcor`(`user_id`, `date`, `division`, `section`, `personnel`, `itpersonnel`, `task_request`, `action_taken`, `task_type`) VALUES(?,?,?,?,?,?,?,?,?)");
                $stmt2->execute([$user_id,$date,$division,$section,$personnel,$doneby,$task_request,$action_taken,$task_type]);

               
               echo header("Location:../pages/add_ta_or_corrective.php?id=".$user_id);
            
        }
        
    }



    public function add_maintenance_technical_assistants(){

        
  
        if(isset($_POST['add_ta'])){
            
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];
            $personnel = $_POST['personnel'];
            $division = $_POST['division'];
            $section = $_POST['section'];
            $doneby = $_POST['doneby'];
            $task_request = $_POST['task_request'];
            $action_taken = $_POST['action_taken'];
            $task_type = $_POST['task_type'];
            
                $connection = $this->openConnection();
                $stmt2 = $connection->prepare("INSERT INTO `task_taandcor`(`user_id`, `date`, `division`, `section`, `personnel`, `itpersonnel`, `task_request`, `action_taken`, `task_type`) VALUES(?,?,?,?,?,?,?,?,?)");
                $stmt2->execute([$user_id,$date,$division,$section,$personnel,$doneby,$task_request,$action_taken,$task_type]);
                
            
                echo header("Location:../pages/maintenance.php?id=".$user_id);
            
        }
        
    }




    public function add_corrective(){

  
        if(isset($_POST['add_corrective'])){
            
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];
            $personnel = $_POST['personnel'];
            $division = $_POST['division'];
            $section = $_POST['section'];
            $doneby = $_POST['doneby'];
            $task_request = $_POST['task_request'];
            $action_taken = $_POST['action_taken'];
            $task_type = $_POST['task_type'];
            
                $connection = $this->openConnection();
                $stmt2 = $connection->prepare("INSERT INTO `task_taandcor`(`user_id`, `date`, `division`, `section`, `personnel`, `itpersonnel`, `task_request`, `action_taken`, `task_type` ) VALUES(?,?,?,?,?,?,?,?,?)");
                $stmt2->execute([$user_id,$date,$division,$section,$personnel,$doneby,$task_request,$action_taken,$task_type]);


               
                echo header("Location:../pages/add_ta_or_corrective.php?id=".$user_id);
            
        }
        
    }



    public function add_maintenance_corrective(){

  
        if(isset($_POST['add_corrective'])){
            
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];
            $personnel = $_POST['personnel'];
            $division = $_POST['division'];
            $section = $_POST['section'];
            $doneby = $_POST['doneby'];
            $task_request = $_POST['task_request'];
            $action_taken = $_POST['action_taken'];
            $task_type = $_POST['task_type'];
            
                $connection = $this->openConnection();
                $stmt2 = $connection->prepare("INSERT INTO `task_taandcor`(`user_id`, `date`, `division`, `section`, `personnel`, `itpersonnel`, `task_request`, `action_taken`, `task_type` ) VALUES(?,?,?,?,?,?,?,?,?)");
                $stmt2->execute([$user_id,$date,$division,$section,$personnel,$doneby,$task_request,$action_taken,$task_type]);

            
                echo header("Location:../pages/maintenance.php?id=".$user_id);
            
        }
        
    }



    public function add_parts(){

  
        if(isset($_POST['add_parts'])){
            
            $employee_id = $_POST['employee_id'];
            $parts = $_POST['parts'];
            $date = $_POST['date'];
            $doneby = $_POST['doneby'];
            $affirmed = $_POST['affirmed'];
            
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO `replaced_parts`(`employee_id`, `parts`, `date`, `doneby`, `affirmedby`) VALUES(?,?,?,?,?)");
                $stmt->execute([$employee_id,$parts,$date,$doneby,$affirmed]);

            
                echo header("Location:../pages/maintenance_log.php?id=".$employee_id);
            
        }
        
    }


//     public function check_employeeid_exist($code){

//         $connection = $this->openConnection();
//         $stmt = $connection->prepare("SELECT * FROM maintenance_log WHERE employee_id = ?");
//         $stmt->execute([$code]);
//         $total = $stmt->rowCount();

//         return $total;
// }



    // public function change_status(){

  
    //     if(isset($_POST['status'])){
            
    //         $employee_id = $_POST['employee_id'];
    //         $reason = $_POST['reason'];
    //         $date = $_POST['date'];
    //         $action = $_POST['action'];
    //         $doneby = $_POST['doneby'];
    //         $affirmed = $_POST['affirmed'];


    //         if($this->check_employeeid_exist($employee_id) == 0){
   
            
    //             $connection = $this->openConnection();
    //             $stmt = $connection->prepare("INSERT INTO `maintenance_log`(`employee_id`, `reason`, `date`, `action`, `doneby`, `affirmedby`) VALUES(?,?,?,?,?,?)");
    //             $stmt->execute([$employee_id,$reason, $date, $action,$doneby,$affirmed]);
                

    //             $connection->query("UPDATE `employees` SET `status` = 'Inactive', `reason` = '$reason' WHERE `id` = '$employee_id'");

            
    //             sleep(2);
    //             echo header("Location:../pages/search_property_code.php");
    //         }else{
    //             $connection->query("UPDATE `maintenance_log` SET `employee_id` = '$employee_id' WHERE `id` = '$employee_id'");
                

    //         }
            
    //     }
        
    // }


    public function add_task_maintenance(){

  
        if(isset($_POST['add_task'])){
            
            $employee_id = $_POST['employee_id'];
            $task = $_POST['task'];
            $date = $_POST['date'];
            $action = $_POST['action'];
            $doneby = $_POST['doneby'];
            $affirmed = $_POST['affirmed'];
            
           
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO `maintenance_record`(`employee_id`, `tasks`, `date`, `action_taken`, `doneby`, `affirmedby`) VALUES(?,?,?,?,?,?)");
                $stmt->execute([$employee_id,$task, $date, $action,$doneby,$affirmed]);
                $total= $stmt->rowCount();

                echo header("Location:../pages/maintenance_add_task.php?id=".$employee_id);
          
        }
        
    }


    public function update_employee(){

  
        if(isset($_POST['update'])){
            
                $id = $_POST['id'];
                $code = $_POST['code'];
                $sno = $_POST['sno'];
                $type = $_POST['type'];
                $brand = $_POST['brand'];
                $specs = $_POST['specs'];
                $acquired = $_POST['acquired'];
                $acquisition = $_POST['acquisition'];
                $enduser = $_POST['enduser'];
                $division = $_POST['division'];
                $section = $_POST['section'];
                
                
            
                // if($this->check_ictcode_exist($code) == 0)
                // {
                $connection = $this->openConnection();
                $connection->query("UPDATE `employees` SET `ict_property_code` = '$code', `serial_no` = '$sno', `type` = '$type', `brand` = '$brand', `brief_specs` = '$specs', `date_acquired` = '$acquired', `acquisition` = '$acquisition', `enduser` = '$enduser', `division` = '$division', `section` = '$section',  `date_updated` = now() WHERE `id` = '$id'");

                echo header("Location:../pages/add_enduser.php");
            // }
            // else{
            //     echo header("Location:../pages/add_enduser.php");
            // }
          
        }
        
    }


    public function update_task(){

  
        if(isset($_POST['update'])){
            
            $id = $_POST['id'];
            $employee_id = $_POST['employee_id'];
            $task = $_POST['task'];
            $date = $_POST['date'];
            $action_taken = $_POST['action_taken'];
            $doneby = $_POST['doneby'];
            $affirmedby = $_POST['affirmedby'];
            
           
                $connection = $this->openConnection();
                $connection->query("UPDATE `maintenance_record` SET `tasks` = '$task', `date` = '$date', `action_taken` = '$action_taken', `doneby` = '$doneby', `affirmedby` = '$affirmedby', `date_updated` = now() WHERE `id` = '$id'");

                echo header("Location:../pages/add_task_done.php?id=".$employee_id);
        }
        
    }


    public function update_section(){

  
        if(isset($_POST['update'])){
            
            $id = $_POST['id'];
            $division = $_POST['division'];
            $section = $_POST['section'];;
            
           
                $connection = $this->openConnection();
                $connection->query("UPDATE `division_section` SET `division_name` = '$division', `section_name` = '$section', `date_updated` = now() WHERE `id` = '$id'");

                echo header("Location:../pages/setting_library.php");
        }
        
    }



    public function update_taorcorrective(){

  
        if(isset($_POST['update_taorcorrective'])){
            

            $user_id = $_POST['user_id'];
            $id = $_POST['id'];
            $personnel = $_POST['personnel'];
            $division = $_POST['division'];
            $section = $_POST['section'];
            $date = $_POST['date'];
            // $doneby = $_POST['doneby'];
            $tasktype = $_POST['tasktype'];
            $task_request = $_POST['task_request'];
            $action_taken = $_POST['action_taken'];

                $connection = $this->openConnection();
                $connection->query("UPDATE `task_taandcor` SET `personnel` = '$personnel', `division` = '$division', `section` = '$section', `date` = '$date', `task_type` = '$tasktype', `task_request` = '$task_request', `action_taken` = '$action_taken', `date_updated` = now() WHERE `id` = '$id'");

                echo header("Location:../pages/add_ta_or_corrective.php?id=".$user_id);
        }
        
    }



    public function update_account(){
      
        // if(!isset($_SESSION))
        // {
        //     session_start();
        // }
  
  
        if(isset($_POST['update'])){
            
            $id = $_POST['id'];
            $fname = $_POST['fullname'];
            $uname = $_POST['username'];
            $pass = $_POST['password'];
            $acc = $_POST['access'];
            
            
                $connection = $this->openConnection();
                $connection->query("UPDATE `user` SET `fullname` = '$fname', `username` = '$uname', `password` = '$pass', `access` = '$acc', `date_updated` = now() WHERE `id` = '$id'");
                
                // $_SESSION['status'] = "Acount successfully updated";
                // $_SESSION['status_code'] = "success";
                // return $_SESSION['status'];
                echo header("Location:../pages/admin_register.php");
                
                
          
        }
        
    }


    public function update_status_inactive(){


        if(isset($_POST['updateactive'])){
            
            $id = $_POST['id'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $action = $_POST['action'];
            $reason = $_POST['reason'];
            

            
                $connection = $this->openConnection();
                $connection->query("UPDATE `employees` SET `status` = '$status', `reason` = '$reason', `date_of_changestatus` = '$date', `action` = '$action', `date_updated` = now() WHERE `id` = '$id'");
                $stmt = $connection->prepare("INSERT INTO  `status_log` (`employee_id`, `status`, `date`, `action`, `reason`) VALUES (?,?,?,?,?)");
                $stmt->execute([$id,$status,$date,$action,$reason]);
                
               
                echo header("Location: maintenance_report.php");

            
          
               }
         }


    public function update_status_active(){

  

        if(isset($_POST['updateinactive'])){
            
            $id = $_POST['id'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $action = $_POST['action'];
            $reason = $_POST['reason'];
            
            
                $connection = $this->openConnection();
                $connection->query("UPDATE `employees` SET `status` = '$status', `reason` = '$reason', `date_of_changestatus` = '$date', `action` = '$action', `date_updated` = now() WHERE `id` = '$id'");
                $stmt = $connection->prepare("INSERT INTO  `status_log` (`employee_id`, `status`, `date`, `action`, `reason`) VALUES (?,?,?,?,?)");
                $stmt->execute([$id,$status,$date,$action,$reason]);

               
                echo header("Location: maintenance_report.php");

            
          
               }
         }

   


    public function delete_employee(){

  
        if(isset($_POST['delete'])){
            
            $id = $_POST['id'];
            
            
           
                $connection = $this->openConnection();
                $connection->query("DELETE FROM `employees` WHERE `id` = '$id'");
            
                echo header("Location:../pages/add_enduser.php");
                
          
        }
        
    }


    public function delete_taorcorrective(){

  
        if(isset($_POST['delete_taorcorrective'])){
            
            $user_id = $_POST['user_id'];
            $id = $_POST['id'];
            
                $connection = $this->openConnection();
                $connection->query("DELETE FROM `task_taandcor` WHERE `id` = '$id'");
                // $connection->query("DELETE FROM `task_ta` WHERE `date_added` = '$id'");
                // $connection->query("DELETE FROM `task_corrective` WHERE `date_added` = '$id'");
            
                echo header("Location:../pages/add_ta_or_corrective.php?id=".$user_id);
                
          
        }
        
    }


    public function delete_account(){

        if(isset($_POST['delete'])){
            
            $id = $_POST['id'];
        
            
           
                $connection = $this->openConnection();
                $connection->query("DELETE FROM `user` WHERE `id` = '$id'");

                echo header("Location:../pages/admin_register.php");
                
          
        }
        
    }


    public function delete_task(){

        if(isset($_POST['delete'])){
            
            $id = $_POST['id'];

        }
        if(isset($_POST['delete'])){
            
            $id = $_POST['id'];
            // $employee_id = $_POST['employee_id'];
           
                $connection = $this->openConnection();
                $connection->query("DELETE FROM `maintenance_record` WHERE `id` = '$id'");

                echo header("Location:../pages/add_task_done.php?id=");
                
          
        }
        
    }



    public function delete_section(){

        if(isset($_POST['delete'])){
            
            $id = $_POST['id'];

        }
        if(isset($_POST['delete'])){
            
            $id = $_POST['id'];
            // $employee_id = $_POST['employee_id'];
           
                $connection = $this->openConnection();
                $connection->query("DELETE FROM `division_section` WHERE `id` = '$id'");

                echo header("Location:../pages/setting_library.php");
                
          
        }
        
    }



    public function show_404(){

        http_response_code(404);
        echo "Page not found";
        die;

    }


    public function get_property_code(){
  
                $connection = $this->openConnection();
                $stmt = $connection->prepare("SELECT * FROM employees");
                $stmt->execute();
                $users = $stmt->fetch();
                $total= $stmt->rowCount();

                if($total > 0){
                    return $users;
                }else{
                    return $this->show_404();
                }

    }


    public function get_all_task($id){
  
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT t1.id, t1.employee_id, tasks, date, action_taken, doneby, affirmedby, t2.signature FROM (SELECT * FROM maintenance_record WHERE maintenance_record.employee_id = ? ) t1 LEFT JOIN employees_signature t2 ON t1.id = t2.mr_id");
        $stmt->execute([$id]);
        $tasks = $stmt->fetchall();
        $total= $stmt->rowCount();

        if($total > 0){
            return $tasks;
        }else{
            return FALSE;
        }


        }



        public function get_affirmedby($id){
  
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT t1.id, t1.employee_id, t1.affirmedby FROM (SELECT * FROM maintenance_record WHERE maintenance_record.id = ? ) t1 LEFT JOIN employees_signature t2 ON t1.id = t2.mr_id");
            $stmt->execute([$id]);
            $tasks = $stmt->fetch();
            $total= $stmt->rowCount();
    
            if($total > 0){
                return $tasks;
            }else{
                return FALSE;
            }
    
    
            }



        public function get_all_taorcor($user_id){
  
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM task_taandcor WHERE `user_id` = ? ORDER BY `date` DESC");
            $stmt->execute([$user_id]);
            $tasks = $stmt->fetchall();
            $total= $stmt->rowCount();
    
            if($total > 0){
                return $tasks;
            }else{
                return FALSE;
            }
    
    
            }
    


        public function get_all_log($employee_id){
  
            $connection = $this->openConnection();
           
             $stmt = $connection->prepare("SELECT * FROM status_log WHERE employee_id = ?");
            $stmt->execute([$employee_id]);
            $tasks = $stmt->fetchall();
            $total= $stmt->rowCount();
    
            if($total > 0){
                return $tasks;
            }else{
                return FALSE;
            }
    
    
            }





    public function get_single_property_code($id){
  
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        $total= $stmt->rowCount();

        if($total > 0){
            return $user;
        }else{
            return FALSE;
        }


        }



        public function get_single_user($id){
  
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM user WHERE id = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch();
            $total= $stmt->rowCount();
    
            if($total > 0){
                return $user;
            }else{
                return FALSE;
            }
    
    
            }



        public function get_single_task_code($id){
  
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM maintenance_record WHERE id = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetchall();
            $total= $stmt->rowCount();
    
            if($total > 0){
                return $user;
            }else{
                return FALSE;
            }
    
    
    }


    public function get_user_id($id){
  
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM user WHERE `id` = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        $total= $stmt->rowCount();

        if($total > 0){
            return $user;
        }else{
            return FALSE;
        }


}


public function get_userid(){
  
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM user");
    $stmt->execute();
    $user = $stmt->fetchAll();
    $total= $stmt->rowCount();

    if($total > 0){
        return $user;
    }else{
        return FALSE;
    }


}



// public function get_corrective_id($id){
  
//     $connection = $this->openConnection();
//     $stmt = $connection->prepare("SELECT * FROM task_corrective WHERE `id` = ?");
//     $stmt->execute([$id]);
//     $user = $stmt->fetch();
//     $total= $stmt->rowCount();

//     if($total > 0){
//         return $user;
//     }else{
//         return FALSE;
//     }


// }



    public function get_reports(){
  
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM employees");
        $stmt->execute();
        $report = $stmt->fetchall();
        $total= $stmt->rowCount();

        if($total > 0){
            return $report;
        }else{
            return FALSE;
        }


        }



        public function get_single_parts($employee_id){
  
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM replaced_parts WHERE employee_id = ?");
            $stmt->execute([$employee_id]);
            $parts = $stmt->fetchall();
            $total= $stmt->rowCount();
    
            if($total > 0){
                return $parts;
            }else{
                return FALSE;
            }
    
    
    }

    public function href_signadmin(){
        if(isset($_POST['add_sign']))
        {
            $task_id = $_POST['task_id'];
            
        echo header("Location: sign_index_admin.php?id=$task_id");
        
        }

}


public function href_sign(){
    if(isset($_POST['add_sign']))
    {
        $task_id = $_POST['task_id'];
        
    echo header("Location: sign_index.php?id=$task_id");
    
    }

}

    

}

$store = new JOS();