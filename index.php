<?php
global $conn;
require "dbconnect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            max-width: 1100px;
        }
        *{
            margin: 0 auto;
        }
        .FirstName{
            vertical-align: top;
            width: 20%;
            max-width: 250px;
            display: inline-block;
        }
        .LastName{
            vertical-align: top;
            width: 57%;
            display: inline-block;
        }
        .PhoneNumber{
            vertical-align: top;
            width: 10%;
            max-width: 150px;
            display: inline-block;
            font-weight: bold ;
            text-align: right;
            font-size: large;
            margin-right: 15px;
        }

    </style>
</head>
<body>
<h1>Веб-приложение гр. 605-91з</h1>

<?php
echo "<h2>Информационная система управляющей компании</h2>";

$result = $conn->query('SELECT * FROM public."Residents"');


while ($row = $result->fetch()){
    ?>
    <div>
        <div class="FirstName">
            <?=$row['FirstName']?>
        </div>
        <div class="LastName">
            <?=$row['LastName']?>
        </div>
        <div class="PhoneNumber">
            <?=$row['PhoneNumber']?>
        </div>

    </div>
    <?php

}
?>


</body>
</html>
