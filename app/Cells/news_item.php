<div class="d-flex flex-column flex-lg-row gap-2 align-items-start col-6 col-md-4 col-lg-auto">
  <img class="col-lg-4 img-fluid object-fit-cover" src="<?= base_url('uploads/') . $news['picture'] ?>" alt=<?= $news['title'] ?>>
  <div>
    <a href="<?= base_url('/berita/') . $news['slug'] ?>" class="link mb-1"><?= $news['title'] ?></a><br>
    <p class="mb-1 small"><?= (strlen($news['description']) > 63) ? substr($news['description'],0,60).'...' : $news['description']; ?></p>
    <a href="#" class="link small"><?= $news['kategori_name'] ?></a>
    <small class="text-muted"><?= (new DateTime($news['created_at']))->format('d/m/Y') ?></small>
  </div>
</div>