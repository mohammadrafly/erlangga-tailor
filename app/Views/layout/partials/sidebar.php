            <div class="w-[300px] bg-blue-600 min-h-screen">
                <div class="py-10 px-10 border-b-[5px]">
                    <a href="#" class="text-3xl font-bold text-white hover:text-gray-300">
                        <svg class="inline-block fill-current h-10 w-10 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.22 1.64c.3-.48.83-.79 1.42-.79s1.12.31 1.42.79l6.35 10.29c.31.5.32 1.11.03 1.62l-6.35 10.29c-.3.48-.83.79-1.42.79s-1.12-.31-1.42-.79L2.84 14.34c-.29-.5-.3-1.11-.02-1.62L9.22 1.64zM11 14V6l5.5 4-5.5 4z"/>
                        </svg>
                        E-Tailor
                    </a>
                </div>
                <!-- Sidebar content -->
                <ul class="mt-auto py-10 px-10">
                    <h1 class="font-bold text-md text-gray-300 mb-5">
                        <svg class="inline-block w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                        </svg>
                        Menu
                    </h1>
                    <li class="pb-3">
                        <a href="<?= base_url('dashboard') ?>" class="text-gray-300 hover:text-gray-600 text-lg font-bold inline-block rounded-lg px-4 py-4 hover:bg-white cursor-pointer flex flex-row">
                            <svg class="w-6 h-6 mr-2"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/>  
                                <rect x="3" y="4" width="18" height="12" rx="1" />  
                                <line x1="7" y1="20" x2="17" y2="20" />  
                                <line x1="9" y1="16" x2="9" y2="20" />  
                                <line x1="15" y1="16" x2="15" y2="20" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="pb-3">
                        <a href="<?= base_url('dashboard/orders') ?>" class="text-gray-300 hover:text-gray-600 text-lg font-bold inline-block rounded-lg px-4 py-4 hover:bg-white cursor-pointer flex flex-row">
                            <svg class="w-6 h-6 mr-2"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/>  
                                <path d="M19 9l-2 9a2 2.5 0 0 1 -2 2h-6a2 2.5 0 0 1 -2 -2l-2 -9Z" />  
                                <path d="M7 9a5 5 0 0 1 10 0" />
                            </svg>
                            Order
                        </a>
                    </li>
                </ul>
                <div class="mt-auto px-10 py-10">
                    <h1 class="font-bold text-md text-gray-300 mb-5">
                        <svg class="inline-block w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>
                        Lainnya
                    </h1>
                    <ul>
                        <li class="pb-2">
                            <a href="javascript:void(0);" onclick="signOut()" class="text-gray-300 text-lg font-bold inline-block rounded-lg px-4 py-4 hover:bg-red-700 cursor-pointer flex flex-row">
                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                                </svg>
                                Logout
                            </a>
                        </li>
                    </ul>                    
                </div>
            </div>