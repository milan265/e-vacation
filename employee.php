<?php
    
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
        header("Location: ./");
    }
    echo "<script>document.title='E-vacation'</script>";
    include('head.php');
    include('data.php');

    $id = $_COOKIE['id'];

    $user = getUserById($id);
    $info = ["Ime","Prezime","Pozicija","Vrsta ugovora","Datum zaposlenja"];
    $property = ["name","surname","position","contractType","employmentDate"];
?>

<header>
    <div id="header-content">
        <button id="logout" onclick="logout()">Odjavi se</button>
    </div>
</header>

<div class="main mainHeight">
    <div id="employee-data">
        <div id="employee-left">
            
            <div id="employee-info">
                <table>
                    <tr>
                        <td>
                            <div id="employee-img">
                                <img src="./img/profile.png" alt="img">
                            </div>
                        </td>
                    </tr>
                    <?php
                        for($i=0; $i<sizeof($info); $i++){
                            echo "<tr><td><span>";
                            echo $info[$i];
                            echo "</span></td><td><span>";
                            $p = $property[$i];
                            echo $user->$p;
                            echo "</span></td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
        <div id="employee-right">
            
            <table>
                <?php
                    echo "<tr><td><span>";
                    echo "Broj slobodnih dana";
                    echo "</span></td><td><span>";
                    echo ($user->numDaysOffOld+$user->numDaysOff);
                    echo "</span></td></tr>";
                ?>
                <tr>
                    <td>
                        <span>Datum početka odmora</span>
                    </td>
                    <td>
                        <input type="date" id="fromDate" name="fromDate">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Datum kraja odmora </span>
                    </td>
                    <td>
                        <input type="date" id="toDate" name="toDate">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea id="taComment" name="taComment" placeholder="Dodatni komentar" rows="4" cols="50">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="employee-msg">Trenutno ne možete da rezervišete odmor</div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button id="btnConfirmDate" class="button" name="btnConfirmDate" type="button" onclick="confirmDate(<?php echo ($user->numDaysOffOld+$user->numDaysOff);?>)">Potvrdi</button>
                    </td>
                </tr>
            </table>
        </div>
        </div>
</div>


<?php
    include("bottom.php")
?>