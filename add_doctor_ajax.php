<?php
    include ('crud.php');
    
    if(isset($_POST['first_name'])){
        $return_array=array();
        $return_array['first_name_error']="";
        $return_array['last_name_error']="";
        $return_array['gender_error']="";
        $return_array['email_error']="";
        $return_array['phone_number_error']="";
        $return_array['type_error']="";
        $return_array['password_error']="";
        $return_array['confirm_password_error']="";
        $return_array['agree_error']="";
        $return_array['signup_success']="";
       
        
        if(empty($_POST['first_name'])){
            $return_array['first_name_error']="<li>Error field is empty</li>";
        }
        
        if(empty($_POST['last_name'])){
            $return_array['last_name_error']="<li>Error field is empty</li>";
        }
        
        if($_POST['gender']==""){
            $return_array['gender_error']="<li>Select Gender</li>";
        }
        
        if(empty($_POST['email'])){
            $return_array['email_error']="<li>Error field is empty</li>";
        }
        else{
            $obj=new crud_operation();
            $email=$obj->test_input($_POST['email']);
            $return_array['email_error']=$obj->email_valid($email);
            
            if($return_array['email_error']==""){
                $return_array['email_error']=$obj->doctor_email_duplicate_check($email);
            }
        }
        
        if(empty($_POST['phone_number'])){
            $return_array['phone_number_error']="<li>Error field is empty</li>";
        }
        else if(strlen($_POST['phone_number'])!=10){
            $return_array['phone_number_error']="<li>Enter valid phone number</li>";
        }
        
        if($_POST['type']==""){
            $return_array['type_error']="<li>Select Type</li>";
        }
        
        if(empty($_POST['password'])){
            $return_array['password_error']="<li>Error field is empty</li>";
        }
        
        if(empty($_POST['confirm_password'])){
            $return_array['confirm_password_error']="<li>Error field is empty</li>";
        }
        
         if(!isset($_POST['agree'])){
            $return_array['agree_error']="<li>Confirm agree</li>";
        }
        
        if(!empty($_POST['password'])&&!empty($_POST['confirm_password'])){
            if($_POST['password']!=$_POST['confirm_password']){
                $return_array['confirm_password_error']="<li>Passowrd not match</li>";
            }
        }
        
        if($return_array['first_name_error']==""&&$return_array['last_name_error']==""&&$return_array['gender_error']==""&&$return_array['email_error']==""&&$return_array['phone_number_error']==""&&$return_array['type_error']==""&&$return_array['password_error']==""&&$return_array['confirm_password_error']==""&&$return_array['agree_error']==""){
            $obj=new crud_operation();
            $first_name=$obj->test_input($_POST['first_name']);
            $last_name=$obj->test_input($_POST['last_name']);
            $gender=$obj->test_input($_POST['gender']);
            $email=$obj->test_input($_POST['email']);
            $phone_number=$obj->test_input($_POST['phone_number']);
            $type=$obj->test_input($_POST['type']);
            $password=$obj->test_input($_POST['password']);
            $added_by=$obj->test_input($_POST['added_by']);
            
            $return_array['signup_success']=$obj->add_doctor($first_name, $last_name, $gender, $email, $phone_number, $type, $password,$added_by);
        }
        
        
        echo json_encode($return_array);
    }
?>