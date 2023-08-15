<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<?php 
    $errors = session()->get('errors');
    $login_fail = session()->get('login_fail');
    ?>
<div class="container">
<form method="post">
  <?php if($login_fail): ?>
    <div class="alert alert-danger">The provided email/password is incorrect.</div>
  <?php endif; ?>
  <div class="mb-3">
    <label for="email" class="form-label<?=isset($errors['email']) ? ' is-invalid' : '' ?>">Email</label>
    <input type="email" name="email" class="form-control" id="email" value="<?= old('email') ?>">
    <?php if(!empty($errors['email'])) : ?>
        <div class="invalid-feedback"><?=$errors['email']?></div>
     <?php endif; ?>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label<?=isset($errors['password']) ? ' is-invalid' : '' ?>">Password</label>
    <input type="password" name="password" class="form-control" id="password" value="<?= old('password') ?>">
    <?php if(!empty($errors['password'])) : ?>
        <div class="invalid-feedback"><?=$errors['password']?></div>
     <?php endif; ?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="row">
    <div class="col-12">
        Need an account? <a href="<?=site_url('signup')?>">Sign Up!</a>
    </div>
</div>
</div>
<?= $this->endSection() ?>