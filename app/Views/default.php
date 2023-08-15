<!doctype html>
<html data-bs-theme="dark" lang="en" class="h-100">
<head>
    <title>User Login Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?=site_url('css/main.css')?>" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          User Login Demo
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="/users" class="nav-link px-2 link-secondary">User List</a></li>
      </ul>

      <?php
        if(!empty($logged_in_user)):
      ?>
      <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://placehold.co/32x32" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">Sign out</a></li>
          </ul>
        </div>
      <?php else: ?>
      <div class="col-md-3 text-end">
        <a href="/login" class="btn btn-primary">Sign In</a>
      </div>
      <?php endif; ?>
    </header>
  </div>
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