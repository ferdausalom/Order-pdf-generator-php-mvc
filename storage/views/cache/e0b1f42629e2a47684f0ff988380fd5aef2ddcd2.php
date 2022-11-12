

<?php $__env->startSection('title', 'Sub Categories'); ?>

<?php $__env->startSection('content'); ?>

<!-- cards -->

<div
    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

    <?php $__env->startComponent('message', ['sessionName' => 'message']); ?><?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('table-top', ['href'=>'/sub-categories/create', 'btn'=> 'Sub Category']); ?>
    Sub Categories
    <?php echo $__env->renderComponent(); ?>

    <div class="flex-auto px-0 pt-0 pb-6">
        <div class="p-0 overflow-x-auto ps">
            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                <thead class="align-bottom">
                    <tr>

                        <?php $__env->startComponent('table-th'); ?>
                        SL.
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-th'); ?>
                        Sub category
                        <?php echo $__env->renderComponent(); ?>

                        <?php $__env->startComponent('table-th'); ?>
                        Category
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

                    <?php if(count($allSubCategory) > 0): ?>
                        <?php $__currentLoopData = $allSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $__env->startComponent('table-td'); ?>
                                    <?= $i++; ?>
                                <?php echo $__env->renderComponent(); ?>                            

                                <?php $__env->startComponent('table-td'); ?>
                                    <?= $subCategory->name; ?>
                                <?php echo $__env->renderComponent(); ?>

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>              
                                    <?php if($subCategory->category_id === $category->id): ?>
                                        <?php $__env->startComponent('table-td'); ?>
                                            <?= $category->name; ?>   
                                        <?php echo $__env->renderComponent(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <td
                                    class="p-2 flex align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                                    <?php $__env->startComponent('button-form', ['action'=> '/sub-categories/delete', 'method'=> 'POST', 'id' => $subCategory->id]); ?>
                                        <?php $__env->startComponent('delete-svg'); ?><?php echo $__env->renderComponent(); ?>
                                    <?php echo $__env->renderComponent(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <h4 class="text-center" style="color: brown">404 no content!</h4>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- end cards -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecommerce\views/subCategoryIndex.blade.php ENDPATH**/ ?>