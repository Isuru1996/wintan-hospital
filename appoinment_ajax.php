<?php
    include ('crud.php');
    date_default_timezone_set("Asia/Colombo");
    
    if(isset($_POST['patient_name'])){
        $return_array=array();
        $return_array['patient_name_error']="";
        $return_array['phone_number_error']="";
        $return_array['doctor_error']="";
        $return_array['appoinment_date_error']="";
        $return_array['appoinment_success']="";
        
        
        if(empty($_POST['patient_name'])){
            $return_array['patient_name_error']="<li>Error field is empty</li>";
        }
        
        if(empty($_POST['phone_number'])){
            $return_array['phone_number_error']="<li>Error field is empty</li>";
        }
        else if(strlen($_POST['phone_number'])!=10){
            $return_array['phone_number_error']="<li>Enter valid phone number</li>";
        }
        
        if($_POST['doctor']==""){
            $return_array['doctor_error']="<li>Select Doctor</li>";
        }
        
       
        
        if(date('Y-m-d', strtotime($_POST['appoinment_date']))<date("Y-m-d")){
            $return_array['appoinment_date_error']="<li>Choose a date today or later.</li>";
        }
        else{
            $obj=new crud_operation();
            if($obj->get_appoinment_time($_POST['doctor'],date('Y-m-d', strtotime($_POST['appoinment_date'])))=="full"){
                $return_array['appoinment_date_error']="<li>Since this doctor is busy on this day, try another doctor or another day</li>";
            }  
        }
        
        if($return_array['doctor_error']==""&&$return_array['appoinment_date_error']==""){
            $obj=new crud_operation();
            if($obj->check_doctor_available($_POST['doctor'], $_POST['appoinment_date'])=="not available"){
                $return_array['doctor_error']="This doctor can not be found these days .. Try another doctor or another day.";
            }
        }
        
        if($return_array['patient_name_error']==""&&$return_array['phone_number_error']==""&&$return_array['doctor_error']==""&&$return_array['appoinment_date_error']==""){
            $obj=new crud_operation();
            $user_id=$obj->test_input($_POST['user_id']);
            $patient_name=$obj->test_input($_POST['patient_name']);
            $phone_number=$obj->test_input($_POST['phone_number']);
            $doctor_id=$obj->test_input($_POST['doctor']);
            $message=$obj->test_input($_POST['message']);
            
            $doctor=$obj->get_doctor_name($doctor_id);
            $appoinment_date=date('Y-m-d', strtotime($_POST['appoinment_date']));
            $appoinment_time=$obj->get_appoinment_time($doctor_id, $appoinment_date);
            $appoinment_id=date('Y', strtotime($_POST['appoinment_date']))."".date('m', strtotime($_POST['appoinment_date']))."".date('d', strtotime($_POST['appoinment_date']))."".$user_id."".$doctor_id;
            $status=$obj->test_input($_POST['status']);
            
            
            $return_array['appoinment_success']=$obj->add_appoinment($user_id, $patient_name, $phone_number, $doctor, $doctor_id, $appoinment_date, $appoinment_time, $appoinment_id, $status,$message);
            //$return_array['signup_success']=$obj->add_user($first_name, $last_name, $gender, $email, $phone_number, $password);
        }
        
        
        echo json_encode($return_array);
    }
?>