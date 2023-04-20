<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce Tailwind</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <script src="https://kit.fontawesome.com/8ef7ea110e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/output.css') ?>">

    <style>
        @media (max-width: 768px) {
            .navbar .hidden {
                display: none;
            }
            .navbar .block {
                display: block;
            }
        }
        #nav-menu {
            display: none;
        }

        #nav-toggler:focus + #nav-menu,
        #nav-toggler:hover + #nav-menu,
        #nav-menu:hover {
            display: flex;
        }
    </style>
    <body>
        <header class="bg-gray-900 py-8">
            <div class="container mx-auto px-6 flex flex-wrap items-center justify-between">
                <div class="flex items-center">
                    <a class="font-bold text-white text-2xl uppercase hover:text-gray-700 mr-4" href="#">Erlangga Tailor</a>
                    <button class="inline-flex p-3 hover:bg-gray-100 rounded lg:hidden ml-auto" id="nav-toggler">
                        <svg class="w-6 h-6 text-gray-500 hover:text-gray-700" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <ul class="flex uppercase font-bold text-sm items-center mr-auto ml-6" id="nav-menu">
                        <li class="mr-6"><a class="text-white hover:text-blue-500" href="#">Home</a></li>
                        <li class="mr-6"><a class="text-white hover:text-blue-500" href="#">Shop</a></li>
                        <li class="mr-6"><a class="text-white hover:text-blue-500" href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="flex items-center" id="nav-cart text-gray-900">
                    <a class="mr-4" href="#">
                        <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </a>
                    <?php if (session()->get('isLoggedIn')): ?>
                    <div class="relative">
                        <button class="flex items-center justify-center h-8 w-8 bg-white text-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="signInDropdown" type="button" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 dropdown-menu hidden" aria-labelledby="signInDropdown" role="menu">
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"><?= session()->get('name') ;?></a>
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" href="<?= base_url('profile') ?>" role="menuitem">Proflie</a>
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" href="javascript:void(0);" onclick="signOut()" role="menuitem">Keluar</a>
                        </div>
                    </div>
                    <?php else: ?>
                    <a class="mr-4" href="<?= base_url('auth/sign-in') ?>">
                        <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>
                    <?php endif ?>
                </div>
            </div>
        </header>
        <div class="pt-10 container mx-auto">
            <div class="max-w mx-auto px-6">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-4xl font-bold leading-tight">Shop the Latest Products</h2>
                        <p class="mt-4 text-gray-500">Find the perfect items for any occasion.</p>
                    </div>
                    <div class="md:w-1/3">
                        <form class="relative">
                            <input class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium" type="search" placeholder="Search for Products">
                            <button type="submit" class="absolute top-0 right-0 mt-3 mr-4">
                                <svg class="h-4 w-4 fill-current text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-16 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="#">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664" alt="product">
                            <div class="p-4">
                                <h3 class="text-gray-700 font-medium">Product 1</h3>
                                <p class="text-gray-500">$19.99</p>
                            </div>
                        </a>
                    </div>
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="#">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664" alt="product">
                            <div class="p-4">
                                <h3 class="text-gray-700 font-medium">Product 2</h3>
                                <p class="text-gray-500">$29.99</p>
                            </div>
                        </a>
                    </div>
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="#">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664" alt="product">
                            <div class="p-4">
                                <h3 class="text-gray-700 font-medium">Product 3</h3>
                                <p class="text-gray-500">$39.99</p>
                            </div>
                        </a>
                    </div>
                    <div class="bg-white rounded-lg shadow-md">
                        <a href="#">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664" alt="product">
                            <div class="p-4">
                                <h3 class="text-gray-700 font-medium">Product 4</h3>
                                <p class="text-gray-500">$49.99</p>
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
            </div>
        </div>
        <footer class="mt-10 bg-gray-900 text-white py-4 flex items-center justify-center flex-wrap p-7">
            <div class="container mx-auto px-4">
                <p class="text-center">&copy; 2023 E-Tailor. All rights reserved.</p>
            </div>
        </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/js/Main.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
            function toggleMenu() {
                var menu = document.getElementById('mobile-menu');
                if (menu.style.display === 'block') {
                    menu.style.display = 'none';
                } else {
                    menu.style.display = 'block';
                }
            }

            document.getElementById("nav-toggler").addEventListener("click", function() {
                var navMenu = document.getElementById("nav-menu");
                if (navMenu.style.display === "flex") {
                navMenu.style.display = "none";
                } else {
                navMenu.style.display = "flex";
                }
            });

            function toggleDropdown() {
                var dropdownMenu = document.querySelector('.dropdown-menu');
                dropdownMenu.classList.toggle('hidden');
            }
    </script>
</html>
