<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="relative min-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="keywords" content="Lsky Pro"/>
        <meta name="description" content="Lsky Pro, Your photo album on the cloud."/>

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.css')); ?>">
        <?php echo $__env->yieldPushContent('styles'); ?>

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen text-gray-900 bg-gray-100">
            <?php echo e($slot); ?>

        </div>
    </body>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</html>
<?php /**PATH /Users/wispx/Develop/Projects/lsky-pro/resources/views/layouts/guest.blade.php ENDPATH**/ ?>