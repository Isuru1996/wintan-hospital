<?php
    
    session_start();
                        unset($_SESSION['logged_in']);
                        unset($_SESSION['logged_id']);
                        unset($_SESSION['logged_email']);
                        unset($_SESSION['logged_type']);
    session_destroy();
    header("location:index.php");
?>