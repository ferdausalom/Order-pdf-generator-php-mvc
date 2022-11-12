

<?php $__env->startSection('title', 'Product'); ?>

<?php $__env->startSection('content'); ?>

<section class="py-5 bg-light">
  <div class="container">
    <?php $__env->startComponent('message', ['sessionName' => 'message']); ?><?php echo $__env->renderComponent(); ?>
    <div class="row mb-5">
      <div class="col-lg-6">
        <!-- PRODUCT SLIDER-->
        <div class="row m-sm-0">
            <div class="swiper product-slider-thumbs">
            </div>
          <div class="col-sm-10 order-1 order-sm-2">
            <div class="swiper product-slider">
              <div class="swiper-wrapper">
                <div class="swiper-slide h-auto"><a class="glightbox product-view" href="/<?= $product->thumbnail; ?>" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="/<?= $product->thumbnail; ?>" alt="..."></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- PRODUCT DETAILS-->
      <div class="col-lg-6">
        <h1><?= $product->name; ?></h1>
        <p class="text-muted lead">$<?= $product->price/100; ?>.00</p>
        <p class="text-sm mb-4"><?= $product->body; ?></p>
        <div class="row align-items-stretch mb-4">
          <form action="/cart/store" class="d-flex" method="post">
            <div class="col-sm-5 pr-sm-0">
              <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                <div class="quantity">
                  <div class="dec-btn p-0"><i class="fas fa-caret-left"></i></div>
                  <input class="form-control border-0 shadow-0 p-0" name="quantity" type="text" value="1">
                  <input type="hidden" name="productId" value="<?= $product->id; ?>">
                  <input type="hidden" name="clientIp" value="<?= get_client_ip(); ?>">
                  <input type="hidden" name="destination" value="<?= uri(); ?>"/>
                  <div class="inc-btn p-0"><i class="fas fa-caret-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 pl-sm-0" style="    margin-left: 15px;">
              <button type="submit" class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-2">
                Add to cart
              </button>
            </div>
          </form>
        </div><br>
        <ul class="list-unstyled small d-inline-block">
          
          <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ms-2" href="#!">
            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if( $key === array_key_last($cats)): ?>
              <?= $cat; ?>
            <?php else: ?>
              <?= $cat; ?>,
            <?php endif; ?>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          </a></li>
          
        </ul>
      </div>
    </div>
    <!-- DETAILS TABS-->
    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
      <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
    </ul>
    <div class="tab-content mb-5" id="myTabContent">
      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
        <div class="p-4 p-lg-5 bg-white">
          <h6 class="text-uppercase">Product description </h6>
          <p class="text-muted text-sm mb-0"><?= $product->body; ?>,</p>
        </div>
      </div>
    </div>
  </div>
  <!-- SERVICES-->
  <?php $__env->startComponent('front/services'); ?> <?php echo $__env->renderComponent(); ?>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/front/productShow.blade.php ENDPATH**/ ?>