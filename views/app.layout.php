<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="/dist/app.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <?php if (isset($title)): ?>
    <title><?= $title . " | ". env("APP_NAME") ?></title>
    <?php else: ?>
    <title><?= env("APP_NAME") ?></title>
    <?php endif; ?>
</head>
<body style="height:100vh; background-color: rgba(231,231,231,0.97)">

<?= $body ?? "" ?>

<script src="/dist/app.js"></script>
</body>
</html>