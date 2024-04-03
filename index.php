<?php
session_start();
date_default_timezone_set('Asia/Yekaterinburg');
require "dbconnect.php";
require "auth.php";
require "menu.php";
echo '<main class="container" style="margin-top: 100px">';
switch ($_GET['page']){
    case 'req':
        if (isset($_SESSION['login'])) {
            require "Requests.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра и создания заявок';
        }
        break;
    case 'pay':
        if (isset($_SESSION['login'])){
            require "PaymentInvoices.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра счетов';
        }
        break;
    case 'res':
        if (isset($_SESSION['login'])) {
            require "Residents.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра списка проживающих';
        }
        break;
}
echo '</main>';

if(($_SESSION['msg']!='') or isset($msg)) {
    require "message.php";
    $_SESSION['msg']= '';
}

require "footer.php";
