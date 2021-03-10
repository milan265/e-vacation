<?php
    
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
        header("Location: ./");
    }
    echo "<script>document.title='Admin'</script>";
    include('head.php');
    include('data.php');
    
    $id = $_COOKIE['id'];
    $user = getUserById($id);
    if(isset($_COOKIE['select'])){
        $sel = $_COOKIE['select'];
    }else{
        $sel = "novo";
    }


    switch($sel){
        case "novo":
            $tableData = getRequestData(0);
            break;
        case "odobreno":
            $tableData = getRequestData(1);
            break;
        case "odbijeno":
            $tableData = getRequestData(-1);
            break;
        case "sve";
            $tableData = sortRequestData($arrRequest);
            break;
    }

?>

<header>
    <div id="header-content">
        <button id="logout" onclick="logout()">Odjavi se</button>
    </div>
</header>

<div class="main mainHeight">
    <div id="admin-sel">
        <select name="admin-select" id="admin-select">
          <option value="novo" <?php if($sel=="novo"){echo "selected";} ?>>Novo</option>
          <option value="odobreno" <?php if($sel=="odobreno"){echo "selected";} ?>>Odobreno</option>
          <option value="odbijeno" <?php if($sel=="odbijeno"){echo "selected";} ?>>Odbijeno</option>
          <option value="sve" <?php if($sel=="sve"){echo "selected";}?>>Sve</option>
        </select>
        <button id="btnConfirmChoice" class="button" name="btnConfirmChoice" type="button" onclick="confirmChoice()">Izaberi</button>
    </div>

    <table id="admin-table">
        <tr>
            <th>Id korisnika</th>
            <th>Broj dana</th>
            <th>Datum od</th>
            <th>Datum do</th>
            <th>Komentar</th>
            <th>Datum zahteva</th>
        </tr>
        <?php
            foreach($tableData as $r){
                echo "<tr>";
                echo "<td>".$r->userId."</td>";
                echo "<td>".$r->numOfDays."</td>";
                echo "<td>".$r->from."</td>";
                echo "<td>".$r->to."</td>";
                echo "<td>".$r->comment."</td>";
                echo "<td>".$r->date."</td>";
                if($r->accepted==""){
                    echo "<td>
                    <button id='btnReject' class='button' name='btnReject' type='button' onclick='reject(".$r->id.")'>Odbiti</button>
                    </td>"; 
                    echo "<td>
                    <button id='btnAccept' class='button' name='btnAccept' type='button' onclick='accept(".$r->id.")'>Odobriti</button>
                    </td>"; 
                    
                }
                echo "</tr>";
            }
        ?>
    </table>
</div>


<?php
    include("bottom.php")
?>