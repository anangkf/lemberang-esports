<?= $this->extend('templates/base', $isLoggedIn, $tournaments, $popular_news); ?>

<?= $this->section('content'); ?>

  <div class="col-lg-8">
    <div class="col d-flex flex-column gap-4 position-relative">
      <h5>Semua Berita</h5>
      <div class="grid">
        <div class="row gap-lg-2">
          <?php foreach($news as $news): ?>
            <?= view_cell('NewsItemCell', ['news' => $news]) ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection(); ?>