<?= $this->extend('templates/admin/base') ?>
<?= $this->section('content'); ?>
  <div class="container">
    <form action="<?= base_url('admin/kategori') ?>" method="post" class="col-12 col-lg-6">
      <?= csrf_field() ?>
      <div class="form-group">
          <label for="name">Nama Kategori</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama kategori" required>
      </div>
      <button class="btn btn-secondary shadow-sm">Batal</button>
      <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
    </form>
  </div>
<?= $this->endSection(); ?>