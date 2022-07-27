<?php
    include ('database_connect.php');
    include ('session.php');
    
    $logged_id=$_SESSION['logged_id'];
    $sql="select * from appoinments where user_id='".$logged_id."'";
    
    $result=$conn->query($sql);
    
    $output='<table class="table table-striped table-bordered">'
            . '<tr>'
            . '<th>Patient Name</th>'
            . '<th>Phone Number</th>'
            . '<th>Doctor</th>'
            . '<th>Appoinment Date</th>'
            . '<th>Appoinment Time</th>'
            . '<th>Appoinment Id</th>'
            . '<th>Status</th>'
            . '<th>Appoinment was made</th>'
            . '<th>Edit</th>'
            . '<th>Delete</th>'
            . '</tr>'
        ;
    
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output.='<tr>'
                    . '<td>'.$row["patient_name"].'</td>'
                    . '<td>'.$row["phone_number"].'</td>'
                    . '<td>'.$row["doctor"].'</td>'
                    . '<td>'.$row["appoinment_date"].'</td>'
                    . '<td>'.$row["appoinment_time"].'</td>'
                    . '<td>'.$row["appoinment_id"].'</td>'
                    . '<td>'.$row["status"].'</td>'
                    . '<td>'.$row["now"].'</td>';
                    if($row["status"]=="confirm"||$row["appoinment_date"]<date("Y-m-d")){
                        $output.=    '<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" disabled id="'.$row["appoinment_id"].'">Edit</button></td>'
                                    . '<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" disabled id="'.$row["appoinment_id"].'">Delete</button></td>';
                    }
                    else{
                        $output.=   '<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["appoinment_id"].'">Edit</button></td>'
                                    . '<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["appoinment_id"].'">Delete</button></td>';
                    }
                    
        }
    }else{
        $output.='<tr>'
                . '<td colspan="4" align="center">Data not found</td>'
                . '</tr>';
    }
    $output.="</table>";
    
    echo $output;
?>