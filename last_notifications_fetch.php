<?php
    include('database_connect.php');
    function last_five_notifications($id){
            global $conn;
            
            $sql="select * from notifications where receiver_id='".$id."' order by time DESC limit 5";
            
            $result=$conn->query($sql);
            
            return $result;
        }
    function get_sender_name($id){
        global $conn;
        
        $sql="select * from receptionist where receptionist_id='".$id."'";
        
        $result=$conn->query($sql);
        
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            return "Receptionist (ID = ".$row['receptionist_id'].")";
        }
        else{
            $sql1="select * from doctors where doctor_id='".$id."'";
        
            $result1=$conn->query($sql1);

            if($result1->num_rows==1){
                $row1=$result1->fetch_assoc();
                return "Dr.".$row1['first_name']." ".$row1['last_name'];
            }
        }
    }
?>