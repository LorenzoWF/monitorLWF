<?php

/*session_start();
$sessao_id = $_SESSION['sessao_id'];
if(!isset($sessao_id) || $sessao_id <= 0) {
    //echo $sessao_id;
    //echo 'acesso negado';
    header('Location: logout.php');
}
// Verifica as sessions
if ($_SESSION['tempo'] > time()) {
    //echo 'sessao: '. base64_decode($_SESSION['sessao_email']) .'<br>';
} else {
    //echo 'expirou sessao <br>';
    header( "Refresh:3; url=logout.php", true, 303);
}
// Verifica os cookies
if (isset($_COOKIE['cookie_id'])) {
    //echo 'cookie: '. $_COOKIE['cookie_id'];
} else {
    //echo 'expirou cookie <br>';
    header( "Refresh:3; url=logout.php", true, 303);
}*/


$loader = require_once '../vendor/autoload.php';

$init = new App\Init();

?>
