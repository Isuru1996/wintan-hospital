<?php
    include ('database_connect.php');
    include ('session.php');
    
    $sql="";
    if($_SESSION['logged_type']=="doctor"){
        $sql="select * from vacationing where doctor_id='".$_SESSION['logged_id']."'";
    }
    else{
        $sql="select * from vacationing";
    }
    
    
    $result=$conn->query($sql);
    
    $output='<table class="table table-striped table-bordered">'
            . '<tr>'
            . '<th>Doctor Id</th>'
            . '<th>Doctor Name</th>'
            . '<th>Reason</th>'
            . '<th>Date</th>';
            if($_SESSION['logged_type']=="doctor"){
                $output.='<th>Delete</th>';
            }
            $output.='</tr>';
            
        
    
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output.='<tr>'
                    . '<td>'.$row["doctor_id"].'</td>'
                    . '<td>'.$row["doctor_name"].'</td>'
                    . '<td>'.$row["reason"].'</td>'
                    . '<td>'.$row["date"].'</td>';
                    if($_SESSION['logged_type']=="doctor"){
                        $output.='<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["vacationing_id"].'">Delete</button></td>';
                    }
                    $output.='</tr>';
                    
        }
    }else{
        $output.='<tr>'
                . '<td colspan="4" align="center">Data not found</td>'
                . '</tr>';
    }
    $output.="</table>";
    
    echo $output;
?>