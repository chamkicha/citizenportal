<?php

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

Route::get('/', function () {
    return view('dashboard')->with('title','Home');
});

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::post('login', 'Auth\LoginController@WebLogin')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('dashboard','DashboardController@home')->name('home');

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
    Route::get('create', function () { return view('users.create'); });
});

Route::group(['prefix' => 'management'], function(){
    Route::get('services/index', 'services\servicesController@index')->name('index');
    Route::get('services/create', 'services\servicesController@create')->name('create');
    Route::post('services/store', 'services\servicesController@store')->name('store');
    Route::get('services/view/{id}', 'services\servicesController@view')->name('view');
    Route::post('services/search', 'services\servicesController@search')->name('search');
    Route::get('services/delete/{id}', 'services\servicesController@delete')->name('delete');
    Route::get('services/edit/{id}', 'services\servicesController@edit')->name('edit');
    Route::post('services/update/{id}', 'services\servicesController@update')->name('update');
});

Route::group(['prefix' => 'management'], function(){
    Route::get('services_provider/index', 'servicesProvider\servicesProviderController@index')->name('index');
    Route::get('services_provider/create', 'servicesProvider\servicesProviderController@create')->name('create');
    Route::post('services_provider/store', 'servicesProvider\servicesProviderController@store')->name('store');
    Route::get('services_provider/view/{id}', 'servicesProvider\servicesProviderController@view')->name('view');
    Route::post('services_provider/search', 'servicesProvider\servicesProviderController@search')->name('search');
    Route::get('services_provider/delete/{id}', 'servicesProvider\servicesProviderController@delete')->name('delete');
    Route::get('services_provider/edit/{id}', 'servicesProvider\servicesProviderController@edit')->name('edit');
    Route::post('services_provider/update/{id}', 'servicesProvider\servicesProviderController@update')->name('update');
});

Route::group(['prefix' => 'management'], function(){
    Route::get('events/index', 'Events\EventsController@index')->name('index');
    Route::get('events/create', 'Events\EventsController@create')->name('create');
    Route::post('events/store', 'Events\EventsController@store')->name('store');
    Route::get('events/view/{EventCode}/{EventName}', 'Events\EventsController@view')->name('view');
    Route::post('events/search', 'Events\EventsController@search')->name('search');
    Route::get('events/delete/{id}', 'Events\EventsController@delete')->name('delete');
    Route::get('events/get-merchant-ticket-category/{msCode}', 'Events\EventsController@getMerchantCategoryByMsCode')->name('getMerchantCategoryByMsCode');
    Route::get('events/edit/{id}', 'Events\EventsController@edit')->name('edit');
    Route::get('events/get-merchant-code/{TinNo}', 'Events\EventsController@getMerchantCode')->name('getMerchantCode');
    Route::get('events/create-ticket-category/{EventCode}', 'Events\EventsController@create_ticket_category')->name('create-ticket-category');
    Route::post('events/store-event-category','Events\EventsController@storeTicketCategory');
    Route::post('events/update/{id}', 'Events\EventsController@update')->name('update');
    Route::post('events/update-on-ussd/{eventcode}/{EventName}', 'Events\EventsController@update_on_ussd')->name('update-on-ussd');
});

Route::group(['prefix' => 'management'], function(){
    // Route::get('create', function () { return view('users.create'); });
    Route::get('users/index', 'Users\UsersController@index')->name('index');
    Route::get('users/create', 'Users\UsersController@create')->name('create');
    Route::post('users/store', 'Users\UsersController@store')->name('store');
    Route::get('users/delete/{id}', 'Users\UsersController@delete')->name('delete');
});

Route::group(['prefix' => 'validation'], function(){
    Route::get('index', 'validation\ValidationController@index')->name('index');
    Route::get('create', 'validation\ValidationController@create')->name('create');
    Route::post('store', 'validation\ValidationController@store')->name('store');
    Route::get('view/{id}', 'validation\ValidationController@view')->name('view');
    Route::post('search', 'validation\ValidationController@search')->name('search');
    Route::get('delete/{id}', 'validation\ValidationController@delete')->name('delete');
    Route::get('edit/{id}', 'validation\ValidationController@edit')->name('edit');
    Route::post('update/{id}', 'validation\ValidationController@update')->name('update');
});

Route::group(['prefix' => 'tickets'], function(){
    Route::get('index', 'Tickets\TicketsControllerr@index')->name('index');
    Route::get('create', 'Tickets\TicketsController@create')->name('create');
    Route::post('store', 'Tickets\TicketsController@store')->name('store');
    Route::get('view/{id}', 'Tickets\TicketsController@view')->name('view');
    Route::get('searchBydate', 'Tickets\TicketsController@searchBydate')->name('searchBydate');
    Route::get('delete/{id}', 'Tickets\TicketsController@delete')->name('delete');
    Route::get('edit/{id}', 'Tickets\TicketsController@edit')->name('edit');
    Route::post('update/{id}', 'Tickets\TicketsController@update')->name('update');
});

Route::group(['prefix' => 'Citizen'], function(){
    Route::get('index', 'Citizen\CitizenController@index')->name('index');
    Route::get('view/{id}', 'Citizen\CitizenController@view')->name('view');
    Route::post('search', 'Citizen\CitizenController@search')->name('search');
    Route::get('delete/{id}', 'Citizen\CitizenController@delete')->name('delete');
});


Route::group(['prefix' => 'merchant'], function(){
    Route::get('merchant', 'Merchant\MerchantsController@index')->name('merchant');
    Route::get('create', 'Merchant\MerchantsController@create')->name('create');
    Route::post('store', 'Merchant\MerchantsController@store')->name('store');
    Route::get('view/{tin}','Merchant\MerchantsController@view');
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});


Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');
