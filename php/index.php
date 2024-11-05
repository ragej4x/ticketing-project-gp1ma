
<?php

//as much as possible wag galawin ung php side
session_start();
$conn = new mysqli("localhost", "root", "", "movie_ticketing");

// redirect if d nkapag login ang user
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$tickets = $conn->query("SELECT movies.title, showtimes.show_date, showtimes.show_time, tickets.seat_number
                         FROM tickets 
                         JOIN showtimes ON tickets.showtime_id = showtimes.id 
                         JOIN movies ON showtimes.movie_id = movies.id
                         WHERE tickets.user_id = $user_id");

//*******************************php**********************************/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h2 class="text-center">My Tickets</h2>
        <?php if ($tickets->num_rows > 0): ?>
            <ul class="list-group mb-3">
                <?php while ($ticket = $tickets->fetch_assoc()): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><?php echo "{$ticket['title']} on {$ticket['show_date']} at {$ticket['show_time']}"; ?></span>
                        <span class="badge bg-primary rounded-pill">Seat <?php echo $ticket['seat_number']; ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            
            <p class="text-center">Hi edit mo nlng ano gusto mo lagay dto filename > (index.php) in line 48</p>
        <?php endif; ?>
        <a href="movies.php" class="btn btn-primary w-100">Book a Ticket</a>
        <a href="logout.php" class="btn btn-secondary w-100 mt-2">Logout</a>
    </div>
</div>
</body>
</html>
