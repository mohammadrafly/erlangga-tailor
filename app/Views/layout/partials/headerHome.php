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