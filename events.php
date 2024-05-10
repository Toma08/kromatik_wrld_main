<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="product card popup/css/style.css">

   <!-- custom js file link  -->
   <script src="product card popup/js/script.js" defer></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Kromatik</title>
    <style>
        #container{
            display: flex;
            gap: 5px;
        }
        .indexPic{
            
            
        }
    </style>
</head>
<body>
    <div class="page">

    
<?php include 'header.php'; ?>
    <?php
// query.php

// Csatlakozás az adatbázishoz
require_once 'db2.inc.php';

// Kapcsolat lekérése
$pdo = getConnection();

try {
    // SQL lekérdezés előkészítése
    $sql = "SELECT * FROM events";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Eredmények feldolgozása
   /* echo "<h1>Események</h1>";
    echo "<div id='container'>";*/
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       /*
        echo "<div id='esemeny' class='card'>";
        echo "<div id='' class='card-body'>";
        echo '<img height="250" class="indexPic" src="' . htmlspecialchars($row['index_pic']) . '" alt="">';
        echo "<p>" . htmlspecialchars($row['title']) . " " . htmlspecialchars($row['location']) . "</p>";
        echo "<p>" . htmlspecialchars($row['date']) . "</p>";
        echo "<p class='btn btn-primary'>Teljes esemény</p>";
        echo "</div>";
        echo "</div>";*/

        echo "<div class='container'>";
        echo "<div class='products-container'>";
        echo "<div class='product' data-name='p-1'>";
        echo"<img src='" . htmlspecialchars($row['index_pic']) . "'alt=''>";
        echo"<h3>"  . htmlspecialchars($row['title']) . "</h3>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo'<div class="products-preview">';
        echo'<div class="preview" data-target="p-1">';
        echo'<i class="fas fa-times"></i>';
        echo"<img src='" . htmlspecialchars($row['index_pic']) . "'alt=''>";
        echo"<h3>"  . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo'<div class="price">$2.00</div>';
        echo'<div class="buttons">';
        echo'<a href="#" class="buy">buy now</a>';
        echo'</div>';
        echo'</div>';
        echo'</div>';
        echo'';
        echo'';
        echo'';


       
    }
     echo "</div>";
     echo "<br>";

     
} catch (PDOException $e) {
    echo "Hiba történt a lekérdezés során: " . $e->getMessage();
}
?>
</div>
</body>
</html>

