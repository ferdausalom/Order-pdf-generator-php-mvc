<li class="mt-0.5 w-full">
    <a class="<?= uri() == "$url" || uri() == "$url1" ? 'bg-blue-500/13' : ''; ?> 
        dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" 
        href="/<?php echo e($url); ?>">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-<?php echo e($icon); ?>"></i>
        </div>
        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"><?php echo e($slot); ?></span>
    </a>
</li><?php /**PATH C:\laragon\www\ecommerce\views/sidebar-li.blade.php ENDPATH**/ ?>