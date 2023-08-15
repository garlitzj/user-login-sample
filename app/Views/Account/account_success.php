<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<div class="container">
<h1>Success!</h1>
<p>Your registration has been completed successfully. You may now <a href="<?=site_url('login')?>">sign in</a> using the credentials you provided.</p>
</div>
<?= $this->endSection() ?>