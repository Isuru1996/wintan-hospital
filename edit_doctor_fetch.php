<?php
    include ('database_connect.php');
    
    $sql="select * from doctors";
    
    $result=$conn->query($sql);
    
    $output='<table class="table table-striped table-bordered">'
            . '<tr>'
            . '<th>Doctor Id</th>'
            . '<th>First Name</th>'
            . '<th>Last Name</th>'
            . '<th>Gender</th>'
            . '<th>Email</th>'
            . '<th>Phone Number</th>'
            . '<th>Type</th>'
            . '<th>Added By</th>'
            . '<th>Edit</th>'
            . '<th>Delete</th>'
            . '</tr>'
        ;
    
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output.='<tr>'
                    . '<td>'.$row["doctor_id"].'</td>'
                    . '<td>'.$row["first_name"].'</td>'
                    . '<td>'.$row["last_name"].'</td>'
                    . '<td>'.$row["gender"].'</td>'
                    . '<td>'.$row["email"].'</td>'
                    . '<td>'.$row["phone_number"].'</td>'
                    . '<td>'.$row["type"].'</td>'
                    . '<td>'.$row["added_by"].'</td>'
                    . '<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["doctor_id"].'">Edit</button></td>'
                    . '<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["doctor_id"].'">Delete</button></td></tr>';
        }
    }else{
        $output.='<tr>'
                . '<td colspan="4" align="center">Data not found</td>'
                . '</tr>';
    }
    $output.="</table>";
    
    echo $output;
?>