<?= $this->extend('templates/base', $isLoggedIn, $tournaments, $popular_news, $hideSidebar); ?>

<?= $this->section('content'); ?>

<div class="col-lg-8">
  <?= view_cell('CarouselCell') ?>

  <div class="col d-flex flex-column gap-4 mt-3 mt-md-4 mt-lg-5 position-relative">
    <div class="grid">
      <h5>Berita Terkini</h5>
      <div class="row">
        <?php foreach ($recent_news as $news): ?>
          <?= view_cell('RecentNewsItemCell', ['news' => $news]) ?>
        <?php endforeach; ?>
      </div>
      <a href="<?= base_url('berita/all') ?>" class="link-waring position-absolute end-0">Lihat semua<i class="bi bi-arrow-right"></i></a>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>