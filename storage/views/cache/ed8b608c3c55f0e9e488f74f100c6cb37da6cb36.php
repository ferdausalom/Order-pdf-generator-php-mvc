

<?php $__env->startSection('title', 'Create Product'); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('message', ['sessionName' => 'error']); ?><?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('form', ['action'=> '/products', 'method'=> 'POST', 'enctype'=> 'multipart/form-data']); ?>

    <?php $__env->startComponent('input-text', ['name'=> 'name','type'=>'text','placeholder'=> 'Name', 'value'=> '']); ?>
    Name
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('input-text', ['name'=> 'price','type'=>'number','placeholder'=> 'E.g. 50.40', 'value'=> '']); ?>
    Price
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('textarea', ['name'=> 'body', 'placeholder'=> 'Body', 'value'=> '']); ?>
    Body
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('select-multiple', ['categories'=> $categories, 'selectedCats' => []]); ?>
    Category
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('input-file', ['name'=> 'thumbnail', 'type'=>'file', 'value'=> '']); ?>
    Thumbnail
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('button'); ?>
    Save Data
    <?php echo $__env->renderComponent(); ?>

<?php echo $__env->renderComponent(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/productCreate.blade.php ENDPATH**/ ?>