<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success Checkout</title>
    <!-- Load Tailwind CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/output.css') ?>">
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="max-w-lg justify-center text-center item-center mx-auto my-20 p-8">
                <div class="flex items-center justify-center h-12 w-12 bg-green-500 rounded-full mb-4 mx-auto">
                    <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-semibold text-gray-700 mb-4">Success Checkout</h1>
                <p class="text-gray-600 mb-8">Thank you for your purchase! Your order has been received and will be processed soon.</p>
                <div class="flex justify-center mt-8">
                    <a href="https://wa.me/<?= $toko['nomor_wa'] ?>?text=Kode%20pembayaran%20saya%20adalah%20<?= $kode_pembayaran ?>" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-full">
                    <i class="fab fa-whatsapp mr-2"></i> Konfirmasi melalui WhatsApp
                    </a>
                </div>
            </div>
            <footer class="py-4">
                <div class="max-w-lg mx-auto text-center">
                    <a href="<?= base_url('/') ?>" class="inline-block px-6 py-3 rounded-lg bg-gray-300 text-gray-800 hover:bg-gray-400 transition duration-200">
                    Kembali ke Halaman Utama
                    </a>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
