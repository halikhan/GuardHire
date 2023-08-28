<?php

use Maatwebsite\Excel\Row;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserManagement;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\VednorsController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PageNameController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\GuardTypeController;
use App\Http\Controllers\EngagementController;

use App\Http\Controllers\LogoManagerController;
use App\Http\Controllers\PaypalPlansController;
use App\Http\Controllers\SubcriptionController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserWeddingController;

use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PaypalProductController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\UserEngagementController;
use App\Http\Controllers\EventManagementController;
use App\Http\Controllers\StripSubcriptionControler;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Frontend\WeddingController;
use App\Http\Controllers\ContactManagementController;
use App\Http\Controllers\FeaturedListingController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\PackageManagementController;
use App\Http\Controllers\PaypalSubcriptionController;
use App\Http\Controllers\Frontend\GuardHireController;
use App\Http\Controllers\Frontend\UserLoginController;
use App\Http\Controllers\VendorRegisterationController;
use App\Http\Controllers\Frontend\guard\GuardController;
use App\Http\Controllers\Frontend\ApplyFiltersController;
use App\Http\Controllers\StripPackageManagementControler;
use App\Http\Controllers\Frontend\client\ClientController;
use App\Http\Controllers\Frontend\guard\GuardJobController;
use App\Http\Controllers\Frontend\guard\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/auth.php';
Route::get('/admin', function () {
    return view('auth.login');
});

Route::prefix('dashboard')->group(function () {

    Route::view('index', 'dashboard.index')->name('index');

});

// Route::post('/login',[WebsiteController::class,'userlogin'])->name('login');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "isAdmin" middleware group. Now create something great!
|
*/
Route::get('user-export', [UserManagement::class, 'export'])->name('backend.user.export');
Route::get('vendor-export', [VednorsController::class, 'export'])->name('backend.vendor.export');

