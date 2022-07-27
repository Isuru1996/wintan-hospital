<?php
    include ('database_connect.php');
    
    class crud_operation{
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        function email_valid($email){
            //$email=test_input($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "<li>email is invalid</li>";
            }
            else{
                return "";
            }
        }
        
        function login($email,$password){
            global $conn;
            
            $sql1="select * from receptionist where email='".$email."' and password='".$password."'";
            
            $result1=$conn->query($sql1);
            
            if($result1->num_rows>0){
                return "receptionist";
            }
            else{
                $password=  md5($password);
                $sql2="select * from doctors where email='".$email."' and password='".$password."'";
            
                $result2=$conn->query($sql2);
                
                if($result2->num_rows>0){
                    return "doctor";
                }
                else
                {
                    //$password=  md5($password);
                    $sql3="select * from users where email='".$email."' and password='".$password."'";
            
                    $result3=$conn->query($sql3);
                    
                    if($result3->num_rows>0){
                        return "user";
                    }
                    else{
                        return "<li>please check email and password</li>";
                    }
                }
            }
        }
        
        function user_email_duplicate_check($email){
            global $conn;
            
            $sql="select * from users where email='".$email."'";
            
            $result=$conn->query($sql);
            
            if($result->num_rows>0){
                return "<li>Already have an account</li>";
            }
            else{
                return "";
            }
        }
        
        function add_user($first_name,$last_name,$gender,$email,$phone_number,$password,$added_by){
            global $conn;
            
            $password=  md5($password);
            $sql="";
            if($added_by==""){
                $sql="insert into users(first_name,last_name,gender,email,phone_number,password) values('".$first_name."','".$last_name."','".$gender."','".$email."','".$phone_number."','".$password."')";
            
            }
            else{
                $sql="insert into users(first_name,last_name,gender,email,phone_number,password,added_by) values('".$first_name."','".$last_name."','".$gender."','".$email."','".$phone_number."','".$password."','".$added_by."')";
            
            }
            
            if($conn->query($sql)===true){
                return "success";
            }
            else
                return "fail";
        }
        
        function login_user_details($email,$password){
            global $conn;
            
            $sql1="select * from receptionist where email='".$email."' and password='".$password."'";
            
            $result1=$conn->query($sql1);
            
            if($result1->num_rows>0){
                $row1=$result1->fetch_assoc();
                return $row1;
            }
            else{
                $password=  md5($password);
                $sql2="select * from doctors where email='".$email."' and password='".$password."'";
            
                $result2=$conn->query($sql2);
                
                if($result2->num_rows>0){
                    $row2=$result2->fetch_assoc();
                    return $row2;
                }
                else
                {
                    
                    $sql3="select * from users where email='".$email."' and password='".$password."'";
            
                    $result3=$conn->query($sql3);
                    
                    if($result3->num_rows>0){
                        $row3=$result3->fetch_assoc();
                        return $row3;
                    }
        
                }
            }
        }
        
        function doctor_email_duplicate_check($email){
            global $conn;
            
            $sql="select * from doctors where email='".$email."'";
            
            $result=$conn->query($sql);
            
            if($result->num_rows>0){
                return "<li>Already have an account</li>";
            }
            else{
                return "";
            }
        }
        
        function add_doctor($first_name,$last_name,$gender,$email,$phone_number,$type,$password,$added_by){
            global $conn;
            
            $password=  md5($password);
            $sql="insert into doctors(first_name,last_name,gender,email,phone_number,type,password,added_by) values('".$first_name."','".$last_name."','".$gender."','".$email."','".$phone_number."','".$type."','".$password."','".$added_by."')";
            
            if($conn->query($sql)===true){
                return "success";
            }
            else
                return "fail";
        }
        
        function get_doctor_details(){
            global $conn;
            
            $sql="select doctor_id,first_name,last_name,type from doctors order by type";
            
            $result=$conn->query($sql);
            
            return $result;
        }
        
        
        function get_appoinment_time($doctor_id,$appoinment_date){
            global $conn;
            
            $sql="select * from appoinments where doctor_id='".$doctor_id."' and appoinment_date='".$appoinment_date."'";
            
            $result=$conn->query($sql);
            
            if($result->num_rows<5){
                return "6.00 P.M";
            }
            else if($result->num_rows<10){
                return "7.00 P.M";
            }
            else if($result->num_rows<15){
                return "8.00 P.M";
            }
            else if($result->num_rows<20){
                return "9.00 P.M";
            }
            else{
                return "full";
            }
        }
        
        function get_doctor_name($doctor_id){
            global $conn;
            
            $sql="select first_name,last_name from doctors where doctor_id='".$doctor_id."'";
            
            $result=$conn->query($sql);
            
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                
                return $row['first_name']." ".$row['last_name'];
            }
        }
        
        function add_appoinment($user_id,$patient_name,$phone_number,$doctor,$doctor_id,$appoinment_date,$appoinment_time,$appoinment_id,$status,$message){
            global $conn;
            
            $sql="insert into appoinments value('".$user_id."','".$patient_name."','".$phone_number."','".$doctor."','".$doctor_id."','".$appoinment_date."','".$appoinment_time."','".$appoinment_id."','".$status."',now(),'".$message."')";
            
            if($conn->query($sql)===true){
                return "success";
            }
            else{
                return "fail";
            }
        }
        
        function check_doctor_password($doctor_id,$password){
            global $conn;
            
            $password=md5($password);
            $sql="select * from doctors where doctor_id='".$doctor_id."' and password='".$password."'";
            
            $result=$conn->query($sql);
            
            if($result->num_rows>0){
                return true;
            }
            else{
                return false;
            }
        }
        
        function add_vacationing($doctor_id,$doctor_name,$reason,$date){
            global $conn;
            
            $sql="insert into vacationing(doctor_id,doctor_name,reason,date) values('".$doctor_id."','".$doctor_name."','".$reason."','".$date."')";
            
            if($conn->query($sql)===true){
                return "success";
            }
            else{
                return "fail";
            }
        }
        
        function check_doctor_available($doctor_id,$date){
            global $conn;
            
            $sql="select * from vacationing where doctor_id='".$doctor_id."' and date='".$date."'";
            
            $result=$conn->query($sql);
            
            if($result->num_rows>0){
                return "not available";
            }
            else{
                return "available";
            }
        }
        
        function profile_data($type,$id){
            global $conn;
            $sql="";
            if($type=="receptionist"){
                $sql="select * from receptionist where receptionist_id='".$id."'";
            }
            else if($type=="doctor"){
                $sql="select * from doctors where doctor_id='".$id."'";
            }
            else{
                $sql="select * from users where user_id='".$id."'";
            }
            
            $result=$conn->query($sql);
            
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                return $row;
            }
        }
        
        function check_password($id,$password){
            global $conn;
            $password=md5($password);
            
            $sql1="select * from users where user_id='".$id."' and password='".$password."'";
            
            $result1=$conn->query($sql1);
            
            if($result1->num_rows>0){
                return "correct";
            }
            else{
                $sql2="select * from doctors where doctor_id='".$id."' and password='".$password."'";
            
                $result2=$conn->query($sql2);

                if($result2->num_rows>0){
                    return "correct";
                }
                else{
                    return "incorrect";
                }
            }
        }
        
        function edit_profile($type,$id,$first_name,$last_name,$gender,$phone_number,$password){
            global $conn;
            
            $password=md5($password);
            $sql="";
            
            if($type=="doctor"){
                $sql="update doctors set first_name='".$first_name."',last_name='".$last_name."',gender='".$gender."',phone_number='".$phone_number."',password='".$password."' where doctor_id='".$id."'";
            }
            else if($type=="user"){
                $sql="update users set first_name='".$first_name."',last_name='".$last_name."',gender='".$gender."',phone_number='".$phone_number."',password='".$password."' where user_id='".$id."'";
            
            }
            
            if($conn->query($sql)===true){
                return "success";
            }
            else{
                return "fail";
            }
        }
        
        function get_receivers_notification($type,$id){
            global $conn;
            
            $sql1="";
            $sql2="";
            if($type=="receptionist"){
                $sql1="select * from receptionist where receptionist_id!='".$id."'";
                $sql2="select * from doctors";
            }
            else{
                $sql1="select * from doctors where doctor_id!='".$id."'";
                $sql2="select * from receptionist";
            }
            $result=array();
            $result['result1']=$conn->query($sql1);
            $result['result2']=$conn->query($sql2);
            
            return $result;
        }
        
        function send_notification_added($sender_id,$receiver_id,$message){
            global $conn;
            
            $sql="insert into notifications(sender_id,receiver_id,message,time) values('".$sender_id."','".$receiver_id."','".$message."',now())";
            
            if($conn->query($sql)===true){
                return "success";
            }
            else{
                return "false";
            }
        }
        
        
        
    }
?>