

<?php $__env->startSection('title', 'Create Sub Category'); ?>

<?php $__env->startSection('content'); ?>

    <!-- cards -->

    <?php $__env->startComponent('message', ['sessionName' => 'error']); ?><?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('form', ['action'=> '/sub-categories', 'method'=> 'POST', 'enctype'=> '']); ?>

        <?php $__env->startComponent('select', ['categories'=> $categories, 'selectedCats' => []]); ?>
        Category
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('input-text', ['name'=> 'name','type'=>'text','placeholder'=> 'Sub Category', 'value'=> '']); ?>
        Sub Category
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('button'); ?>
        Save Data
        <?php echo $__env->renderComponent(); ?>

    <?php echo $__env->renderComponent(); ?>

    <!-- cards -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/subCategoryCreate.blade.php ENDPATH**/ ?>