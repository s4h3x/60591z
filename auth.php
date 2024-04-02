
<?php
//   $err_msg = '';

global $conn;
if (isset($_POST["login"]) and $_POST["login"]!='')
{
    try {
        $sql = 'SELECT "UserID", "FirstName", "LastName", "PasswordMD5" FROM public."Users" WHERE "Login"=(:login)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':login', $_POST['login']);
        $stmt->execute();
        //$_SESSION['msg'] = "Вы успешно вошли в систему";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $msg = "Ошибка аутентификации: " . $error->getMessage();
    }
    // если удалось получить строку с паролем из БД
    if ($row=$stmt->fetch(PDO::FETCH_LAZY))
    {
        if (MD5($_POST["password"])!= $row['PasswordMD5'])
            $msg = "Неправильный пароль!";
        else {
            // успешная аутентификация
            $_SESSION['login'] = $_POST["login"];
            $_SESSION['firstname'] = $row['FirstName'];
            $_SESSION['lastname'] = $row['LastName'];
            $_SESSION['id'] = $row['UserID'];
            //if ($row['is_teacher']==1) $_SESSION['teacher'] = true;
            $msg =  "Вы успешно вошли в систему";
        }
    }
    else $msg =  "Неправильное имя пользователя!";

}

if (isset($_GET["logout"]))
{
    $_SESSION = null;
    $_SESSION['msg'] =  "Вы успешно вышли из системы";
    header('Location: /');
    exit( );
}





