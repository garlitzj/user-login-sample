<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<div class="container">
<form>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="row">
    <div class="col-12">
        Need an account? <a href="/signup">Sign Up!</a>
    </div>
</div>
</div>
<?= $this->endSection() ?>