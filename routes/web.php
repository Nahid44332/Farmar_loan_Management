<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\AchievementController;
use App\Http\Controllers\backend\agent\AgentDashboardController;
use App\Http\Controllers\backend\AgentController;
use App\Http\Controllers\backend\BankPaymentController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BkashPaymentController;
use App\Http\Controllers\backend\CallController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\CounterController;
use App\Http\Controllers\backend\CowController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\Farmer\FarmerDashboardController;
use App\Http\Controllers\backend\FarmerAuthController;
use App\Http\Controllers\backend\FarmerController;
use App\Http\Controllers\backend\FooterSettingController;
use App\Http\Controllers\backend\InvestorController;
use App\Http\Controllers\backend\MaizeController;
use App\Http\Controllers\backend\NagatPaymentController;
use App\Http\Controllers\backend\RiceController;
use App\Http\Controllers\backend\RocketPaymentController;
use App\Http\Controllers\backend\SebaController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\backend\WhyChooseController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\WorkController;
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
Route::get('/farmer', [FrontendController::class, 'farmer'])->name('farmer.login');
Route::post('/farmer/login/submit', [FrontendController::class, 'login'])->name('farmer.login.submit');
Route::post('/farmer/logout', [FarmerAuthController::class, 'logout'])->name('farmer.logout');
Route::get('/invesment', [FrontendController::class, 'invesment']);
Route::get('/agent', [FrontendController::class, 'agent'])->name('agent');
Route::post('/agent/login/submit', [FrontendController::class, 'agentLogin'])->name('agent.login');
Route::get('/agent/logout', [FrontendController::class, 'logoutAgent'])->name('agent.logout');
Route::get('/admin', [FrontendController::class, 'admin']);
Route::get('/bkash', [FrontendController::class, 'bkash']);
Route::get('/nagad', [FrontendController::class, 'nagad']);
Route::get('/roket', [FrontendController::class, 'rocket']);
Route::get('/bank', [FrontendController::class, 'bank']);
Route::get('/contact', [FrontendController::class, 'contactUs']);

Route::post('/farmer-register', [FrontendController::class, 'register'])->name('farmer.register');
Route::post('/agent/register', [AgentController::class, 'register'])->name('agent.register');
Route::post('/investor/register', [FrontendController::class, 'registered'])->name('investor.register');


Route::post('/bkash/payment-submit', [BkashPaymentController::class, 'storePayment'])->name('bkash.payment.submit');
Route::post('/nagad/payment-submit', [NagatPaymentController::class, 'storePayment'])->name('nagad.payment.submit');
Route::post('/rocket/payment-submit', [RocketPaymentController::class, 'storePayment'])->name('rocket.payment.submit');
Route::post('/bank/payment-submit', [BankPaymentController::class, 'storePayment'])->name('bank.payment.submit');
Route::post('/contact/submit', [ContactController::class, 'contactStore'])->name('contact.submit');




Route::get('/admin', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login-submit', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/logout', [AdminAuthController::class, 'logOut'])->name('admin.logout');
Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'adminDashbord'])->name('admin.dashboard');

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
Route::get('/admin/pending-payments', [FarmerController::class, 'pendingPayments'])->name('admin.payments.pending');
Route::post('/admin/payments/{id}/approve', [FarmerController::class, 'approvePayment'])->name('admin.payments.approve');
Route::get('/admin/farmers/field-Verification', [FarmerController::class, 'FieldVerification']); 

//About......
Route::get('/admin/about-section', [AboutController::class, 'index'])->name('about.section');
Route::post('/admin/about-section/update/{key}', [AboutController::class, 'update'])->name('about.section.update');

//Service........
Route::prefix('admin')->group(function () {

    Route::get('/seba', [SebaController::class, 'index'])->name('seba.index');

    Route::post('/seba/store', [SebaController::class, 'store'])->name('seba.store');

    Route::post('/seba/update/{id}', [SebaController::class, 'update'])->name('seba.update');

    Route::get('/seba/delete/{id}', [SebaController::class, 'destroy'])->name('seba.delete');

});
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

//Agent....
Route::prefix('admin/agent')->group(function () {
    Route::get('/membership', [AgentController::class, 'membershipRequests'])->name('admin.agent.membership');
    Route::get('/list', [AgentController::class, 'agentList'])->name('admin.agent.list');
    Route::post('/approve/{id}', [AgentController::class, 'approve'])->name('admin.agent.approve');
    Route::post('/suspend/{id}', [AgentController::class, 'suspend'])->name('admin.agent.suspend');
    Route::post('/assign-farmer', [AgentController::class, 'assignFarmer'])->name('admin.agent.assign.farmer');

});
//Investor.......
Route::prefix('admin/investor')->group(function () {
    Route::get('/membership', [InvestorController::class, 'membershipRequests'])->name('admin.investor.membership');
    Route::get('/list', [InvestorController::class, 'agentList'])->name('admin.investor.list');
    Route::post('/approve/{id}', [InvestorController::class, 'approve'])->name('admin.investor.approve');
    Route::post('/suspend/{id}', [InvestorController::class, 'suspend'])->name('admin.investor.suspend');
});

