<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
        <?php echo e($slot); ?>

    </label>

    <select name="category_id[]" multiple=""
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option disabled="" selected="">-- Select Category/Categories --</option>

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option <?= in_array($category->id, $selectedCats)? 'selected': '' ?> value="<?= $category->id; ?>">
        <?= $category->name; ?>
        </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
    <p class="text-red-500 text-xs italic error mt-2"></p>
</div><?php /**PATH C:\laragon\www\ecommerce\views/select-multiple.blade.php ENDPATH**/ ?>