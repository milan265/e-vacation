<?php
    
    
    
    if(!isset($_POST['id'])||!isset($_POST['request'])){
		echo "Error";
		exit();
	}

    include('data.php');

    $id = $_POST['id'];
    $request = $_POST['request'];

    if($request=="accept"){
        setStatus($id,1);
        print_r($arrRequest);
    }else{
        setStatus($id,-1);
        print_r($arrRequest);
    }
?>