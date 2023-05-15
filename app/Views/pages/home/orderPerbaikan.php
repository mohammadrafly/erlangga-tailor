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
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="pola_desain">Kategori</label>
                                        <select class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="kategori" name="kategori" required>
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <option value="obras">Obras</option>
                                            <option value="penambalan">Penambalan</option>
                                            <option value="penggantian_kancing_resleting">Penggantian Kancing / Resleting</option>
                                            <option value="perbaikan_jahitan">Perbaikan Jahitan</option>
                                            <option value="pengganti_bagian_dalam">Pengganti Bagian Dalam</option>
                                            <option value="penyesuaian_ukuran">Penyesuaian Ukuran</option>
                                            <option value="perbaikan_aksesoris">Perbaikan Aksesoris</option>
                                        </select>
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