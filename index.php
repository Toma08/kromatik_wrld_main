<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KRMTK</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .content {
      flex: 1;
    }

    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 1rem 0;
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
      include 'header2.php'; // Bejelentkezett felhasználók számára
    } else {
      include 'header.php'; // Nem bejelentkezett felhasználók számára
    }
    $page = isset($_GET['page']) ? $_GET['page'] : 'fooldal';
    ?>

    <div id="content" class="content">
      <?php include $page . '.php'; ?>
    </div>

    <footer>
      <p class="mb-0">&copy; kromatik_wrld</p>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>