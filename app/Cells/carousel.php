<div id="carouselRide" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($news as $id=>$item): ?>
      <a href="<?= base_url('/berita/') . $item['slug'] ?>">
        <div class="carousel-item <?= $id == 0 ? 'active' : '' ?>">
          <img src=<?= base_url('uploads/') . $item['picture'] ?> class="d-block w-100 object-fit-cover" alt=<?= $item['title'] ?>>
          <div class="carousel-caption d-none d-md-block w-100 start-0 bottom-0 pt-5" style=" background: linear-gradient(0deg, rgba(39,37,57,1) 5%, rgba(39,37,57,0.05) 70%);">
            <h5><?= $item['title'] ?></h5>
            <p class="text-light">
            <?= 
              (new DateTime($item['created_at'], new DateTimeZone('UTC')))
                ->setTimezone(new DateTimeZone('Asia/Jakarta'))
                ->format('j F Y H:i T') 
            ?>
            </p>
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