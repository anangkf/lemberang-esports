<?= $this->extend('templates/base', $isLoggedIn, $tournaments, $popular_news); ?>

<?= $this->section('content'); ?>

  <div class="col-lg-8">
    <h1 class="h1"><?= $berita['title'] ?></h1>
    <p class="m-0">
      Diunggah 
      <?= 
        (new DateTime($berita['created_at'], new DateTimeZone('UTC')))
          ->setTimezone(new DateTimeZone('Asia/Jakarta'))
          ->format('j F Y H:i T') 
      ?>
    </p>
    <p class="text-warning m-0">Oleh <?= $berita['author_name'] ?></p>
    <img src="<?= base_url('uploads/'. $berita['picture']) ?>" class="img-fluid my-4" alt="<?= $berita['title'] ?>">
    <?= $berita['content'] ?>
  </div>

<?= $this->endSection(); ?>