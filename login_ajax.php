<?php
    include ('crud.php');
    
    
    if(isset($_POST['email'])){
        $return_array=array();
        $return_array['email_error']="";
        $return_array['password_error']="";
        $return_array['login_error']="";
        $return_array['login_success']="";
        
        if(empty($_POST['email'])){
            $return_array['email_error']="<li>Error field is empty</li>";
        }
        else{
            $obj=new crud_operation();
            $email=$obj->test_input($_POST['email']);
            $return_array['email_error']=$obj->email_valid($email);
        }
        
        if(empty($_POST['password'])){
            $return_array['password_error']="<li>Error field is empty</li>";
        }
        
        if($return_array['email_error']==""&&$return_array['password_error']==""){
            $obj=new crud_operation();
            $email=$obj->test_input($_POST['email']);
            $password=$obj->test_input($_POST['password']);
            
            if($obj->login($email, $password)=="receptionist"||$obj->login($email, $password)=="doctor"||$obj->login($email, $password)=="user"){
                if($obj->login($email, $password)=="receptionist"){
                    $return_array['login_success']="admin";
                    $row=$obj->login_user_details($email, $password);
                    session_start();
                    $_SESSION['logged_in']=true;
                    $_SESSION['logged_email']=$email;
                    $_SESSION['logged_id']=$row['receptionist_id'];
                    $_SESSION['logged_type']="receptionist";
                }
                if($obj->login($email, $password)=="doctor"){
                    $return_array['login_success']="admin";
                    $row=$obj->login_user_details($email, $password);
                    session_start();
                    $_SESSION['logged_in']=true;
                    $_SESSION['logged_email']=$email;
                    $_SESSION['logged_id']=$row['doctor_id'];
                    $_SESSION['logged_type']="doctor";
                }
                if($obj->login($email, $password)=="user"){
                    $return_array['login_success']="index";
                    $row=$obj->login_user_details($email, $password);
                    session_start();
                    $_SESSION['logged_in']=true;
                    $_SESSION['logged_email']=$email;
                    $_SESSION['logged_id']=$row['user_id'];
                    $_SESSION['logged_type']="user";
                }
            }
            else{
                $return_array['login_error']=$obj->login($email, $password);
            }
            
        }
        
        echo json_encode($return_array);
    }
?>