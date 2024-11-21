<?php

use App\Http\Controllers\Front\EmailTemplatePreviewController;
use App\Http\Controllers\Front\IframePageController;
use App\Http\Controllers\Front\PropertiesController;
use App\Http\Controllers\SMSController;
use App\Http\Middleware\IframeContactMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
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

    Route::get('/', function () {
        return redirect()->route('login');
    })->name('index');

    Route::get('/oferta/{offer}', 'Offer\IndexController@show')->name('show')->middleware('count.views');
    Route::post('/oferta/{offer}/nowy-klient', 'Offer\IndexController@store')->name('store-client');

    Route::get('/kontakt', 'ContactController@index')->name('contact');
    Route::post('/kontakt', 'ContactController@send')->name('contact.send');

    Route::post('/kontakt/{property}', 'ContactController@property')->name('contact.property');


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

    //Testowanie integracji z sms api
    // Route::get('/sms/send', [SMSController::class, 'index']);
    // Route::post('/sms/send', [SMSController::class, 'send']);


    // Client area
    Route::middleware('guest.client')->group(function () {
        Route::get('client/login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('client/login/request-code', 'Auth\LoginController@requestCode')->name('login.request-code');
        Route::post('client/login/verify-code', 'Auth\LoginController@verifyCode')->name('login.verify-code');
    });

    Route::middleware(['auth.client'])->group(function () {
        Route::get('client/area', 'Client\IndexController@index')->name('client.area');

        Route::get('client/area/chat', 'Client\Chat\IndexController@index')->name('client.area.chat');
        Route::get('client/area/chat/messages/{clientId}', 'Client\Chat\IndexController@fetchMessages')->name('client.area.fetchMessages');
        Route::post('client/area/chat/send', 'Client\Chat\IndexController@sendMessage')->name('client.area.sendMessage');



        Route::get('client/area/file', 'Client\Files\IndexController@index')->name('client.area.files');
        Route::get('client/area/calendar', 'Client\Calendar\IndexController@index')->name('client.area.calendar');
        Route::get('client/area/calendar/events', 'Client\Calendar\IndexController@show')->name('client.area.calendar.events.show');

        Route::get('client/area/offer', 'Client\Offer\IndexController@index')->name('client.area.offer');

        Route::get('client/area/special', 'Client\Special\IndexController@index')->name('client.area.special');

        Route::get('client/area/rodo', 'Client\Rodo\IndexController@index')->name('client.area.rodo');
        Route::post('client/area/rodo/change-rule', 'Client\Rodo\IndexController@editRule')->name('client.area.rodo.change-rule');

        Route::post('client/logout', 'Auth\LoginController@logout')->name('client.logout');
    });

    // DeveloPro
    Route::group(['namespace' => 'Developro', 'prefix' => '/inwestycje', 'as' => 'developro.'], function () {

        Route::post('{property}/notifications', 'Property\NotificationController@store')->name('properties.notifications.store');
        Route::get('/unsubscribe/{hash}', 'Property\NotificationController@unsubscribe')->name('properties.notifications.unsubscribe');

        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/i/{slug}', 'InvestmentController@show')->name('show');
        Route::get('/i/{slug}/plan', 'InvestmentPlanController@index')->name('plan');
        Route::get('/i/{slug}/pietro/{floor}', 'InvestmentFloorController@index')->name('floor');
        Route::get('/i/{slug}/pietro/{floor}/m/{property}', 'InvestmentPropertyController@index')->name('property');

        // Route::get('/{slug}/aktualnosci', 'Article\IndexController@index')->name('investment.news');
        // Route::get('/{slug}/aktualnosci/{article}', 'Article\IndexController@show')->name('investment.news.show');

        // Inwestycja domkowa
        Route::get('/{slug}/d/{property}', 'InvestmentHouseController@index')->name('house');

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
});


Route::group(['as' => 'pages.'], function () {

    Route::get('/', function () {
        return view('pages.homepage');
    })->name('homepage');

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

    Route::get('/o-ep-development', function () {
        return view('pages.about-ep-development');
    })->name('about-ep-development');

    //
    // Construction diary
    //

    Route::get('/dziennik-budowy-old', function () {
        return view('pages.construction-diary');
    })->name('construction-diary');

    Route::get('/dziennik-budowy-old/osiedle-pogodne', function () {
        return view('pages.construction-diary-single');
    })->name('construction-diary-single');

    // 
    // Currently for sale
    // 

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

    Route::get('/kupimy-grunty', function () {
        return view('pages.buy-land');
    })->name('buy-land');


    // 
    // Contact
    // 

    Route::get('/kontakt', function () {
        return view('pages.contact');
    })->name('contact');

    Route::get('/kontakt/biuro', function () {
        return view('pages.contact-office');
    })->name('contact-office');

    Route::get('/kontakt/obsluga-posprzedazowa', function () {
        return view('pages.contact-after-sales');
    })->name('contact-after-sales');
});


Route::post('/testform', function (Request $request) {
    dd($request->all());
});
