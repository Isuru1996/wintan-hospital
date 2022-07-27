<?php
    include ('database_connect.php');
    
    if(isset($_POST["action"])){
        
        
        if($_POST["action"]=="fetch_single"){
            $sql="select * from users where user_id='".$_POST["id"]."'";
            
            $result=$conn->query($sql);
            
            $row=$result->fetch_assoc();
            
            $output['user_id']=$row['user_id'];
            $output['first_name']=$row['first_name'];
            $output['last_name']=$row['last_name'];
            $output['gender']=$row['gender'];
            $output['email']=$row['email'];
            $output['phone_number']=$row['phone_number'];
            $output['added_by']=$row['added_by'];
            
            echo json_encode($output);
        }
        
        if($_POST['action']=="update"){
            
            $sql="update users set first_name='".$_POST["first_name"]."',last_name='".$_POST["last_name"]."',gender='".$_POST["gender"]."',email='".$_POST["email"]."',phone_number='".$_POST["phone_number"]."' where user_id='".$_POST["hidden_id"]."'";
            
            if($conn->query($sql)===true){
                echo '<p>Data Updated</p>';
            }
            else{
                echo '<p>Data Updated failed</p>';
            }
        }
        
        if($_POST['action']=="delete"){
            $sql="delete from users where user_id='".$_POST["id"]."'";
            
            if($conn->query($sql)===true){
                echo '<p>Data Deleted</p>';
            }
            else{
                echo '<p>They Currently have appoinments.</p>';
            }
        }
        
    }
?>