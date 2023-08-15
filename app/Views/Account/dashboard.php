<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<?php 

?>
<div class="container">
    <h1>Dashboard</h1>
    <p>Here you can update various profile information and settings.</p>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <img src="https://placehold.co/128x128" alt="mdo" width="128" height="128" class="rounded-circle">
        </div>
        <div class="col-sm-12 col-md-8">
        <h3>My Profile</h3>
            <?php 
            $success = session()->get('success');
            $errors = session()->get('errors');
            if($success):
            ?>
            <div class="alert alert-success">Profile updated successfully!</div>
            <?php endif; ?>
            <p><small>Member since <?=date('M d Y', strtotime($logged_in_user['created_at']))?> </small></p>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" class="form-control" id="email" value="<?=$logged_in_user['email']?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username </label>
                    <input type="text" name="username" class="form-control<?=isset($errors['username']) ? ' is-invalid' : '' ?>" id="username" value="<?=$username?>">
                    <?php if(!empty($errors['username'])) : ?>
                        <div class="invalid-feedback"><?=$errors['username']?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="job" class="form-label">Job Title </label>
                    <input type="text" name="job" class="form-control<?=isset($errors['job']) ? ' is-invalid' : '' ?>" id="job" value="<?=$job?>">
                    <?php if(!empty($errors['job'])) : ?>
                        <div class="invalid-feedback"><?=$errors['job']?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="about" class="form-label">About Me</label>
                    <textarea class="form-control" id="about" name="about"><?=$about_me?></textarea>
                    <div class="form-text">
                        Tell us a little about yourself.
                    </div>
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>