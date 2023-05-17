<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h4>Profile Toko</h4>
        <?php if(session()->has('error')): ?>
            <div class="alert alert-danger"><?= session('error') ?></div>
        <?php endif; ?>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success"><?= session('success') ?></div>
        <?php endif; ?>
      </div>
      <div class="card-body">
        <form action="<?= base_url('dashboard/setting') ?>" method="POST">
          <div class="form-group">
            <label for="inputNamaPemilik">Nama Pemilik</label>
            <input name="nama_pemilik" type="text" class="form-control" id="inputNamaPemilik" placeholder="Enter Nama Pemilik" value="<?= $content['nama_pemilik'] ?>">
          </div>
          <div class="form-group">
            <label for="inputNomorTelepon">Nomor Telepon</label>
            <input name="nomor_wa" type="number" class="form-control" id="inputNomorTelepon" placeholder="Nomor Telepon" value="<?= $content['nomor_wa'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $content['alamat'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="inputNomorTelepon">Embed Link for GMaps</label>
            <input name="embed_link" type="text" class="form-control" id="inputNomorTelepon" placeholder="Embed Link" value="<?= $content['embed_link'] ?>">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>