<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="<?php echo e($name); ?>">
        <?php echo e($slot); ?>

    </label>
    <textarea
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="body" cols="5" rows="4" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder); ?>">
<?php if($value): ?>
<?php echo e($value); ?>

<?php endif; ?>
    </textarea>
    <p id="body_err" class="text-red-500 text-sm italic error mt-2"></p>
</div><?php /**PATH C:\laragon\www\ecommerce\views/textarea.blade.php ENDPATH**/ ?>