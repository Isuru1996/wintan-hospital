<?php
    include ('crud.php');
    include ('session.php');
    
    if(isset($_POST['reason'])){
        $return_array=array();
        $return_array['reason_error']="";
        $return_array['date_error']="";
        $return_array['password_error']="";
        $return_array['agree_error']="";
        $return_array['vacationing_success']="";
        
        
         if(empty($_POST['reason'])){
            $return_array['reason_error']="<li>Error field is empty</li>";
        }
        
        if($_POST['date']<=date("Y-m-d")){
            $return_array['date_error']="<li>Error field is not valid</li>";
        }
          
        
        
        if(empty($_POST['password'])){
            $return_array['password_error']="<li>Error field is empty</li>";
        }
        else{
            $obj=new crud_operation();
        
            if(!$obj->check_doctor_password($_POST['doctor_id'], $_POST['password'])){
                $return_array['password_error']="<li>Password not match</li>";
            }
        }
        
        
         if(!isset($_POST['agree'])){
            $return_array['agree_error']="<li>Confirm agree</li>";
        }
        
        
        
        if($return_array['reason_error']==""&&$return_array['date_error']==""&&$return_array['password_error']==""&&$return_array['agree_error']==""){
            $obj=new crud_operation();
            $doctor_id=$obj->test_input($_POST['doctor_id']);
            $doctor_name=$obj->test_input($_POST['doctor_name']);
            $reason=$obj->test_input($_POST['reason']);
            $date=$obj->test_input($_POST['date']);
            
            $return_array['vacationing_success']=$obj->add_vacationing($doctor_id, $doctor_name, $reason, $date);
        }
        
        
        echo json_encode($return_array);
    }
?>