<div id="carouselRide" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($items as $id=>$item): ?>
      <a href="#">
        <div class="carousel-item <?= $id == 0 ? 'active' : '' ?>">
          <img src=<?= $item['image'] ?> class="d-block w-100 object-fit-cover" alt=<?= $item['title'] ?>>
          <div class="carousel-caption d-none d-md-block">
            <h5 style="text-shadow: 3px 2px 16px rgba(42,33,33,0.8);"><?= $item['title'] ?></h5>
            <p class="text-light" style="text-shadow: 3px 2px 16px rgba(42,33,33,0.8);"><?= $item['date_posted'] ?></p>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselRide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselRide" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>