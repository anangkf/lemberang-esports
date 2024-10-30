<div class="d-flex flex-column gap-2 align-items-start col-6 col-md-4 my-2">
  <img class="img-fluid object-fit-cover" src="<?= base_url('uploads/') . $news['picture'] ?>" alt=<?= $news['title'] ?>>
  <div>
    <a href="<?= base_url('/berita/') . $news['slug'] ?>" class="link mb-1"><?= $news['title'] ?></a><br>
    <p class="mb-1 small"><?= (strlen($news['description']) > 63) ? substr($news['description'], 0, 60) . '...' : $news['description']; ?></p>
    <a href="<?= base_url('berita/kategori/' . url_title($news['kategori_name'], '-', true)) ?>" class="link small"><?= $news['kategori_name'] ?></a>
    <small class="text-muted"><?= (new DateTime($news['created_at']))->format('d/m/Y') ?></small>
  </div>
</div>