<?php
    
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
        header("Location: ./");
    }
    echo "<script>document.title='Admin'</script>";
    include('head.php');
    include('data.php');
    
    $id = $_COOKIE['id'];
    $user = getUserById($id);
?>

<header>
    <div id="header-content">
        <button id="logout" onclick="logout()">Odjavi se</button>
    </div>
</header>

<div class="main mainHeight">
    <div id="admin-sel">
        <select name="admin-select" id="admin-select">
          <option value="novo">Novo</option>
          <option value="odobreno">Odobreno</option>
          <option value="odbijeno">Odbijeno</option>
          <option value="sve">Sve</option>
        </select>
        <button id="btnConfirmChoice" class="button" name="btnConfirmChoice" type="button" onclick="confirmChoice()">Izaberi</button>
    </div>

<table>

</table>
</div>


<?php
    include("bottom.php")
?>