Route::middleware(['preventBackHistory','isAdmin'])->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });


    Route::prefix('admin')->group(function () {

        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        Route::get('admin_create', [AdminController::class, 'create'])->name('admin_create');
        Route::post('admin_store', [AdminController::class, 'store'])->name('admin_store');
        Route::get('admin_edit/{id}', [AdminController::class, 'edit'])->name('admin_edit');
        Route::post('admin_update/{id}', [AdminController::class, 'update'])->name('admin_update');
        Route::get('admin_destroy/{id}', [AdminController::class, 'destroy'])->name('admin_destroy');

    });


    Route::prefix('featured')->group(function () {

        Route::get('featured', [FeaturedListingController::class, 'index'])->name('featured');
        Route::get('create-listing', [FeaturedListingController::class, 'create'])->name('backend.featured.create');
        Route::post('store-listing', [FeaturedListingController::class, 'store'])->name('featured_store');
        Route::get('show-listing/{id}', [FeaturedListingController::class, 'show'])->name('featured_show');
        Route::get('edit-listing/{slug}', [FeaturedListingController::class, 'edit'])->name('featured_edit');
        Route::post('update-listinge/{id}', [FeaturedListingController::class, 'update'])->name('featured_update');
        Route::get('destro-listingy/{slug}', [FeaturedListingController::class, 'destroy'])->name('featured_destroy');
        Route::get('status-listing/{id?}',[FeaturedListingController::class,'featured_status'])->name('featured_status');

    });

    Route::prefix('user')->group(function () {

        Route::get('user', [UserManagement::class, 'index'])->name('user');
        Route::get('user_create', [UserManagement::class, 'create'])->name('backend.user.create');
        Route::post('user_store', [UserManagement::class, 'store'])->name('user_store');
        Route::get('user_show/{id}', [UserManagement::class, 'show'])->name('user_show');
        Route::get('user-package-details-show/{id}', [UserManagement::class, 'package_details_show'])->name('user_package_details_show');
        Route::post('user-gift-points', [UserManagement::class, 'user_gift_points'])->name('user.gift.points');
        Route::get('user_edit/{slug}', [UserManagement::class, 'edit'])->name('user_edit');
        Route::post('user_update/{id}', [UserManagement::class, 'update'])->name('user_update');
        Route::get('user_destroy/{slug}', [UserManagement::class, 'destroy'])->name('user_destroy');
        Route::get('user_status/{id?}',[UserManagement::class,'user_status'])->name('user_status');
        Route::get('featured_user/{id?}',[UserManagement::class,'featured_user'])->name('featured_user');


    });

    Route::prefix('Subcription')->group(function () {

        Route::get('Subcription', [SubcriptionController::class, 'index'])->name('Subcription');
        Route::get('Subcription_create', [SubcriptionController::class, 'create'])->name('Subcription_create');
        Route::post('Subcription_store', [SubcriptionController::class, 'store'])->name('Subcription_store');
        Route::get('Subcription_edit/{id}', [SubcriptionController::class, 'edit'])->name('Subcription_edit');
        Route::post('Subcription_update/{id}', [SubcriptionController::class, 'update'])->name('Subcription_update');
        Route::get('Subcription_destroy/{id}', [SubcriptionController::class, 'destroy'])->name('Subcription_destroy');

    });
    Route::prefix('banners')->group(function () {

        Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
        Route::get('banner-create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('banner-store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('banner-edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('banner-update/{id}', [BannerController::class, 'update'])->name('banner.update');
        Route::get('banner-destroy/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

    });

    Route::prefix('tags')->group(function () {

        Route::get('tags', [TagController::class, 'index'])->name('tags.index');
        Route::get('tag-create', [TagController::class, 'create'])->name('tag.create');
        Route::post('tag-store', [TagController::class, 'store'])->name('tag.store');
        Route::get('tag-edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
        Route::post('tag-update/{id}', [TagController::class, 'update'])->name('tag.update');
        Route::get('tag-destroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy');


        Route::get('guard-type', [GuardTypeController::class, 'index'])->name('guard.type');
        Route::get('guard-type-create', [GuardTypeController::class, 'create'])->name('guard.type.create');
        Route::post('guard-type-store', [GuardTypeController::class, 'store'])->name('guard.type.store');
        Route::get('guard-type-edit/{id}', [GuardTypeController::class, 'edit'])->name('guard.type.edit');
        Route::post('guard-type-update/{id}', [GuardTypeController::class, 'update'])->name('guard.type.update');
        Route::get('guard-type-destroy/{id}', [GuardTypeController::class, 'destroy'])->name('guard.type.destroy');

    });
    Route::prefix('faq')->group(function () {

        Route::get('faq', [FAQController::class, 'index'])->name('faq');
        Route::get('faq-create', [FAQController::class, 'create'])->name('faq.create');
        Route::post('faq-store', [FAQController::class, 'store'])->name('faq.store');
        Route::get('faq-edit/{id}', [FAQController::class, 'edit'])->name('faq.edit');
        Route::post('faq-update/{id}', [FAQController::class, 'update'])->name('faq.update');
        Route::get('faq-destroy/{id}', [FAQController::class, 'destroy'])->name('faq.destroy');

    });


    Route::prefix('project')->group(function () {

        // Route::get('projects', [CmsController::class, 'projects_Index'])->name('projects');
        // Route::get('projectcreate', [CmsController::class, 'project_create'])->name('projectcreate');
        // Route::post('projectadd', [CmsController::class, 'project_add'])->name('projectadd');
        // Route::get('project-edit/{slug}', [CmsController::class, 'project_edit'])->name('project_edit');
        // Route::post('project-update/{id}', [CmsController::class, 'project_update'])->name('project_update');
        // Route::get('projectdestroy/{id}', [CmsController::class, 'project_destroy'])->name('project_destroy');

        Route::get('PageName', [PageNameController::class, 'index'])->name('PageName');
        Route::get('PageName_create', [PageNameController::class, 'create'])->name('PageName_create');
        Route::post('PageName_store', [PageNameController::class, 'store'])->name('PageName_store');
        Route::get('PageName_edit/{id}', [PageNameController::class, 'edit'])->name('PageName_edit');
        Route::post('PageName_update/{id}', [PageNameController::class, 'update'])->name('PageName_update');
        Route::get('PageName_destroy/{id}', [PageNameController::class, 'destroy'])->name('PageName_destroy');

        Route::get('page-content', [CmsController::class, 'projects_Index'])->name('PageContent');
        Route::get('page-content-create', [CmsController::class, 'project_create'])->name('page.content.create');
        Route::post('page-content-store', [CmsController::class, 'project_add'])->name('PageContent_store');
        Route::get('page-content-edit/{id}', [CmsController::class, 'project_edit'])->name('page.content.edit');
        Route::post('page-content-update/{id}', [CmsController::class, 'project_update'])->name('PageContent_update');
        Route::get('page-content-destroy/{id}', [CmsController::class, 'project_destroy'])->name('PageContent_destroy');

        Route::get('logo', [LogoManagerController::class, 'logo_Index'])->name('logo');
        Route::get('logoCreate', [LogoManagerController::class, 'logo_create'])->name('logoCreate');
        Route::post('logoAdd', [LogoManagerController::class, 'logo_add'])->name('logoAdd');
        Route::get('logoEdit/{slug}', [LogoManagerController::class, 'logo_edit'])->name('logoEdit');
        Route::post('logoUpdate/{id}', [LogoManagerController::class, 'logo_update'])->name('logoUpdate');
        Route::get('logodestroy/{id}', [LogoManagerController::class, 'logo_destroy'])->name('logodestroy');

        Route::get('privacy', [PrivacyPolicyController::class, 'privacy_Index'])->name('privacy');
        Route::get('privacyCreate', [PrivacyPolicyController::class, 'privacy_create'])->name('privacyCreate');
        Route::post('privacyAdd', [PrivacyPolicyController::class, 'privacy_add'])->name('privacyAdd');
        Route::get('privacyEdit/{slug}', [PrivacyPolicyController::class, 'privacy_edit'])->name('privacyEdit');
        Route::post('privacyUpdate/{id}', [PrivacyPolicyController::class, 'privacy_update'])->name('privacyUpdate');
        Route::get('privacydestroy/{id}', [PrivacyPolicyController::class, 'privacy_destroy'])->name('privacydestroy');

        Route::get('terms', [TermsConditionController::class, 'terms_Index'])->name('terms');
        Route::get('termsCreate', [TermsConditionController::class, 'terms_create'])->name('termsCreate');
        Route::post('termsAdd', [TermsConditionController::class, 'terms_add'])->name('termsAdd');
        Route::get('termsEdit/{id}', [TermsConditionController::class, 'terms_edit'])->name('termsEdit');
        Route::post('termsUpdate/{id}', [TermsConditionController::class, 'terms_update'])->name('termsUpdate');
        Route::get('termsdestroy/{id}', [TermsConditionController::class, 'terms_destroy'])->name('termsdestroy');


    });


    Route::prefix('general')->group(function () {

        Route::get('social', [SocialController::class, 'index'])->name('social');
        Route::get('socialCreate', [SocialController::class, 'create'])->name('socialCreate');
        Route::post('socialAdd', [SocialController::class, 'store'])->name('socialAdd');
        Route::get('socialEdit/{slug}', [SocialController::class, 'edit'])->name('socialEdit');
        Route::post('socialUpdate/{id}', [SocialController::class, 'update'])->name('socialUpdate');
        Route::get('socialdestroy/{id}', [SocialController::class, 'destroy'])->name('socialdestroy');

        Route::get('congfigration', [ConfigurationController::class, 'index'])->name('congfigration');
        Route::get('congfigrationCreate', [ConfigurationController::class, 'create'])->name('congfigrationCreate');
        Route::post('congfigrationAdd', [ConfigurationController::class, 'store'])->name('congfigrationAdd');
        Route::get('congfigrationEdit/{slug}', [ConfigurationController::class, 'edit'])->name('congfigrationEdit');
        Route::post('congfigrationUpdate/{id}', [ConfigurationController::class, 'update'])->name('congfigrationUpdate');
        Route::get('congfigrationdestroy/{id}', [ConfigurationController::class, 'destroy'])->name('congfigrationdestroy');

    });


    Route::prefix('blog')->group(function () {

        Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
        Route::get('blogCreate', [BlogController::class, 'create'])->name('blogCreate');
        Route::post('blogAdd', [BlogController::class, 'store'])->name('blogAdd');
        Route::get('blogEdit/{slug}', [BlogController::class, 'edit'])->name('blogEdit');
        Route::post('blogUpdate/{id}', [BlogController::class, 'update'])->name('blogUpdate');
        Route::get('blogdestroy/{slug}', [BlogController::class, 'destroy'])->name('blogdestroy');

    });
    Route::prefix('testimonial')->group(function () {


        Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
        Route::get('testimonialCreate', [TestimonialController::class, 'create'])->name('testimonialCreate');
        Route::post('testimonialStore', [TestimonialController::class, 'store'])->name('testimonialStore');
        Route::get('testimonialEdit/{id}', [TestimonialController::class, 'edit'])->name('testimonialEdit');
        Route::post('testimonialUpdate/{id}', [TestimonialController::class, 'update'])->name('testimonialUpdate');
        Route::get('testimonialdestroy/{id}', [TestimonialController::class, 'destroy'])->name('testimonialdestroy');

    });

    Route::prefix('adminVendor')->group(function () {

        Route::get('adminVendor', [VednorsController::class, 'index'])->name('adminVendor');
        Route::get('adminVendor-Create', [VednorsController::class, 'create'])->name('adminVendor-Create');
        Route::post('adminVendor-store', [VednorsController::class, 'store'])->name('adminVendor-store');
        Route::get('adminVendor-Edit/{slug}', [VednorsController::class, 'edit'])->name('adminVendor-Edit');
        Route::post('adminVendor-Update/{id}', [VednorsController::class, 'update'])->name('adminVendor-Update');
        Route::get('adminVendor-destroy/{slug}', [VednorsController::class, 'destroy'])->name('adminVendor-destroy');
        Route::get('/vendor_status/{id?}',[VednorsController::class,'vendor_status'])->name('vendor_status');

    });

    Route::prefix('services')->group(function () {


        Route::get('services', [ServicesController::class, 'index'])->name('services');
        Route::get('services_create', [ServicesController::class, 'create'])->name('services_create');
        Route::post('services_store', [ServicesController::class, 'store'])->name('services_store');
        Route::get('services_edit/{slug}', [ServicesController::class, 'edit'])->name('services_edit');
        Route::post('services_update/{id}', [ServicesController::class, 'update'])->name('services_update');
        Route::get('services_destroy/{slug}', [ServicesController::class, 'destroy'])->name('services_destroy');

        Route::get('location', [LocationController::class, 'index'])->name('location');
        Route::get('location_create', [LocationController::class, 'create'])->name('location_create');
        Route::post('location_store', [LocationController::class, 'store'])->name('location_store');
        Route::get('location_edit/{slug}', [LocationController::class, 'edit'])->name('location_edit');
        Route::post('location_update/{id}', [LocationController::class, 'update'])->name('location_update');
        Route::get('location_destroy/{slug}', [LocationController::class, 'destroy'])->name('location_destroy');

        // Route::resource('languages', LanguageController::class);

        Route::get('languages-index', [LanguageController::class, 'index'])->name('languages.index');
        Route::get('languages-create', [LanguageController::class, 'create'])->name('languages.create');
        Route::post('languages-store', [LanguageController::class, 'store'])->name('languages.store');
        Route::get('languages-edit/{id}', [LanguageController::class, 'edit'])->name('languages.edit');
        Route::post('languages-update/{id}', [LanguageController::class, 'update'])->name('languages.update');
        Route::get('languages-destroy/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
    });


    Route::prefix('ceremony')->group(function () {


            Route::get('admin_wedding',[WeddingController::class,'index'])->name('admin_wedding');
            Route::get('wedding_create', [WeddingController::class, 'create'])->name('wedding_create');
            Route::post('wedding_store', [WeddingController::class, 'store'])->name('wedding_store');
            Route::get('wedding_edit/{id}', [WeddingController::class, 'edit'])->name('wedding_edit');
            Route::get('wedding_show/{slug}', [WeddingController::class, 'show'])->name('wedding_show');
            Route::post('wedding_update/{slug}', [WeddingController::class, 'update'])->name('wedding_update');
            Route::get('wedding_destroy/{id}', [WeddingController::class, 'destroy'])->name('wedding_destroy');

            // new work
            Route::get('delete-eng-img',[WeddingController::class,'deleteweddingimg'])->name('delete-eng-img');
            Route::post('services_type_vendors',[WeddingController::class,'servicestypevendors'])->name('services_type_vendors');
            // new work
            Route::get('admin_engagement', [EngagementController::class, 'index'])->name('admin_engagement');
            Route::get('engagement_create', [EngagementController::class, 'create'])->name('engagement_create');
            Route::post('engagement_store', [EngagementController::class, 'store'])->name('engagement_store');
            Route::get('engagement_show/{slug}', [EngagementController::class, 'show'])->name('engagement_show');

            Route::get('engagement_edit/{slug}', [EngagementController::class, 'edit'])->name('engagement_edit');
            Route::post('engagement_update/{slug}', [EngagementController::class, 'update'])->name('engagement_update');
            Route::get('engagement_destroy/{slug}', [EngagementController::class, 'destroy'])->name('engagement_destroy');
            Route::get('delete-wedd-img',[EngagementController::class,'deleteimg'])->name('delete-wedd-img');
            Route::post('services_type_engagement',[EngagementController::class,'servicestypeengagement'])->name('services_type_engagement');

    });

    Route::prefix('contact')->group(function () {

        Route::get('contact', [ContactManagementController::class, 'index'])->name('contact');
        Route::get('contactCreate', [ContactManagementController::class, 'create'])->name('contactCreate');
        Route::post('contactAdd', [ContactManagementController::class, 'store'])->name('contactAdd');
        Route::get('contactEdit/{slug}', [ContactManagementController::class, 'edit'])->name('contactEdit');
        Route::post('contactUpdate/{id}', [ContactManagementController::class, 'update'])->name('contactUpdate');
        Route::get('contactdestroy/{id}', [ContactManagementController::class, 'destroy'])->name('contactdestroy');
    });

    Route::prefix('Inquiry')->group(function () {

        Route::get('Inquiry', [InquiryController::class, 'index'])->name('Inquiry');
        Route::get('InquiryCreate', [InquiryController::class, 'create'])->name('InquiryCreate');
        Route::post('InquiryAdd', [InquiryController::class, 'store'])->name('InquiryAdd');
        Route::get('InquiryEdit/{id}', [InquiryController::class, 'edit'])->name('InquiryEdit');
        Route::post('InquiryUpdate/{id}', [InquiryController::class, 'update'])->name('InquiryUpdate');
        Route::get('InquiryShow/{id}', [InquiryController::class, 'show'])->name('InquiryShow');
        Route::get('Inquiryldestroy/{id}', [InquiryController::class, 'destroy'])->name('Inquirydestroy');

    });


    Route::prefix('event')->group(function () {

        Route::get('event', [EventManagementController::class, 'index'])->name('event');
        Route::get('eventCreate', [EventManagementController::class, 'create'])->name('eventCreate');
        Route::post('eventAdd', [EventManagementController::class, 'store'])->name('eventAdd');
        Route::get('eventEdit/{slug}', [EventManagementController::class, 'edit'])->name('eventEdit');
        Route::post('eventUpdate/{id}', [EventManagementController::class, 'update'])->name('eventUpdate');
        Route::get('eventdestroy/{slug}', [EventManagementController::class, 'destroy'])->name('eventdestroy');
    });

    Route::prefix('Package')->group(function () {

        Route::get('Package', [PackageManagementController::class, 'index'])->name('Package');
        Route::get('Package_create', [PackageManagementController::class, 'create'])->name('Package_create');
        Route::post('Package_store', [PackageManagementController::class, 'store'])->name('Package_store');
        Route::get('Package_edit/{slug}', [PackageManagementController::class, 'edit'])->name('Package_edit');
        Route::post('Package_update/{id}', [PackageManagementController::class, 'update'])->name('Package_update');
        Route::get('Package_destroy/{slug}', [PackageManagementController::class, 'destroy'])->name('Package_destroy');

    });


    Route::prefix('paypal')->group(function () {

        // =============== Paypal Product ==================//

        Route::get('product-list', [PaypalProductController::class, 'index'])->name('product.list');
        Route::get('product-create', [PaypalProductController::class, 'create'])->name('product.create');
        Route::post('product-store', [PaypalProductController::class, 'store'])->name('product.store');
        Route::get('product-edit/{id}', [PaypalProductController::class, 'edit'])->name('product.edit');
        Route::post('product-update/{id}', [PaypalProductController::class, 'update'])->name('product.update');
        Route::get('product-show/{product_id}', [PaypalProductController::class, 'show'])->name('product.show');


        // =============== Paypal Payment Plans==================//

        Route::get('plans-index', [PaypalPlansController::class, 'index'])->name('plans.index');
        Route::get('plans-create/{product_id}', [PaypalPlansController::class, 'create'])->name('Plans.create');
        Route::post('plans-store', [PaypalPlansController::class, 'store'])->name('plans.store');
        Route::get('product-suspend/{plan_id}', [PaypalPlansController::class, 'suspend'])->name('product.suspend');
        Route::get('plans-edit/{id}', [PaypalPlansController::class, 'edit'])->name('plans.edit');
        Route::post('plans-price.update', [PaypalPlansController::class, 'updateprice'])->name('plans.updateprice');
        // =============== Paypal Subscriptions ==================//

        Route::get('subcription-index', [PaypalSubcriptionController::class, 'index'])->name('subcription.index');
        Route::get('paypal-subcription/{id}', [PaypalSubcriptionController::class, 'paypal'])->name('paypal.subcription');
        Route::get('store-paypal-payment', [PaypalSubcriptionController::class, 'store_payment'])->name('storepaypal_payment');
        Route::get('paypal-subcription-update/{id}', [PaypalSubcriptionController::class, 'updatepaypal'])->name('subcription.updatepaypal');
        Route::get('paypal-amount-update/{id}', [PaypalSubcriptionController::class, 'updatepaypalamount'])->name('updatepaypal.amount');
        Route::get('subcription-updatepaypal_payment', [PaypalSubcriptionController::class, 'updatepaypal_payment'])->name('subcription.updatepaypal_payment');
        Route::get('show-paypal-payment/{package_id}', [PaypalSubcriptionController::class, 'paypalshowpayment'])->name('showpaypal.payment');
        Route::get('cancel-paypal-payment/{package_id}', [PaypalSubcriptionController::class, 'cancelpaypalrepayment'])->name('cancel.paypal.payment');
        Route::post('suspend-paypal-payment/{package_id}', [PaypalSubcriptionController::class, 'Suspendpaypalrepayment'])->name('paypal.suspend.payment');
        Route::post('reactive-paypal-payment/{package_id}', [PaypalSubcriptionController::class, 'reactivepaypalrepayment'])->name('paypal.reactive.payment');


        // =============== Paypal Single payment ==================//

        // Route::get('single-payment-index', [SinglePaypalController::class, 'index'])->name('single.payment.index');
        // Route::get('singlepayment-button/{id}', [SinglePaypalController::class, 'singlepaypalbutton'])->name('singlepayment.button');
        // Route::post('store-single-payment', [SinglePaypalController::class, 'storeSinglepayment'])->name('storesingle_payment');
        // Route::get('show-paypal-payment', [SinglePaypalController::class, 'payments'])->name('single.payment.show');
        // Route::post('single-payments-show/{payment_id}', [SinglePaypalController::class, 'showSinglepayment'])->name('single.paypal.packages.show');
        // Route::post('single-payments-refund/{payment_id}', [SinglePaypalController::class, 'refundSinglepayment'])->name('single.paypal.packages.refund');
        // Route::get('single-payments-showRefund/{payment_id}', [SinglePaypalController::class, 'showRefundedpaymentdetails'])->name('single.paypal.packages.showRefund');



        // =============== Paypal Payment Packages==================//

        // Route::get('plans-list', [PaypalPackagesController::class, 'plans'])->name('paypal.plans.list');
        // Route::get('packages', [PaypalPackagesController::class, 'index'])->name('paypal.packages');
        // Route::get('Package-create', [PaypalPackagesController::class, 'create'])->name('paypal.packages.create');
        // Route::post('Package-store', [PaypalPackagesController::class, 'store'])->name('paypal.packages.store');
        // Route::get('Package-edit/{id}', [PaypalPackagesController::class, 'edit'])->name('paypal.packages.edit');
        // Route::post('Package-update/{id}', [PaypalPackagesController::class, 'update'])->name('paypal.packages.update');
        // Route::get('Package-destroy/{id}', [PaypalPackagesController::class, 'destroy'])->name('paypal.packages.destroy');
        // Route::post('package-paymentupdate/{id}', [PaypalPackagesController::class, 'paymentupdate'])->name('paypal.package.payment.update');
        // Route::post('package.paymentSuspend/{id}', [PaypalPackagesController::class, 'paymentSuspend'])->name('paypal.package.payment.Suspend');

    });


    // =============== Stripe ==================//
    Route::prefix('stripePackages')->group(function () {

        Route::get('stripePackages', [StripPackageManagementControler::class, 'index'])->name('stripePackages');
        Route::get('Package-create', [StripPackageManagementControler::class, 'create'])->name('stripePackages_create');
        Route::post('Package-store', [StripPackageManagementControler::class, 'store'])->name('stripePackages_store');
        Route::get('stripe-Package-edit/{slug}', [StripPackageManagementControler::class, 'edit'])->name('stripePackages_edit');
        Route::post('stripe-Package-update/{plan_id}', [StripPackageManagementControler::class, 'update'])->name('stripePackages_update');
        Route::get('stripe-Package-destroy/{plan_id}', [StripPackageManagementControler::class, 'destroy'])->name('stripePackages_destroy');
    });


});

    Route::get('plans-subscribe', [StripSubcriptionControler::class, 'subscribe'])->name('plans.subscribe');
    Route::get('plans-checkout/{slug}', [StripSubcriptionControler::class, 'checkout'])->name('plans.checkout');
    Route::post('stripe-subcription', [StripSubcriptionControler::class, 'subcription'])->name('stripe.subcription');
    Route::get('show-subscription', [StripPackageManagementControler::class, 'showsubscription'])->name('show.subscription');
    Route::get('cancel-user-subscription', [StripPackageManagementControler::class, 'cancel_subscription'])->name('cancel.user.subscription');
    Route::get('resume-subscription', [StripPackageManagementControler::class, 'resume_subscription'])->name('subscriptions.resume');
    Route::get('refund-subscription', [StripSubcriptionControler::class, 'refund_subscription'])->name('subscriptions.refund');
    Route::get('cancel-subscription', [StripSubcriptionControler::class, 'cancel_plan'])->name('cancelplan');
    Route::get('edit-subscription/{id}', [StripSubcriptionControler::class, 'edit_plan'])->name('subscription.edit');
    Route::get('update-subscription/{id}', [SubscriptionController::class, 'update_plan'])->name('subscription.update');


    /*
    |--------------------------------------------------------------------------
    | User Dashboard Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register User routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "User" middleware group. Now create something great!
    |
    */

    Route::get('/clear', function() {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        // return "Cache is cleared";
        return back()->with("Cache is cleared");
    })->name('clear.cache');




    Route::post('user-login',[UserLoginController::class,'userlogin'])->name('user.login');
    Route::post('user-sign-up',[UserLoginController::class,'user_signup'])->name('user.signup');
    Route::get('/password/reset', 'App\Http\Controllers\PasswordResetController@showResetForm')->name('password.reset');


    // Route::get('/password/reset',[PasswordResetController::class,'showResetForm'])->name('password.reset');
    // Route::get('chatify')->name('chatify');
    // Route::get('/chatify', [HomeController::class, 'chatify'])->name('chatify');
    // Route::get('/chatify',[GuardHireController::class,'chatify'])->name('chatify.index');


    Route::get('/',[GuardHireController::class,'index'])->name('home');
    Route::get('how-it-works',[GuardHireController::class,'how_it_works'])->name('how.it.works');
    Route::get('browse-services',[GuardHireController::class,'browse_services'])->name('browse.services');
    Route::get('group-security/{id}',[GuardHireController::class,'group_security'])->name('group.security');
    Route::get('browse-requests',[GuardHireController::class,'browse_quotes'])->name('browse.quotes');
    Route::get('our-packages',[GuardHireController::class,'our_packages'])->name('our.packages');
    Route::get('body-guard-event/{id}',[GuardHireController::class,'body_guard_event'])->name('body.guard.event');
    Route::get('browse-companies',[GuardHireController::class,'browse_companies'])->name('browse.companies');
    Route::get('company/{id}',[GuardHireController::class,'company'])->name('company');
    Route::get('site-blogs',[GuardHireController::class,'blogs'])->name('site.blogs');
    Route::get('inner-blog/{slug}',[GuardHireController::class,'inner_blog'])->name('inner.blog');
    Route::get('terms-conditions',[GuardHireController::class,'terms_conditions'])->name('terms.conditions');
    Route::get('privacy-policy',[GuardHireController::class,'privacy_policy'])->name('privacy.policy');
    Route::get('sign-in',[GuardHireController::class,'frontend_signin'])->name('frontend.signin');
    Route::get('sign-up',[GuardHireController::class,'frontend_signup'])->name('frontend.signup');
    Route::post('user_subcription', [GuardHireController::class, 'user_subcription'])->name('user_subcription');
    Route::get('client-dashboard',[GuardHireController::class,'client_dashboard'])->name('client.dashboard');
    Route::get('guard-dashboard',[GuardHireController::class,'guard_dashboard'])->name('guard.dashboard');
    // Route::view('guard-dashboard')->name('guard.dashboard');
    Route::get('apply-howitworks-search',[ApplyFiltersController::class,'apply_howitworks_search'])->name('apply.howitworks.search');


    Route::middleware(['preventBackHistory','UserCheck'])->group(function () {

        Route::get('user-logout',[UserLoginController::class,'userlogout'])->name('user.logout');
        Route::post('user-update-password',[UserLoginController::class,'updatepassword'])->name('user.update.password');
            // =============== Guad Router =============================
        Route::post('user-contact', [GuardHireController::class, 'contact_process'])->name('user.contact.process');
        Route::post('guard-profile-update',[GuardController::class,'guard_profile'])->name('guard.profile.update');
        Route::get('guard-job-status/{id}',[GuardController::class,'guard_status'])->name('guard.job.status');
        Route::get('guard-job-delete/{id}',[GuardController::class,'guard_delete'])->name('guard.job.delete');
        Route::post('guard-job-store',[GuardController::class,'job_store'])->name('guard.job.store');
        Route::post('guard-job-edit',[GuardJobController::class,'job_edit'])->name('guard.job.edit');
        Route::post('guard-job-update',[GuardJobController::class,'job_update'])->name('guard.job.update');
        Route::get('guard-jobimage-delete/{id}',[GuardJobController::class,'jobimagedelete'])->name('guard.jobimage.delete');
        Route::post('client-info-guardtab-edit',[GuardJobController::class,'client_info_edit'])->name('client.info.edit');
        Route::post('client-comment-guard-tab',[GuardJobController::class,'client_comment_modal'])->name('client.comment.modal');
        Route::post('store-client-request-rating',[GuardJobController::class,'store_hire_client_rating'])->name('store.client.request.rating');

            // =============== client Routes =============================
        Route::post('hire.guard.info',[ClientController::class,'hire_Guard_info'])->name('hire.guard.info');
        Route::post('store-hire-guard-listing-rating',[ClientController::class,'store_hire_Guard_rating'])->name('store.hire.guard.rating');
        Route::post('hire.companies.info',[ClientController::class,'hire_companies_info'])->name('hire.companies.info');
        Route::post('store-guard-companies-rating',[ClientController::class,'store_hire_Company_rating'])->name('store.guard.companies.rating');
        Route::post('client-profile-update',[ClientController::class,'client_profile'])->name('client.profile.update');
        Route::post('client-job-store',[ClientController::class,'post_job_store'])->name('client.post.job');
        Route::post('client.job.edit',[ClientController::class,'clientjob_edit'])->name('client.job.edit');
        Route::get('client-jobimage-delete/{id}',[ClientController::class,'clientjobimagedelete'])->name('client.jobimage.delete');
        Route::get('client-job-status/{id}',[ClientController::class,'client_status'])->name('client.job.status');
        Route::post('client-post-job-update',[ClientController::class,'client_job_update'])->name('client.post.job.update');
        Route::get('client-job-delete/{id}',[ClientController::class,'client_delete'])->name('client.job.delete');
        Route::post('guard-portfolio-store',[PortfolioController::class,'store'])->name('guard.portfolio.store');
        Route::get('guard-portfolio-delete/{id}',[PortfolioController::class,'delete'])->name('guard.portfolio.delete');

        // === Client Can use this two ways to filter data
        Route::get('apply-companies-search',[ApplyFiltersController::class,'apply_Companies_search'])->name('apply.companies.search');
        Route::get('apply-browes-services-search',[ApplyFiltersController::class,'apply_browes_services_search'])->name('apply.browes.services.search');

        // === Guard Can use browes quotes-search
        Route::get('apply-browes-quotes-search',[ApplyFiltersController::class,'apply_browes_quotes_search'])->name('apply.browes.quotes.search');

        Route::get('client-wishlist-delete/{id}',[WishlistController::class,'delete_wishlist'])->name('client.wishlist.delete');
        Route::post('wishlist-job-save',[WishlistController::class,'save_wishlist'])->name('wishlist.job.save');
        Route::get('compnay-wishlist-delete/{id}',[WishlistController::class,'delete_compnay_wishlist'])->name('compnay.wishlist.delete');
        Route::post('wishlist-company-save',[WishlistController::class,'save_company_wishlist'])->name('wishlist.company.save');
        Route::post('compnay-wishlist-hire', [WishlistController::class, 'hireCompnayAction'])->name('compnay.wishlist.hire');
        Route::post('listing-wishlist-hired-data', [WishlistController::class, 'hirelistingAction'])->name('listing.wishlist.hire');
        // ==================== Guard Hire Routes =====================!
        Route::post('user_profile_update',[WebsiteController::class,'profileupdate'])->name('user_profile_update');
        Route::get('vendor-dashboard',[WebsiteController::class,'vendorIndex'])->name('vendor-dashboard');
        Route::get('vendor-gallery',[WebsiteController::class,'vendor_gallery'])->name('vendor_gallery');
        Route::post('vendor_gallery_update',[WebsiteController::class,'vendor_galleryUpdate'])->name('vendor_gallery_update');
        Route::get('about-vendor',[WebsiteController::class,'about_vendor'])->name('about_vendor');
        Route::get('contact-vendor',[WebsiteController::class,'contact_vendor'])->name('contact_vendor');
        Route::get('contact-delete/{id}',[WebsiteController::class,'contactDelete'])->name('contact_delete');
        Route::get('delete-vendor-img',[WebsiteController::class,'deletevendorimg'])->name('delete-vendor-img');
        Route::get('vendor-social',[WebsiteController::class,'vendor_social'])->name('vendor_social');
        Route::get('vendor-social-create',[WebsiteController::class,'social_create'])->name('vendor_social_create');
        Route::post('vendor_social_store',[WebsiteController::class,'social_store'])->name('vendor_social_store');
        Route::get('vendor_social_edit/{slug}',[WebsiteController::class,'vendor_social_edit'])->name('vendor_social_edit');
        Route::post('vendor_social_update/{id}',[WebsiteController::class,'social_update'])->name('vendor_social_update');
        Route::get('vendor-reviews',[WebsiteController::class,'vendor_reviews'])->name('vendor_reviews');
        Route::get('vendor-packageUpdate',[WebsiteController::class,'packageUpdate'])->name('vendor_packageUpdate');
        Route::get('vendor_payment_package',[WebsiteController::class,'vendor_payment'])->name('vendor_payment_package');
        Route::get('vendor_payment_pay',[WebsiteController::class,'pay_payment'])->name('vendor_payment_pay');
        Route::get('edit-vendor-profile',[WebsiteController::class,'editVendorProfile'])->name('edit-vendor-profile');
        Route::post('vendor_profile_update',[WebsiteController::class,'VendorProfileUpdate'])->name('vendor_profile_update');
        Route::post('about_vendor_profile/{id}',[WebsiteController::class,'about_vendor_profile'])->name('about_vendor_profile');
        Route::get('user-engagement',[UserEngagementController::class,'Index'])->name('user-engagement');
        Route::get('user-engagement-create',[UserEngagementController::class,'create'])->name('user-engagement-create');
        Route::post('user_engagement_store',[UserEngagementController::class,'store'])->name('user_engagement_store');
        Route::get('user-engagement-edit/{slug}',[UserEngagementController::class,'edit'])->name('user_engagement_edit');
        Route::post('user_engagement_update/{slug}',[UserEngagementController::class,'update'])->name('user_engagement_update');
        Route::get('user-engagement-show/{slug}',[UserEngagementController::class,'show'])->name('user_engagement_show');
        Route::get('user-engagement-destroy/{slug}',[UserEngagementController::class,'destroy'])->name('user_engagement_destroy');
        // New Work
        Route::get('delete-engagement-img',[UserEngagementController::class,'deleteengagementimg'])->name('delete-engagement-img');
        // new work
        Route::get('user-wedding',[UserWeddingController::class,'Index'])->name('user-wedding');
        Route::get('user-wedding-create',[UserWeddingController::class,'create'])->name('user-wedding-create');
        Route::post('user_wedding_store',[UserWeddingController::class,'store'])->name('user_wedding_store');
        Route::get('user_wedding_edit/{slug}',[UserWeddingController::class,'edit'])->name('user_wedding_edit');
        Route::post('user_wedding_update/{slug}',[UserWeddingController::class,'update'])->name('user_wedding_update');
        Route::get('user_wedding_destroy/{slug}',[UserWeddingController::class,'destroy'])->name('user_wedding_destroy');
        Route::get('user_wedding_show/{slug}',[UserWeddingController::class,'show'])->name('user_wedding_show');
        Route::post('user_gallery_store',[UserWeddingController::class,'gallerystore'])->name('user_gallery_store');
        Route::get('wedding_gallery',[UserWeddingController::class,'gallery'])->name('wedding_gallery');
        // new work
        Route::get('del-user-wed',[UserWeddingController::class,'deleteuserwedding'])->name('del-user-wed');
        Route::post('services_type_status',[UserWeddingController::class,'services_type_status'])->name('services_type_status');
        Route::get('change-password',[WebsiteController::class,'changepassword'])->name('change-password');
        Route::post('user_update_password',[WebsiteController::class,'updatepassword'])->name('user_update_password');

    });

    /*
    |--------------------------------------------------------------------------
    | Frontend Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register Front End routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "Front End" middleware group. Now create something great!
    |
    */


    Route::get('/forget-password',[GuardHireController::class,'forgetPassword'])->name('forget-password');
    Route::post('/forget_password_process',[GuardHireController::class,'forgetPasswordProcess'])->name('forget_password_process');
    Route::get('/reset-password/{token}',[GuardHireController::class,'getPassword'])->name('reset-password');
    Route::post('/update_password',[GuardHireController::class,'updateforgetpassword'])->name('update_password');
    Route::get('/payment',[GuardHireController::class,'payment'])->name('payment');
    Route::get('get_client_job_page',[GuardHireController::class,'get_client_job_id'])->name('get_client_job_page');
    Route::post('confirm_user_credits',[GuardHireController::class,'confirm_user_credits'])->name('confirm_user_credits');
    Route::post('credit_client_job_details',[GuardHireController::class,'credit_client_job_details'])->name('credit_client_job_details');
    Route::get('/pay-amount',[GuardHireController::class,'pay_amount'])->name('pay_amount');
    Route::get('store-user-payment', [GuardHireController::class, 'store_user_payment'])->name('store_user_payment');
    // Route::post('guard-credit-point-store', [GuardHireController::class, 'store_user_credit'])->name('guard.credit.point.store');
    Route::get('update_guard_payment', [GuardHireController::class, 'update_guard_payment'])->name('update_guard_payment');
    Route::get('stripe-payment-page/{slug}',[GuardHireController::class,'stripe_payment_page'])->name('stripe.payment.page');
    // Route::post('user_subcription', [WebsiteController::class, 'user_subcription'])->name('user_subcription');


    /*
    |--------------------------------------------------------------------------
    | Theme made Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register Theme routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "Theme" middleware group. Now create something great!
    |
    */
    // Redirect to error page  when no any route found
    Route::any('{url}', function(){
        return view('404');
    })->where('url', '.*');


    Route::get('/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');
        Artisan::call('storage:link');
        return view('clear');
    });

    //Language Change
    Route::get('lang/{locale}', function ($locale) {

        if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
            abort(400);
        }
        Session()->put('locale', $locale);
        Session::get('locale');
        return redirect()->back();

    })->name('lang');

     // Redirect to ctripe cancel page  when no any route found
     Route::get('stripe-cancelled-page', function(){
        return view('404');
    })->where('stripe.cancelled.page');















