<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\AchievementController;
use App\Http\Controllers\backend\CallController;
use App\Http\Controllers\backend\CowController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\FarmerController;
use App\Http\Controllers\backend\MaizeController;
use App\Http\Controllers\backend\RiceController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\backend\WhyChooseController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'aboutUs']);
Route::get('/loan/{id}', [FrontendController::class, 'Loan']);
Route::get('/rice-loan', [FrontendController::class, 'riceLoan']);
Route::get('/cow-loan', [FrontendController::class, 'cowLoan']);
Route::get('/farmer', [FrontendController::class, 'farmer']);
Route::get('/invesment', [FrontendController::class, 'invesment']);
Route::get('/agent', [FrontendController::class, 'agent']);
Route::get('/admin', [FrontendController::class, 'admin']);
Route::get('/bkash', [FrontendController::class, 'bkash']);
Route::get('/nagad', [FrontendController::class, 'nagad']);
Route::get('/roket', [FrontendController::class, 'rocket']);
Route::get('/bank', [FrontendController::class, 'bank']);
Route::get('/contact', [FrontendController::class, 'contactUs']);

Route::post('/farmer-register', [FrontendController::class, 'register'])->name('farmer.register');


///AdminAuth.........
Route::get('/admin/login', [AdminAuthController::class, 'loginForm']);
Route::get('/admin/logout', [AdminAuthController::class, 'logOut']);

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'adminDashbord']);

// ==========================================
// Maize (ভুট্টা) Section Routes - Normal Flow
// ==========================================
Route::get('/admin/maize', [MaizeController::class, 'maizeAdmin'])->name('maize.index');
Route::post('/admin/maize/update/{id}', [MaizeController::class, 'maizeUpdate'])->name('maize.update');

// Maize Benefits
Route::get('/admin/maize/benefit-list/{id}', [MaizeController::class, 'maizeCard'])->name('maize.benefit.index');
Route::post('/admin/maize/benefit/save/{service_id}', [MaizeController::class, 'benefitSave'])->name('maize.benefit.save');
Route::put('/admin/maize/benefits/update/{id}', [MaizeController::class, 'benefitUpdate'])->name('maize.benefit.update');
Route::delete('/admin/maize/benefits/delete/{id}', [MaizeController::class, 'benefitDelete'])->name('maize.benefit.delete');

// Maize FAQ
Route::get('/admin/maize/faq/{id}', [MaizeController::class, 'maizeFaq'])->name('maize.faq.index');
Route::post('/admin/maize/faq/store', [MaizeController::class, 'store'])->name('faq.store');
Route::put('/admin/maize/faq/update/{id}', [MaizeController::class, 'update'])->name('faq.update');
Route::delete('/admin/maize/faq/delete/{id}', [MaizeController::class, 'delete'])->name('faq.delete');


// ==========================================
// Rice (ধান) Section Routes - Normal Flow
// ==========================================
Route::get('/admin/rice/{id}', [RiceController::class, 'riceAdmin'])->name('rice.index');
Route::post('/admin/rice/update/{id}', [RiceController::class, 'riceUpdate'])->name('rice.update');

// Rice Benefits
Route::get('/admin/rice/benefit-list/{id}', [RiceController::class, 'benefitCard'])->name('rice.benefit.index');
Route::post('/admin/rice/benefit/save/{service_id}', [RiceController::class, 'benefitSave'])->name('rice.benefit.save');
Route::put('/admin/rice/benefits/update/{id}', [RiceController::class, 'benefitUpdate'])->name('rice.benefit.update');
Route::delete('/admin/rice/benefits/delete/{id}', [RiceController::class, 'benefitDelete'])->name('rice.benefit.delete');

// Rice FAQ
Route::get('/admin/rice/faq/{id}', [RiceController::class, 'riceFaq'])->name('rice.faq.index');
Route::post('/admin/rice/faq/store', [RiceController::class, 'store'])->name('rice.faq.store');
Route::put('/admin/rice/faq/update/{id}', [RiceController::class, 'update'])->name('rice.faq.update');
Route::delete('/admin/rice/faq/delete/{id}', [RiceController::class, 'delete'])->name('rice.faq.delete');


// ==========================================
// Cow (গরু পালন ঋণ) Section Routes - Normal Flow
// ==========================================
Route::get('/admin/cow/{id}', [CowController::class, 'cowAdmin'])->name('cow.index');
Route::post('/admin/cow/update/{id}', [CowController::class, 'cowUpdate'])->name('cow.update');

// Cow Benefits
Route::get('/admin/cow/benefit-list/{id}', [CowController::class, 'benefitCard'])->name('cow.benefit.index');
Route::post('/admin/cow/benefit/save/{service_id}', [CowController::class, 'benefitSave'])->name('cow.benefit.save');
Route::put('/admin/cow/benefits/update/{id}', [CowController::class, 'benefitUpdate'])->name('cow.benefit.update');
Route::delete('/admin/cow/benefits/delete/{id}', [CowController::class, 'benefitDelete'])->name('cow.benefit.delete');

// Cow FAQ
Route::get('/admin/cow/faq/{id}', [CowController::class, 'cowFaq'])->name('cow.faq.index');
Route::post('/admin/cow/faq/store', [CowController::class, 'store'])->name('cow.faq.store');
Route::put('/admin/cow/faq/update/{id}', [CowController::class, 'update'])->name('cow.faq.update');
Route::delete('/admin/cow/faq/delete/{id}', [CowController::class, 'delete'])->name('cow.faq.delete');


//////Farmer///
Route::get('/admin/farmers', [FarmerController::class, 'index']);
Route::get('/admin/farmers/approved', [FarmerController::class, 'approvedList']);
Route::get('/admin/farmer-approve/{id}', [FarmerController::class, 'approve']);
Route::get('/admin/farmer-reject/{id}', [FarmerController::class, 'reject']);

//About......
Route::get('/admin/about-section', [AboutController::class, 'index'])->name('about.section');
Route::post('/admin/about-section/update/{key}', [AboutController::class, 'update'])->name('about.section.update');


//team.....
Route::get('/teams', [TeamController::class, 'index'])->name('team.index');
Route::post('/teams/store', [TeamController::class, 'store'])->name('team.store');
Route::post('/teams/update/{id}', [TeamController::class, 'update'])->name('team.update');
Route::get('/teams/delete/{id}', [TeamController::class, 'destroy'])->name('team.delete');

//Achivement.....
Route::get('/admin/achievements', [AchievementController::class, 'index'])->name('achievement.index');
Route::post('/admin/achievements/store', [AchievementController::class, 'store'])->name('achievement.store');
Route::post('/admin/achievements/update/{id}', [AchievementController::class, 'update'])->name('achievement.update');
Route::get('/admin/achievements/delete/{id}', [AchievementController::class, 'destroy'])->name('achievement.delete');

//Why choose us.....

Route::get('/admin/why-choose', [WhyChooseController::class, 'index'])->name('why.index');
Route::post('admin/why-choose/store', [WhyChooseController::class, 'store'])->name('why.store');
Route::post('admin/why-choose/update/{id}', [WhyChooseController::class, 'update'])->name('why.update');
Route::get('/admin/why-choose/delete/{id}', [WhyChooseController::class, 'delete'])->name('why.delete');

// Testimonial......
Route::get('/admin/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
Route::post('/admin/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
Route::post('/admin/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
Route::get('/admin/testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');

// CTA Section Routes
Route::get('admin/cta', [CallController::class, 'index'])->name('cta.index');
Route::post('admin/cta/update', [CallController::class, 'update'])->name('cta.update');
