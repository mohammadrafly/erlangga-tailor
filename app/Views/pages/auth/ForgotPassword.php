<?= $this->extend('layout/authLayout') ?>

<?= $this->section('content') ?>  
<div class="bg-white border-2 rounded-lg px-8 pt-6 pb-8 mb-4">
    <div class="text-3xl text-center font-semibold font-sans">Lupa Password</div>
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="text-center font-thin p-2 inline-block bg-red-700 text-white rounded-lg">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <p class="mb-6 font-thin text-center">Masukkan email anda.</p>
    <form id="form">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Email</label>
            <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 hover:bg-gray-200 hover:outline-gray-200 focus:ring focus:ring-blue-300 focus:outline-none" id="email" name="email" type="text" placeholder="Email">
        </div>
        <button class="bg-gray-900 text-white hover:bg-blue-500 font-bold py-2 px-4 md:py-2 md:px-6 lg:py-3 lg:px-8 rounded-lg focus:outline-none focus:shadow-outline w-full md:w-full lg:w-full" type="button" onclick="sendRequest()">
            <span id="button-text">Kirim</span>
            <span id="loading-spinner" class="hidden ml-2 animate-spin">&#8203;</span>
        </button>
    </form>
</div>
<div class="text-center">
    <span class="text-white">Belum punya akun?</span>
    <a href="<?= base_url('auth/sign-up') ?>" class="text-white hover:text-blue-400 font-bold">Daftar</a>
</div>
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>
<script>
function sendRequest() {
    const email = $('#email').val();
    const button = $('#form button');
    const buttonText = $('#button-text');
    const loadingSpinner = $('#loading-spinner');
    
    // Disable the button and show loading state
    button.prop('disabled', true);
    buttonText.addClass('hidden');
    loadingSpinner.removeClass('hidden');
    
    $.ajax({
        url: `${base_url}auth/forgot-password`, // Replace with your AJAX endpoint URL
        type: 'POST',
        data: { email: email },
        dataType: 'json',
        success: function(response) {
            if (response.status === true) {
                Swal.fire({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                }).then(function () {
                    window.location.href = `${base_url}auth/sign-in`;
                });
            } else {
                Swal.fire({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            Swal.fire({
                icon: 'error',
                title:'Terjadi error!',
                text: 'Silahkan coba lagi.'
            });
        },
        complete: function() {
            // Enable the button and hide loading state
            button.prop('disabled', false);
            buttonText.removeClass('hidden');
            loadingSpinner.addClass('hidden');
        }
    });
}
</script>
<?= $this->endSection() ?>
