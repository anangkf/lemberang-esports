<div class="d-flex flex-column flex-lg-row gap-2 align-items-start col-6 col-md-4 col-lg-auto">
  <img class="col-lg-4 img-fluid object-fit-cover" src="<?= base_url('/uploads/'  . $tournament['picture']) ?>" alt=<?= $tournament['name'] ?>>
  <div>
    <a href="<?= base_url('/tournament/' . $tournament['id']) ?>" class="link mb-1"><?= $tournament['name'] ?></a><br>
    <p class="mb-1 small"><?= (strlen($tournament['description']) > 63) ? substr($tournament['description'], 0, 60) . '...' : $tournament['description']; ?></p>
    <small class="text-muted"><?= $tournament['eventDates'] ?></small>
  </div>
</div>