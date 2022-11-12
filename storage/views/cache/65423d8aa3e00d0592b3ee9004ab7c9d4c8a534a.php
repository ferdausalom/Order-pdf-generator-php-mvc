

<?php $__env->startSection('title', 'Canceled'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5">
    <div class="row">
        <h2 class="h5 text-center text-uppercase mb-4">Sorry, something wrong. Try again!</h2>
    </div>
  </section>

  <!-- SERVICES-->
  <?php $__env->startComponent('front/services'); ?> <?php echo $__env->renderComponent(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/front/cancel.blade.php ENDPATH**/ ?>