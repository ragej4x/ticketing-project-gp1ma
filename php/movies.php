<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "movie_ticketing");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mga movie datas pwede kayo mag lagay ng movie and lagyan nyo ng id sundan nyo lng ung code base
$movies = [
    //Dto mo malalagyan ng bagong movie or imod : image , genre, cost, banner-image,  carousel-image, synopsis
    // Ung mga HTTP Links un ung movie image
    //
    ['id' => 1, 'title' => 'The Shawshank Redemption', 'genre' => 'Drama', 'synopsis' => 'Two imprisoned men bond over a number of years.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['https://via.placeholder.com/150', 'https://via.placeholder.com/160', 'https://via.placeholder.com/170'], 'flash_screen' => 'https://via.placeholder.com/600x300'],
    ['id' => 2, 'title' => 'The Godfather', 'genre' => 'Drama', 'synopsis' => 'An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire.', 'star_rating' => 4.9, 'cost' => 15.00, 'image_urls' => ['https://via.placeholder.com/150', 'https://via.placeholder.com/160', 'https://via.placeholder.com/170'], 'flash_screen' => 'https://via.placeholder.com/600x300'],
    ['id' => 3, 'title' => 'The Dark Knight', 'genre' => 'Action', 'synopsis' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.', 'star_rating' => 4.7, 'cost' => 10.00, 'image_urls' => ['https://via.placeholder.com/150', 'https://via.placeholder.com/160', 'https://via.placeholder.com/170'], 'flash_screen' => 'https://via.placeholder.com/600x300'],
    ['id' => 4, 'title' => 'The Notebook', 'genre' => 'Romance', 'synopsis' => 'A poor yet passionate young man falls in love with a rich young woman and gives her a sense of freedom.', 'star_rating' => 4.5, 'cost' => 8.00, 'image_urls' => ['https://via.placeholder.com/150', 'https://via.placeholder.com/160', 'https://via.placeholder.com/170'], 'flash_screen' => 'https://via.placeholder.com/600x300'],
    ['id' => 5, 'title' => 'Get Out', 'genre' => 'Horror', 'synopsis' => 'A young African-American man visits his white girlfriend\'s family estate.', 'star_rating' => 4.6, 'cost' => 10.00, 'image_urls' => ['https://via.placeholder.com/150', 'https://via.placeholder.com/160', 'https://via.placeholder.com/170'], 'flash_screen' => 'https://via.placeholder.com/600x300'],
    ['id' => 6, 'title' => 'Spider-Man: No Way Home', 'genre' => 'Fantasy', 'synopsis' => 'Peter Parker, with the help of Doctor Strange, must face a new threat.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['https://via.placeholder.com/150', 'https://via.placeholder.com/160', 'https://via.placeholder.com/170'], 'flash_screen' => 'https://via.placeholder.com/600x300'],
];

$moviesByGenre = [];
foreach ($movies as $movie) {
    $moviesByGenre[$movie['genre']][] = $movie;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies Overview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/glass_pane.css">
</head>
<body class="bg-dark">
<div class="container mt-5">
    <?php foreach ($moviesByGenre as $genre => $movies): ?>
        <h3 class="text-white"><?php echo htmlspecialchars($genre); ?></h3>
        <div class="d-flex flex-wrap">
            <?php foreach ($movies as $movie): ?>
                <div class="<?php echo $movie['star_rating'] >= 4 ? 'card-glass' : 'card'; ?>">
                    <h5><?php echo htmlspecialchars($movie['title']); ?></h5>
                    <img src="<?php echo htmlspecialchars($movie['image_urls'][0]); ?>" class="movie-image" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    
                    <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#movieModal<?php echo $movie['id']; ?>">
                        View Details
                    </button>
                </div>

                <!-- Movie Details Modal -->
                <div class="modal fade" id="movieModal<?php echo $movie['id']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo htmlspecialchars($movie['title']); ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">

                                    <!-- Movie Carousel -->
                                    <div id="carousel<?php echo $movie['id']; ?>" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php foreach ($movie['image_urls'] as $index => $image_url): ?>
                                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                                    <img src="<?php echo htmlspecialchars($image_url); ?>" class="d-block w-100 movie-image" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $movie['id']; ?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $movie['id']; ?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <p><strong>Synopsis:</strong> <?php echo htmlspecialchars($movie['synopsis']); ?></p>
                                <p><strong>Ticket Cost:</strong> $<?php echo htmlspecialchars($movie['cost']); ?></p>
                                <label for="showDate"><strong>Select Show Date:</strong></label>
                                <input type="date" id="showDate<?php echo $movie['id']; ?>" name="showDate" class="form-control" required>
                                <img src="<?php echo htmlspecialchars($movie['flash_screen']); ?>" alt="Flash Screen" class="flash-screen">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="book_ticket.php?movie_id=<?php echo $movie['id']; ?>&showDate=" class="btn btn-primary" id="bookButton<?php echo $movie['id']; ?>" onclick="setShowDate(<?php echo $movie['id']; ?>)">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function setShowDate(movieId) {
        var showDateInput = document.getElementById('showDate' + movieId);
        var bookButton = document.getElementById('bookButton' + movieId);
        bookButton.href = bookButton.href + showDateInput.value;
    }
</script>
</body>
</html>
