<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Tambah Pengguna
                        </button>
                        <?= $this->include('pages/partials/modalUser') ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Dibuat tanggal</th>
                                            <th>Diperbarui tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content as $data): ?>
                                        <tr>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['name'] ?></td>
                                            <td><?= $data['role'] ?></td>
                                            <td><?= $data['created_at'] ?></td>
                                            <td><?= $data['updated_at'] ?></td>
                                            <td>
                                                <button onclick="update(<?= $data['id'] ?>)" class="btn btn-primary btn-sm mr-2">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button onclick="deleteData(<?= $data['id'] ?>)" class="btn btn-danger btn-sm">
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