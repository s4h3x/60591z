<div class="container">
    <h2>Проживающие</h2>
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Телефон</th>
        </tr>
<?php
global $conn;

$result = $conn->query('SELECT * FROM public."Residents"');


while ($row = $result->fetch()){

    ?>



        <tr><td><?=$row['FirstName']?></td><td><?=$row['LastName']?></td><td><?=$row['PhoneNumber']?></td></tr>

    <?php

}
?>
    </table>
</div>
