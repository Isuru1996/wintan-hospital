<?php
    include ('crud.php');
    
    if(isset($_POST['receiver'])){
        $return_array=array();
        $return_array['receiver_error']="";
        $return_array['message_error']="";
        $return_array['notification_success']="";
       
        
        if($_POST['receiver']==""){
            $return_array['receiver_error']="<li>Select Receiver</li>";
        }
        
        if(empty($_POST['message'])){
            $return_array['message_error']="<li>Error field is empty</li>";
        }
       
        
        if($return_array['receiver_error']==""&&$return_array['message_error']==""){
            $obj=new crud_operation();
            $sender_id=$obj->test_input($_POST['sender_id']);
            $receiver=$obj->test_input($_POST['receiver']);
            $message=$obj->test_input($_POST['message']);
            
            
            $return_array['notification_success']=$obj->send_notification_added($sender_id, $receiver, $message);
       
        }
        
        
        echo json_encode($return_array);
    }
?>