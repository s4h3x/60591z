<?php
global $conn;
require "dbconnect.php";
session_start();
if(isset($_GET['id'])) {
    $requestID = $_GET['id'];
    $sql = "DELETE FROM public.\"Requests\" WHERE \"RequestID\" = :requestID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':requestID', $requestID);
    if($stmt->execute()) {
        header("Location:/index.php?page=req");
        exit();
}
}
if(!empty($msg)){
    echo '<p class="msg" > '. $msg .' </p>';
}