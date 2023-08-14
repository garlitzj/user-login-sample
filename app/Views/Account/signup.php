<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<div class="container">
    <?php 
    $errors = session()->get('errors');
    ?>
    <form method="post">
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control<?=isset($errors['email']) ? ' is-invalid' : '' ?>" id="email" aria-describedby="emailHelp" value="<?= old('email') ?>">
        <?php if(!empty($errors['email'])) : ?>
        <div class="invalid-feedback" id="emailHelp">Please enter a valid email.</div>
        <?php else: ?>
        <div id="emailHelp" class="form-text">Your email is safe with us.</div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control<?=isset($errors['username']) ? ' is-invalid' : '' ?>" id="username" aria-describedby="usernameHelp" value="<?= old('username') ?>">
        <?php if(!empty($errors['username'])) : ?>
        <div class="invalid-feedback" id="usernameHelp">Please enter a valid name 4-16 characters in length.</div>
        <?php else: ?>
        <div id="usernameHelp" class="form-text">Between 4-16 characters in length.</div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control<?=isset($errors['password']) ? ' is-invalid' : '' ?>" id="password" value="<?= old('password') ?>?>">
        <?php if(!empty($errors['password'])) : ?>
        <div class="invalid-feedback" id="passwordHelp">Please enter a password.</div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="confirmpassword" class="form-label">Confirm Password</label>
        <input type="password" name="passconf" class="form-control<?=isset($errors['passconf']) ? ' is-invalid' : '' ?>" id="confirmpassword" value="<?=old('passconf')?>">
        <?php if(!empty($errors['passconf'])) : ?>
        <div class="invalid-feedback" id="passconfHelp">The passwords provided do not match.</div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <div class="row">
    <div class="col-12">
        Already have an account? <a href="/login">Login here</a>
    </div>
</div>
</div>
<?= $this->endSection() ?>