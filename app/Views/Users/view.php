<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<?php 

?>
<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=site_url('users')?>">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?=$user['username']?></li>
    </ol>
    </nav>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <img src="https://placehold.co/128x128" alt="mdo" width="128" height="128" class="rounded-circle">
        </div>
        <div class="col-sm-12 col-md-8">
            <h1><?=$user['username']?> 
            <?php if(!empty($user['job'])): ?>
             <small class="text-body-secondary">(<?=$user['job']?>)</small>
            <?php endif; ?>
            </h1>
            <p><small>Member since <?=date('M d Y', strtotime($user['created_at']))?> </small></p>
            <div>
                <?=nl2br($user['about_me'])?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>