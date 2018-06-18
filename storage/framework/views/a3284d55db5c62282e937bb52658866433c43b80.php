<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="post-header">
            <h1> <?php echo e($post->title); ?></h1>
            <h5> <i>by <?php echo e($post->owner->name); ?></i></h5>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="post-image">
                    <h2>Image</h2>
                </div>
                <div class="post-tags">
                    <ul>
                        <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($tag->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="post-description">
                    <?php echo e($post->description); ?>

                </div>
            </div>
            <div class="col-md-5">
                <div class="study_info">
                    <ul>
                        <li><img src="<?php echo e(asset('images/students-cap.png')); ?>"> <?php echo e($post->study->name); ?> </li>
                        <li><img src="<?php echo e(asset('images/school-building.png')); ?>"><?php echo e($post->study->level); ?>, <?php echo e($post->study->facility); ?> </li>
                        <li><img src="<?php echo e(asset('images/location.png')); ?>"> <?php echo e($post->study->city); ?> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>