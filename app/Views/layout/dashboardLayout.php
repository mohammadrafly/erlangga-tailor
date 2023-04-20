<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta name="description" content="The small framework with powerful features">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/favicon.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@heroicons/react@1.0.4/dist/heroicons.css">
        <link rel="stylesheet" href="<?= base_url('assets/output.css') ?>">
    </head>
    <body class="bg-white">
        <div class="flex flex-col sm:flex-row">
            <?= $this->include('layout/partials/sidebar') ?>
            <div class="w-full sm:w-3/4 p-10">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap -mx-4">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/js/Main.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;
            $("a").each(function() {
                if ($(this).attr("href") === currentUrl) {
                    $(this).addClass("active text-gray-600 bg-white");
                } else {
                    $(this).removeClass("active text-gray-600 bg-white");
                }
            });
        });
    </script>
</html>
