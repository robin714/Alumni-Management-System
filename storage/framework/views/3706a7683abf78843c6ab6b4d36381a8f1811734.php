<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('alumni/css/bootstrap.min.css')); ?>">
    <title>Alumni Management System</title>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
<header>
    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark text-center">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('alumni/img/bakary.png')); ?>" alt="" style="width:70px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav text-color">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(url('user/registration')); ?>">Registration</a>
                        </li>
                        <?php if(Auth::check()): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(url('peoples')); ?>">Search People</a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(url('about')); ?>">About</a>
                        </li>
                        <?php if(isset(Auth::user()->id)): ?>
                        <?php if(Auth::user()->role_id <= 3): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(url('event')); ?>">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(url('notice')); ?>">Notice</a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if(Auth::check()): ?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?php echo e(url('profile')); ?>">Profile</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <?php if(Auth::check()): ?>
                                <a class="nav-link text-light" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            <?php else: ?>
                            <a class="nav-link text-light" href="<?php echo e(url('login')); ?>">Sign In</a>
                            <?php endif; ?>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<?php echo $__env->yieldContent('content'); ?>

<footer>
    <div class="container-fluid pr-0 pl-0">
        <div class="row">
            <div class="col-md-12 text-right bg-primary pt-2 pb-2"><a href="" class="link text-success text-light pr-2">&copy; Mahbubul Alam</a></div>
        </div>
    </div>
</footer>

<script src="<?php echo e(URL::asset('alumni/js/jquery-3.4.1.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('alumni/js/bootstrap.min.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/ams/resources/views/alumni/master.blade.php ENDPATH**/ ?>