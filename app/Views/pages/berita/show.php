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
    <span class="badge rounded-pill text-bg-info"><?= $berita['kategori_name'] ?></span>
    <div class="d-flex gap-2 mt-2">
      <form action="<?= base_url('berita/' . $berita['id'] . '/like') ?>" method="post" class="d-inline-flex">
        <input type="hidden" name="_method" value="<?= $isLiked ? 'DELETE' : 'PATCH' ?>">
        <button type="submit" class='btn btn-link link-offset-2 link-underline link-underline-opacity-0 d-inline-flex align-baseline p-0'>
            <i class="bi <?= $isLiked ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up' ?>"></i>
        </button>
        <span><?= $likes ?></span>
      </form>
      <div class="d-inline-flex gap-1">
        <i class="bi bi-chat text-primary"></i>
        <span><?= count($comments) ?></span>
      </div>
    </div>

    <?= view_cell('CommentsCell', ['comments' => $comments, 'beritaId' => $berita['id']]) ?>
  </div>

<?= $this->endSection(); ?>