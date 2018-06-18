<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="study-info">
            <h1><?php echo e($study->name); ?></h1>
            <h3><?php echo e($study->level); ?>, <?php echo e($study->facility); ?></h3>
            <h4><?php echo e($study->city); ?></h4>
        </div>
    <?php $__currentLoopData = $study->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($post->title); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>