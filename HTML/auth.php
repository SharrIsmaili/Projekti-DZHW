<?php
    session_start();

    function requireLogin(){
        if(!isset($_SESSION['user_id'])){
            $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];

            header("Location: login.php");
            exit;
        }
    }

    function requireAdmin(){
        requireLogin();

        if(empty($_SESSION['isAdmin'])){
            header("Location: home.php");
            exit;
        }
    }
?>