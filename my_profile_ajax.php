<?php
    include ('crud.php');
    include ('session.php');
    
    if(isset($_POST['first_name'])){
        $return_array=array();
        $return_array['first_name_error']="";
        $return_array['last_name_error']="";
        $return_array['gender_error']="";
        $return_array['phone_number_error']="";
        $return_array['current_password_error']="";
        $return_array['new_password_error']="";
        $return_array['confirm_password_error']="";
        $return_array['update_success']="";
        
        if(empty($_POST['first_name'])){
            $return_array['first_name_error']="<li>Error field is empty</li>";
        }
        
        if(empty($_POST['last_name'])){
            $return_array['last_name_error']="<li>Error field is empty</li>";
        }
        
        if($_POST['gender']==""){
            $return_array['gender_error']="<li>Select Gender</li>";
        }
        
        if(empty($_POST['phone_number'])){
            $return_array['phone_number_error']="<li>Error field is empty</li>";
        }
        else if(strlen($_POST['phone_number'])!=10&&strlen($_POST['phone_number'])!=9){
            $return_array['phone_number_error']="<li>Enter valid phone number</li>";
        }
        
        if(empty($_POST['current_password'])){
            $return_array['current_password_error']="<li>Error field is empty</li>";
        }
        
        if(!empty($_POST['new_password'])||!empty($_POST['confirm_password'])){
            if($_POST['new_password']!=$_POST['confirm_password']){
                $return_array['confirm_password_error']="<li>Passowrd not match</li>";
            }
        }
        
        
        
        if($return_array['current_password_error']==""){
            $obj=new crud_operation();
            if($obj->check_password($_SESSION['logged_id'], $_POST['current_password'])=="incorrect"){
                $return_array['current_password_error']="<li>Password incorrect</li>";
            }
        }
       
        
        if($return_array['first_name_error']==""&&$return_array['last_name_error']==""&&$return_array['gender_error']==""&&$return_array['phone_number_error']==""&&$return_array['current_password_error']==""&&$return_array['new_password_error']==""&&$return_array['confirm_password_error']==""){
            $obj=new crud_operation();
            
            $first_name=$obj->test_input($_POST['first_name']);
            $last_name=$obj->test_input($_POST['last_name']);
            $gender=$obj->test_input($_POST['gender']);
            $phone_number=$obj->test_input($_POST['phone_number']);
            $password="";
            if(!empty($_POST['new_password'])){
                $password=$obj->test_input($_POST['new_password']);
            }
            else{
                $password=$obj->test_input($_POST['current_password']);
            }
            

            
            $return_array['update_success']=$obj->edit_profile($_SESSION['logged_type'], $_SESSION['logged_id'], $first_name, $last_name, $gender, $phone_number, $password);
        
           
        }
        
        
        echo json_encode($return_array);
    }
?>