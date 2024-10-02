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
    <form action="<?= base_url('admin/berita/' . $berita['id']) ?>" method="post" enctype="multipart/form-data" class="col-12">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
          <label for="title">Judul Berita</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul berita" value="<?= $berita['title'] ?>" required>
      </div>
      <div class="form-group">
          <label for="description">Deskripsi</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan deskripsi" value="<?= $berita['description'] ?>" required>
      </div>
      <div class="form-group">
          <label for="kategori_id">Kategori</label>
          <select class="form-control" id="kategori_id" name="kategori_id" required>
              <option value="">Pilih kategori</option>
              <?php foreach ($kategori as $kategori) : ?>
                <option value="<?= $kategori['id'] ?>" <?= $berita['kategori_id'] == $kategori['id'] ? 'selected' : '' ?> ><?= $kategori['name'] ?></option>
              <?php endforeach; ?>
          </select>
      </div>
      <div class="form-group">
          <label for="picture">Gambar</label><br>
          <p class="form-label text-secondary">Maks. 2 MB</p>
          <div class="mb-3 custom-file-input" id="customFileInput">
              <input type="file" accept="image/*" class="form-control" id="picture" name="picture" onchange="showPreview(event)" value="<?= $berita['picture'] ?>">
              <img id="imagePreview" alt="Image Preview" src="<?= base_url('uploads/'. $berita['picture']) ?>">
              <span id="placeholderText">Klik atau Tarik & Seret untuk Upload gambar</span>
          </div>
      </div>
      <div class="form-group">
          <label for="content">Konten Berita</label>
          <textarea type="text" class="form-control" id="content" name="content" ><?= $berita['content'] ?></textarea>
      </div>
      <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary shadow-sm">Batal</a>
      <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
    </form>
  </div>
<?= $this->endSection(); ?>

<?= $this->section('page-script'); ?>
<script>
    const imagePreview = document.getElementById('imagePreview');
    const placeholderText = document.getElementById('placeholderText');
    let imagePreviewSrc = "<?= $berita['picture'] ?>";

    if(imagePreviewSrc) {
      imagePreview.style.display = 'block';
      placeholderText.style.display = 'none';
    }

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

<script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Underline,
        Subscript,
        Superscript,
        Font,
        Paragraph,
        Alignment,
        Heading,
        BlockQuote,
        Link,
        List,
        Image,
        ImageCaption,
        ImageResize,
        ImageStyle,
        ImageToolbar,
        LinkImage,
        ImageUpload,
        Base64UploadAdapter,
        AutoImage,
        Table, 
        TableToolbar
    } = CKEDITOR;

    ClassicEditor
        .create( document.querySelector( '#content' ), {
            plugins: [ Essentials, Bold, Italic, Underline, Subscript, Superscript, Font, Paragraph, Alignment, Heading, BlockQuote, Link, List, Image, ImageUpload, Base64UploadAdapter, AutoImage, ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage, Table, TableToolbar ],
            toolbar: [
                'undo', 'redo', '|', 'heading', 'bold', 'italic', 'superscript', 'subscript', '|',
                'alignment', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 
                '|', 'bulletedList', 'numberedList', 'blockQuote' , 'link', 'insertImage', 'insertTable'
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },
                ]
            },
            fontFamily: {
                options: [
                    'default',
                    'Ubuntu, Arial, sans-serif',
                    'Ubuntu Mono, Courier New, Courier, monospace'
                ]
            },
            fontColor: {
                default: '#000',
                colorPicker: {
                    // Use 'hex' format for output instead of 'hsl'.
                    format: 'hex',
                }
            },
            image: {
                toolbar: [
                    'imageStyle:block',
                    'imageStyle:side',
                    'imageStyle:wrapText',
                    '|',
                    'toggleImageCaption',
                    'imageTextAlternative',
                    '|',
                    'linkImage',
                ],
                insert: {
                    integrations: [ 'upload', 'assetManager', 'url' ],
                    type: 'auto'
                }
            },
            table: {
                contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
            }
        } )
        .then((editor) => console.log(editor))
        .catch((error) => console.error(error));
</script>

<?= $this->endSection(); ?>