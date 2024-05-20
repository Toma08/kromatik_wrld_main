<?php
// get_event_details.php

// Csatlakozás az adatbázishoz
require_once 'db2.inc.php';
$pdo = getConnection();

if (isset($_POST['show_details'])) {
    $date = $_POST['date'];

    try {
        // SQL lekérdezés az adott dátumú esemény részleteinek lekérdezésére
        $sql = "SELECT * FROM events WHERE date = :date";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        // Eredmény feldolgozása
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<!DOCTYPE html>";
            echo "<html lang='en'>";
            echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<title>Events</title>";
            echo'<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">';

            echo "<link rel='stylesheet' href='style2.css'>";
            echo "</head>";
            echo "<body>";
            echo '<div class="event">';
            echo '<img class="img-fluid" src="' . htmlspecialchars($row['index_pic']) . '" alt="">';
            echo '<p>Dátum: ' . htmlspecialchars($row['description']) . '</p>';
            echo '<a href="index.php?page=events">Vissza</a>';
            echo '</div>';
            echo "</body>";
            echo "</html>";
            
        } else {
            echo 'Nincs ilyen esemény a megadott dátummal.';
        }
    } catch (PDOException $e) {
        echo 'Hiba történt a lekérdezés során: ' . $e->getMessage();
    }
}
