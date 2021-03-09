<?php
    
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
        header("Location: ./");
    }
    echo "<script>document.title='Login'</script>";
    include('head.php');
?>

<div class="main mainHeight">
    <div id="login">
        <form method="post" id="login-form" name="login-form">
            <?php
                $const = APP_KEY;
                echo "<input type='hidden' id='app_key' name='app_key' value=\"$const\"/>";
            ?>
            <div>
                <input class="border-ccc" type="email" id="tbEmail" name="tbEmail" placeholder="E-mail">
            </div>
            <div>
                <input class="border-ccc" type="password" id="tbPassword" name="tbPassword" placeholder="Password">
            </div>

            <div>
                <button id="btnLogin" class="button" name="btnLogin" type="button" onclick="proveraPrijave()">Prijavi se</button>
            </div>
            <div class="message">
                <span id="neuspesna-prijava">Korisnik sa unetim podacima ne postoji</span>
            </div>
        </form>
        
    </div>
</div>




<?php
    include("bottom.php")
?>