<?php
session_start();
$showEvents = true;
$showEventDetails = false;
$eventId = null;

// Kezeli a POST kérést
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['show_details'])) {
        $showEvents = false;
        $showEventDetails = true;
        $eventId = $_POST['event_id'];
    } elseif (isset($_POST['show_events_again'])) {
        $showEvents = true;
    }
}

// Ha az esemény részletek vannak megjelenítve, de nincs esemény kiválasztva, térjünk vissza az események listájához
if ($showEventDetails && $eventId === null) {
    $showEvents = true;
    $showEventDetails = false;
}

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kromatik</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .indexPic {
            width: 100%;
            height: 300px;
            /* Állítsd be a kívánt magasságot */
            object-fit: cover;
            /* A képek a teljes kártya területet kitöltik */
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="page">
        <?php if ($showEvents) : ?>
            <h1 class="text-center mt-4 mb-5">Események</h1>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                    // Csatlakozás az adatbázishoz
                    require_once 'db.inc.php';
                    $conn = get_Connection();

                    try {
                        // SQL lekérdezés előkészítése
                        $sql = "SELECT * FROM events";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        // Eredmények feldolgozása
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="col">';
                            echo '    <div class="card">';
                            echo '        <img class="card-img-top indexPic" src="' . htmlspecialchars($row['index_pic']) . '" alt="Esemény képe">';
                            echo '        <div class="card-body">';
                            echo '            <h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
                            echo '            <p class="card-text">' . htmlspecialchars($row['location']) . '</p>';
                            echo '            <p class="card-text">' . htmlspecialchars($row['date']) . '</p>';
                            echo '            <form method="POST" action="">';
                            echo '                <input type="hidden" name="event_id" value="' . htmlspecialchars($row['id']) . '">';
                            echo '                <button type="submit" name="show_details" class="btn btn-primary">Teljes esemény</button>';
                            echo '            </form>';
                            echo '        </div>';
                            echo '    </div>';
                            echo '</div>';
                        }
                    } catch (PDOException $e) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo 'Hiba történt a lekérdezés során: ' . htmlspecialchars($e->getMessage());
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        <?php elseif ($showEventDetails) : ?>
            <!-- Esemény részletek megjelenítése -->
            <!-- Itt jelenítsd meg az esemény részleteit -->
            <?php
            // Csatlakozás az adatbázishoz
            require_once 'db.inc.php';
            $conn = get_Connection();

            try {
                // SQL lekérdezés előkészítése az esemény részleteinek lekéréséhez
                $sql = "SELECT * FROM events WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $eventId);
                $stmt->execute();

                // Eredmények feldolgozása
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<!DOCTYPE html>";
                    echo "<html lang='en'>";
                    echo "<head>";
                    echo "<meta charset='UTF-8'>";
                    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                    echo "<title>Events</title>";
                    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">';
                    echo "<link rel='stylesheet' href='style2.css'>";
                    echo "</head>";
                    echo "<body>";
                    echo '<div class="container">';
                    echo '<div class="row justify-content-center">';
                    echo '<div class="event col-md-8">';
                    echo '<img class="img-fluid" src="' . htmlspecialchars($row['index_pic']) . '" alt="">';
                    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                    echo '<a href="index.php?page=events"><button name="show_details" class="btn btn-primary">Vissza</button></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo "</body>";
                    echo "</html>";
                } else {
                    // Ha az esemény nem található az adatbázisban, akkor visszatérünk az események listájához
                    $showEvents = true;
                    $showEventDetails = false;
                }
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Hiba történt a lekérdezés során: ' . htmlspecialchars($e->getMessage());
                echo '</div>';
                // Ha valami hiba történik, visszatérünk az események listájához
                $showEvents = true;
                $showEventDetails = false;
            }
            ?>
        <?php endif; ?>

    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>