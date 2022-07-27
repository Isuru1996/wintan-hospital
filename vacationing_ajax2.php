<?php
    include ('database_connect.php');
    
    if(isset($_POST["action"])){
        
        
        if($_POST['action']=="delete"){
            $sql="delete from vacationing where vacationing_id='".$_POST["id"]."'";
            
            if($conn->query($sql)===true){
                echo '<p>Data Deleted</p>';
            }
            else{
                echo '<p>Data Deleted failed.</p>';
            }
        }
        
    }
?>