//Bkash.....
Route::prefix('admin/bkash')->group(function () {
    Route::get('/membership', [BkashPaymentController::class, 'pendingList'])->name('admin.bkash.membership');
    Route::get('/list', [BkashPaymentController::class, 'approvedList'])->name('admin.bkash.list');
    Route::post('/approve/{id}', [BkashPaymentController::class, 'approve'])->name('admin.bkash.approve');
});

//Nagat.......
Route::prefix('admin/payment/nagad')->group(function () {
    Route::get('/membership', [NagatPaymentController::class, 'pendingList'])->name('admin.nagad.membership');
    Route::get('/list', [NagatPaymentController::class, 'approvedList'])->name('admin.nagad.list');
    Route::post('/approve/{id}', [NagatPaymentController::class, 'approve'])->name('admin.nagad.approve');
});

//Rocket......
Route::prefix('admin/payment/rocket')->group(function () {
    Route::get('/membership', [RocketPaymentController::class, 'pendingList'])->name('admin.rocket.membership');
    Route::get('/list', [RocketPaymentController::class, 'approvedList'])->name('admin.rocket.list');
    Route::post('/approve/{id}', [RocketPaymentController::class, 'approve'])->name('admin.rocket.approve');
});

//Bank...
Route::prefix('admin/payment/bank')->group(function () {
    Route::get('/membership', [BankPaymentController::class, 'pendingList'])->name('admin.bank.membership');
    Route::get('/list', [BankPaymentController::class, 'approvedList'])->name('admin.bank.list');
    Route::post('/approve/{id}', [BankPaymentController::class, 'approve'])->name('admin.bank.approve');
});

//Contact......
Route::middleware(['auth'])->prefix('admin/messages')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('admin.messages.index');
    Route::get('/view/{id}', [ContactController::class, 'show'])->name('admin.messages.show');
    Route::delete('/delete/{id}', [ContactController::class, 'destroy'])->name('admin.messages.destroy');
    Route::post('/admin/messages/{id}/mark-as-read', [ContactController::class, 'markAsRead'])->name('admin.messages.markAsRead');
});

Route::middleware(['auth'])->group(function () {
    // Banner Section Dynamic Routes
    Route::get('/admin/banner-section', [BannerController::class, 'index'])->name('banner.section');
    Route::post('/admin/banner-section/update/{key}', [BannerController::class, 'update'])->name('banner.section.update');

    // Counter Section Dynamic Routes
    Route::get('/admin/counter-section', [CounterController::class, 'index'])->name('counter.section');
Route::post('/admin/counter-section/update', [CounterController::class, 'update'])->name('counter.update');});

//Setting....
Route::prefix('admin')->group(function () {

    Route::get('/footer-settings', [FooterSettingController::class, 'index'])->name('footer.index');

    Route::post('/footer-settings/update', [FooterSettingController::class, 'update'])->name('footer.update');

});

//Blog.......
Route::get('/admin/work-section', [WorkController::class, 'index'])->name('work.index');
Route::post('/admin/work-section/update', [WorkController::class, 'update'])->name('work.update');



//===========Farmer Panel========//
Route::middleware('auth:farmer')->group(function () {
    Route::get('/farmer/dashboard', [FarmerDashboardController::class, 'index'])->name('farmer.dashboard');
    Route::get('/farmer/profile', [FarmerDashboardController::class, 'profile'])->name('farmer.profile');
    Route::post('/farmer/profile/update', [FarmerDashboardController::class, 'updateProfile']);
    Route::post('/farmer/profile/update-password', [FarmerDashboardController::class, 'updatePassword']);
    Route::post('/farmer/profile/update-image', [FarmerDashboardController::class, 'updateImage']);
    Route::get('/farmer/loan', [FarmerDashboardController::class, 'farmerLoan']);
    Route::get('/farmer/payments', [FarmerDashboardController::class, 'farmerPaymennts']);
    Route::post('/farmer/payments/store', [FarmerDashboardController::class, 'storePayment'])->name('farmer.payments.store');
});

//===========Agnet Panel=============//
Route::middleware('auth:agent')->group(function () {
    Route::get('/agent/dashboard', [AgentDashboardController::class, 'dashboard'])->name('agent.dashboard');
    Route::get('/agent/investigation', [AgentDashboardController::class, 'investigationPage'])->name('investigation.index');
    Route::post('/agent/investigation/store', [AgentDashboardController::class, 'storeInvestigation'])->name('investigation.store');
});