<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>

                <div class="mt-16 bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold">Order Tanpa Desain</h2>
                    <p class="mt-4 text-gray-500">We offer the best prices on high-quality products.</p>
                    <div class="mt-6 grid gap-6 grid-cols-1">
                        <div class="items-center">
                            <form class="mt-6">
                                <label class="block font-medium text-gray-700 mb-2" for="name">
                                    Name
                                </label>
                                <input class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="name" type="text" name="name" required>
                                <label class="block font-medium text-gray-700 mt-4 mb-2" for="email">
                                    Email
                                </label>
                                <input class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="email" type="email" name="email" required>
                                <label class="block font-medium text-gray-700 mt-4 mb-2" for="message">
                                    Message
                                </label>
                                <textarea class="w-full px-4 py-2 rounded-lg shadow-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200" id="message" name="message" rows="4" required></textarea>
                                <button class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-300" type="submit">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>