<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        session_destroy();
        header("Location: home.php");
        exit;
    }else{
        header("Location: home.php");
        exit;
    }
?>