<?= $this->extend('layout/homeLayout') ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

                <div class="mt-10 mb-20 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold">Order Perbaikan</h2>
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
                    <p class="mt-4 text-gray-500">Baju perbaikan</p>
                    <div class="mt-6 grid gap-6 grid-cols-1">
                        <div class="items-center">
                            <form class="mt-6" action="<?= base_url('customer/perbaikan') ?>" method="POST" enctype="multipart/form-data">
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="foto_kain">Foto Kain</label>
                                        <input class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="foto_kain" type="file" name="foto_kain" required>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="pola_desain">Jenis Kelamin</label>
                                        <select class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <div id="zoom-container"></div>
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="foto_kain">Kategori</label>
                                        <div class="scrollable-checkbox-container flex">
                                            <?php foreach($items as $item): ?>
                                            <label for="item-<?= $item['id'] ?>" class="flex items-center border rounded-md px-4 py-2 hover:bg-gray-100 transition-colors duration-300">
                                                <input type="radio" id="item-<?= $item['id'] ?>" name="kategori" value="<?= $item['product'] ?>" class="mr-2">
                                                <div class="w-24 h-24 bg-gray-200 rounded-full overflow-hidden">
                                                    <img src="<?= base_url('uploads/foto/pola/'.$item['img']) ?>" alt="<?= $item['product'] ?>" class="object-cover w-full h-full zoomable-image">
                                                </div>
                                                <span class="ml-3 font-medium"><?= $item['product'] ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="pola_desain">Jumlah Item</label>
                                        <input class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="jumlah" type="number" name="jumlah" required>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="pola_desain">Catatan</label>
                                        <textarea class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="catatan" type="text" name="catatan" required></textarea>
                                    </div>
                                </div>
                                <button class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-300" type="submit">
                                    Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>