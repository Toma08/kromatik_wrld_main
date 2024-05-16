<?php
session_start();
require_once 'db.inc.php';

$registration_failed = false;
$registration_successful = false; // új változó a sikeres regisztráció jelzésére

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Adatbázis kapcsolat létrehozása
    $conn = get_connection();

    // Ellenőrizze, hogy a felhasználónév vagy az email már létezik-e az adatbázisban
    $stmt_check = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt_check->execute([$username, $email]);

    if ($stmt_check->rowCount() > 0) {
        // Ha a felhasználónév vagy az email már létezik
        $registration_failed = true;
    } else {
        // Ha nem létezik, akkor regisztrálhatunk
        $stmt_insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, SHA1(?))");
        $stmt_insert->execute([$username, $email, $password]);
        $registration_failed = false; // Regisztráció sikeres
        $registration_successful = true; // beállítjuk a sikeres regisztráció változót
    }

    $conn = null; // Adatbázis kapcsolat bezárása
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<?php 
                    
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        include 'header2.php'; // Bejelentkezett felhasználók számára
                    }
                    if($registration_failed){
                        include 'header.php';
                    }
                    if($registration_successful){
                        include 'header.php';
                    }

            ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php if ($registration_failed) { ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        A felhasznónév vagy az email már foglalt.
                    </div>
                <?php } ?>

                <?php if ($registration_successful) { ?>
                   
                    <div class="alert alert-success mt-3" role="alert">
                        Sikeres regisztráció!
                    </div>
                <?php } ?>

                <h1>Register</h1>
                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="">
        function validateForm() {
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Felhasználónév ellenőrzése
            if (username.length < 3) {
                alert('A felhasználónév legalább 3 karakter hosszúnak kell lennie.');
                return false;
            }

            // Email ellenőrzése
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Kérlek, adj meg egy érvényes e-mail címet.');
                return false;
            }

            // Jelszó erősségének ellenőrzése (legalább 8 karakter hosszú, tartalmaz kis- és nagybetűket, valamint számot)
            if (password.length < 8 || !/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
                alert('A jelszónak legalább 8 karakterből kell állnia, tartalmaznia kell kis- és nagybetűket, valamint számot.');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>