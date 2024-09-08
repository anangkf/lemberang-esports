<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center">
      <a href="">Logo</a>
      <div class="d-none d-xl-flex gap-4">
        <a href="" class="px-2">Home</a>
        <a href="" class="px-2">Mobile Legends</a>
        <a href="" class="px-2">PUBGM</a>
        <a href="" class="px-2">eFootball</a>
      </div>
      <div class="d-none d-xl-flex gap-3 align-items-center">
        <form action="">
            <div class="search-box">
                <input type="text" class="form-control">
                <i class="fa fa-search"></i>                    
            </div>
        </form>
        <a href="<?=base_url('login')?>" class="<?= $isLoggedIn ? 'd-none' : 'link-warning'; ?>">Login</a>
        <a href="<?=base_url('register')?>" class="<?= $isLoggedIn ? 'd-none' : 'link-warning'; ?>">Register</a>
        <a href="<?=base_url('logout')?>" class="<?= !$isLoggedIn ? 'd-none' : 'link-warning'; ?>">Logout</a>
      </div>
      <header class="d-block d-xl-none pb-2">
          <a href="#" class="d-block burger-btn d-xl-none">
              <i class="bi bi-justify fs-3"></i>
          </a>
      </header>
    </div>
</div>