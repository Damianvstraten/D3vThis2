<?php $__env->startSection('content'); ?>
    <div class="container suggestions-page">
        <h1>My Content</h1>

        <div class="content_search_form">
            <form class=" form-filter form-inline" method="GET" action="<?php echo e(route('user.search')); ?>">
                
                <select name="filter" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                    <option selected disabled>Filter by preference</option>
                    <option value="study">Study</option>
                    <option value="interest">Interest</option>
                </select>
                <input style="margin-right: 10px" name="search" class="form-control" type="text" placeholder="Search....">
                <input class="form-control" type="submit" value="Search">
            </form>
            <form class="form-sort form-inline">
                <select name="filter" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                    <option selected disabled>Sort by</option>
                    <option value="study">Newest</option>
                    <option value="interest">Oldest</option>
                    <option value="interest">Most Likes</option>
                    <option value="interest">Popular</option>
                </select>
            </form>
        </div>

        <div class="suggestions-list">
            <?php if(count($suggestions) > 0): ?>
                
                    
                        <?php $__currentLoopData = $suggestions->sortByDesc('match_count'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="suggestion">
                               <div class="suggestion-body">
                                   <div class="left-side">
                                       <h3> <a href="<?php echo e(route('posts.show', $suggestion->id)); ?>"> <?php echo e($suggestion->title); ?> </a></h3>
                                       <p> <?php echo e($suggestion->description); ?></p>
                                   </div>
                                   <div class="right-side">
                                       <div class="study_info">
                                           <ul>
                                               <li><img src="<?php echo e(asset('images/students-cap.png')); ?>"><a href="<?php echo e(route('study.show', $suggestion->owner->study->id)); ?>"><?php echo e($suggestion->owner->study->name); ?><i style="margin-left: 10px" class="fas fa-caret-right"></i></a></li>
                                               <li><img src="<?php echo e(asset('images/school-building.png')); ?>"><?php echo e($suggestion->owner->study->level); ?>, <?php echo e($suggestion->owner->study->facility); ?></li>
                                               <li><img src="<?php echo e(asset('images/location.png')); ?>"><?php echo e($suggestion->owner->study->city); ?> </li>
                                           </ul>
                                       </div>
                                       <div class="tag_list">
                                           <?php $tagsAmount = 0; $tagsMax = 3; ?>
                                            <?php $__currentLoopData = $suggestion->tags->sortByDesc('matched'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php $tagsAmount++ ?>
                                               <?php if($tagsAmount <= $tagsMax): ?>
                                                       <span class="tag <?php if($tag->matched == true): ?> matched <?php endif; ?> "><?php if($tag->matched == true): ?> <i class="fas fa-heart" style="margin-right: 5px"></i> <?php endif; ?> <?php echo e($tag->name); ?></span>
                                               <?php endif; ?>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php if(count($suggestion->tags) > $tagsMax): ?>
                                               <span> and <b style="font-size: 16px"><?php echo e(count($suggestion->tags) - $tagsMax); ?></b> more</span>
                                           <?php endif; ?>
                                       </div>
                                   </div>
                               </div>
                               <div class="suggestion-footer">
                                   <h6 style="font-style: italic">by <?php echo e($suggestion->owner->name); ?></h6>
                                   <ul>
                                       <li><span><?php echo e($suggestion->match_count); ?></span><img src="<?php echo e(asset('images/valentines-heart.png')); ?>"></li>
                                       <li><span>4</span><img src="<?php echo e(asset('images/thumbs.png')); ?>"></li>
                                       <li><span>7</span><img src="<?php echo e(asset('images/star.png')); ?>"></li>
                                   </ul>
                               </div>

                               
                           </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                
            </div>
        <?php else: ?>
            <span>There are no projects that match your interests!</span>
            <a href="<?php echo e(route('user.interests')); ?>" class="btn" style="background-color: #4eda8c; display: block; width: 150px; margin-top: 10px; color: white">Add interests</a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>