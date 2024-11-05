<nav class="navbar navbar-expand-lg" role="navigation">
  <div class="container justify-content-between align-items-center">
    <a href="<?= base_url(); ?>">
      <img class="img-fluid rounded-3" style="width: 180px;height: max-content;" src="<?= base_url('assets/img/logo/lemberang-esports-row.png'); ?>" alt="Logo" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="<?= base_url(); ?>" aria-current="page" class="px-4">Home</a>
        </li>
        <?php foreach ($categories as $category) : ?>
          <li class="nav-item">
            <a href="<?= base_url('berita/kategori/' . $category['slug']) ?>" class="px-4"><?= $category['name']; ?></a>
          </li>
        <?php endforeach; ?>
        <li class="nav-item d-block d-xl-none">
          <a href="<?= base_url('login') ?>" class="<?= $isLoggedIn ? 'd-none' : 'link-warning'; ?> px-4">Login</a>
        </li>
        <li class="nav-item d-block d-xl-none">
          <a href="<?= base_url('register') ?>" class="<?= $isLoggedIn ? 'd-none' : 'link-warning'; ?> px-4">Register</a>
        </li>
        <li class="nav-item d-block d-xl-none">
          <a href="<?= base_url('logout') ?>" class="<?= !$isLoggedIn ? 'd-none' : 'link-warning'; ?> px-4">Logout</a>
        </li>
      </ul>
    </div>
    <div class="d-none d-xl-flex gap-3 align-items-center">
      <a href="<?= base_url('login') ?>" class="<?= $isLoggedIn ? 'd-none' : 'link-warning'; ?>">Login</a>
      <a href="<?= base_url('register') ?>" class="<?= $isLoggedIn ? 'd-none' : 'link-warning'; ?>">Register</a>
      <a href="<?= base_url('logout') ?>" class="<?= !$isLoggedIn ? 'd-none' : 'link-warning'; ?>">Logout</a>
    </div>
  </div>
</nav>