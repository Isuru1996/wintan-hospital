<?php
    include ('database_connect.php');
    
    if(isset($_POST["action"])){
        
        
        if($_POST["action"]=="fetch_single"){
            $sql="select * from appoinments where appoinment_id='".$_POST["id"]."'";
            
            $result=$conn->query($sql);
            
            $row=$result->fetch_assoc();
            
            $output['user_id']=$row['user_id'];
            $output['patient_name']=$row['patient_name'];
            $output['phone_number']=$row['phone_number'];
            $output['doctor']=$row['doctor_id'];
            $output['appoinment_date']=$row['appoinment_date'];
            $output['appoinment_time']=$row['appoinment_time'];
            $output['appoinment_id']=$row['appoinment_id'];
            $output['status']=$row['status'];
            $output['appoinment_was_made']=$row['now'];
            
            echo json_encode($output);
        }
        
        if($_POST['action']=="update"){
            
            $sql="update appoinments set status='".$_POST["status"]."' where appoinment_id='".$_POST["hidden_id"]."'";
            
            if($conn->query($sql)===true){
                echo '<p>Data Updated</p>';
            }
            else{
                echo '<p>Data Updated failed</p>';
            }
        }
        
        if($_POST['action']=="delete"){
            $sql="delete from appoinments where appoinment_id='".$_POST["id"]."'";
            
            if($conn->query($sql)===true){
                echo '<p>Data Deleted</p>';
            }
            else{
                echo '<p>Failed.</p>';
            }
        }
        
    }
?>