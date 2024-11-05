<?php
//WAG GALAWIN SA CSS SIDE WAG DTO

$conn = new mysqli("localhost", "root", "", "movie_ticketing");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    if ($stmt->execute()) {

        header("Location: login.php?register_success=1");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h2 class="text-center">Create an Account</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        

        <!-- FORM PWEDE TO IMOD KAYO BHALA-->
        <form action="register.php" method="POST">
            <div class="mb-3">

                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
            </div>

            <div class="mb-3">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
            
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
        
        </form>
    </div>
</div>
</body>
</html>
