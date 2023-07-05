<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>  
                <section class="bg-gray-900 text-white py-20 rounded-lg mb-10">
                    <div class="container mx-auto px-4">
                        <div class="max-w-3xl mx-auto">
                            <h1 class="text-5xl font-bold mb-4">Welcome to ERLANGGA TAILOR</h1>
                            <p class="text-xl mb-6">Melayani Pemesanan Jasa Menjahit <br><strong>Ekspresikan Fashionmu Bersama Kami</strong><br> Kami Senang Melayani Anda.</p>
                        </div>
                    </div>
                </section>

                <section class="mb-10">
                    <h2 class="text-4xl font-bold text-gray-800 mb-8">Our Services</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-blue-100 shadow-md rounded-lg p-6">
                        <i class="fas fa-desktop text-5xl text-blue-500 mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Responsive</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Terdapat 4 orang pegawai dalam melayani pesanan harian pada perbaikan atau pembuatan pakaian baik pakaian pria maupun wanita . Lokasi kami berada di Kab. Jember sejak tahun 1997.
                        </p>
                        </div>
                        <div class="bg-green-100 shadow-md rounded-lg p-6">
                        <i class="fas fa-shopping-cart text-5xl text-green-500 mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Orders</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Untuk setiap bulannya kami mendapat pesanan rata rata 125 hingga 200 pakaian, dengan beberapa pesanan jahitan seperti kemeja, celana, rok, jas, dan lain lain.
                        </p>
                        </div>
                        <div class="bg-purple-100 shadow-md rounded-lg p-6">
                        <i class="fas fa-users text-5xl text-purple-500 mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Company</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Kami menyewa penjahit musiman yang sangat prefesional dalam melayani pesanan rombongan. Oleh karna itu, kami dapat menampung pesanan lebih dari 1000 pakaian. 
                        </p>
                        </div>
                    </div>
                </section>

                <section class="py-12 mb-10">
                    <h2 class="text-4xl font-bold text-gray-800 mb-8">Pilih Pesanan</h2>
                    <div class="container mx-auto px-4">

                        <div class="flex flex-wrap -mx-4">
                            <div class="w-full md:w-1/3 px-4">
                                <div class="bg-white shadow-lg rounded-lg p-8 mb-8">
                                    <i class="fas fa-tshirt text-gray-800 text-5xl mb-4"></i>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Tanpa Desain</h3>
                                    <p class="text-gray-600 leading-relaxed mb-4">Pesan baju anda dengan desain anda sendiri.</p>
                                    <a href="<?= session()->get('isLoggedIn') ? base_url('customer/tanpa-desain') : base_url('auth/sign-in') ?>" class="inline-block text-white bg-blue-500 py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">Pesan</a>
                                </div>
                            </div>

                            <div class="w-full md:w-1/3 px-4">
                                <div class="bg-white shadow-lg rounded-lg p-8 mb-8">
                                    <i class="fas fa-pencil-alt text-gray-800 text-5xl mb-4"></i>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Dengan Desain</h3>
                                    <p class="text-gray-600 leading-relaxed mb-4">Pesan baju anda dengan desain dari kami.</p>
                                    <a href="<?= session()->get('isLoggedIn') ? base_url('customer/dengan-desain') : base_url('auth/sign-in') ?>" class="inline-block text-white bg-blue-500 py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">Pesan</a>
                                </div>
                            </div>

                            <div class="w-full md:w-1/3 px-4">
                                <div class="bg-white shadow-lg rounded-lg p-8 mb-8">
                                    <i class="fas fa-hands text-gray-800 text-5xl mb-4"></i>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Perbaikan</h3>
                                    <p class="text-gray-600 leading-relaxed mb-4">Perbaiki baju anda disini.</p>
                                    <a href="<?= session()->get('isLoggedIn') ? base_url('customer/perbaikan') : base_url('auth/sign-in') ?>" class="inline-block text-white bg-blue-500 py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">Pesan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-12">
                    <h2 class="text-4xl font-bold mb-8">Info Pemesanan</h2>
                    <div class="bg-gray-100 container mx-auto py-16 px-4 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Ukuran</h2>
                            <ul class="list-disc ml-4">
                                <li> Terdapat 2 pilihan dalam mentukan ukuran yaitu ukuran umum ( ex :  S, M, L, etc), dan ukuran detail (ex :Lingkar Leher (L L), Lingkar Badan (L B), Lebar Punggung / Pundak (L P), etc).</li>
                                <li> Harga pemesanan pakaian dengan ukuran S, M, L normal,</li>
                                <li> penambahan Rp. 5000 untuk ukuran XL, dan XXL, </li>
                                <li> penambahan Rp. 10.000 untuk unkuran >XXL.</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Bahan Khusus</h2>
                            <ul class="list-disc ml-4">
                                <li> Penambahan harga pada bahan kain khusus.</li>
                                <li> Jenis Kain Satin: Kain satin cenderung licin dan mudah tergelincir saat dijahit. Penambahan Rp. 5000 untuk setiap meternya</li>
                                <li> Jenis Kain Sutra: Kain sutra adalah kain yang halus dan mudah rusak. Penambahan Rp. 15000 untuk setiap meternya</li>
                                <li> Jenis Kain Chiffon: Kain chiffon tipis, ringan, dan transparan. Penambahan Rp. 4000 untuk setiap meternya</li>
                                <li> Jenis Kain Jeans: Kain jeans adalah kain yang cukup tebal . Penambahan Rp. 5000 untuk setiap meternya</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Pembatalan Pesanan</h2>
                            <ul class="list-disc ml-4">
                                <li> Pesanan dapat dibatalkan selama belum mengirimkan bahan kain.</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Estimasi Waktu</h2>
                            <ul class="list-disc ml-4">
                                <li> Estimasi / waktu yang tertera pada menu merupakan lama pengerjan dan tidak termasuk lama pengiriman.</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Ongkir</h2>
                            <ul class="list-disc ml-4">
                                <li> Ongkir atau biaya pemngiriman di tanggung oleh costumer dan penentuan harga berdasarkan <a href="https://www.jne.co.id/id/tracking/tarif" target="_blank" class="text-blue-500 hover:underline">https://www.jne.co.id/id/tracking/tarif</a>.</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Gratis Ongkir</h2>
                            <ul class="list-disc ml-4">
                                <li> Gratis ongkir khusus untuk pengiriman pesanan wilayah jember / pesanan akan di antar langsung oleh pihak kami.</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Pemesanan Rombongan</h2>
                            <ul class="list-disc ml-4">
                                <li> Untuk pemesanan rombongan atau pemesanan dengan bahan kain tidak dari customer, tidak dapat dilakukkan dengan pemesanan online / web. Pemesanan dapat dilakukkan dengan menghubungi langsung pihak kami.</li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-12 mb-10">
                    <h2 class="text-4xl font-bold mb-8">Info Ukuran</h2>
                    <div class="bg-gray-100 container mx-auto py-16 px-4 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Ukuran Atasan</h2>
                            <ul class="list-disc ml-4">
                                <li> Lingkar Leher (LL)  Lekuk leher depan melingkar keliling leher sampai ke leher depan lagi + 1 cm.</li>
                                <li> Lingkar Dada (LD)  Lingkar dada melingkar + 1 cm.</li>
                                <li> Lebar Bahu (LB) Lebar bahu lengan kiri sampai kanan.</li>
                                <li> Lingkar Pinggang (LP) Meteran di ukurkan ke sekeliling pinggang + 1 sd 2cm.</li>
                                <li> Panjang Lengan (PL) Panjang tangan sampai panjang yang diinginkan baik lengan panjang maupun lengan pendek.</li>
                                <li> Panjang atasan/Baju (PB)  Dari ujung pundak sampai ke ujung bawah sesuai panjang yang diinginkan.</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Ukuran Bawahan</h2>
                            <ul class="list-disc ml-4">
                                <li> Lingkar Pinggang (LP) Meteran di ukurkan ke sekeliling pinggang + 1 sd 2cm.</li>
                                <li> Lingkar Paha (LPh) + 4 jari Meteran  di ukur seputar paha melewati buah pantat lalu di longgarkan dengan cara memasukkan 4 jari tangan.</li>
                                <li> Panjang bawahan/Baju (PB)  Dari ujung pinggang sampai ke ujung bawah sesuai panjang yang diinginkan.</li>
                            </ul>
                            </div>
                            <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Ukuran Terusan</h2>
                            <ul class="list-disc ml-4">
                                <li> Lingkar Leher (LL)  Lekuk leher depan melingkar keliling leher sampai ke leher depan lagi + 1 cm.</li>
                                <li> Lingkar Dada (LD)  Lingkar dada melingkar + 1 cm.</li>
                                <li> Lebar Bahu (LB) Lebar bahu lengan kiri sampai kanan.</li>
                                <li> Lingkar Pinggang (LP) Meteran di ukurkan ke sekeliling pinggang + 1 sd 2cm.</li>
                                <li> Panjang Lengan (PL) Panjang tangan sampai panjang yang diinginkan baik lengan panjang maupun lengan pendek.</li>
                                <li> Lingkar Paha (LPh) + 4 jari Meteran  di ukur seputar paha melewati buah pantat lalu di longgarkan dengan cara memasukkan 4 jari tangan.</li>
                                <li> Panjang Terusan/Baju (PB)  Dari ujung pundak sampai ke ujung bawah sesuai panjang yang diinginkan.</li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-8 mb-20">
                    <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                        <h1 class="text-center font-bold text-4xl pb-10">Contact Us</h1>
                            <div class="grid md:grid-cols-2 gap-8">
                                <!-- Map -->
                                <div class="relative overflow-hidden rounded-lg shadow-lg">
                                    <iframe class="w-full h-96" src="<?= $toko['embed_link'] ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    <div class="absolute top-0 bottom-0 left-0 right-0 w-full h-full z-10 bg-gradient-to-b from-transparent to-black"></div>
                                        <div class="absolute top-0 left-0 px-4 py-2 z-20">
                                            <h2 class="text-lg font-semibold text-white">Our Location</h2>
                                            <p class="text-gray-300"><?= $toko['alamat'] ?></p>
                                        </div>
                                    </div>
                                    <!-- Contact Form -->
                                    <div class="">
                                        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                            <div class="mb-4">
                                            <h2 class="text-lg font-semibold">Our Location : </h2>
                                            <p ><?= $toko['alamat'] ?></p><br>
                                            <h2 class="text-lg font-semibold">Cp: </h2>
                                            <p ><?= $toko['nama_pemilik'] ?></p><br>
                                                <label class="block text-gray-700 font-bold mb-2" for="message">
                                                    Message
                                                </label>
                                                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" rows="10" placeholder="Your Message"></textarea>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <a href="#" id="whatsapp-link" target="_blank">
                                                    <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="setWhatsAppLink()">
                                                        Kirim Pesan WA
                                                    </button>
                                                </a>
                                                <p class="text-gray-600 text-sm">Respon cepat.</p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>


<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    function setWhatsAppLink() {
        var message = encodeURIComponent(document.getElementById('message').value);
        var link = document.getElementById('whatsapp-link');
        link.href = "https://wa.me/<?= $toko['nomor_wa'] ?>?text=" + message;
    }
</script>
<?= $this->endSection() ?>