<div class="d-flex flex-column flex-lg-row gap-2 align-items-start col-6 col-md-4 col-lg-auto">
  <img class="col-lg-4 img-fluid object-fit-cover" src="<?= $tournament['image'] ?>" alt=<?= $tournament['name'] ?>>
  <div>
    <a href="#" class="link mb-1"><?= $tournament['name'] ?></a><br >
    <!-- <p class="mb-1 small">The best teams from around the globe compete for the Summoner's Cup in the biggest LoL tournament.</p> -->
    <small class="text-muted"><?= $tournament['start_date'] ?></small>
  </div>
</div>