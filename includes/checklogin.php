<?php
// check of persoon in ingelogd
function check_login(){
    if(empty($_SESSION['username'])){
        header('Location: ./index.php');
    }
}

check_login();

?>
