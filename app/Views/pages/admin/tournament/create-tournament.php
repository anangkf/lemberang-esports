  <?= $this->extend('templates/admin/base') ?>
  <?= $this->section('content'); ?>
    <style>
        .custom-file-input {
          position: relative;
          width: 100%;
          height: 300px;
          border: 2px dashed #ddd;
          border-radius: 12px;
          display: flex;
          align-items: center;
          justify-content: center;
          overflow: hidden;
          cursor: pointer;
        }

        .custom-file-input input[type="file"] {
          position: absolute;
          width: 100%;
          height: 100%;
          opacity: 0;
          cursor: pointer;
        }

        .custom-file-input img {
          max-width: 100%;
          max-height: 100%;
          display: none;
        }

        .custom-file-input span {
          color: #6c757d;
        }
    </style>

    <div class="container">
      <form action="<?= base_url('admin/tournament') ?>" method="post" enctype="multipart/form-data" class="col-12 col-lg-11">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="name">Nama Tournament</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama tournament" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan deskripsi" required>
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <option value="">Pilih kategori</option>
                <?php foreach ($kategori as $kategori) : ?>
                  <option value="<?= $kategori['id'] ?>"><?= $kategori['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="registerDates">Tanggal Pendaftaran</label>
            <input type="text" class="form-control" id="registerDates" name="registerDates" placeholder="Tanggal Pendaftaran" required>
        </div>
        <div class="form-group">
            <label for="eventDates">Tanggal Pelaksanaan</label>
            <input type="text" class="form-control" id="eventDates" name="eventDates" placeholder="Tanggal Pelaksanaan" required>
        </div>
        <div class="form-group">
            <label for="picture">Gambar</label><br>
            <p class="form-label text-secondary">Maks. 2 MB</p>
            <div class="mb-3 custom-file-input" id="customFileInput">
                <input type="file" accept="image/*" class="form-control" id="picture" name="picture" onchange="showPreview(event)" required>
                <img id="imagePreview" alt="Image Preview" class="w-100">
                <span id="placeholderText">Klik atau Tarik & Seret untuk Upload gambar</span>
            </div>
        </div>
        <div class="form-group">
            <label for="htm">HTM</label>
            <input type="number" class="form-control" id="htm" name="htm" placeholder="Masukkan HTM">
        </div>
        <div class="form-group">
            <label for="slot">Slot</label>
            <input type="number" class="form-control" id="slot" name="slot" placeholder="Masukkan slot" required>
        </div>
        <div class="form-group">
            <label for="location">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi" required>
        </div>
        <div class="form-group">
            <label for="prize">Hadiah</label>
            <textarea class="form-control" id="prize" name="prize" placeholder="Hadiah" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="rules">Peraturan</label>
            <textarea class="form-control" id="rules" name="rules" placeholder="Peraturan" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="organizer">Penyelenggara</label>
            <input type="text" class="form-control" id="organizer" name="organizer" placeholder="Penyelenggara" required>
        </div>
        <a href="<?= base_url('admin/tournament') ?>" class="btn btn-secondary shadow-sm">Batal</a>
        <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
      </form>
    </div>
  <?= $this->endSection(); ?>

  <?= $this->section('page-script'); ?>
  <script>
      function showPreview(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById('imagePreview');
        const placeholderText = document.getElementById('placeholderText');
        
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
            placeholderText.style.display = 'none';
          }
          reader.readAsDataURL(file);
        }
      }
  </script>

  <script type="text/javascript">
    $(function() {
      $('input[name="registerDates"]').daterangepicker({
          autoUpdateInput: false,
          autoApply: true,
          locale: {
              cancelLabel: 'Clear'
          }
      });

      $('input[name="registerDates"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      });

      $('input[name="registerDates"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });
  });

  $(function() {
    $('input[name="eventDates"]').daterangepicker({
        autoUpdateInput: false,
        autoApply: true,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('input[name="eventDates"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('input[name="eventDates"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
  });
</script>

<?= $this->endSection(); ?>
