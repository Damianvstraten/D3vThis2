<?php $__env->startSection('content'); ?>
    <?php
        $tagsAmount = 0;
        $tagsMax = 4;
    ?>
    <div class="container study_page">
        <h1>My Study</h1>
        <div class="my_study">
            <?php if(!empty($user->study)): ?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <div class="study_info">
                            <ul>
                                <li><img src="<?php echo e(asset('images/students-cap.png')); ?>"><?php echo e($user->study->name); ?></li>
                                <li><img src="<?php echo e(asset('images/school-building.png')); ?>"><?php echo e($user->study->level); ?>, <?php echo e($user->study->facility); ?></li>
                                <li><img src="<?php echo e(asset('images/location.png')); ?>"><?php echo e($user->study->city); ?> </li>
                            </ul>
                        </div>

                        
                            
                        
                    </div>
                </div>
                <?php else: ?>
                <form method="POST" action="<?php echo e(route('user.study.store')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="study_select">Add your study to help other students find their perfect study</label>
                        <select class="form-control" id="study_select" name="study">
                            <option value="none" <?php if($user->study_id == null): ?> selected <?php endif; ?>>None</option>
                            <?php $__currentLoopData = $studies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $study): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($study->id); ?>" <?php if($study->id == $user->study_id): ?> selected <?php endif; ?>><?php echo e($study->name); ?>, <?php echo e($study->facility); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save study</button>
                    <?php echo e(method_field('PUT')); ?>

                </form>
            <?php endif; ?>
        </div>

        <?php if(!empty($user->study)): ?>
            <p class="lead" style="background-color: #e9ecef; padding: 10px; border-radius: 5px">Upload all your school assignments to help other students chose their study!</p>
            <a class="btn btn-secondary" href="<?php echo e(route('posts.create')); ?>" role="button">Create new project</a>

            
                
                    
                        
                            
                        
                        
                            
                        
                        
                            
                            
                            
                                
                            
                        
                    
                
            
        <div class="assignments">
            <?php $__currentLoopData = $user->posts->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunkedPosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="assignment-row">
                    <?php $__currentLoopData = $chunkedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="assignment-card">
                            <div class="jumbotron">
                                <div class="assignment-header">
                                    <h5> <a style="color: white" href="<?php echo e(route('posts.show', $post->id)); ?>"><?php echo e($post->title); ?></a></h5>
                                </div>
                                <div class="image-placeholder">
                                    <h3>Image</h3>
                                </div>
                                <div class="description">
                                    <p class="lead"><?php echo e($post->description); ?></p>
                                    <hr class="my-4">
                                    <div>
                                        <?php $__currentLoopData = $post->tags->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunkedTags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="tag-row">
                                                <?php $__currentLoopData = $chunkedTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="tag"> <?php echo e($tag->name); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <p class="lead">
                                        <a class="btn btn-secondary edit" href="#" role="button">Edit</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>