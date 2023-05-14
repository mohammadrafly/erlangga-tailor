<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>

<table id="myTable" class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50">
    <tr>
      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesanan</th>
      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Tracking</th>
      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opsi</th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    <?php if ($content): ?>
        <?php foreach($content as $data): ?>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <?php if ($data['pesanan'] == 'tanpa_desain'): ?>
                    Tanpa Desain
                <?php elseif ($data['pesanan'] == 'dengan_desain'): ?>
                    Dengan Desain
                <?php else: ?>
                    Perbaikan
                <?php endif ?>
            </td>
            <td class="px-6 py-4 whitespace-nowrap uppercase"><?= $data['kategori'] ?></td>
            <td class="px-6 py-4 whitespace-nowrap"><?= $data['ukuran'] ?></td>
            <td class="px-6 py-4 whitespace-nowrap"><?= $data['catatan'] ?></td>
            <td class="px-6 py-4 whitespace-nowrap">
                <?php if ($data['harga'] == null): ?>
                    IDR 0.0
                <?php else: ?>
                    <?= number_to_currency($data['harga'], 'IDR'); ?>
                <?php endif ?>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
            <?php if ($data['status_track'] == 'pending'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Pending
                </span>
            <?php elseif ($data['status_track'] == 'ditolak'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Ditolak
                </span>
            <?php elseif ($data['status_track'] == 'diterima'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Diterima
                </span>
            <?php elseif ($data['status_track'] == 'sudah_sampai'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Sudah Sampai
                </span>
            <?php elseif ($data['status_track'] == 'diproses'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Diproses
                </span>
            <?php elseif ($data['status_track'] == 'sudah_jadi'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    Sudah Jadi
                </span>
            <?php elseif ($data['status_track'] == 'belum_lunas'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Belum Lunas
                </span>
            <?php elseif ($data['status_track'] == 'lunas'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Lunas
                </span>
            <?php elseif ($data['status_track'] == 'dikirim'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Dikirim
                </span>
            <?php elseif ($data['status_track'] == 'selesai'): ?>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Selesai
                </span>
            <?php endif; ?>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <?php if ($data['status_track'] === 'pending'): ?>
                    <a disabled class="opacity-50 cursor-not-allowed bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >
                        Bayar
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('customer/tanpa-desain/bayar/'.$data['id']) ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Bayar
                    </a>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>
    <?php endif ?>
    <!-- More table rows -->
  </tbody>
</table>
<?= $this->endSection() ?>
<?= $this->section('script') ?>

<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>

<?= $this->endSection() ?>