<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>

    <section class="bg-blue-500 rounded-lg">
        <div class="container mx-auto py-12">
            <div class="flex flex-col items-center justify-center text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Dapatkan promo menarik untuk event tertentu</h2>
            </div>
        </div>
    </section>
    <section class="bg-white my-20">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div
                    id="carouselExampleCaptions"
                    class="relative"
                    data-te-carousel-init
                    data-te-carousel-slide>
                    <!--Carousel indicators-->
                    <div
                        class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                        data-te-carousel-indicators>
                        <button
                        type="button"
                        data-te-target="#carouselExampleCaptions"
                        data-te-slide-to="0"
                        data-te-carousel-active
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-current="true"
                        aria-label="Slide 1"></button>
                        <button
                        type="button"
                        data-te-target="#carouselExampleCaptions"
                        data-te-slide-to="1"
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-label="Slide 2"></button>
                        <button
                        type="button"
                        data-te-target="#carouselExampleCaptions"
                        data-te-slide-to="2"
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-label="Slide 3"></button>
                    </div>

                    <!--Carousel items-->
                    <div
                        class="relative w-full overflow-hidden after:clear-both after:block after:content-[''] rounded-lg">
                        <!--First item-->
                        <div
                        class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-active
                        data-te-carousel-item
                        style="backface-visibility: hidden">
                        <img
                            src="<?= base_url('assets-be/img/1.png') ?>"
                            class="block w-full"
                            alt="..." />
                        <div
                            class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                            <h5 class="text-xl">First slide label</h5>
                            <p>
                            Some representative placeholder content for the first slide.
                            </p>
                        </div>
                        </div>
                        <!--Second item-->
                        <div
                        class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item
                        style="backface-visibility: hidden">
                        <img
                            src="<?= base_url('assets-be/img/2.png') ?>"
                            class="block w-full"
                            alt="..." />
                        <div
                            class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                            <h5 class="text-xl">Second slide label</h5>
                            <p>
                            Some representative placeholder content for the second slide.
                            </p>
                        </div>
                        </div>
                        <!--Third item-->
                        <div
                        class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item
                        style="backface-visibility: hidden">
                        <img
                            src="<?= base_url('assets-be/img/3.png') ?>"
                            class="block w-full"
                            alt="..." />
                        <div
                            class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                            <h5 class="text-xl">Third slide label</h5>
                            <p>
                            Some representative placeholder content for the third slide.
                            </p>
                        </div>
                        </div>
                    </div>

                    <!--Carousel controls - prev item-->
                    <button
                        class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                        type="button"
                        data-te-target="#carouselExampleCaptions"
                        data-te-slide="prev">
                        <span class="inline-block h-8 w-8">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        </span>
                        <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                        >Previous</span
                        >
                    </button>
                    <!--Carousel controls - next item-->
                    <button
                        class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                        type="button"
                        data-te-target="#carouselExampleCaptions"
                        data-te-slide="next">
                        <span class="inline-block h-8 w-8">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6">
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                        </span>
                        <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                        >Next</span
                        >
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-20 mb-20">
        <div class="container mx-auto py-12">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/3  px-4">
                    <div class="bg-purple-500 text-white rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-semibold">Back to School</h3>
                        <p class="mt-4">Dapatkan voucer pelajar Indonesia sebesar 10%, untuk pemesanan jasa menjahit seragam sekolah. Berlaku hanya pada setiap pemesanan 20 mei - 20 juni.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3  px-4">
                    <div class="bg-blue-500 text-white rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-semibold">Ramadhan Event</h3>
                        <p class="mt-4">Promo menjelah ramdhan potongan Rp 10k untuk setiap pemesanan. Berlaku hanya pada setiap pemesanan 20 sya'ban - 5 ramadhan.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4">
                    <div class="bg-green-500 text-white rounded-lg p-6 shadow-md">
                        <h3 class="text-xl font-semibold">Tahun Baru</h3>
                        <p class="mt-4">Event tahun baru dapat potongan sebesar Rp 20k, untuk pemesanan jasa menjahit kemeja. Berlaku hanya pada setiap pemesanan 1 januari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-blue-900 text-white rounded-lg mb-20">
        <div class="container mx-auto py-12">
            <div class="flex flex-wrap">
                <div class="w-full">
                    <blockquote class="text-center">
                        <h1 class="text-4xl font-bold">"Pakaian bagaikan kulit kedua sehingga gaya busana mampu memcerminkan kepribadian pengguna"</h1>
                        <em class="text-lg">Anne Avantie</em>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>