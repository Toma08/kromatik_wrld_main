<?php
// Oldal paraméter ellenőrzése
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

// Oldalak nevei tömbben
include 'db.inc.php';

// Navbar létrehozása
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">';
echo '  <div class="container-fluid">';
echo '    <a class="navbar-brand" href="#"><img src="https://firebasestorage.googleapis.com/v0/b/tempkromatik.appspot.com/o/techinal_pic%2Flogo2.png?alt=media&token=bccfef89-c576-4508-bd8d-2ca73c5da50f" height="30" alt="MDB Logo" redius="30%" loading="lazy" /></a>';
echo '    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
echo '      <span class="navbar-toggler-icon"></span>';
echo '    </button>';
echo '    <div class="collapse navbar-collapse" id="navbarNav">';
echo '      <ul class="navbar-nav">';
foreach ($pages as $key => $value) {
  $activeClass = ($page == $key) ? 'active' : '';
  echo '        <li class="nav-item">';
  echo "          <a class=\"nav-link $activeClass\" aria-current=\"page\" href=\"index.php?page=$key\">$value</a>";
  echo '        </li>';
}
echo '      </ul>';
echo '    </div>';
echo '  </div>';
echo '</nav>';
