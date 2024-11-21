<?php
session_start();
$conn = new mysqli("localhost", "root", "", "movie_ticketing");

if (!isset($_SESSION['user_id'])) {
    header("Location: php/login.php");
    exit();
}

echo "Index Dir. Nasa index.php ka use (localhost/ticketing-project/php/login.php)";
?>
