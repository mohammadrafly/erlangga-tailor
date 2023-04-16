<?= $this->extend('layout/authLayout') ?>

<?= $this->section('content') ?>  
                <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
                    <div class="text-3xl text-center font-semibold font-sans">Sign Up</div>
                    <p class="mb-6 font-thin text-center">Daftar untuk mendapatkan akun.</p>
                    <form id="SignUp">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="fullname">
                                Full Name
                            </label>
                            <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 hover:bg-gray-200 hover:outline-gray-200 focus:ring focus:ring-blue-300 focus:outline-none" id="name" type="text" placeholder="Full name">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 hover:bg-gray-200 hover:outline-gray-200 focus:ring focus:ring-blue-300 focus:outline-none" id="email" type="text" placeholder="Email">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 hover:bg-gray-200 hover:outline-gray-200 focus:ring focus:ring-blue-300 focus:outline-none" id="password" type="password" placeholder="********">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password Confirmation
                            </label>
                            <input class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 hover:bg-gray-200 hover:outline-gray-200 focus:ring focus:ring-blue-300 focus:outline-none" id="password_confirmation" type="password" placeholder="********">
                        </div>

                        <button type="submit" class="bg-gray-900 hover:bg-blue-500 text-white font-bold py-2 px-4 md:py-2 md:px-6 lg:py-3 lg:px-8 rounded-lg focus:outline-none focus:shadow-outline w-full md:w-full lg:w-full">
                            Sign Up
                        </button>
                    </form>
                </div>
                <div class="text-center">
                    <span class="text-white">Already have an account?</span>
                    <a href="<?= base_url('login') ?>" class="text-white hover:text-blue-400 font-bold">Sign in</a>
                </div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/Auth.js') ?>"></script>
<?= $this->endSection() ?>