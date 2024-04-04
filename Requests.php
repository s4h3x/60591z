<?php
session_start();
global $conn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
</head>
<body>
<main class="container mt-5">
    <?php
    if (empty($_SESSION["login"])) {
        header("Location:/index.php?page=");
    } else {
        echo '<div class="text-center">';
        echo '<h1 class="mb-4">Заявки</h1>';
        echo '<a href="InsertRequest.php" class="btn btn-secondary mb-4">Добавить заявку</a>';
        echo '</div>';
        ?>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    $result = $conn->query('SELECT * FROM public."Requests" t1 JOIN public."Services" t2 ON t1."ServiceID" = t2."ServiceID"');
                    while ($row = $result->fetch()) {
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    Номер: <?= $row['RequestID'] ?> Дата: <?= $row['RequestDate'] ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Адрес: <?= $row['Address'] ?></h5>
                                    <p class="card-text">Услуга: <?= $row['NameOfService'] ?></p>
                                    <p class="card-text">Описание заявки: <?= $row['Discription'] ?></p>
                                    <p class="card-text">Номер телефона: <?= $row['PhoneNumber'] ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="DeleteRequest.php?id=<?= $row['RequestID'] ?>" class="btn btn-danger">Удалить</a>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</main>
</body>
</html>

