<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body class="<?php if(!Auth::check()): ?> guest <?php endif; ?>">
<?php if(Auth::check()): ?>
  <div class="sidenav">
      <div class="user_info">
          <img src="<?php echo e(asset('images/user_icon.png')); ?>" />
          <h4 class="user_name"><?php echo e(auth()->user()->name); ?></h4>
      </div>
      <div class="navigation">
          <a href=" <?php echo e(route('user.index')); ?>"><i class="fas fa-home link-icon"></i>Dashboard</a>
          <a href="<?php echo e(route('user.interests')); ?>"><i class="fas fa-heart link-icon"></i>My Interests</a>
          <a href="<?php echo e(route('user.study.index')); ?>"><i class="fas fa-graduation-cap link-icon"></i>My Study</a>
          <a href="<?php echo e(route('user.settings')); ?>"><i class="fas fa-cog link-icon"></i>Account settings</a>
          <a class="logout" href="<?php echo e(route('logout')); ?>"
             onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt link-icon"></i><?php echo e(__('Logout')); ?>

          </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
          </form>
      </div>
  </div>
<?php endif; ?>

    <main class="<?php if(Auth::check()): ?> logged-in <?php endif; ?>">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<!-- Side navigation -->
</body>
</html>
