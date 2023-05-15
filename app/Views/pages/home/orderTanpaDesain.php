<?= $this->extend('layout/homeLayout') ?>
<?= $this->section('css') ?>
<style>
    .toggle-checkbox {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    }

    .toggle-label {
    display: block;
    overflow: hidden;
    cursor: pointer;
    background-color: #ccc;
    border-radius: 9999px;
    }

    .toggle-label::before {
    content: "";
    display: block;
    width: 200%;
    height: 100%;
    background-color: #6366f1;
    transform: translateX(-75%);
    transition: transform 0.2s ease-in-out;
    }

    .toggle-checkbox:checked + .toggle-label::before {
    transform: translateX(25%);
    }

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

                <div class="mt-10 mb-20 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold">Order Tanpa Desain</h2>
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
                    <p class="mt-4 text-gray-500">Baju tanpa desain</p>
                    <div class="mt-6 grid gap-6 grid-cols-1">
                        <div class="items-center">
                            <form class="mt-6" action="<?= base_url('customer/tanpa-desain') ?>" method="POST" enctype="multipart/form-data">
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="foto_kain">Foto Kain</label>
                                        <input class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="foto_kain" type="file" name="foto_kain" required>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="pola_desain">Pola Desain</label>
                                        <input class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="pola_desain" type="file" name="pola_desain" required>
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
                                                <option value="" disabled selected>Pilih Ukuran</option>
                                                <option value="atasan">Atasan</option>
                                                <option value="bawahan">Bawahan</option>
                                                <option value="terusan">Terusan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="flex items-center mb-4">
                                        <label class="mr-4 font-medium text-gray-700" for="switch_ukuran">Ukuran</label>
                                        <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                                            <input type="checkbox" id="switch_ukuran" name="switch_ukuran" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer">
                                            <label for="switch_ukuran" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                    </div>
                                    <div id="ukuran_detail_container">
                                        <div class="mb-2">
                                            <label class="block font-medium text-gray-700 mt-4 mb-2" for="ukuran_detail_1" title="Enter detailed measurements here, including chest circumference, waist circumference, hip circumference, and length of garment.">Ukuran Detail</label>
                                            <textarea 
                                                class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300" 
                                                id="ukuran" 
                                                type="text" 
                                                name="ukuran" 
                                                placeholder="Lingkar dada:X cm, Lingkar pinggang: X cm, Lingkar pinggul: X cm, Panjang atasan: X cm"></textarea>
                                        </div>
                                    </div>

                                    <div id="ukuran_umum_container" style="display:none">
                                        <div class="mb-2">
                                            <label class="block font-medium text-gray-700 mt-4 mb-2" for="ukuran_umum">Ukuran Umum</label>
                                            <select class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300" id="ukuran" name="ukuran">
                                                <option value="" disabled selected>Pilih Ukuran</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                            </select>
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
<script>
    const kategoriSelect = document.getElementById('kategori');
    const ukuranTextarea = document.getElementById('ukuran');

    kategoriSelect.addEventListener('change', () => {
    const selectedOption = kategoriSelect.value;
    
    if (selectedOption === 'atasan') {
        ukuranTextarea.placeholder = 'Lingkar dada:X cm, Lingkar pinggang: X cm, Lingkar pinggul: X cm, Panjang atasan: X cm';
    } else if (selectedOption === 'bawahan') {
        ukuranTextarea.placeholder = 'Lingkar pinggang: X cm, Lingkar pinggul: X cm, Panjang bawahan: X cm';
    } else if (selectedOption === 'terusan') {
        ukuranTextarea.placeholder = 'Lingkar dada:X cm, Lingkar pinggang: X cm, Lingkar pinggul: X cm, Panjang terusan: X cm';
    }
    });


    const toggleCheckbox = document.getElementById('switch_ukuran');
    const detailContainer = document.getElementById('ukuran_detail_container');
    const umumContainer = document.getElementById('ukuran_umum_container');

    toggleCheckbox.addEventListener('click', function() {
        if (toggleCheckbox.checked) {
            detailContainer.style.display = 'none';
            umumContainer.style.display = 'block';
        } else {
            detailContainer.style.display = 'block';
            umumContainer.style.display = 'none';
        }
    });
</script>
<?= $this->endSection() ?>