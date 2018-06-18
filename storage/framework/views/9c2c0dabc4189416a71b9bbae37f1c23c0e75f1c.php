<?php $__env->startSection('content'); ?>
    <div class="page_container">
        <h1 class="page_title">My Interests</h1>

        <div class="my_interests">
            <?php if(count($userInterests->interests) > 0): ?>
                <?php $__currentLoopData = $userInterests->interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="my_interest">
                        <div class="interest_name"> <?php echo e($interest->name); ?> </div>
                        <div class="delete_interest" data-title="<?php echo e($interest->id); ?>" data-content="<?php echo e($interest->name); ?>">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div> You have no interests set yet!</div>
            <?php endif; ?>
        </div>

        <div class="interest_container">
            <div class="title" style="padding-left: 20px">
                <h3>Add your interests, so we can show you relevant content</h3>
            </div>

            <div>
                <form action="<?php echo e(route('user.interests.search')); ?>" method="GET" id="interest_search" autocomplete="nope">
                    <div class="input-group mb-3">
                        <input style="background-color: #dddddd" type="text" class="form-control" placeholder="Search for interests..." name="search">
                        <div class="input-group-append">
                            <button class="search_button btn btn-outline-secondary" type="button">Search</button>
                            <a style="color: white; font-weight: bold" class=" btn btn-secondary" href="<?php echo e(route('user.interests')); ?>">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
            <?php $__currentLoopData = $interests->chunk(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chuckedInterests): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="content-row">
                    <?php $__currentLoopData = $chuckedInterests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="interest-wrapper">
                            <div class="interest">
                                <div><?php echo e($interest->name); ?></div>
                            </div>
                            <input type="text" value="<?php echo e($interest->id); ?>" name="interest" style="display: none">
                            <button class="btn add_interest" type="submit" data-title="<?php echo e($interest->id); ?>" data-content="<?php echo e($interest->name); ?>">
                                <i class="fas fa-plus"></i>
                                <span>Add</span>
                            </button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if(!empty($interests->links)): ?>
            <?php echo e($interests->links()); ?>

        <?php endif; ?>
        <span class="add_message"></span>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>