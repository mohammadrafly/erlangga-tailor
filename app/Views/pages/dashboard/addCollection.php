<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Product</h6>
  </div>
  <div class="card-body">
    <form method="POST" action="<?= $content ? base_url('dashboard/collections/update/'.$content['id']) : base_url('dashboard/collections/')  ; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="kategori">Product Type</label>
            <select class="form-control" id="kategori" name="kategori">
                <option value="perbaikan" <?= $content && $content['kategori'] == 'perbaikan' ? 'selected' : '' ?>>Perbaikan</option>
                <option value="clothing" <?= $content && $content['kategori'] == 'clothing' ? 'selected' : '' ?>>Clothing</option>
            </select>
        </div>
        <div class="form-group">
            <label for="product-name">Product Name</label>
            <input type="text" class="form-control" id="product" name="product" placeholder="Enter product name" value="<?= $content ? $content['product'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="product-price">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Enter product price" value="<?= $content ? $content['harga'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="product-estimation">Estimasi</label>
            <input type="text" class="form-control" id="estimasi" name="estimasi" placeholder="Enter product estimation" value="<?= $content ? $content['estimasi'] : '' ?>">
        </div>
        <div class="form-group">
            <label for="product-image">Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="img" name="img">
                <label class="custom-file-label" for="img">Choose file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>


<?= $this->endSection() ?>