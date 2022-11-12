

<?php $__env->startSection('title', 'Thank you'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5">
    <div class="row">
        <h2 class="h5 text-center text-uppercase mb-4" style="color:cadetblue">
          Your order is on it's way.
        </h2>
        <a class="btn btn-dark btn-sm px-2" style="
          width: 195px;
          margin: 0 auto;
          background-color: cadetblue;
          box-shadow: 2px 4px 3px #818181;
          border-radius: 5px;
          border: 0px;
          padding: 9px 0 7px 0;
        " href="/invoice" target="_blank">
        DOWNLOAD INVOICE
        </a>
    </div>
  </section>

  <!-- SERVICES-->
  <?php $__env->startComponent('front/services'); ?> <?php echo $__env->renderComponent(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Shopping-cart-php-mvc\views/front/thankyou.blade.php ENDPATH**/ ?>