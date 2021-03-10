<?php
    include('data.php');
    
    $app_key = $_POST["app_key"];
    if (!isset($app_key) or $app_key != '12345678') {
        header("Location: ./");
	}
    if(!isset($_POST['tbEmail']) || !isset($_POST['tbPassword'])){
		echo "Error";
		exit();
	}

    $email = $_POST['tbEmail'];
	$password = $_POST['tbPassword'];

    $t = false;

    foreach($arrUsers as $user){
        if(($user->email == $email) && ($user->password == $password)){
            setcookie("login", 1, time()+86400, "/");
            setcookie("id", $user->id, time()+86400, "/");
            setcookie("userType", $user->userType, time()+86400, "/");
            $t = true;
            break;
        }
    }
    
    echo $t;
?>