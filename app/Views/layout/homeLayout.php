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
        <?= $this->include('layout/partials/headerHome') ?>
        <div class="pt-10 container mx-auto">
            <div class="max-w mx-auto px-6">
            <?= $this->renderSection('content') ?>
            </div>
        </div>
        <?= $this->include('layout/partials/footerHome') ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/js/Main.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
