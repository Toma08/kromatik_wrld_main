<?php

require_once 'db.inc.php';

$login_failed = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = get_connection();

    $stmt = $conn->prepare(
        "SELECT username, email
            FROM users 
             WHERE username = ? AND password = SHA1(?)"
    );
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $users = $stmt->fetchAll();

    if (count($users) === 1) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $users[0]['email'];
        $_SESSION['role'] = $users[0]['role'];
        header('Location: index.php');
    } else {
        $login_failed = true;
    }

    $conn = null;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php if ($login_failed) { ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Login Failed!
                    </div>
                <?php } ?>

                <h1>Login</h1>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>