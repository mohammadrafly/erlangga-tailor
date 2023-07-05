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

    .scrollable-checkbox-container {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  scroll-behavior: smooth;
}

.scrollable-checkbox-container label {
  flex: 0 0 auto;
  margin-right: 1rem;
}

/* Hide the default radio button */
.scrollable-checkbox-container input[type="radio"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  display: inline-block;
  width: 1.25rem;
  height: 1.25rem;
  border: 1px solid #ccc;
  border-radius: 50%;
  background-color: #fff;
  vertical-align: middle;
  margin-right: 0.5rem;
  cursor: pointer;
}

/* Show the custom radio button when selected */
.scrollable-checkbox-container input[type="radio"]:checked::before {
  content: "";
  display: inline-block;
  width: 0.75rem;
  height: 0.75rem;
  border-radius: 50%;
  background-color: #4299e1;
  vertical-align: middle;
  margin-right: 0.5rem;
}

.zoomable-image {
  transition: transform 0.3s ease-in-out;
}

.zoomable-image:hover {
  transform: scale(1.2);
}

.zoomed-image {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999;
  max-width: 90%;
  max-height: 90%;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  border-radius: 5px;
  object-fit: contain;
}


</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

                <div class="mt-10 mb-20 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold">Order Dengan Desain</h2>
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
                    <p class="mt-4 text-gray-500">Baju dengan desain</p>
                    <div class="mt-6 grid gap-6 grid-cols-1">
                        <div class="items-center">
                            <form class="mt-6" action="<?= base_url('customer/dengan-desain') ?>" method="POST" enctype="multipart/form-data">
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="foto_kain">Foto Kain</label>
                                        <input class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="foto_kain" type="file" name="foto_kain" required>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <div class="mb-2">
                                    <div id="zoom-container"></div>
                                    <label class="block font-medium text-gray-700 mt-4 mb-2" for="foto_kain">Desain</label>
                                        <div class="scrollable-checkbox-container">
                                            <?php foreach($items as $item): ?>
                                                <label for="item-<?= $item['id'] ?>" class="flex items-center border rounded-md px-4 py-2 hover:bg-gray-100 transition-colors duration-300">
                                                    <input type="radio" id="item-<?= $item['id'] ?>" name="pola_desain" value="<?= $item['img'] ?>" class="mr-2">
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
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="pola_desain">Kategori</label>
                                        <select class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="kategori" name="kategori" required>
                                                <option value="" disabled selected>Pilih Ukuran</option>
                                                <option value="atasan">Atasan</option>
                                                <option value="bawahan">Bawahan</option>
                                                <option value="terusan">Terusan</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="mt-6">
                                    <div class="mb-2">
                                    <div id="zoom-container"></div>
                                    <label class="block font-medium text-gray-700 mt-4 mb-2" for="Info"></label>
                                        <div class="scrollable-checkbox-container">
                                                <label  class="flex items-center border rounded-md px-4 py-2 hover:bg-gray-100 transition-colors duration-300">
                                                    <div class="w-24 h-24 bg-gray-200 rounded-full overflow-hidden">
                                                        <img src="<?=base_url('assets/img/ukuran.png') ?>" alt="" class="object-cover w-full h-full zoomable-image">
                                                    </div>
                                                    <span class="ml-3 font-medium">Info ukuran detail</span>
                                                </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="mt-6">
                                    <div class="mb-2">
                                        <label class="block font-medium text-gray-700 mt-4 mb-2" for="info_ukuran">Info Ukuran Detail</label>
                                        <span id="detail" type="text" name="detail">Masukkan : Lingkar dada:X cm, Lingkar pinggang: X cm, Lingkar pinggul: X cm, Panjang atasan: X cm</span>
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
                                    Masukkan Keranjang
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
    const detailSpan = document.getElementById('detail');

    kategoriSelect.addEventListener('change', () => {
    const selectedOption = kategoriSelect.value;
    
    if (selectedOption === 'atasan') {
        ukuranTextarea.placeholder = 'Lingkar Leher (LL): X cm, Lingkar Dada (LD): X cm, Lebar Bahu (LB) : X cm, Lingkar Pinggang (LP): X cm, Panjang Lengan (PL): X cm, Panjang atasan/Baju (PB): X cm';
    } else if (selectedOption === 'bawahan') {
        ukuranTextarea.placeholder = 'Lingkar Pinggang (LP): X cm, Lingkar Paha (LPh): X cm, Panjang bawahan/Baju (PB): X cm';
    } else if (selectedOption === 'terusan') {
        ukuranTextarea.placeholder = 'Lingkar Leher (LL):X cm, Lingkar Dada (LD): X cm, Lebar Bahu (LB): X cm, Lingkar Pinggang (LP): X cm, Panjang Lengan (PL): X cm, Lingkar Paha (LPh): X cm, Panjang Terusan/Baju (PB): X cm';
    }

    // if (selectedOption === 'atasan') {
    //     detailSpan = 'Lingkar Leher (LL): X cm, Lingkar Dada (LD): X cm, Lebar Bahu (LB) : X cm, Lingkar Pinggang (LP): X cm, Panjang Lengan (PL): X cm, Panjang atasan/Baju (PB): X cm';
    // } else if (selectedOption === 'bawahan') {
    //     detailSpan = 'Lingkar Pinggang (LP): X cm, Lingkar Paha (LPh): X cm, Panjang bawahan/Baju (PB): X cm';
    // } else if (selectedOption === 'terusan') {
    //     detailSpan = 'Lingkar Leher (LL):X cm, Lingkar Dada (LD): X cm, Lebar Bahu (LB): X cm, Lingkar Pinggang (LP): X cm, Panjang Lengan (PL): X cm, Lingkar Paha (LPh): X cm, Panjang Terusan/Baju (PB): X cm';
    // }
    });

    const images = document.querySelectorAll('.zoomable-image');
    const zoomContainer = document.getElementById('zoom-container');

    images.forEach((image) => {
        image.addEventListener('click', () => {
        const zoomedImg = document.createElement('img');
        zoomedImg.src = image.src;
        zoomedImg.classList.add('zoomed-image');

        zoomContainer.appendChild(zoomedImg);
        zoomContainer.style.display = 'flex';

        zoomedImg.addEventListener('click', () => {
            zoomContainer.style.display = 'none';
            zoomedImg.remove();
        });
        });
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