<?php
$logo_main = App\Models\LogoManager::where('title','logo')->first();
?>
<nav class="navbar" id="navbarHeader">
      <div class="container">
        <div class="logoImage">
          <a class="navbar-brand" href="<?php echo e(route('home')); ?>"
            ><img src="<?php echo e((!empty($logo_main->image))?
                asset('storage/uploads/logo/'.$logo_main->image):asset('storage/uploads/No-image.jpg')); ?>" alt=""></a>
        </div>
        <div class="navMenu" id="navMenu">
            <ul class="navItem d-flex align-items-center">
              <li class="navLink" id="navLink">
                <a href="<?php echo e(route('home')); ?>" id="home" class="navLink">Home</a>
              </li>
              <li class="navLink" id="navLink">
                <a href="<?php echo e(route('how.it.works')); ?>" id="works" class="navLink">How It Works</a>
              </li>
                <!-- Common menu item for logged-in users -->
                <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('site.blogs')); ?>" id="blog" class="navLink">Blog</a>
                </li>
              <?php if(auth()->guard()->guest()): ?>
                <!-- Display these menu items for non-logged-in users -->

                <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('browse.quotes')); ?>" id="quotes" class="navLink">Browse Requests</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('browse.services')); ?>" id="services" class="navLink">Browse Services</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('browse.companies')); ?>" id="company" class="navLink">Browse Companies</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('frontend.signin')); ?>" id="signIn" class="navLink">Sign In</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('frontend.signup')); ?>" id="signUp" class="navLink">Sign Up</a>
                  </li>
              <?php else: ?>
                <!-- Display these menu items for logged-in users -->
                <?php if(Auth::user()->type == '2'): ?>
                  <!-- Display these menu items for users with type '2' -->
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('browse.quotes')); ?>" id="quotes" class="navLink">Browse Requests</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('our.packages')); ?>" id="quotes" class="navLink">Our Packages</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('guard.dashboard')); ?>" id="signIn" class="navLink">Profile</a>
                  </li>

                <?php elseif(Auth::user()->type == '3'): ?>
                  <!-- Display these menu items for users with type '3' -->
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('browse.services')); ?>" id="services" class="navLink">Browse Services</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('browse.companies')); ?>" id="company" class="navLink">Browse Companies</a>
                  </li>
                  <li class="navLink" id="navLink">
                    <a href="<?php echo e(route('client.dashboard')); ?>" id="signIn" class="navLink">Profile</a>
                  </li>

                <?php endif; ?>
                <!-- Logout menu item for all logged-in users -->
                

              <?php endif; ?>

            </ul>
          </div>

        
      </div>
    </nav>

    <div class="sideNavbar" id="navbarHeader">
      <div id="nav-icon1" class="sideBarButton">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="sideNavbarImage">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>"
          ><img src="<?php echo e(asset('frontend/assets/images/logo.png')); ?>"
        /></a>
      </div>
    </div>

    <div id="mySidenav" class="sidenav">
      <div class="navbarBrand">
        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e((!empty($logo_main->image))?
            asset('storage/uploads/logo/'.$logo_main->image):asset('storage/uploads/No-image.jpg')); ?>" alt=""></a>
      </div>
      <a href="<?php echo e(route('home')); ?>" class="navLink">Home</a>
      <a href="<?php echo e(route('how.it.works')); ?>" class="navLink">How It Works</a>
      <?php if(Auth::check() && Auth::user()->type == '2'): ?>
      <a href="<?php echo e(route('browse.quotes')); ?>" class="navLink">Browse Requests</a>
      <a href="<?php echo e(route('our.packages')); ?>" id="quotes" class="navLink">Our Packages</a>
      <?php endif; ?>
      <?php if(Auth::check() && Auth::user()->type == '3'): ?>
      <a href="<?php echo e(route('browse.services')); ?>" class="navLink">Browse Listings</a>
      <a href="<?php echo e(route('browse.companies')); ?>" class="navLink">Browse Companies</a>
      <?php endif; ?>

      <a href="<?php echo e(route('site.blogs')); ?>" id="blog" class="navLink">Blogs</a>
      <a href="<?php echo e(route('frontend.signin')); ?>" class="navLink">Sign In</a>
      <a href="<?php echo e(route('frontend.signup')); ?>" class="navLink">Sign Up</a>
    </div>
<?php /**PATH C:\xampp\htdocs\guard_hire\resources\views/frontend/layouts/navbar.blade.php ENDPATH**/ ?>