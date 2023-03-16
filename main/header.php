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
    <span class="navbar-nav d-none d-lg-block">
      <a href="portfolio/index.php?id=2" class="btn btn-maindark text-white px-4 roundedButton">
          Login
      </a>
    </span>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
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
      <a href="portfolio/index.php?id=2" class="btn btn-maindark btn-block text-white px-4">
          Login
      </a>
    </div>
  </div>
</div>