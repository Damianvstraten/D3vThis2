<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #4eda8c; color: white"> Create new project</div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('posts.store')); ?>" id="create_post_form">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="post_title" class="col-sm-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="title" id="post_title" placeholder="Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_description" class="col-sm-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="post_description" name="description" rows="7">

                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_search_interest" class="col-sm-4 col-form-label text-md-right">Tags</label>

                                <div class="col-md-6">
                                    <input type="text" class="tag_search form-control" id="post_search_interest" name="search" placeholder="search for tags...">
                                    <div class="added_tags form-control" style=" margin-top: 15px"></div>
                                    
                                    

                                    <div class="tags_options"></div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: #4eda8c; border: none">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>