<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Erlangga Tailor - Home</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
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

        .carousel {
        overflow: hidden;
        }

        .carousel img {
        transition: transform 0.3s ease-in-out;
        }

        #prevBtn,
        #nextBtn {
        transition: background-color 0.3s ease-in-out;
        }

        #prevBtn:hover,
        #nextBtn:hover {
        background-color: rgba(255, 255, 255, 0.8);
        }

        .carousel-inner {
        display: flex;
        overflow: hidden;
        }

        .carousel-inner img {
        flex: 0 0 100%;
        transition: transform 0.3s ease-in-out;
        }

        .zoomable-image {
        transition: transform 0.3s ease-in-out;
        }

        .zoomable-image:hover {
        transform: scale(1.2);
        }

        .zoomed-image {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        max-width: 90%;
        max-height: 90%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        object-fit: contain;
        }
    </style>
    <?= $this->renderSection('css') ?>
    <body>
        <?= $this->include('layout/partials/headerHome') ?>
        <div class="pt-10 container mx-auto">
            <div class="max-w mx-auto px-6">
            <?= $this->renderSection('content') ?>
            </div>
        </div>
        <?= $this->include('layout/partials/footerHome') ?>
    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/js/Main.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?= base_url('js/bundle.js') ?>"></script>
    <script>
        const images = document.querySelectorAll('.zoomable-image');
        const zoomContainer = document.getElementById('zoom-container');

        images.forEach((image) => {
            image.addEventListener('click', () => {
                const zoomedImg = document.createElement('img');
                zoomedImg.src = image.src;
                zoomedImg.classList.add('zoomed-image');

                zoomContainer.appendChild(zoomedImg);
                zoomContainer.style.display = 'flex';

                zoomedImg.addEventListener('click', () => {
                    zoomContainer.style.display = 'none';
                    zoomedImg.remove();
                });
            });
        });
    </script>
    <?= $this->renderSection('script') ?>
</html>
