<?php
session_start(); // Munkamenet megkezdése

// Ellenőrizzük, hogy be van-e jelentkezve a felhasználó
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Ha nincs bejelentkezve, visszairányítjuk a felhasználót a bejelentkező oldalra
    header('Location: index.php?page=login');
    exit();
}

// Ellenőrizzük, hogy beküldték-e az üzenetet
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $username = $_SESSION['username']; // Felhasználó nevének kiolvasása a munkamenetből

    $conn = get_connection();

    $stmt = $conn->prepare(
        "INSERT INTO messages (username, message) VALUES (?, ?)"
    );
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $message);
    $stmt->execute();

    $conn = null;

    // Sikeres üzenetküldés után visszairányítjuk a felhasználót az üzenetküldő oldalra
    header('Location: index.php?page=msg');
    exit();
}
?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Üzenet</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Üzenet küldés</h1>
        <form action="index.php?page=msg" method="post">
            <div class="mb-3">
                <label for="message" class="form-label">Üzenet:</label>
                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Üzenet küldése</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>