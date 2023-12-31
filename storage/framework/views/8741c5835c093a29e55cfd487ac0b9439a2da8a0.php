<?php echo $__env->make('emails.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body id="email" class="mt-5">
    <table style="padding: 0; margin: 0; background-color: rgb(40,40,40); text-align: center; width: 100%; height: 100%; bottom: 0; text-align: center; align-items: center; ">
        <tr></tr>
    </table>
    <div style="text-align: center;">
        <h2 class="text-center bg-dark" style="color: #fff">Artist</h2>
    </div>
    
    <div style="font-size: 18px;">
        <p>Hello! <?php echo e($name); ?></p>
        <p>
            Name : <?php echo e($name); ?>

        </p>
        <p>
            Email : <?php echo e($email); ?>

        </p>
        <p>
            Password : <?php echo e($password); ?>

        </p>
    </div>
    <div style="border: none;">
        <p>Regards,<br>
        Artist</p>
    </div>
</body>
<?php echo $__env->make('emails.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html><?php /**PATH D:\xampp\htdocs\artist_pro\resources\views/emails/sign_up.blade.php ENDPATH**/ ?>