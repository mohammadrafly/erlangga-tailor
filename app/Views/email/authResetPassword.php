<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 shadow-md">
            <h1 class="text-2xl font-bold mb-4">Reset Password</h1>
            <p class="mb-4">Halo, <?= $get['nama'] ?></p>
            <p class="mb-4">Kami menerima permintaan untuk mereset password Anda. Jika Anda tidak melakukan permintaan ini, Anda dapat mengabaikan email ini dengan aman.</p>
            <p class="mb-6">Untuk mereset password Anda, klik tombol di bawah ini:</p>
            <a href="#" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Reset Password</a>
            <p class="mt-6">Jika Anda mengalami masalah dengan tombol di atas, salin dan tempel URL berikut ke peramban web Anda:</p>
            <p class="mb-4"><a href="<?= base_url('auth/reset-password/'. $get['email'] . '/' . $get['token']) ?>" class="text-blue-500">Reset Password</a></p>
            <p class="mb-4">Tautan reset password ini akan berakhir pada <?= $get['exp'] ?>.</p>
            <p class="mb-4">Jika Anda memiliki pertanyaan atau butuh bantuan, silakan hubungi tim dukungan kami.</p>
            <p>Salam hangat,<br> Erlangga Tailor</p>
        </div>
    </div>
</body>
</html>
