<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>  

<div class="w-full px-4 mb-8">
  <div class="mx-auto bg-white rounded-xl shadow-md overflow-hidden">
    <div class="md:flex">
      <div class="p-8 px-20">
        <div class="flex items-center justify-between">
          <div class="uppercase tracking-wide textblock -xl font-semibold mb-5">
            Categories
          </div>
        </div>
        <table class="border-collapse table-auto w-full px-">
            <thead>
                <tr>
                    <th class="border p-3 px-20">#</th>
                    <th class="border p-3 px-20">Name</th>
                    <th class="border p-3 px-20">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-3 text-center">1</td>
                    <td class="border p-3 text-center">Test</td>
                    <td class="border p-3 text-center">Opsi</td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>