<?= $this->extend('templates/base'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Hello</h4>
        <p class="card-text">I'm the <?= array_values($roles)[0]; ?></p>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('page-script'); ?>
<script>
    const motivateMe = _ => {
        alert('excessive thinking will release you from the real world');
    }
</script>
<?= $this->endSection(); ?>