<?php
    if(!isset($_POST['userId'])||!isset($_POST['fromDate'])||!isset($_POST['toDate'])||!isset($_POST['comment'])){
		echo "Error";
		exit();
	}

    include('data.php');

    $userId = $_POST['userId'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $comment = $_POST['comment'];

    $user = getUserById($userId);

    $currentDate = date("Y-m-d");

    $err = 1;

    if($currentDate>$fromDate || $fromDate>$toDate){
        $err = 0;
    }

    if(isMyPositionOnVacation($user->position,$arrRequest)){
        echo "Ista pozicija";
        $err = 0;
    }

    $numOfDaysOff = getWorkingDays($fromDate,$toDate);

    if($user->contractType=="stalno"){
        if(numberOfMonths($user->employmentDate,$currentDate)>12){
            if($numOfDaysOff > ($user->numDaysOffOld+$user->numDaysOff)){
                $err = 0;
            }
        }else{
            if($numOfDaysOff > $user->numDaysOff){
                $err = 0;
            }
        }
    }else{
        $n = floor(20/12*numberOfMonths($user->employmentDate,$currentDate));
        if($numOfDaysOff > $n){
            $err = 0;
        }
    }

    echo $err;

    function numberOfMonths($date1,$date2){
        $arrDate1 = explode("-",$date1);
        $arrDate2 = explode("-",$date2);
        
        $y1 = (int)$arrDate1[0];
        $m1 = (int)$arrDate1[1];
        //$d1 = (int)$arrDate1[2];

        $y2 = (int)$arrDate2[0];
        $m2 = (int)$arrDate2[1];
        //$d2 = (int)$arrDate2[2];

        return abs(($y1-$y2)*12+($m1-$m2));
  
    }

    function getWorkingDays($startDate, $endDate){
        $begin = strtotime($startDate);
        $end   = strtotime($endDate);
        if ($begin > $end) {
            $begin = strtotime($endDate);
            $end = strtotime($startDate);
        }
        $no_days  = 0;
        $weekends = 0;
        while ($begin <= $end) {
            $no_days++; 
            $what_day = date("N", $begin);
            if ($what_day > 5) { 
                $weekends++;
            };
            $begin += 86400;
        };
        $working_days = $no_days - $weekends;
        return $working_days;
    }

    function isMyPositionOnVacation($myPosition,$arr){
        foreach($arr as $r){
            $u = getUserById($r->userId);
            if($u->position==$myPosition && !$r->finished){
                return true;
            }
        }
        return false;
    }

?>