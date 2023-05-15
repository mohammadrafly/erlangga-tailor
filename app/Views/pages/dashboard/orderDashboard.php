<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
                        </div>
                        <?= $this->include('pages/partials/modalOrder') ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Pesanan</th>
                                            <th>Foto Kain</th>
                                            <th>Pola Desain</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nomor Penerima</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Harga</th>
                                            <th>Catatan</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Tanggal Update</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content as $data): ?>
                                        <tr>
                                            <td><?= $data['name'] ?></td>
                                            <td><?= $data['pesanan'] ?></td>
                                            <td><?= $data['foto_kain'] ?></td>
                                            <td><?= $data['pola_desain'] ?></td>
                                            <td><?= $data['kategori'] ?></td>
                                            <td><?= $data['jumlah'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td><?= $data['nomor_hp'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['tanggal_selesai'] ?></td>
                                            <td><?= $data['harga'] ?></td>
                                            <td><?= $data['catatan'] ?></td>
                                            <td><?= $data['created_at'] ?></td>
                                            <td><?= $data['updated_at'] ?></td>
                                            <td>
                                                <button onclick="updateDataOrder(<?= $data['id'] ?>)" class="btn btn-primary btn-sm mr-2">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button onclick="deleteDataOrder(<?= $data['id'] ?>)" class="btn btn-danger btn-sm">
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