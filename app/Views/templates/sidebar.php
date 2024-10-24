<div class="col-lg-4 d-flex flex-column gap-4 ps-lg-4">
  <div class="grid">
    <h5>Info Tournament</h5>
    <div class="row gap-lg-2">
        <?php foreach ($tournaments as $tournament): ?>
          <?= view_cell('TournamentItemCell', ['tournament' => $tournament]) ?>
        <?php endforeach; ?>
    </div>
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