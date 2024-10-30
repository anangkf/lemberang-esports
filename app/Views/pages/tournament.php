<?= $this->extend('templates/base', $isLoggedIn, $hideSidebar); ?>

<?= $this->section('content'); ?>
<div class="row px-2">
    <div class="col-12 col-lg-7">
        <img src="<?= base_url('uploads/' . $tournament['picture']) ?>" alt="<?= $tournament['name'] ?>" class="w-100 rounded-4">
    </div>
    <div class="col-12 col-lg-5">
        <ul class="nav nav-tabs" id="dataTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="detail-tab" data-bs-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="prize-tab" data-bs-toggle="tab" href="#prize" role="tab" aria-controls="prize" aria-selected="false">Hadiah</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="rules-tab" data-bs-toggle="tab" href="#rules" role="tab" aria-controls="rules" aria-selected="false">Rules</a>
            </li>
        </ul>

        <div class="tab-content" id="dataTabContent">
            <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                <div class="row mt-3">
                    <h4 class="fw-bold"><?= $tournament['name'] ?></h4>
                    <p class="text-muted"><?= $tournament['description'] ?></p>
                    <p class="text-muted"><?= $tournament['kategori_name'] ?></p>
                    <p class="text-muted">Tanggal Pendaftaran: <?= $tournament['registerDates'] ?></p>
                    <p class="text-muted">Tanggal Pelaksanaan: <?= $tournament['eventDates'] ?></p>
                    <p class="text-muted">HTM: <?= $tournament['htm'] ?></p>
                    <p class="text-muted">Slot: <?= $tournament['slot'] ?></p>
                    <p class="text-muted">Lokasi: <?= $tournament['location'] ?></p>
                    <p class="text-muted">Penyelenggara: <?= $tournament['organizer'] ?></p>
                </div>
            </div>
            <div class="tab-pane fade" id="prize" role="tabpanel" aria-labelledby="prize-tab">
                <div class="row mt-3">
                    <p class="w-100" style="white-space: pre-wrap;"><?= $tournament['prize'] ?></p>
                </div>
            </div>
            <div class="tab-pane fade" id="rules" role="tabpanel" aria-labelledby="rules-tab">
                <div class="row mt-3">
                    <p class="w-100" style="white-space: pre-wrap;"><?= $tournament['rules'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>