<?php
    
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
        header("Location: ./");
    }
    echo "<script>document.title='Admin'</script>";
    include('head.php');
?>

<?php
    include("bottom.php")
?>