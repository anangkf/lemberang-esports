<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lemberang Esports</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app-dark.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/iconly.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="<?= base_url('assets/js/init-theme.js'); ?>"></script>
    <!-- Global extensions CSS applied here -->
</head>

<body>
    <div id="app">
      <div class="p-4 px-md-5">
        <?= $this->include('templates/header'); ?>
        
        <div class="d-flex flex-column flex-lg-row gap-4 md-gap-0">
          <?= $this->renderSection('content'); ?>
          
          <?= $this->include('templates/sidebar', $tournaments); ?>
        </div>
      </div>
      <button id="scrollToTop" class="d-none position-fixed m-2 bottom-0 end-0 btn btn-primary rounded-circle">
        <i class="bi bi-arrow-up fs-5"></i>
      </button> 
    </div>
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dark.js'); ?>"></script>
    
    <!-- Global extensions JS applied here -->
    <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>

    <?= $this->renderSection('page-script'); ?>

    <script>
      const btnScrollToTop = document.getElementById('scrollToTop')

      btnScrollToTop.addEventListener('click', scrollToTop)

      function scrollToTop () {
        window.scrollTo({top: 0, behavior: 'smooth'})
      }

      window.onscroll = function () {
        if(window.scrollY >= 10) {
          btnScrollToTop.classList.remove('d-none')
        } else {
          btnScrollToTop.classList.add('d-none')
        }
      }
    </script>
</body>

</html>