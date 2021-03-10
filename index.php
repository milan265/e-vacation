<?php
    define('APP_KEY', '12345678');
    
    if(!isset($_COOKIE['login'])){
        setcookie("login", 0, time()+86400, "/");
        require_once './login.php';
    }else{
        if($_COOKIE['login']==0){
            require_once './login.php';
        }else if($_COOKIE['userType']=='employee'){
            require_once './employee.php';
        }else if($_COOKIE['userType']=='admin'){
            if(!isset($_COOKIE['select'])){
                setcookie("select", "novo", time()+86400, "/");
            }
            require_once './admin.php';
        }
    }
?>