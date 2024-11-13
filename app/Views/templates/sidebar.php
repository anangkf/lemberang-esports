<div class="col-lg-4 d-flex flex-column gap-4 ps-lg-4">
  <div class="grid">
    <h5>Info Tournament</h5>
    <div class="row gap-lg-2">
      <?php if(count($tournaments)): ?>
        <?php foreach ($tournaments as $tournament): ?>
          <?= view_cell('TournamentItemCell', ['tournament' => $tournament]) ?>
        <?php endforeach; ?>
      <?php else: ?>
      <div class="col-12">
        <p>Tidak ada tournament yang aktif.</p>
      </div>
    </div>
    <?php endif; ?>

  </div>

  <div class="grid">
    <h5>Berita Populer</h5>
    <div class="row gap-lg-2">
      <?php foreach ($popular_news as $news): ?>
        <?= view_cell('NewsItemCell', ['news' => $news]) ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>