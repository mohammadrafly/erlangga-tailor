<thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Foto Kain</th>
                                            <th>Pola Desain</th>
                                            <th>Nomor Penerima</th>
                                            <th>Alamat</th>
                                            <th>Catatan</th>
                                            <th>Status Tracking</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Tanggal Update</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($contentComplete as $data): ?>
                                        <tr>
                                            <td><?= $data['name'] ?></td>
                                            <td><img src="<?= base_url('uploads/foto/kain/' . $data['foto_kain']) ?>" alt="Kain Photo" width="100"></td>
                                            <td><img src="<?= base_url('uploads/foto/pola/' . $data['pola_desain']) ?>" alt="Kain Photo" width="100"></td>
                                            <td><?= $data['nomor_hp'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['catatan'] ?></td>
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
                                                <button onclick="showOrderDetails(<?= $data['id'] ?>)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#orderDetailsModal">
                                                    <i class="fas fa-info-circle"></i> Details
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>