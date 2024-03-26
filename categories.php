
<?php
global $conn;
echo "<h2>Категории</h2>";

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