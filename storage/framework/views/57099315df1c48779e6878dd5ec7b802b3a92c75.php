<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Artist')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap-grid.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://phpcoder.tech/multiselect/css/jquery.multiselect.css">
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo e(asset('css/toastr.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('common.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('pricing.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" />

    <style>
        #accordionSidebar li {
            margin-top: 10px;
        }

        .nav-link {
            padding: 0 0 0.3rem 1rem !important;
        }

        .container {
            max-width: 450px;
        }

        .push-top {
            margin-top: 50px;
        }
    </style>

    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="pageloader">
            <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif"
                alt="processing..." />
        </div>
        <div id="wrapper">
            <?php if(\Auth::user()): ?>
                <?php echo $__env->make('layouts.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php echo $__env->make('layouts.user_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fontawesome.js')); ?>"></script>
    <script src="<?php echo e(asset('common.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/chosen.jquery.min.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('extra_script'); ?>
    
</body>

</html>
<?php /**PATH D:\xampp\htdocs\artist_pro\resources\views/layouts/app.blade.php ENDPATH**/ ?>