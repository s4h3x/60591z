<?php
session_start();
global $conn;
echo '<main class="container mt-5">';
echo '<title>Услуги</title>';
if (!empty($_SESSION["login"])) {
    echo '<div class="text-center display-4 mb-4">Услуги</div>';
    $result = $conn->query('SELECT * FROM public."Services"');

    echo '<div class="album py-5 bg-light">';
    echo '<div class="container">';
    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

    while ($row = $result->fetch()) {
        echo '<div class="col">
                <div class="card h-100">
                    <img src="img/' . $row['ServiceID'] . '.png" class="card-img-top" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title">Услуга №' . $row['ServiceID'] . ': ' . $row['NameOfService'] . '</h5>
                        <p class="card-footer">Цена: ' . $row['Price'] . '</p>
                    </div>
                </div>
              </div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';

} else {
    header("location:/index.php?page=");
}
echo '</main>';
