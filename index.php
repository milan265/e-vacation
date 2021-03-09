<?php
    define('APP_KEY', '12345678');
    
    if(!isset($_COOKIE['login'])){
        setcookie("login", 0, time()+86400, "/");
        require_once './login.php';
    }else{
        if($_COOKIE['login']==0){
            require_once './login.php';
        }else if($_COOKIE['user']=='employee'){
            require_once './employee.php';
        }else if($_COOKIE['user']=='admin'){
            require_once './admin.php';
        }
    }
?>