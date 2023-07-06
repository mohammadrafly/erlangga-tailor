<?= $this->extend('layout/authLayout') ?>

<?= $this->section('content') ?>  
    <div class="bg-white border-2 rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="text-3xl text-center font-semibold font-sans">Reset Password</div>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="text-center font-thin p-2 inline-block bg-red-700 text-white rounded-lg">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <p class="mb-6 font-thin text-center">Masukan password baru anda.</p>
        <form id="form">
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password Baru
                </label>
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 hover:bg-gray-200 hover:outline-gray-200 focus:ring focus:ring-blue-300 focus:outline-none" name="password" id="password" type="password" placeholder="********">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Konfirmasi Password Baru
                </label>
                <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 hover:bg-gray-200 hover:outline-gray-200 focus:ring focus:ring-blue-300 focus:outline-none" name="password_confirmation" id="password_confirmation" type="password" placeholder="********">
            </div>
            <button class="bg-gray-900 text-white hover:bg-blue-500 font-bold py-2 px-4 md:py-2 md:px-6 lg:py-3 lg:px-8 rounded-lg focus:outline-none focus:shadow-outline w-full md:w-full lg:w-full" type="button" onclick="resetPassword()">Kirim</button>
        </form>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>
<script>
function resetPassword() {
    const password = $('#password').val();
    const passwordConfirmation = $('#password_confirmation').val();

    if (password !== passwordConfirmation) {
        Swal.fire({
            icon: 'error',
            title: 'Peringatan!',
            text: 'Password tidak sama.',
        });
        return;
    }

    var currentURL = window.location.href;

    var pattern = /\/auth\/reset-password\/([^/]+)\/([^/]+)/;
    var matches = currentURL.match(pattern);

    if (matches) {
        var email = matches[1];
        var token = matches[2];
    } else {
        console.log('URL format is not recognized');
    }

    const formData = new FormData();
    formData.append('password', password);

    $.ajax({
        url: `${base_url}auth/reset-password/${email}/${token}`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
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
                    text:response.text,
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi error!',
                text: 'Silahkan coba lagi.'
            });
        }
    });
}
</script>
<?= $this->endSection() ?>
