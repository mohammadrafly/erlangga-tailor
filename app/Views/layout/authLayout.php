<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Erlangga Tailor - Authentication</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/output.css') ?>">

    <body class="bg-gray-900">
        <div class="min-h-screen flex items-center justify-center mx-auto">
            <div class="max-w-md w-full">
                <div class="text-center font-bold m-5 mb-7 flex justify-center">
                    <a href="<?= base_url('/') ?>" class="text-4xl text-white mb-2">ERLANGGA TAILOR</a>
                    <!-- <span class="ml-5">
                        <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="logo.jpg" class="rounded-full w-12">
                    </span> -->
                </div>
                <?= $this->renderSection('content') ?>
                <div class="mt-10 text-center">
                    <a href="<?= base_url('/') ?>" class="bg-white hover:bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded">Home</a>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <?= $this->renderSection('script-js') ?>
    <script src="<?= base_url('assets/js/Auth.js') ?>"></script>
    <script src="<?= base_url('assets/js/Main.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
