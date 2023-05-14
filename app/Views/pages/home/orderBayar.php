<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Invoice Form</h2>
    <form class="w-full" action="<?= base_url('customer/tanpa-desain/bayar/'.$content['id']) ?>" method="post" enctype="multipart/form-data">
        <!-- Invoice number input -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="invoice-number">
                Order Nomor
            </label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   id="id" type="text" value="<?= $content['id'] ?>" name="id" required readonly>
        </div>
        <!-- File input -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="invoice-file">
                Bukti Pembayaran
            </label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   id="bukti_pembayaran" type="file" name="bukti_pembayaran" required>
        </div>
        <!-- Submit button -->
        <div class="flex items-center justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                Submit
            </button>
        </div>
    </form>
</div>


<?= $this->endSection() ?>