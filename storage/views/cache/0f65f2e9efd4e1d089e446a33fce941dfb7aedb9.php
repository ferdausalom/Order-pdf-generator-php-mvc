

<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('content'); ?>

<div class="container bg-light">
  <?php $__env->startComponent('message', ['sessionName' => 'error']); ?><?php echo $__env->renderComponent(); ?>
    <!-- HERO SECTION-->
    <section class="py-5">
      <!-- BILLING ADDRESS-->
      <h2 class="h5 text-uppercase mb-4">Billing details</h2>
      <form action="/order" method="POST">
      <div class="row">
          <div class="col-lg-8">
              <div class="row gy-3">
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="firstName">Username </label>
                  <input class="form-control form-control-lg" name="username" type="text" id="username" placeholder="Enter your first name">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                  <input class="form-control form-control-lg" name="email" type="email" id="email" placeholder="e.g. Jason@example.com">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                  <input class="form-control form-control-lg" name="phone" type="tel" id="phone" placeholder="e.g. +02 245354745">
                </div>
                <div class="col-lg-6">
                  <label class="form-label text-sm text-uppercase" for="city">Town/City </label>
                  <input class="form-control form-control-lg" name="city" type="text" id="city" placeholder="Dhaka"> 
                </div>
                <div class="col-lg-12">
                  <label class="form-label text-sm text-uppercase" for="address">Address </label>
                  <input class="form-control form-control-lg" name="address" type="text" id="address" placeholder="i.e. House number, street name">
                </div>

                <input type="hidden" name="clientIp" value="<?= get_client_ip(); ?>">
                <input type="hidden" name="destination" value="<?= uri(); ?>"/>

                <div class="col-lg-12 form-group">
                  <button class="btn btn-dark" type="submit">Place order</button>
                </div>
              </div>
            
          </div>
          <!-- ORDER SUMMARY-->
          <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">Your order</h5>
                <ul class="list-unstyled mb-0">

                  <?php
                  $total = 0;
                  ?>
                  
                  <?php if($cartItems): ?>

                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $price = $cartItem->price/100;
                        $total += $price * $cartItem->quantity;
                    ?>
                      
                    <li class="d-flex align-items-center justify-content-between">
                      <strong class="small fw-bold"><?= $cartItem->name; ?></strong>
                      <span>x <?= $cartItem->quantity; ?></span> 
                      <span class="text-muted small">$<?= $price * $cartItem->quantity; ?></span>
                    </li>
                    <li class="border-bottom my-2"></li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php else: ?>
                    <h2 class="text-gray">No item in the cart.</h2>           
                  <?php endif; ?>

                  <li class="d-flex align-items-center justify-content-between">
                    <strong class="text-uppercase small fw-bold">Total</strong>
                    <span>$<?= $total; ?></span>
                    <input type="hidden" name="amount" value="<?= $total; ?>">
                  </li>
                  
                  <li class="d-flex mt-4 align-items-left">
                    <strong class="text-uppercase small fw-bold">Payment Method:</strong>
                  </li>
                  <li class="d-flex mt-2 align-items-center justify-content-between">
                    <span>
                      Cash on delivery &nbsp;
                      <input type="radio" id="onDelivery" checked name="payment" value="onDelivery" style="vertical-align: middle">
                    </span>
                    <span>
                      Paypal &nbsp;
                      <input type="radio" id="paypal" value="paypal" name="payment" style="vertical-align: middle">
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>

    <!-- SERVICES-->
    <?php $__env->startComponent('front/services'); ?> <?php echo $__env->renderComponent(); ?>
  </div>

  <style>.field.checkbox.recurring #recurring {width: 20px;height: 20px;margin-right: 10px;}.field.checkbox.recurring .label {font-size: 32px;color: #d66604;border-bottom: 1px solid;border-radius: 5px;padding: 4px 7px 7px 7px;border-top: 1px solid;border-right: 1px solid;}</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Shopping-cart-php-mvc\views/front/checkoutIndex.blade.php ENDPATH**/ ?>