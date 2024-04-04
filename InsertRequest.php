<?php
global $conn;
require "menu.php";
require "dbconnect.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestDate = $_POST["RequestDate"];
    $address = $_POST["Address"];
    $serviceID = $_POST["ServiceID"];
    $discription = $_POST["Discription"];
    $phoneNumber = $_POST["PhoneNumber"];


    $sql = "INSERT INTO public.\"Requests\" (\"RequestDate\", \"Address\", \"ServiceID\", \"Discription\", \"PhoneNumber\") 
            VALUES (:requestDate, :address, :serviceID, :discription, :phoneNumber)";


    $stmt = $conn->prepare($sql);


    $stmt->bindParam(':requestDate', $requestDate);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':serviceID', $serviceID);
    $stmt->bindParam(':discription', $discription);
    $stmt->bindParam(':phoneNumber', $phoneNumber);


    if ($stmt->execute()) {
        echo $msg = "Запись успешно добавлена в базу данных.";
    } else {
        echo $msg = "Ошибка при добавлении записи в базу данных: " . $stmt->errorInfo()[2];
    }
}
?>
<head>
    <title>Создание заявки</title>
</head>
<body >

<div class="container" >
    <h1>Создание заявки</h1>

    <form method="post">
        <div class="form-group">
            <label for="RequestDate">Дата заявки</label>
            <input type="text" class="form-control" id="RequestDate" name="RequestDate" placeholder="Введите дату">

        </div>
        <div class="form-group">
            <label for="Address">Адрес</label>
            <input type="text" class="form-control" id="Address" name="Address" placeholder="Введите адрес">
        </div>
        <div class="form-group">
            <label for="ServiceID">Номер услуги</label>
            <input type="text" class="form-control" id="ServiceID" name="ServiceID" placeholder="Введите номер услуги">
        </div>
        <div class="form-group">
            <label for="Discription">Описание заявки</label>
            <input type="text" class="form-control" id="Discription" name="Discription" placeholder="Введите описание заявки">
        </div>
        <div class="form-group">
            <label for="PhoneNumber">Номер телефона</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Введите номер телефона">
        </div>
        <?php
        if(!empty($msg)){
            echo '<p class="msg" > '. $msg .' </p>';
        }
        ?>
        <input type="submit" name="submit" class="btn btn-secondary" value="Создать заявку">
        <a href="index.php?page=req" class="btn btn-danger">Выйти</a>
    </form>
</div>
</body>
</html>