<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>

                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="text-center font-thin p-2 inline-block bg-red-700 text-white rounded-lg">
                            <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                            <div class="text-center font-thin p-2 inline-block bg-green-700 text-white rounded-lg">
                            <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
<?php if ($content): ?>
    <form action="<?= base_url('customer/order') ?>" method="post">
        <?php foreach($content as $data): ?>
            <div class="flex items-center justify-between mb-4 p-4 bg-white rounded-md shadow-md">
                <div class="flex items-center">
                    <input type="checkbox" name="id[]" value="<?= $data['id'] ?>" class="mr-4 order-item" <?= $data['kode_pembayaran'] ? 'disabled' : '' ?>>
                    <img src="<?= base_url('uploads/foto/kain/'.$data['foto_kain']) ?>" alt="Product Image" class="h-16 w-16 rounded-md object-cover" style="height: 150px; width: 150px;">
                    <div class="ml-4">
                        <h1 class="text-lg font-bold text-gray-800">
                            <?php if ($data['pesanan'] == 'tanpa_desain'): ?>
                                <span class="inline-block bg-gray-300 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold ml-2">
                                Tanpa Desain
                                </span>
                            <?php elseif ($data['pesanan'] == 'dengan_desain'): ?>
                                <span class="inline-block bg-gray-300 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold ml-2">
                                Dengan Desain
                                </span>
                            <?php elseif ($data['pesanan'] == 'perbaikan'): ?>
                                <span class="inline-block bg-gray-300 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold ml-2">
                                Perbaikan
                                </span>
                            <?php endif; ?>
                        </h1>
                        <p class="text-gray-500"><?= $data['kategori'] ?></p>
                        <p class="text-gray-500"><?= $data['ukuran'] ?></p>
                        <p class="text-gray-800 font-bold">Catatan: <span class="font-normal"><?= $data['catatan'] ?></span></p>
                        <?php if($data['status_track'] !== 'selesai'): ?>
                            <?php if($data['kode_pembayaran']): ?>
                            <a href="https://wa.me/<?= $toko['nomor_wa'] ?>/?text=Check%20Order%20<?= $data['kode_pembayaran'] ?>" target="_blank" rel="noopener noreferrer" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                                Check Order
                            </a>
                            <?php endif ?>
                        <?php elseif($data['status_track'] === 'selesai'): ?>
                            <div class="p-5 bg-white">
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-green-500 text-white">
                                    Pesanan Selesai
                                </span>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="mx-2 text-gray-700 font-semibold">X <?= $data['jumlah'] ?></span>
                </div>
            </div>
        <?php endforeach ?>
        <div class="mt-8 flex items-center justify-between bg-white rounded-md shadow-md p-4 mb-20">
            <div class="flex items-center">
                <input type="checkbox" id="select-all-checkbox" class="mr-2">
                <p class="text-gray-700 font-semibold">Select All</p>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                Checkout
            </button>
        </div>
    </form>
<?php endif ?>


<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    const selectAll = document.querySelector('#select-all-checkbox');
    const orderItems = document.querySelectorAll('.order-item');

    selectAll.addEventListener('change', function() {
        for (let i = 0; i < orderItems.length; i++) {
            orderItems[i].checked = selectAll.checked;
        }
    });

    orderItems.forEach(function(item, index) {
        item.addEventListener('change', function() {
            let allChecked = true;
            for (let i = 0; i < orderItems.length; i++) {
                if (!orderItems[i].checked) {
                    allChecked = false;
                    break;
                }
            }
            selectAll.checked = allChecked;
        });
    });
</script>
<?= $this->endSection() ?>