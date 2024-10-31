<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?= base_url(); ?>">
                    <img class="img-fluid rounded-3" style="width: max-content;height: max-content;" src="<?= base_url('assets/img/logo/lemberang-esports-row.png'); ?>" alt="Logo" loading="lazy">
                </a>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <?php foreach ($navs as $nav) : ?>
                  <li class="sidebar-item <?= str_contains(current_url(), $nav['url']) ? 'active' : '' ?> <?= $nav['hasSub'] ? 'has-sub' : '' ?>">
                      <a href="<?= $nav['hasSub'] ? '#' : base_url($nav['url']) ?>" class='sidebar-link'>
                          <i class="<?= $nav['icon'] ?>"></i>
                          <span><?= $nav['title'] ?></span>
                      </a>
                      <?php if ($nav['hasSub']) : ?>
                        <ul class="submenu">
                            <?php foreach ($nav['submenu'] as $submenu) : ?>
                              <li class="submenu-item <?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $submenu['url'] ? 'active' : '' ?>">
                                  <a href="<?= base_url($submenu['url']) ?>" class="submenu-link"><?= $submenu['title'] ?></a>
                              </li>
                            <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                  </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>