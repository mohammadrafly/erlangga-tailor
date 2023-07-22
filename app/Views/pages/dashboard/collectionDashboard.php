<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Tambah Collection
                        </button>
                        <?= $this->include('pages/partials/modalCollection') ?>
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
                                                <button onclick="editCollection(<?= $data['id'] ?>)" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
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
function saveCollection() {
  const id = $('#id').val();
  const url = id ? `${base_url}dashboard/collections/update/${id}` : `${base_url}dashboard/collections`;

  // Create a new FormData object
  const formData = new FormData($('#form')[0]);

  $.ajax({
    url,
    type: 'POST',
    data: formData, // Use the FormData object for data
    dataType: 'JSON',
    contentType: false, // Set content type to false for FormData
    processData: false, // Set processData to false for FormData
    success: (respond) => {
      if (respond.status) {
        showAlert(respond.icon, respond.title, respond.text)
      } else {
        showAlert(respond.icon, respond.title, respond.text);
      }
    },
    error: (error) => {
      showAlert('error', error, 'Telah terjadi error, silahkan hubungi admin.');
    },
  });
}

function editCollection(id) {
    $('#form')[0].reset(); 
    $.ajax({
        url : `${base_url}dashboard/collections/update/${id}`,
        type: 'GET',
        dataType: 'JSON',
        success: function(respond)
        {
            $('[name="id"]').val(respond.data.id);
            $('[name="ketegori"]').val(respond.data.ketegori);
            $('[name="product"]').val(respond.data.product);
            $('[name="harga"]').val(respond.data.harga);
            $('[name="estimasi"]').val(respond.data.estimasi);
            $('[name="img"]').val(respond.data.img);
            $('#myModal').modal('show');
            $('.modal-title').text('Edit Collections'); 

            // Add event listener to modal close event
            $('#myModal').on('hidden.bs.modal', function () {
                $('#form')[0].reset(); // Reset the form
                location.reload();
            });
        },
        error: function (textStatus)
        {
            alert(textStatus);
        }
    });
}

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