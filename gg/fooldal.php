<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRMTK</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <?php
    // Ellenőrizzük, hogy be van-e jelentkezve a felhasználó
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // Ha be van jelentkezve, akkor betöltjük a Bootstrap CSS-t
        echo '<link rel="stylesheet" href="style.css">';
    }
    ?>
</head>

<body>

    <div id="content">
        <div class="p-5 text-center bg-image rounded-3" style="
        background-image: url('https://firebasestorage.googleapis.com/v0/b/tempkromatik.appspot.com/o/techinal_pic%2Fbg1.png?alt=media&token=a86efa06-7877-4f97-b83e-5bb6f8570686');
        background-size: cover;
        height: 100%;
        ">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h1 class="mb-3">Megörökítjük az élményeket</h1>
                        <h4 class="mb-3">Éld át újra a pillanatot</h4>
                        <p class="mb-4">Csapatunk kiemelkedően profi és kreatív tartalmakat alkot, hogy elképzeléseidet a legjobban megvalósítsuk. Garantáljuk, hogy minden projektünk emlékezetes és lenyűgöző lesz.
                        </p>
                        <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                            echo '<a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="index.php?page=events" role="button">Fedezd fel!</a>';
                        } else {
                            echo '<a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="index.php?page=login" role="button">Fedezd fel!</a>';
                        }
                        ?>

                    </div>
                </div>
                <div class="video-player">
                    <video controls>
                        <source src="joloxd.mp4" type="video/mp4">
                        A böngésződ nem támogatja a videókat.
                    </video>
                </div>
                <iframe class="player" src="https://drive.google.com/file/d/1XkxKThW2iy-36VmPcxZsCdfTA7buJ1cm/preview" allowfullscreen>
                </iframe>
                <div>
                    <iframe class="player" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.3375300228386!2d19.666564676788738!3d46.896079936771294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sNeumann%20J%C3%A1nos%20Egyetem%20GAMF%20M%C5%B1szaki%20%C3%A9s%20Informatikai%20Kar!5e0!3m2!1shu!2shu!4v1715546881146!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>