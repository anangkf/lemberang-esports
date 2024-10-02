<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gensart | Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app-dark.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            background-color: var(--bs-body-bg);
        }

        #auth {
            height: 100vh;
            overflow-x: hidden;
        }

        #auth #auth-right {
            height: 100%;
            background: url(./png/4853433.png), linear-gradient(90deg, #2d499d, #3f5491);
        }

        #auth #auth-left {
            padding: 5rem;
        }

        #auth #auth-left .auth-title {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        #auth #auth-left .auth-subtitle {
            font-size: 1.7rem;
            line-height: 2.5rem;
            color: #a8aebb;
        }

        #auth #auth-left .auth-logo {
            margin-bottom: 7rem;
        }

        #auth #auth-left .auth-logo img {
            height: 2rem;
        }

        @media screen and (max-width: 1399.9px) {
            #auth #auth-left {
                padding: 3rem;
            }
        }

        @media screen and (max-width: 767px) {
            #auth #auth-left {
                padding: 5rem;
            }
        }

        @media screen and (max-width: 576px) {
            #auth #auth-left {
                padding: 5rem 3rem;
            }
        }

        html[data-bs-theme="dark"] #auth-right {
            background: url(./png/4853433.png), linear-gradient(90deg, #2d499d, #3f5491);
        }
    </style>
    <script src="<?= base_url('assets/js/init-theme.js'); ?>"></script>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="mb-5 text-center">
                        <a href="<?= base_url("") ?>">
                            <img class="w-75" src="<?= base_url('assets/img/logo/lemberang-esports-row.png'); ?>" alt="Logo" loading="lazy">
                        </a>
                    </div>
                    <!-- <h1>Aplikasi {Nama}</h1> -->
                    <p class="auth-subtitle mb-3">Login dengan akun anda</p>

                    <?php if (session('error') !== null) : ?>
                        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                    <?php elseif (session('errors') !== null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php if (is_array(session('errors'))) : ?>
                                <?php foreach (session('errors') as $error) : ?>
                                    <?= $error ?>
                                    <br>
                                <?php endforeach ?>
                            <?php else : ?>
                                <?= session('errors') ?>
                            <?php endif ?>
                        </div>
                    <?php endif ?>

                    <?php if (session('message') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                    <?php endif ?>

                    <form action="login" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Login</button>
                    </form>
                    <hr>
                    <div class="text-center fs-5 mt-5">
                      <p>Belum punya akun? <a href="<?= base_url('/register') ?>" class="font-bold">Daftar</a> atau <a href="<?= base_url('/login/magic-link') ?>" class="font-bold">Lupa Password</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" class="p-md-5 p-3">
                    <div class="d-flex align-items-center h-75">
                        <div class="card my-3 w-100">
                            <div class="card-body">
                                <h4 class="card-title">Informasi Pengumuman</h4>
                                <p class="card-text">Informasi tentang apapun dapat ditampilkan disini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>