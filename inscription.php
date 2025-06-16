<?php
include 'database/db_connection.php';

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $checkEmailStmt = $conn->prepare("SELECT email FROM users WHERE email = :email");
    $checkEmailStmt->bindParam(':email', $email );
    $checkEmailStmt->execute();
    $emailCount = $checkEmailStmt->fetch(PDO::FETCH_ASSOC);

    if ($emailCount > 0) {
        $message = "Email already exists";
        $toastClass = "#007bff"; // Primary color
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPassword);


        if ($stmt->execute()) {
            $message = "Account created successfully";
            $toastClass = "#28a745"; // Success color
        } else {
            $message = "Error: " . $stmt->errorInfo();
            $toastClass = "#dc3545"; // Danger color
        }
    }
    header('Location: index.php');
    exit($message);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crunch & Munch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
   
    <?php if (!empty($message)): ?>
    <div class="alert" style="background-color: <?= $toastClass ?>; color: white; text-align: center;">
        <?= htmlspecialchars($message) ?>
    </div>
    <?php endif; ?>

    <main class="container-fluid">
        <div id="inscription-form" class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <h2 class="text-center text-light py-3">Inscription</h2>
                <form action="" method="POST">
                    <div class="form-floating mb-3 text-center">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="login" required>
                        <label for="floatingInput">login</label>
                    </div>
                    <div class="form-floating mb-3 text-center">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Adresse email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required>
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <button class="btn btn-dark" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>