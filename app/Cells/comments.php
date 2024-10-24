<div class="d-flex flex-column w-100 py-2">
    <h3 class="fs-4">Komentar</h3>
    <?php if (!empty($comments)): ?>
      <?php foreach ($comments as $comment) : ?>
          <div class="card mb-3 w-75 p-3 <?= $userId != $comment['userId'] ? 'bg-transparent border border-light align-self-auto' : 'align-self-end' ?>">
              <div class="card-header bg-transparent p-0 font-bold d-flex justify-content-between">
                <?= $comment['user_name'] ?>
                <small class="text-muted">
                  <?= 
                    (new DateTime($comment['created_at'], new DateTimeZone('UTC')))
                      ->setTimezone(new DateTimeZone('Asia/Jakarta'))
                      ->format('j F Y H:i T') 
                  ?>
                </small>
              </div>
              <div class="card-body p-0 mt-3">
                  <p class="card-text"><?= $comment['text'] ?></p>
              </div>
          </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>Belum ada komentar</p>
    <?php endif; ?>

    <?php if ($isLoggedIn) : ?>
      <form method="post" action="<?= base_url('berita/' . $beritaId . '/comment') ?>" class="<?= $isLoggedIn ? 'd-block' : 'd-none' . 'w-100' ?>">
          <div class="form-group">
              <label for="text">Komentar</label>
              <textarea class="form-control" id="text" name="text" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
      </form>
    <?php else : ?>
      <p class="<?= $isLoggedIn ? 'd-none' : 'd-block' ?>">Login untuk menambahkan komentar</p>
    <?php endif; ?>
</div>
