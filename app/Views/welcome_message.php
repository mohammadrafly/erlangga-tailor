<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>  
                <div class="md:flex md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-4xl font-bold leading-tight">Shop the Latest Products</h2>
                        <p class="mt-4 text-gray-500">Find the perfect items for any occasion.</p>
                    </div>
                </div>

                <div class="mt-16 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="<?= base_url('tanpa-desain') ?>">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664" alt="product">
                            <div class="p-4">
                                <h3 class="text-gray-700 font-medium">Order Tanpa Desain</h3>
                            </div>
                        </a>
                    </div>
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="<?= base_url('dengan-desain') ?>">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664" alt="product">
                            <div class="p-4">
                                <h3 class="text-gray-700 font-medium">Order Dengan Desain</h3>
                            </div>
                        </a>
                    </div>
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="<?= base_url('perbaikan') ?>">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664" alt="product">
                            <div class="p-4">
                                <h3 class="text-gray-700 font-medium">Order Perbaikan</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="mt-16 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold">Why Choose Us?</h2>
                    <p class="mt-4 text-gray-500">We offer the best prices on high-quality products.</p>
                    <div class="mt-6 grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-gray-700 fill-current" viewBox="0 0 24 24"><path d="M12 2c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"/><path d="M17.657 6.343c-.391-.391-1.023-.391-1.414 0l-5.657 5.657-2.829-2.828c-.391-.391-1.023-.391-1.414 0s-.391 1.023 0 1.414l3.536 3.535c.195.196.45.293.707.293s.512-.097.707-.293l6.364-6.364c.391-.391.391-1.023 0-1.414z"/></svg>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium">Free Shipping</h3>
                                <p class="text-gray-500">We offer free shipping on all orders over $50.</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-gray-700 fill-current" viewBox="0 0 24 24"><path d="M12 2c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm5 13h-3v3h-4v-3h-3v-4h3v-3h4v3h3v4z"/></svg>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium">Easy Returns</h3>
                                <p class="text-gray-500">We make returns hassle-free.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-16 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold">Subscribe to Our Newsletter</h2>
                    <p class="mt-4 text-gray-500">Sign up to get exclusive offers and updates on new products.</p>
                    <form class="mt-6">
                        <div class="flex items-center">
                            <input class="rounded-l-lg flex-1 appearance-none border-2 border-gray-300 w-full py-3 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" type="email" placeholder="Your email address">
                            <button class="px-5 py-3 bg-gray-900 text-white border-2 border-gray-900 font-semibold rounded-r-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-opacity-50" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
<?= $this->endSection() ?>