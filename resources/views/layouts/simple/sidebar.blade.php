
<?php


$logo_add = App\Models\LogoManager::where('title','logo')->first();

// dd($logo_add);
?>

<style>
/* width */
sidebar-wrapper::-webkit-scrollbar {
  width: 10px;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper{
    height: 100vh;
}

/* Track */
sidebar-wrapper::-webkit-scrollbar-track {
  background: grey;
}

/* Handle */
sidebar-wrapper::-webkit-scrollbar-thumb {
  background: grey;
}

/* Handle on hover */
sidebar-wrapper::-webkit-scrollbar-thumb:hover {
  background: #555;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li a:hover {
    color: #03488d !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-submenu li a:after, .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .mega-menu-container .mega-box .link-section .submenu-title h5:after {
    border-top: 2px solid #00264d !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active span {
    color: #00264d !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active svg {
    color: #00264d !important;

}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active .according-menu i {
    color: #00264d !important;

}

.page-wrapper .sidebar-main-title h6 {
    color: #00264d !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-submenu li a.active {
    color: #00264d !important;

}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active {
    background-color: #4883f1 !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active.hover {
    background-color: #4883f1 !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li.sidebar-list:hover>a:hover {
    background-color: #4883f1 !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li:hover .sidebar-link:not(.active):hover span {
    color: #00264d !important;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li:hover .sidebar-link:not(.active):hover svg {
    fill: rgba(115,102,255,0.1);
    stroke: #00264d;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li:hover .sidebar-link:not(.active):hover .according-menu i {
    color: #00264d !important;
}

</style>
<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('index')}}"><img class="img-fluid for-light" src="{{ (!empty($logo_add->image))?
                asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}"
                style="width:120px; height:80px;" alt="">
                <img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper">
            <a href="{{route('index')}}"><img class="img-fluid" src="{{ (!empty($logo_add->image))?
            asset('storage/uploads/logo/'.$logo_add->image):asset('storage/uploads/No-image.jpg') }}" alt="" style="height:40px;width:60px;"></a>
        </div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">

					<li class="back-btn">
						<a href=""><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>

                    <br>
					<li class="sidebar-main-title">
						<div>
                            <a href="{{route('index')}}">
							<h6 class="lan-3">{{ trans('lang.Dashboards') }} </h6>
                     		<p class="lan-2">{{ trans('lang.Dashboards,widgets & layout.') }}</p>
                        </a>
						</div>
					</li>
                    {{-- ==== G O TO WEBSITE ===  --}}

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/' ? 'active' : '' }}" target="_blank" href="{{ route('home') }}">
							<i data-feather="box"></i><span>{{ trans('Go to Website') }} </span>
							{{-- <div class="according-menu"></div> --}}
						</a>
					</li>

                     {{-- ==== C M S Testimonial WORK ===  --}}

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/project' ? 'active' : '' }}" href="#">
							<i data-feather="layout"></i><span>{{ trans('CMS') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/project' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/project' ? 'block;' : 'none;' }}">
		                    {{-- <li><a href="{{route('banner.index')}}" class="{{ Route::currentRouteName()=='projects' ? 'active' : '' }}">Banner Management</a></li> --}}
		                    <li><a href="{{route('logo')}}" class="{{ Route::currentRouteName()=='logo' ? 'active' : '' }}">Logo Management</a></li>
                            {{-- <li><a href="{{route('PageName')}}" class="{{ Route::currentRouteName()=='PageName' ? 'active' : '' }}">Page Name</a></li> --}}
                            <li><a href="{{route('PageContent')}}" class="{{ Route::currentRouteName()=='PageContent' ? 'active' : '' }}">Page Content</a></li>
                            {{-- <li><a href="{{route('projects')}}" class="{{ Route::currentRouteName()=='projects' ? 'active' : '' }}">Sponsor Management</a></li> --}}
                            <li><a href="{{route('privacy')}}" class="{{ Route::currentRouteName()=='privacy' ? 'active' : '' }}">{{ trans('Privacy Policy') }}</a></li>
                            <li><a href="{{route('terms')}}" class="{{ Route::currentRouteName()=='terms' ? 'active' : '' }}">{{ trans('Terms and Conditions') }}</a></li>
		                </ul>
					</li>

                    {{-- ==== Event Management ===  --}}


                    {{-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/event' ? 'active' : '' }}" href="#"><i data-feather="music"></i><span>{{ trans('Event Management') }}</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/event' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/event' ? 'block' : 'none;' }};">
                            <li><a href="{{route('event')}}" class="{{ Route::currentRouteName()=='event' ? 'active' : '' }}">Manage Events</a></li>

                        </ul>
                    </li> --}}
                    {{-- ==== Contact Management ===  --}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/contact' ? 'active' : '' }}" href="#"><i data-feather="phone"></i><span>{{ trans('Contact Management') }}</span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/contact' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/contact' ? 'block' : 'none;' }};">
                            <li><a href="{{route('contact')}}"  class="{{ Route::currentRouteName()=='contact' ? 'active' : '' }}">Contact Details</a></li>
                        </ul>
                    </li>
                        {{-- ==== Banner Management ===  --}}

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/testimonial' ? 'active' : '' }}" href="#"><i data-feather="image"></i><span>{{ trans('Banner Management') }}</span>
                                <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/testimonial' ? 'down' : 'right' }}"></i></div>
                            </a>
                            <ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/testimonial' ? 'block' : 'none;' }};">

                                <li><a href="{{route('testimonial')}}"  class="{{ Route::currentRouteName()=='testimonial' ? 'active' : '' }}">Banner</a></li>
                            </ul>
                        </li>
                    {{-- ==== Blogs Management ===  --}}

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/blog' ? 'active' : '' }}" href="#"><i data-feather="image"></i><span>{{ trans('Blog Management') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/blogs' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/blog' ? 'block' : 'none;' }};">
							<li><a href="{{route('blogs')}}"  class="{{ Route::currentRouteName()=='blog' ? 'active' : '' }}">Blogs</a></li>
                            {{-- <li><a href="{{route('testimonial')}}"  class="{{ Route::currentRouteName()=='testimonial' ? 'active' : '' }}">Banner</a></li> --}}
						</ul>
					</li>


                    {{-- ==== TAGS Management ===  --}}

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/tags' ? 'active' : '' }}" href="#"><i data-feather="image"></i><span>{{ trans('Tags Management') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/tags' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/tags' ? 'block' : 'none;' }};">
							<li><a href="{{route('tags.index')}}"  class="{{ Route::currentRouteName()=='tags' ? 'active' : '' }}">Tags</a></li>
                            <li><a href="{{route('guard.type')}}"  class="{{ Route::currentRouteName()=='guard-type' ? 'active' : '' }}">Guard Type</a></li>
						</ul>
					</li>

                    {{-- ==== A D M I N Management WORK ===  --}}

                            {{-- @if (Auth::user()->type == '1')
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/admin' ? 'active' : '' }}" href="#">
                                            <i data-feather="user-check"></i><span>{{ trans('Admin Management') }} </span>
                                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/admin' ? 'down' : 'right' }}"></i></div>
                                        </a>
                                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/admin' ? 'block;' : 'none;' }}">
                                            <li><a href="{{route('admin')}}" class="{{ Route::currentRouteName()=='admin' ? 'active' : '' }}">{{ trans('Admins List') }}</a></li>
                                        </ul>
                                    </li>
                            @endif --}}

                    {{-- ==== Package Management WORK ===  --}}

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/Package' ? 'active' : '' }}" href="#">
							<i data-feather="package"></i> <span> {{ trans('Package Management') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/Package' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/Package' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('Package')}}" class="{{ Route::currentRouteName()=='Package' ? 'active' : '' }}">{{ trans('Package List') }}</a></li>
		                </ul>
					</li>



                    {{-- ==== Banner Management ===  --}}

                    {{-- <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/banners' ? 'active' : '' }}" href="#">
							<i data-feather="banners"></i> <span> {{ trans('Banner Management') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/banners' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/banners' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('banner.index')}}" class="{{ Route::currentRouteName()=='banners' ? 'active' : '' }}">{{ trans('Banners') }}</a></li>

		                </ul>
					</li> --}}

                       {{-- ==== Paypal Subscriptions ===  --}}

                       {{-- <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/Package' ? 'active' : '' }}" href="#">
							<i data-feather="package"></i> <span> {{ trans('Paypal Subscription') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/paypal' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/paypal' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('product.list')}}" class="{{ Route::currentRouteName()=='product.list' ? 'active' : '' }}">{{ trans('Products List') }}</a></li>
                            <li><a href="{{route('plans.index')}}" class="{{ Route::currentRouteName()=='plans.index' ? 'active' : '' }}">{{ trans('Subscriptions List') }}</a></li>
		                </ul>
					</li> --}}

                        {{-- ==== Paypal User ===  --}}

                        {{-- <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/Package' ? 'active' : '' }}" href="#">
                                <i data-feather="package"></i> <span> {{ trans('Paypal Users') }} </span>
                                <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/paypal' ? 'down' : 'right' }}"></i></div>
                            </a>
                            <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/subcription-index' ? 'block;' : 'none;' }}">
                                <li><a href="{{route('subcription.index')}}" class="{{ Route::currentRouteName()=='subcription.index' ? 'active' : '' }}">{{ trans('Users List') }}</a></li>

                            </ul>
                        </li> --}}


                          {{-- ==== Stripes Management WORK ===  --}}

                    {{-- <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/stripePackages' ? 'active' : '' }}" href="#">
							<i data-feather="package"></i> <span> {{ trans('Stripe Packages') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/stripePackages' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/stripePackages' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('stripePackages')}}" class="{{ Route::currentRouteName()=='stripePackages' ? 'active' : '' }}">{{ trans('Stripe Packages List') }}</a></li>

		                </ul>
					</li> --}}

                        {{-- ==== services Management WORK ===  --}}
                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/services' ? 'active' : '' }}" href="#">
							<i data-feather="package"></i> <span>  Category Management</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/Package' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/services' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('services')}}" class="{{ Route::currentRouteName()=='services' ? 'active' : '' }}">{{ trans('Categories') }}</a></li>
                            <li><a href="{{route('location')}}" class="{{ Route::currentRouteName()=='location' ? 'active' : '' }}">{{ trans('Location List') }}</a></li>
                            <li><a href="{{route('languages.index')}}" class="{{ Route::currentRouteName()=='languages.index' ? 'active' : '' }}">{{ trans('languages') }}</a></li>
		                </ul>
					</li>

                    {{-- ==== cermonay Management WORK ===  --}}

                    {{-- <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/ceremony' ? 'active' : '' }}" href="#">
							<i data-feather="package"></i> <span> {{ trans('ceremony Management') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/ceremony' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/ceremony' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('admin_wedding')}}" class="{{ Route::currentRouteName()=='admin_wedding' ? 'active' : '' }}">{{ trans('Wedding List') }}</a></li>
                            <li><a href="{{route('admin_engagement')}}" class="{{ Route::currentRouteName()=='admin_engagement' ? 'active' : '' }}">{{ trans('Engagement List') }}</a></li>

		                </ul>
					</li> --}}

                     {{-- ==== Guards Management WORK ===  --}}


                    {{-- <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/adminVendor' ? 'active' : '' }}" href="#">
							<i data-feather="package"></i> <span>  Guard Management</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/adminVendor' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/services' ? 'block;' : 'none;' }}">
                            <li><a href="{{route('adminVendor')}}"  class="{{ Route::currentRouteName()=='adminVendor' ? 'active' : '' }}">Guards</a></li>
		                </ul>
					</li> --}}
                        {{-- ==== Featured Listing WORK ===  --}}

                        {{-- <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/featured' ? 'active' : '' }}" href="#">
                                <i data-feather="users"></i><span>Manage Featured Listing </span>
                                <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/featured' ? 'down' : 'right' }}"></i></div>
                            </a>
                            <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/featured' ? 'block;' : 'none;' }}">
                                <li><a href="{{route('featured')}}" class="{{ Route::currentRouteName()=='featured' ? 'active' : '' }}">{{ trans('Featured Listing') }}</a></li>
                                <li><a href="{{route('featured')}}" class="{{ Route::currentRouteName()=='featured' ? 'active' : '' }}">{{ trans('Client Featured') }}</a></li>
                            </ul>
                        </li> --}}
                     {{-- ==== U S E R Management WORK ===  --}}

                     <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/user' ? 'active' : '' }}" href="#">
                            <i data-feather="users"></i><span> Users Management </span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/user' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/user' ? 'block;' : 'none;' }}">
                            <li><a href="{{route('user')}}" class="{{ Route::currentRouteName()=='user' ? 'active' : '' }}">{{ trans('Users List') }}</a></li>
                        </ul>
                    </li>

                    {{-- ==== Subscription Management WORK ===  --}}

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/Subcription' ? 'active' : '' }}" href="#">
							<i data-feather="plus-square"></i> <span>{{ trans('Newsletter') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/Subcription' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/Subcription' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('Subcription')}}" class="{{ Route::currentRouteName()=='Subcription' ? 'active' : '' }}">{{ trans('Newsletter List') }}</a></li>
		                </ul>
					</li>


                    {{-- ==== I N Q U I R Y WORK ===  --}}

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/Inquiry' ? 'active' : '' }}" href="#"><i data-feather="phone-forwarded"></i><span>{{ trans('Help') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/Inquiry' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{request()->route()->getPrefix() == '/Inquiry' ? 'block' : 'none;' }};">
							<li><a href="{{route('Inquiry')}}" class="{{ Route::currentRouteName()=='Inquiry' ? 'active' : '' }}">Help Details</a></li>

						</ul>
					</li>

					{{-- ==== F A Q Management WORK ===  --}}

					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/faq' ? 'active' : '' }}" href="#">
							<i data-feather="list"></i><span>{{ trans('FAQ Management') }} </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/faq' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/faq' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('faq')}}" class="{{ Route::currentRouteName()=='faq' ? 'active' : '' }}">{{ trans('FAQ List') }}</a></li>
		                </ul>
					</li>

                      {{-- ==== G E N E R A L WORK ===  --}}

                      <li class="sidebar-list">
                        {{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/general' ? 'active' : '' }}" href="#">
                            <i data-feather="settings"></i><span>{{ trans('General Setting') }} </span>
                            <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/general' ? 'down' : 'right' }}"></i></div>
                        </a>
                        <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/general' ? 'block;' : 'none;' }}">
                            {{-- <li><a href="{{route('social')}}" class="{{ Route::currentRouteName()=='social' ? 'active' : '' }}">{{ trans('Social Links') }}</a></li> --}}
                            <li><a href="{{route('congfigration')}}" class="{{ Route::currentRouteName()=='congfigration' ? 'active' : '' }}">Congfigration</a></li>
                        </ul>
                    </li>

				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>
