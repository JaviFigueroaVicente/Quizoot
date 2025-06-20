<?php
    $config = [
        'appName' => config('app.name'),
        'locale' => $locale = app()->getLocale(),
        'locales' => config('app.locales'),
    ];
?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Quizoot</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel=icon href="images/Nav/Logo.webp" type="image/x-icon">
    <!--<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">-->
    <script>
        window.config = <?php echo json_encode($config, 15, 512) ?>;
    </script>
    <!-- Scripts -->

        <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

</head>
<body class="font-sans antialiased" id="app">
    <router-view></router-view>
</body>
</html>
<?php /**PATH C:\Javi\Estudios\laragon\www\Quizoot\resources\views/main-view.blade.php ENDPATH**/ ?>