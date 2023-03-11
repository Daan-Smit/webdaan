<nav class="navbar navbar-expand-lg navbar-dark bg-main sticky-top">
  <div class="container-fluid container-xl px-3 px-xl-0">
    <a class="navbar-brand" href="<?= $path ?>">
      <img src="<?= $path . 'images/logos/white-no-bg.png' ?>" height="50" class="d-inline-block align-top" alt="">
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
    </div>
    <span class="navbar-nav d-none d-lg-block">
      <a class="nav-link" href="#">Login</a>
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
      <a href="#" class="py-2 customLink">Content 1</a>
      <a href="#" class="py-2 customLink">Content 2</a>
      <a href="#" class="py-2 customLink">Content 3</a>
    </div>
  </div>
</div>