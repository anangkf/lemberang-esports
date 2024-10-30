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
    <!-- load ckeditor style from cdn -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />
    <!-- load daterange picker style from cdn -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="<?= base_url('assets/js/init-theme.js'); ?>"></script>
    <!-- Global extensions CSS applied here -->
</head>

<body>
    <div id="app">
        <?= $this->include('templates/admin/sidebar'); ?>
        <div id="main">
            <?= $this->include('templates/admin/header'); ?>

            <?php if (session('error') !== null) : ?>
                <div class="position-absolute alert alert-danger alert-dismissible fade show"" role=" alert" style="right: 12px;">
                    <?= session('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="position-absolute alert alert-danger alert-dismissible fade show"" role=" alert" style="right: 12px;">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php else : ?>
                        <?= session('errors') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <?php if (session('message') !== null) : ?>
                <div class="position-absolute alert alert-success alert-dismissible fade show"" role=" alert" style="right: 12px;">
                    <?= session('message') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="page-content">
                <?= $this->renderSection('content'); ?>
            </div>
            <?= $this->include('templates/footer'); ?>
        </div>
    </div>
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dark.js'); ?>"></script>

    <!-- Global extensions JS applied here -->
    <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <!-- load ckeditor script from cdn -->
    <script src="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.umd.js"></script>
    <!-- load daterange picker, momentjs and jquery script from cdn -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- load chartjs script from cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?= $this->renderSection('page-script'); ?>
</body>

</html>