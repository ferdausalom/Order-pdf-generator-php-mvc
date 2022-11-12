<?php echo $__env->make('_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="w-full px-6 py-6 mx-auto">
    <section class="bg-white rounded-2xl mx-auto max-w-xl">
        <div class="w-full">

            <?php echo $__env->yieldContent('content'); ?>

        </div>
    </section>
</div>

<?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/layout.blade.php ENDPATH**/ ?>