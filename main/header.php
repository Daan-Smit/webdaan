<nav class="navbar navbar-expand-lg sticky-top bg-main navbar-dark">
  <div class="container-fluid container-xl px-3 px-xl-0">
    <a class="navbar-brand" href="<?= $path ?>">
      <img src="<?= $path . 'images/logos/white-no-bg.png' ?>" height="50" class="d-inline-block align-top" alt="">
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link customLink" href="<?= $path ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link customLink" href="<?= $path . '' ?>">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link customLink" href="<?= $path . '' ?>">Recepten</a>
        </li>
      </ul>
    </div>
    
    <?php
      if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid']
    ?>
        <div class="dropdown d-none d-lg-block">
          <button class="btn btn-secondary dropdown-toggle bg-transparent profile-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="mr-5 d-inline-block">Welkom, <?= $_SESSION['firstname'] ?>&nbsp;&nbsp;<i class="fa-solid fa-user fa-lg"></i></div>
            
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= $path . 'login/profile.php?profile='?><?= $userid ?>">Profiel</a></li>
            <li><a class="dropdown-item" href="<?= $path . '' ?>">Instellingen (concept)</a></li>
            <li><a class="dropdown-item" href="<?= $path . '' ?>">Opgeslagen recepten (concept)</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= $path . 'includes/login/logout.inc.php'?>">Uitloggen</a></li>
          </ul>
        </div>
    <?php
      } else {
    ?>
        <span class="navbar-nav d-none d-lg-block">
          <a href="<?= $path . 'login/login.php'?>" class="btn btn-maindark text-white px-4 roundedButton">
              Login
          </a>
        </span>
    <?php
      }
    ?>
    
    <button class="navbar-toggler sidebar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


<div class="offcanvas offcanvas-end bg-main" tabindex="-1" id="sidebar" aria-labelledby="sidebar-label">
  <div class="offcanvas-header text-white mx-3 mt-3">
    <h5 class="offcanvas-title">Pagina's</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <hr class="bg-main">
  <div class="offcanvas-body mx-3 mb-3">
    <div class="d-flex flex-column bd-highlight">
      <a href="<?= $path ?>" class="py-2 customLink">Home</a>
      <a href="<?= $path . '' ?>" class="py-2 customLink">Portfolio</a>
      <a href="<?= $path . ''?>" class="py-2 customLink">Recepten</a>
      <hr class="bg-main">

      <?php
        if (isset($_SESSION['userid'])) {
          $userid = $_SESSION['userid'];
      ?>
          <div class="dropdown w-100">
            <button class="btn btn-maindark dropdown-toggle btn-block text-white px-4 w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user"></i>
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class="dropdown-item" href="<?= $path . 'login/profile.php?profile='?><?= $userid ?>">Profiel</a></li>
              <li><a class="dropdown-item" href="<?= $path . '' ?>">Instellingen (concept)</a></li>
              <li><a class="dropdown-item" href="<?= $path . '' ?>">Opgeslagen recepten (concept)</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= $path . 'includes/login/logout.inc.php'?>">Uitloggen</a></li>
            </ul>
          </div>
      <?php
        } else {
      ?>
          <a href="<?= $path . 'login/login.php'?>" class="btn btn-maindark btn-block text-white px-4">
            Login
          </a>
      <?php
        }
      ?>
      
    </div>
  </div>
</div>