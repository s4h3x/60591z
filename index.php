<?php
session_start();
date_default_timezone_set('Asia/Yekaterinburg');
require "dbconnect.php";
require "auth.php";
require "menu.php";
echo '<main class="container" style="margin-top: 100px">';
switch ($_GET['page']){
    case 'ser':
        if (isset($_SESSION['login'])) {
            require "Services.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра и создания заявок';
        }
        break;
    case 'req':
        if (isset($_SESSION['login'])) {
            require "Requests.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра и создания заявок';
        }
        break;
}
echo '</main>';

if(isset($msg)) {
    require "message.php";
}
require "footer.php";