<?php
require_once "database/database.php";

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    deleteUser($email);
    header("Location: dashboard.php");
    exit();
} else {
    echo "failed";
}
?>
