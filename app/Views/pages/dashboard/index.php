<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
    <div class="md:flex">
      <div class="p-8">
        <div class="flex items-center justify-between">
          <div class="uppercase tracking-wide text-xl text-blue-500 font-semibold mb-5">
            <svg class="inline-block w-8 h-8 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
            </svg>
            Order
          </div>
        </div>
        <h1 class="block mt-1 text-4xl leading-tight font-bold text-black">20</h1>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>