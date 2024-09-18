<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?= base_url(); ?>">
                    <img class="img-fluid rounded-3" style="width: max-content;height: max-content;" src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="Logo" loading="lazy">
                </a>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
                    <a href="<?= base_url('/admin/dashboard') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-journal-check"></i>
                        <span>Master Berita</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="#" class="submenu-link">List Berita</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Tambah Berita</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Edit Banner Carousel</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-journal-check"></i>
                        <span>Master Kategori</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="<?= base_url('/admin/kategori') ?>" class="submenu-link">List Kategori</a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?= base_url('/admin/kategori/new') ?>" class="submenu-link">Tambah Kategori</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-journal-check"></i>
                        <span>Master Tournament</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="#" class="submenu-link">List Tournament</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Tambah Tournament</a>
                        </li>
                    </ul>
                </li>
                <!-- active -->
                <!-- <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-journal-check"></i>
                        <span>Sub Menu</span>
                    </a>
                    <ul class="submenu">
                        active
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Sub Sub Menu</a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div>