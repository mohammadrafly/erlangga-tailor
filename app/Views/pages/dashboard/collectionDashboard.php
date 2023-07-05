<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
                        </div>
                        <a href="<?= base_url('dashboard/collections/add') ?>" class="btn btn-primary">
                        Tambah Collection
                        </a>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Product</th>
                                            <th>Harga</th>
                                            <th>Estimasi</th>
                                            <th>Image</th>
                                            <th>Dibuat tanggal</th>
                                            <th>Diperbarui tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content as $data): ?>
                                        <tr>
                                            <td><?= $data['kategori'] ?></td>
                                            <td><?= $data['product'] ?></td>
                                            <td><?= $data['harga'] ?></td>
                                            <td><?= $data['estimasi'] ?></td>
                                            <td><?= $data['img'] ?></td>
                                            <td><?= $data['created_at'] ?></td>
                                            <td><?= $data['updated_at'] ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/collections/update/' . $data['id']) ?>" class="btn btn-primary btn-sm mr-2">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <!--<a href="<?= base_url('dashboard/collections/delete/' . $data['id']) ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a> -->
                                                <button onclick="deleteCollection(<?= $data['id'] ?>)" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
function deleteCollection(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${base_url}dashboard/collections/delete/${id}`,
                type: 'GET',
                dataType: 'JSON',
                success: function (respond) {
                    showAlert(respond.icon, respond.title, respond.text);
                },
                error: function (textStatus) {
                    showAlert('error', textStatus, 'Telah terjadi error');
                }
            });
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
</script>
<?= $this->endSection() ?>