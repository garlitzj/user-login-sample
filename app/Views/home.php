<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<?php 

?>
<div class="container">
    <?php if(empty($logged_in_user)): ?>
        <h1>Welcome, Guest</h1>
        <p>There are many great reasons to sign up. They are so obvious I will not list them, so <a href="/signup">sign up</a> now!</p>
    <?php else: ?>
        <h1>Welcome, <?=$logged_in_user['username']?></h1>
        <p>Check out your <a href="/dashboard">dashboard</a> when you have a moment.</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>