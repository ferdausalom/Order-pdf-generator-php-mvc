

<?php $__env->startSection('title', 'Create Category'); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('message', ['sessionName' => 'error']); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('form', ['action'=> '/categories/update', 'method'=> 'POST', 'enctype'=> '']); ?>

<?php $__env->startComponent('input-text', ['name'=> 'name','type'=>'text', 'placeholder'=>'', 'value'=> $category->name]); ?>
Name
<?php echo $__env->renderComponent(); ?>

<input type="hidden" name="id" value="<?= $category->id; ?>">

<?php $__env->startComponent('button'); ?>
Save Data
<?php echo $__env->renderComponent(); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/categoryEdit.blade.php ENDPATH**/ ?>