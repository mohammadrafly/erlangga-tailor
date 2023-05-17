<?= $this->extend('layout/homeLayout') ?>

<?= $this->section('content') ?>
<div class="mt-6">
  <form class="w-full max-w-lg" id="form">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Nama Lengkap
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="<?= $content['name'] ?>" id="name" name="name" type="text" placeholder="Jane">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Alamat
        </label>
        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="alamat" name="alamat" type="text"><?= $content['alamat'] ?></textarea>
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
          Nomor HP/WA
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="<?= $content['nomor_hp'] ?>" id="nomor_hp" name="nomor_hp" type="number" placeholder="620000XX">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <button class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="save()" >
          Update
        </button>
      </div>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
  function save() {
      $.ajax({
        url: `${base_url}customer/profile`,
        type: 'POST', 
        data: $('#form').serialize(),
        dataType: 'JSON',
        success: (respond) => {
          if (respond.status) {
              showAlert(respond.icon, respond.title, respond.text)
          } else {
              showAlert(respond.icon, respond.title, respond.text);
          }
        },
        error: (error) => {
          showAlert('error', error, 'Telah terjadi error, silahkan hubungi admin.');
        },
      });
  }

  function showAlert(icon, title, text) {
      Swal.fire({
          icon: icon, 
          title: title, 
          text: text,
          timer: 3000,
          showCancelButton: false,
          showConfirmButton: false
      }).then(() => location.reload());
  }
</script>
<?= $this->endSection() ?>