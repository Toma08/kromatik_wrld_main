<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kromatik</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .indexPic {
            width: 100%;
            height: 300px; /* Állítsd be a kívánt magasságot */
            object-fit: cover; /* A képek a teljes kártya területet kitöltik */
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="page">
        <?php include 'header.php'; ?>

        <h1 class="text-center mt-4 mb-5">Események</h1>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Csatlakozás az adatbázishoz
                require_once 'db2.inc.php';
                $pdo = getConnection();

                try {
                    // SQL lekérdezés előkészítése
                    $sql = "SELECT * FROM events";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    // Eredmények feldolgozása
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col">
                            <div class="card">
                                <img class="card-img-top indexPic" src="<?php echo htmlspecialchars($row['index_pic']); ?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($row['location']); ?></p>
                                    <p class="card-text"><?php echo htmlspecialchars($row['date']); ?></p>
                                    <form method="post" action="get_event_details.php">
                                        <input type="hidden" name="date" value="<?php echo htmlspecialchars($row['date']); ?>">
                                        <button type="submit" name="show_details" class="btn btn-primary">Teljes esemény</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } catch (PDOException $e) {
                    echo "Hiba történt a lekérdezés során: " . $e->getMessage();
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
