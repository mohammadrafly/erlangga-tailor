<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                                <button class="btn btn-success" data-toggle="modal" data-target="#dateRangeModal">Export to Excel</button>
                            </div>
                        </div>
                        <?= $this->include('pages/partials/modalRangeDate') ?>
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
                                            <th>Ukuran</th>
                                            <th>Catatan</th>
                                            <th>Kode Pembayaran</th>
                                            <th>Status Tracking</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Tanggal Update</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($content as $data): ?>
                                        <tr>
                                            <td><?= $data['name'] ?></td>
                                            <td>
                                                <?php if ($data['pesanan'] == 'tanpa_desain'): ?>
                                                    <span class="badge badge-primary">Tanpa Desain</span>
                                                <?php elseif ($data['pesanan'] == 'dengan_desain'): ?>
                                                    <span class="badge badge-success">Dengan Desain</span>
                                                <?php elseif ($data['pesanan'] == 'perbaikan'): ?>
                                                    <span class="badge badge-warning">Perbaikan</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><img src="<?= base_url('uploads/foto/kain/' . $data['foto_kain']) ?>" alt="Kain Photo" width="100"></td>
                                            <td><img src="<?= base_url('uploads/foto/pola/' . $data['pola_desain']) ?>" alt="Kain Photo" width="100"></td>
                                            <td><?= $data['kategori'] ?></td>
                                            <td><?= $data['jumlah'] ?></td>
                                            <td><?= $data['jenis_kelamin'] ?></td>
                                            <td><?= $data['nomor_hp'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['tanggal_selesai'] ?></td>
                                            <td>
                                                <?php if ($data['harga'] == ''): ?>
                                                    IDR 0,0
                                                <?php else: ?>
                                                    <?= number_to_currency($data['harga'], 'IDR') ?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $data['ukuran'] ?></td>
                                            <td><?= $data['catatan'] ?></td>
                                            <td><?= $data['kode_pembayaran'] ?></td>
                                            <td>
                                                <?php if ($data['status_track'] == 'pending'): ?>
                                                    <span class="badge badge-primary">Pending</span>
                                                <?php elseif ($data['status_track'] == 'dibatalkan'): ?>
                                                    <span class="badge badge-danger">Dibatalkan</span>
                                                <?php elseif ($data['status_track'] == 'diterima'): ?>
                                                    <span class="badge badge-success">Diterima</span>
                                                <?php elseif ($data['status_track'] == 'sudah_sampai'): ?>
                                                    <span class="badge badge-info">Sudah Sampai</span>
                                                <?php elseif ($data['status_track'] == 'diproses'): ?>
                                                    <span class="badge badge-warning">Diproses</span>
                                                <?php elseif ($data['status_track'] == 'sudah_jadi'): ?>
                                                    <span class="badge badge-success">Sudah Jadi</span>
                                                <?php elseif ($data['status_track'] == 'belum_lunas'): ?>
                                                    <span class="badge badge-warning">Belum Lunas</span>
                                                <?php elseif ($data['status_track'] == 'lunas'): ?>
                                                    <span class="badge badge-success">Lunas</span>
                                                <?php elseif ($data['status_track'] == 'dikirim'): ?>
                                                    <span class="badge badge-info">Dikirim</span>
                                                <?php elseif ($data['status_track'] == 'selesai'): ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php endif; ?>
                                            </td>

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