<?php
    include ('database_connect.php');
    include ('crud.php');
    if(isset($_POST["action"])){
        
        if($_POST["action"]=="fetch_single"){
            $sql="select * from appoinments where appoinment_id='".$_POST["id"]."'";
            
            $result=$conn->query($sql);
            
            $row=$result->fetch_assoc();
            
            $output['patient_name']=$row['patient_name'];
            $output['phone_number']=$row['phone_number'];
            $output['doctor']=$row['doctor_id'];
            $output['appoinment_date']=$row['appoinment_date'];
            
            echo json_encode($output);
        }
        
        if($_POST['action']=="update"){
            $obj=new crud_operation();
            $doctor_name=$obj->get_doctor_name($_POST["doctor"]);
            
            $sql="update appoinments set patient_name='".$_POST["patient_name"]."',phone_number='".$_POST["phone_number"]."',doctor='".$doctor_name."',doctor_id='".$_POST["doctor"]."',appoinment_date='".$_POST["appoinment_date"]."' where appoinment_id='".$_POST["hidden_id"]."'";
            
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
                echo '<p>Data Deleted Fail</p>';
            }
        }
        
    }
?>