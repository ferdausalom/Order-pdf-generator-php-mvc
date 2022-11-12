<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="<?php echo e($name); ?>">
        <?php echo e($slot); ?>

    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="name" name="<?php echo e($name); ?>" type="<?php echo e($type); ?>" <?php if($placeholder): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?> <?php if($value): ?>
        value="<?php echo e($value); ?>" <?php endif; ?>>

    <p id="title_err" class="text-red-500 text-sm italic error mt-2"></p>
</div><?php /**PATH C:\laragon\www\ecommerce\views////input-text.blade.php ENDPATH**/ ?>