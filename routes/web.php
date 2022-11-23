<?php

use App\Http\Livewire\Admin\AdminAddBistroTestimonialsComponent;
use App\Http\Livewire\Admin\AdminAddBlogComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddMenuComponent;
use App\Http\Livewire\Admin\AdminAddPageCategoryComponent;
use App\Http\Livewire\Admin\AdminAddPageComponent;
use App\Http\Livewire\Admin\AdminAddSpecialsComponent;
use App\Http\Livewire\Admin\AdminAddTeamComponent;
use App\Http\Livewire\Admin\AdminAddTestimonilsComponent;
use App\Http\Livewire\Admin\AdminAddTrustedComponent;
use App\Http\Livewire\Admin\AdminBistroTestimonialsComponent;
use App\Http\Livewire\Admin\AdminBlogComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditBistroTestimonialsComponent;
use App\Http\Livewire\Admin\AdminEditBlogComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditMenuComponent;
use App\Http\Livewire\Admin\AdminEditPageCategoryComponent;
use App\Http\Livewire\Admin\AdminEditPageComponent;
use App\Http\Livewire\Admin\AdminEditSpecialsComponent;
use App\Http\Livewire\Admin\AdminEditTeamComponent;
use App\Http\Livewire\Admin\AdminEditTestimonilsComponent;
use App\Http\Livewire\Admin\AdminEditTrustedComponent;
use App\Http\Livewire\Admin\AdminMenuComponent;
use App\Http\Livewire\Admin\AdminPageCategoryComponent;
use App\Http\Livewire\Admin\AdminPageComponent;
use App\Http\Livewire\Admin\AdminReservationsComponent;
use App\Http\Livewire\Admin\AdminSpecialsComponent;
use App\Http\Livewire\Admin\AdminTeamComponent;
use App\Http\Livewire\Admin\AdminTestimonialsComponent;
use App\Http\Livewire\Admin\AdminTrustedComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\BistoBlogComponent;
use App\Http\Livewire\Pages\BistoBlogSingleImageComponent;
use App\Http\Livewire\Pages\BistoShopComponent;
use App\Http\Livewire\Pages\BistroHomeComponent;
use App\Http\Livewire\Pages\BistoContactComponent;
use App\Http\Livewire\Pages\BistoGalleryComponent;
use App\Http\Livewire\Pages\BistoRecipieComponent;
use App\Http\Livewire\Pages\BistoMainMenuComponent;
use App\Http\Livewire\Pages\BistroAboutUsComponent;
use App\Http\Livewire\Pages\BistroMenuTileComponent;
use App\Http\Livewire\Pages\CategoryComponent;
use App\Http\Livewire\Pages\ReservationIndexComponent;
use App\Http\Livewire\User\UserDashboardComponent;

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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', BistroHomeComponent::class);
Route::get('/about', BistroAboutUsComponent::class);
Route::get('/menu', BistoMainMenuComponent::class);
Route::get('/reservation', ReservationIndexComponent::class);
Route::get('/contact', BistoContactComponent::class);
Route::get('/gallery', BistoGalleryComponent::class);
Route::get('/recipe', BistoRecipieComponent::class);
Route::get('/blog', BistoBlogComponent::class);
Route::get('/single-blog/{slug}', BistoBlogSingleImageComponent::class)->name('single-blog');
Route::get('/blog-category/{category_slug}', CategoryComponent::class)->name('blog.category');
Route::get('/shop', BistoShopComponent::class);

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/

//For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class);
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class);
    //For Pages
    Route::get('/admin/page', AdminPageComponent::class)->name('admin.page');
    Route::get('/admin/add-page', AdminAddPageComponent::class)->name('admin.addpage');
    Route::get('/admin/edit-page/{slug}', AdminEditPageComponent::class)->name('admin.editpage');
    //For Today's Specials
    Route::get('/admin/specials', AdminSpecialsComponent::class)->name('admin.specials');
    Route::get('/admin/add-specials', AdminAddSpecialsComponent::class)->name('admin.addspecials');
    Route::get('/admin/edit-specials/{slug}', AdminEditSpecialsComponent::class)->name('admin.editspecials');
    //For Reservations
    Route::get('/admin/reservations', AdminReservationsComponent::class)->name('admin.reservations');
    Route::get('/admin/reservations/{slug}', AdminReservationsComponent::class)->name('admin.editreservations');
    //For Blog
    Route::get('/admin/blog', AdminBlogComponent::class)->name('admin.blog');
    Route::get('/admin/add-blog', AdminAddBlogComponent::class)->name('admin.addblog');
    Route::get('/admin/edit-blog/{slug}', AdminEditBlogComponent::class)->name('admin.editblog');
    //For Menu
    Route::get('/admin/menu', AdminMenuComponent::class)->name('admin.menu');
    Route::get('/admin/add-menu', AdminAddMenuComponent::class)->name('admin.addmenu');
    Route::get('/admin/edit-menu/{slug}', AdminEditMenuComponent::class)->name('admin.editmenu');
    //For Menu Category
    Route::get('/admin/category', AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/add-category', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/edit-category/{slug}/{scatagory_slug?}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    //For Trusted
    Route::get('/admin/trusted', AdminTrustedComponent::class)->name('admin.trusted');
    Route::get('/admin/add-trusted', AdminAddTrustedComponent::class)->name('admin.addtrusted');
    Route::get('/admin/edit-trusted/{slug}', AdminEditTrustedComponent::class)->name('admin.edittrusted');
    //For Testimonil
    Route::get('/admin/testimonil', AdminBistroTestimonialsComponent::class)->name('admin.testimonil');
    Route::get('/admin/add-testimonil', AdminAddBistroTestimonialsComponent::class)->name('admin.addtestimonil');
    Route::get('/admin/edit-testimonil/{slug}', AdminEditBistroTestimonialsComponent::class)->name('admin.edittestimonil');
    //For Page Category
    Route::get('/admin/page-category', AdminPageCategoryComponent::class)->name('admin.pcategory');
    Route::get('/admin/add-page-category', AdminAddPageCategoryComponent::class)->name('admin.addpcategory');
    Route::get('/admin/edit-page-category/{slug}', AdminEditPageCategoryComponent::class)->name('admin.editpcategory');
    //For Team
    Route::get('/admin/team', AdminTeamComponent::class)->name('admin.team');
    Route::get('/admin/add-team', AdminAddTeamComponent::class)->name('admin.addteam');
    Route::get('/admin/edit-team/{slug}', AdminEditTeamComponent::class)->name('admin.editteam');
});
