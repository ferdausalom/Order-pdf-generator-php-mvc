

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <!-- TRENDING PRODUCTS-->
    <section class="py-5">
      <?php $__env->startComponent('message', ['sessionName' => 'message']); ?><?php echo $__env->renderComponent(); ?>
      <header>
        <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
        <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
      </header>
      <div class="row">
        <!-- PRODUCT-->
        <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="product text-center">
            <div class="position-relative mb-3">
              <div class="badge text-white bg-"></div>
              <a class="d-block" href="/product/show?id=<?= $product->id; ?>">
                <img class="img-fluid w-100" src="/<?= $product->thumbnail; ?>" alt="...">
              </a>
              <div class="product-overlay">
                <ul class="mb-0 list-inline">
                  <li class="list-inline-item m-0 p-0">

                    <form action="/cart/store" method="POST">
                    
                      <input type="hidden" name="productId" value="<?= $product->id; ?>">
                      <input type="hidden" name="clientIp" value="<?= get_client_ip(); ?>">
                      <button type="submit" class="btn btn-sm btn-dark">Add to cart</button>
                    </form>

                  </li>
                </ul>
              </div>
            </div>
            <h6> <a class="reset-anchor" href="/product/show?id=<?= $product->id; ?>"><?= $product->name; ?></a></h6>
            <p class="small text-muted">$<?= ($product->price/100); ?></p>
          </div>
        </div>
                    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </section>
    
    <!-- SERVICES-->
    <?php $__env->startComponent('front/services'); ?> <?php echo $__env->renderComponent(); ?>

  </div>

  <script type="text/javascript">
  
    $(document).ready(function(){
      
      $(document).on('submit', '#addToCart', (e) => {
        // e.preventDefault();
        $("#message").html('');

        const form = $("#addToCart")[0];
        let data = new FormData(form);

        $.ajax({
          url: "/cart/store",
          method: "POST",
          dataType: "JSON",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          success: (response) => {
            if (response.success) {
              $("#mesgsage").html(`<div class="alert alert-success">'
                ${response.message}
                  '</div>`);
            } else {
              $("#messgage").html(`<div class="alert alert-warning">'
                ${response.message}
                  '</div>`);
            }
          }

        });

      });

    });

  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('front/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Shopping-cart-php-mvc\views/front/index.blade.php ENDPATH**/ ?>