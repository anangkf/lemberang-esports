<?= $this->extend('templates/admin/base') ?>
<?= $this->section('content'); ?>
  <div class="container">
    <div class="d-flex justify-content-end py-2">
      <a href="<?= base_url('admin/kategori/new') ?>" class="btn btn-primary">
        Tambah data
      </a>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr class="table-hover">
            <th class="text-center" scope="col">No.</th>
            <th class="text-center" scope="col">Nama</th>
            <th class="text-center" scope="col">Slug</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
          <?php if(count($kategori)) : ?>
          <?php foreach ($kategori as $key => $kategori) : ?>
            <tr>
              <td class="text-center" scope="row"><?= $key + 1; ?></td>
              <td scope="row"><?= $kategori['name']; ?></td>
              <td scope="row"><?= $kategori['slug']; ?></td>
              <td scope="row" class="d-flex justify-content-center gap-2">
                <a href="<?= base_url('admin/kategori/' . $kategori['id']) . '/edit' ?>" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" data-id="<?= $kategori['id'] ?>">
                  Delete
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="4" class="text-center">Belum ada data kategori</td>
            </tr>
          <?php endif; ?>
  
        </thead>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalDeleteLabel">Konfirmasi hapus data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin akan menghapus data kategori?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" id="deleteButton" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <form id="deleteForm" method="POST" style="display: none;">
      <input type="hidden" name="_method" value="DELETE">
  </form>

<?= $this->endSection(); ?>

<?= $this->section('page-script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteModal = document.getElementById('modalDelete');
        var deleteForm = document.getElementById('deleteForm');
        var deleteButton = document.getElementById('deleteButton');

        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            deleteForm.action = '<?= base_url('admin/kategori/') ?>' + id;
        });

        deleteButton.addEventListener('click', function() {
            deleteForm.submit();
        });
    });
</script>
<?= $this->endSection(); ?>