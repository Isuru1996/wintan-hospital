<?php
    include ('database_connect.php');
    include ('session.php');
    
    $result["output1"]="";
    $result["output2"]="";
    
    
    $sql1="select * from notifications where receiver_id='".$_SESSION['logged_id']."' order by time DESC";
    
    $result1=$conn->query($sql1);
    
    $result["output1"]='<table class="table table-striped table-bordered">'
            . '<tr>'
            . '<th>Notification Id</th>'
            . '<th>Sender Id</th>'
            . '<th>Message</th>'
            . '<th>Time</th>'
            . '</tr>';
            
    
    if($result1->num_rows>0){
        while($row1=$result1->fetch_assoc()){
            $result["output1"].='<tr>'
                    . '<td>'.$row1["notification_id"].'</td>'
                    . '<td>'.$row1["sender_id"].'</td>'
                    . '<td>'.$row1["message"].'</td>'
                    . '<td>'.$row1["time"].'</td></tr>';
                       
        }
    }else{
        $result["output1"].='<tr>'
                . '<td colspan="4" align="center">Data not found</td>'
                . '</tr>';
    }
    $result["output1"].="</table>";
    
    
    $sql2="select * from notifications where sender_id='".$_SESSION['logged_id']."' order by time DESC";
    
    $result2=$conn->query($sql2);
    
    $result["output2"]='<table class="table table-striped table-bordered">'
            . '<tr>'
            . '<th>Notification Id</th>'
            . '<th>Receiver Id</th>'
            . '<th>Message</th>'
            . '<th>Time</th>'
            . '</tr>';
            
    
    if($result2->num_rows>0){
        while($row2=$result2->fetch_assoc()){
            $result["output2"].='<tr>'
                    . '<td>'.$row2["notification_id"].'</td>'
                    . '<td>'.$row2["receiver_id"].'</td>'
                    . '<td>'.$row2["message"].'</td>'
                    . '<td>'.$row2["time"].'</td></tr>';
                       
        }
    }else{
        $result["output2"].='<tr>'
                . '<td colspan="4" align="center">Data not found</td>'
                . '</tr>';
    }
    $result["output2"].="</table>";
    
    
    
    
    
    echo json_encode($result);
?>