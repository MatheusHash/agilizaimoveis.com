<?php if($paginator->hasPages()): ?>
    <div>
        <?php if($paginator->onFirstPage()): ?>
            <a> << </a>
        <?php else: ?>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>"> << </a>
        <?php endif; ?>

        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a class="ativo"><?php echo e($page); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($paginator->hasMorePages()): ?>
            <a class="ativo" href="<?php echo e($paginator->nextPageUrl()); ?>"> >> </a>
        <?php else: ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>"> >> </a>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/mhash/Documents/Projects/agilizaimoveis.com/resources/views/shared/pagination.blade.php ENDPATH**/ ?>