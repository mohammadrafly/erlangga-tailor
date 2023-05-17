<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>

<section class="bg-blue-500">
  <div class="container mx-auto py-12">
    <div class="flex flex-col items-center justify-center text-center">
      <h2 class="text-3xl font-bold text-white mb-4">Collections</h2>
    </div>
  </div>
</section>

<section class="py-12 mb-10">
  <h2 class="text-4xl font-bold mb-8"></h2>
  <div id="zoom-container"></div>
  <?php if($content): ?>
  <div class="mt-6 flex flex-wrap gap-x-6 gap-y-10 sm:gap-x-8">
    <?php foreach($content as $data): ?>
    <div class="group relative">
      <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 h-auto max-w-sm rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30">
        <img src="<?= base_url('uploads/foto/pola/'.$data['img']) ?>" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full zoomable-image">
      </div>
      <div class="mt-4 flex justify-between">
        <div>
          <h3 class="text-sm text-gray-700">
            <a href="#">
              <span aria-hidden="true" class="absolute inset-0"></span>
              <?= $data['product'] ?>
            </a>
          </h3>
          <p class="mt-1 text-sm text-gray-500"><?= $data['estimasi'] ?></p>
        </div>
      </div>
    </div>  
    <?php endforeach ?>
  </div>
  <?php endif ?>
</section>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
  //for future use
</script>
<?= $this->endSection() ?>