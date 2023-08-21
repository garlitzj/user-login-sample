<!doctype html>
<html data-bs-theme="dark" lang="en" class="h-100">
<head>
    <title>User Login Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?=site_url('css/main.css')?>" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">User Login Demo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?=site_url()?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=site_url('users')?>">User List</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        <?php
        if(!empty($logged_in_user)):
        ?>
        <li class="nav-item dropdown ml-auto">
        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://placehold.co/32x32" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="<?=site_url('dashboard')?>">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?=site_url('logout')?>">Sign Out</a></li>
              </ul>
        </li>
        <?php else: ?>
        <li>
          <a href="<?=site_url('login')?>" class="btn btn-primary">Sign In</a>
        </li>

        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
  <main class="flex-shrink-0">
    <?= $this->renderSection('content'); ?>
  </main>
  <footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="<?=site_url('')?>" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="<?=site_url('users')?>" class="nav-link px-2 text-body-secondary">User List</a></li>
      </ul>
      <p class="text-center text-body-secondary">&copy; 2023</p>
      </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<?= $this->renderSection('inlineJS'); ?>
</body>
</html>