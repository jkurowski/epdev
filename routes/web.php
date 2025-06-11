<?php

use App\Http\Controllers\Front\ContactFormsController;
use App\Http\Controllers\Front\EmailTemplatePreviewController;
use App\Http\Controllers\Front\IframePageController;
use App\Http\Controllers\Front\PropertiesController;
use App\Http\Controllers\SMSController;
use App\Http\Middleware\IframeContactMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Building;
use App\Models\Investment;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::get('routes', function () {
    Artisan::call('route:list');

    return '<pre>' . Artisan::output() . '</pre>';
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Wiadomość z link aktywacyjnym wysłana!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::group(['namespace' => 'Front', 'middleware' => 'restrictIp', 'as' => 'front.'], function () {

//    Route::get('/', function () {
//        return redirect()->route('login');
//    })->name('index');
//
//    Route::get('/', function () {
//        //return view('pages.homepage');
//    })->name('homepage');
//

    Route::get('/oferta/{offer}', 'Offer\IndexController@show')->name('show')->middleware('count.views');
    Route::post('/oferta/{offer}/nowy-klient', 'Offer\IndexController@store')->name('store-client');

    Route::get('/kontakt', 'ContactController@index')->name('contact');
    Route::post('/kontakt', 'ContactController@send')->name('contact.send');
    Route::post('/kontakt/{property}', 'ContactController@property')->name('contact.property');

    //Cron
    Route::get('/cron/investment/{id}', 'Cron\IndexController@updateVOX')->name('cron.vox');


    Route::resources([
        '/news' => 'ArticleController',
        '/gallery' => 'GalleryController'
    ]);

    // IFRAMES
    // Token
    Route::get('/iframe/token', [IframePageController::class, 'token'])->name('iframe.token');
    // Index
    Route::get('/iframe/{investment:slug}', [IframePageController::class, 'index'])->name('iframe.index');
    // Domki
    Route::get('/iframe/{investment:slug}/h/{property:id}', [IframePageController::class, 'single'])->name('iframe.single');
    // Mieszkania
    Route::get('/iframe/{investment:slug}/f/{floor:id}/p/{property:id}', [IframePageController::class, 'apartmentBuilding'])->name('iframe.single.apartmentBuilding');
    Route::get('/iframe/{investment:slug}/b/{building:id}/f/{floor:id}/p/{property:id}', [IframePageController::class, 'apartmentMultiBuilding'])->name('iframe.single.apartmentMultiBuilding');


    // Kontakt
    Route::post('/iframe/kontakt/{property}',  [IframePageController::class, 'contact'])->name('iframe.single.contact')->middleware(IframeContactMiddleware::class)->withoutMiddleware(VerifyCsrfToken::class);
    // Z formularzem kontaktowym
    Route::get("/iframe/with-contact-form/{investment:slug}", [IframePageController::class, 'withContactForm'])->name('iframe.withContactForm');
    Route::post("/iframe/with-contact-form/{investment:slug}", [IframePageController::class, 'withContactFormCreate'])->name('iframe.withContactForm.create');

    // Podgląd szablonu email
    Route::get('/email-template-preview', [EmailTemplatePreviewController::class, 'index'])->name('email-template-preview');
    Route::get('/email-template-preview/{id}', [EmailTemplatePreviewController::class, 'show'])->name('email-template-preview.show');

    // DeveloPro
    Route::get('/mieszkania', 'Developro\InvestmentPropertyController@properties')->name('developro.properties');
    Route::group(['namespace' => 'Developro', 'prefix' => '/miasto', 'as' => 'developro.'], function () {

        Route::get('/{citySlug}', 'IndexController@index')->name('index');
        Route::get('/{citySlug}/i/{slug}', 'InvestmentController@show')->name('show');
        Route::get('/{citySlug}/i/{slug}/plan', 'InvestmentPlanController@index')->name('plan');
        Route::get('/{citySlug}/i/{slug}/pietro/{floor}', 'InvestmentFloorController@index')->name('floor');
        Route::get('/{citySlug}/i/{slug}/pietro/{floor}/m/{property}', 'InvestmentPropertyController@index')->name('property');

        // Route::get('/{slug}/aktualnosci', 'Article\IndexController@index')->name('investment.news');
        // Route::get('/{slug}/aktualnosci/{article}', 'Article\IndexController@show')->name('investment.news.show');

        // Inwestycja domkowa
        Route::get('/{citySlug}/{slug}/d/{property}', 'InvestmentHouseController@index')->name('house');

        //Pages
        Route::get('/{slug}/{page}', 'Page\IndexController@index')->name('page');
    });

    //dziennik budowy
    Route::get('/dziennik-budowy', 'App\Http\Controllers\Front\Developro\Article\IndexController@index')->name('investment.news');
    Route::get('/dziennik-budowy/{article}', 'App\Http\Controllers\Front\Developro\Article\IndexController@show')->name('investment.news.show');

    // Inline
    Route::group(['prefix' => '/inline', 'as' => 'front.inline.'], function () {
        Route::get('/', 'InlineController@index')->name('index');
        Route::get('/loadinline/{inline}', 'InlineController@show')->name('show');
        Route::post('/update/{inline}', 'InlineController@update')->name('update');
    });

    Route::get('/email-tracking/{trackingId}', [App\Http\Controllers\Admin\Crm\EmailTracking\IndexController::class, 'track'])->name('email.track');

    Route::get('/test-page', [App\Http\Controllers\Front\Static\IndexController::class, 'testPage'])->name('test-page');
    Route::post('/test-page', [App\Http\Controllers\Front\Static\IndexController::class, 'store'])->name('test-page.store');


    // Inline

});

Route::group(['prefix' => '/inline', 'as' => 'front.inline.'], function () {
    Route::get('/', 'Front\InlineController@index')->name('index');
    Route::get('/loadinline/{inline}', 'Front\InlineController@show')->name('show');
    Route::post('/update/{inline}', 'Front\InlineController@update')->name('update');
});

Route::group(['as' => 'pages.'], function () {

    Route::get('/', 'App\Http\Controllers\Front\IndexController@index')->name('homepage');

    //
    // Apartments
    //
    // Route::get('/mieszkania', [PropertiesController::class, 'index'])->name('properties');

    Route::get('/mieszkania/warszawa/apartamenty-talarowa-3', function () {
        return view('pages.estate');
    })->name('estate');

    //
    // Apartment
    //

    Route::get('/mieszkania/warszawa/apartamenty-talarowa-3/mieszkanie-a0102', function () {
        return view('pages.estate-single');
    })->name('estate-single');


    //
    // Service premises
    //
    Route::get('/lokale-uslugowe', function () {
        return view('pages.service-premises');
    })->name('service-premises');

    //
    // About us
    //

    Route::get('/o-ep-development', 'Front\Static\IndexController@about')->name('about-ep-development');
    Route::get('/aktualnie-w-sprzedazy', [\App\Http\Controllers\Front\Developro\IndexController::class, 'currentlyForSale'])->name('currently-for-sale');

    //
    //  Investments
    //

    Route::get('/inwestycje-zrealizowane', [\App\Http\Controllers\Front\Developro\IndexController::class, 'investmentsDone'])->name('completed-investments');

    Route::get('/inwestycje-zrealizowane/osiedle-sprawna', function () {
        return view('pages.completed-investments-single');
    })->name('completed-investments-single');

    Route::get('/inwestycje-planowane', [\App\Http\Controllers\Front\Developro\IndexController::class, 'investmentsPlanned'])->name('planned-investments');

    // 
    // Buy land
    //  

    Route::get('/kupimy-grunty', 'Front\Static\IndexController@buyland')->name('buy-land');

    //
    // Privacy policy
    //

    Route::get('/polityka-prywatnosci', 'Front\Static\IndexController@privacypolicy')->name('privacy-policy');
    Route::get('/kontakt/biuro', 'Front\Static\IndexController@office')->name('contact-office');
    Route::get('/kontakt/obsluga-posprzedazowa', 'Front\Static\IndexController@sales')->name('contact-after-sales');
});

Route::post('/contact-form', [ContactFormsController::class, 'store'])->name('contact-form.store');
Route::post('/submit-form', [ContactFormsController::class, 'modal'])->name('contact-form.modal');