
<?php
// Oldal paraméter ellenőrzése
$page = isset($_GET['page']) ? $_GET['page'] : 'index';
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://firebasestorage.googleapis.com/v0/b/tempkromatik.appspot.com/o/techinal_pic%2Flogo2.png?alt=media&token=bccfef89-c576-4508-bd8d-2ca73c5da50f" height="30" alt="MDB Logo" redius="30%" loading="lazy" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'fooldal') ? 'active' : ''; ?>" aria-current="page" href="index.php?page=fooldal">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'events') ? 'active' : ''; ?>" href="index.php?page=events">Események</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'msg') ? 'active' : ''; ?>" href="index.php?page=msg">Üzenetküldés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'logout') ? 'active' : ''; ?>" href="index.php?page=logout">Kilépés</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
