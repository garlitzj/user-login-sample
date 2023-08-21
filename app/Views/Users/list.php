<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>Users List</h1>
    <table id="userTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>-</th><th>Username</th><th>Title</th><th>Joined</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr><td><img src="https://placehold.co/32x32" alt="mdo" width="32" height="32" class="rounded-circle"></td><td><a href="<?=site_url('users/'.$user['id'])?>"><?=$user['username']?></a></td><td><?=$user['job']?></td><td><?=date('M d Y', strtotime($user['created_at']))?></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
<?= $this->section('inlineJS') ?>
<script>
    $( document ).ready(function() {
        let table = new DataTable('#userTable');
    });
</script>
<?= $this->endSection() ?>