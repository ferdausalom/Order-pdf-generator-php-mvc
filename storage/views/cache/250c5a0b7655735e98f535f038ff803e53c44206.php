

<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>

<div
    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

    <?php $__env->startComponent('message', ['sessionName' => 'message']); ?><?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('table-top', ['href'=>'/products/create', 'btn'=> 'Product']); ?>
    Products
    <?php echo $__env->renderComponent(); ?>

    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto ps">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <?php $__env->startComponent('table-th'); ?>
                        SL.
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-th'); ?>
                        Name
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-th'); ?>
                        Image
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-th'); ?>
                        Price
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-th'); ?>
                        Action
                        <?php echo $__env->renderComponent(); ?>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    ?>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $__env->startComponent('table-td'); ?>
                        <?= $i++; ?>
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-td'); ?>
                        <?= $product->name; ?>
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-td'); ?>
                        <img width="50" height="40" src="<?= $product->thumbnail; ?>" alt="">
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-td'); ?>
                        $<?= ($product->price/100); ?>
                        <?php echo $__env->renderComponent(); ?>

                        <td
                            class="p-2 flex align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                            <?php $__env->startComponent('button-form', ['action'=> '/products/edit', 'method'=> 'GET', 'id' => $product->id]); ?>
                            <?php $__env->startComponent('edit-svg'); ?><?php echo $__env->renderComponent(); ?>
                            <?php echo $__env->renderComponent(); ?>

                            <?php $__env->startComponent('button-form', ['action'=> '/products/delete', 'method'=> 'POST', 'id' => $product->id]); ?>
                            <?php $__env->startComponent('delete-svg'); ?><?php echo $__env->renderComponent(); ?>
                            <?php echo $__env->renderComponent(); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- end cards -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/productIndex.blade.php ENDPATH**/ ?>