<?php
    include ('database_connect.php');
    include ('session.php');
    
    $result["output1"]="";
    $result["output2"]="";
    
    $today=date("Y-m-d");
    $sql1="";
    if($_SESSION['logged_type']=="doctor"){
        $sql1="select * from appoinments where appoinment_date<'".$today."' and doctor_id='".$_SESSION['logged_id']."' order by now DESC";
    }
    else{
        $sql1="select * from appoinments where appoinment_date<'".$today."' order by now DESC";
    }
    
    
    $result1=$conn->query($sql1);
    
    $result["output1"]='<table class="table table-striped table-bordered">'
            . '<tr>'
            . '<th>User Id</th>'
            . '<th>patient_name</th>'
            . '<th>phone_number</th>'
            . '<th>doctor</th>'
            . '<th>doctor_id</th>'
            . '<th>appoinment_date</th>'
            . '<th>appoinment_time</th>'
            . '<th>appoinment_id</th>'
            . '<th>status</th>'
            . '<th>Appoinment was made</th>'
            . '<th>Message</th>'
            . '<th>Delete</th>'
            . '</tr>'
                                        ;
            
            
    
    if($result1->num_rows>0){
        while($row1=$result1->fetch_assoc()){
            $result["output1"].='<tr>'
                    . '<td>'.$row1["user_id"].'</td>'
                    . '<td>'.$row1["patient_name"].'</td>'
                    . '<td>'.$row1["phone_number"].'</td>'
                    . '<td>'.$row1["doctor"].'</td>'
                    . '<td>'.$row1["doctor_id"].'</td>'
                    . '<td>'.$row1["appoinment_date"].'</td>'
                    . '<td>'.$row1["appoinment_time"].'</td>'
                    . '<td>'.$row1["appoinment_id"].'</td>'
                    . '<td>'.$row1["status"].'</td>'
                    . '<td>'.$row1["now"].'</td>'
                    . '<td>'.$row1["message"].'</td>'
                    . '<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row1["appoinment_id"].'">Delete</button></td></tr>';
                    
                    
        }
    }else{
        $result["output1"].='<tr>'
                . '<td colspan="4" align="center">Data not found</td>'
                . '</tr>';
    }
    $result["output1"].="</table>";
    
    
    
    $sql2="";
    if($_SESSION['logged_type']=="doctor"){
        $sql2="select * from appoinments where appoinment_date>='".$today."' and doctor_id='".$_SESSION['logged_id']."' order by now DESC";
    }
    else{
        $sql2="select * from appoinments where appoinment_date>='".$today."' order by now DESC";
    }
    
    $result2=$conn->query($sql2);
    
    $result["output2"]='<table class="table table-striped table-bordered">'
            . '<tr>'
            . '<th>User Id</th>'
            . '<th>patient_name</th>'
            . '<th>phone_number</th>'
            . '<th>doctor</th>'
            . '<th>doctor_id</th>'
            . '<th>appoinment_date</th>'
            . '<th>appoinment_time</th>'
            . '<th>appoinment_id</th>'
            . '<th>status</th>'
            . '<th>Appoinment was made</th>'
            . '<th>Message</th>';
            if($_SESSION['logged_type']=="receptionist"){
                $result["output2"]  .= '<th>Edit</th>'
                                    . '</tr>'
                                        ;
            }
            else if($_SESSION['logged_type']=="doctor"){
                $result["output2"]  .= '<th>Delete</th>'
                                    . '</tr>';
            }
    
    if($result2->num_rows>0){
        while($row2=$result2->fetch_assoc()){
            $result["output2"].='<tr>'
                    . '<td>'.$row2["user_id"].'</td>'
                    . '<td>'.$row2["patient_name"].'</td>'
                    . '<td>'.$row2["phone_number"].'</td>'
                    . '<td>'.$row2["doctor"].'</td>'
                    . '<td>'.$row2["doctor_id"].'</td>'
                    . '<td>'.$row2["appoinment_date"].'</td>'
                    . '<td>'.$row2["appoinment_time"].'</td>'
                    . '<td>'.$row2["appoinment_id"].'</td>'
                    . '<td>'.$row2["status"].'</td>'
                    . '<td>'.$row2["now"].'</td>'
                    . '<td>'.$row2["message"].'</td>';
                    if($_SESSION['logged_type']=="receptionist"){
                        $result["output2"]  .=    '<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row2["appoinment_id"].'">Edit</button></td></tr>';
                                                
                    }
                    else if($_SESSION['logged_type']=="doctor"){
                        $result["output2"]  .='<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row2["appoinment_id"].'">Delete</button></td></tr>';
                    }
        }
    }else{
        $result["output2"].='<tr>'
                . '<td colspan="4" align="center">Data not found</td>'
                . '</tr>';
    }
    $result["output2"].="</table>";
    
    echo json_encode($result);
?>