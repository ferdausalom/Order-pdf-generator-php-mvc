<div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">

            <li class="mt-0.5 w-full">
                <a class="<?= trim($_SERVER['REQUEST_URI'], '/admin') == '' ? 'bg-blue-500/13' : ''; ?> 
                py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="/admin">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-app"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <?php $__env->startComponent('sidebar-li', 
            [
                'url'=>'categories', 
                'url1'=>'categories/create',
                'icon' => 'credit-card'
            ]); ?>
            Categories
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('sidebar-li', 
            [
                'url'=>'sub-categories', 
                'url1'=>'sub-categories/create',
                'icon' => 'app'
            ]); ?>
            Sub Categories
            <?php echo $__env->renderComponent(); ?>

            <?php $__env->startComponent('sidebar-li', 
            [
                'url'=>'products', 
                'url1'=>'products/create',
                'icon' => 'world-2'
            ]); ?>
            Products
            <?php echo $__env->renderComponent(); ?>

            
        </ul>
    </div>
</aside>

<!-- end sidenav --><?php /**PATH C:\laragon\www\ecommerce\views/_sidebar.blade.php ENDPATH**/ ?>