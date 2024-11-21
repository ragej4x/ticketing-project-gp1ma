<?php
session_start();
$conn = new mysqli("localhost", "root", "", "movie_ticketing");

if (isset($_GET['movie_id']) && isset($_POST['showDate'])) {
    $movie_id = $_GET['movie_id'];
    $user_id = $_SESSION['user_id'];
    $show_date = $_POST['showDate'];

    $movie = $conn->query("SELECT * FROM movies WHERE id = $movie_id")->fetch_assoc();

    
    $stmt = $conn->prepare("INSERT INTO tickets (user_id, movie_id, show_date) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $movie_id, $show_date);
    $stmt->execute();

    echo "<p>Successfully booked " . $movie['title'] . " for " . $show_date . ".</p>";
}
?>
