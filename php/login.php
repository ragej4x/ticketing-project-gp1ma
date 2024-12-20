<?php
//WAG GALAWIN SA CSS SIDE WAG DTO
session_start();
$conn = new mysqli("localhost", "root", "", "movie_ticketing");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password // 

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" href="1And.css">
    
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="../style/style.css">
    
    <link rel="stylesheet" href="../style/style.css">

</head>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="container">

    <div class="card">
        <h2 class="text-center">Welcome!</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>


        <form action="login.php" method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">Don't have an account? <a href="register.php">Register here</a></p>
        
        </form>
    </div>

</div>
</body>
    <head>

    <link rel="stylesheet" href="../style/style.css">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    </head>
    <body>

   
             <div class="top-bar">
             <div class="logo">
       <a href="#"><img src="../images/vieketlogo.jpg" alt="logo">VIEKET</a>
        </div>
                
                <ul>
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                </ul>
             </div>
      
       
</body>
</html>


 
  