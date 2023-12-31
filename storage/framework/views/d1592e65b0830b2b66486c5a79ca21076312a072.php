<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Artist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('Frontend/css/slick-theme.css')); ?>" />
    <link href="<?php echo e(asset('common.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('Frontend/css/slick.css')); ?>" />
    <link href="<?php echo e(asset('css/toastr.min.css')); ?>" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script> -->
    <script type="text/javascript" src="<?php echo e(asset('Frontend/js/slick.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('Frontend/js/custom.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoKHpwyIol5ZIcQueYSKF7SFz98fJkwo4&libraries=places">
    </script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <style>
        #pageloader {
            background: rgba(255, 255, 255, 0.8);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }

        #pageloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }
    </style>

    <?php echo $__env->yieldContent('extra_css'); ?>

</head>

<body>
    <div id="pageloader">
        <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif"
            alt="processing..." />
    </div>
    <section class="main-header">
        <div class="">
            <div class="header-top row" style="margin: auto; display: inline-flex; width: 100%;">
                <div class="logo col-lg-6 float-left" style="width: 100%!important;">
                    <a href="<?php echo e(route('shop')); ?>">
                        <img src="<?php echo e(asset('Frontend/images/artist_logo.png')); ?>" class="artist_logo">
                    </a>
                </div>
                <div class="col-lg-6 float-right">
                    <ul class="nav navbar-nav navbar-center" style="float: right!important">
                        <li class="active"><a href="<?php echo e(route('login')); ?>">Artist Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- close header-->

    <section class="main-section">
<?php /**PATH C:\xampp7.4\htdocs\artist_copy\resources\views/Frontend/layouts/header.blade.php ENDPATH**/ ?>