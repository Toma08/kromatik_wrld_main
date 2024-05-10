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
            echo '<p>Cím: ' . htmlspecialchars($row['title']) . '</p>';
            echo '<p>Helyszín: ' . htmlspecialchars($row['location']) . '</p>';
            echo '<p>Dátum: ' . htmlspecialchars($row['date']) . '</p>';
            echo '<img src="' . htmlspecialchars($row['index_pic']) . '" alt="">';
            echo '<p>Dátum: ' . htmlspecialchars($row['description']) . '</p>';
        } else {
            echo 'Nincs ilyen esemény a megadott dátummal.';
        }
    } catch (PDOException $e) {
        echo 'Hiba történt a lekérdezés során: ' . $e->getMessage();
    }
}
?>
