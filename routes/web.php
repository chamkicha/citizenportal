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

// Route::get('/', function () {
//     return view('dashboard')->with('title','Home');
// });



Route::group(['prefix' => '/'], function(){
    Route::get('/', 'web\webController@index')->name('web');
    Route::get('web/search', 'web\webController@search')->name('search');
    Route::get('web/loadMenu', 'web\webController@loadMenu')->name('loadMenu');
});

Route::get('/admin', function () {
    return view('pages.auth.login');
})->name('admin');


Route::group(['prefix' => 'login','middleware' => 'auth'], function(){
     Route::post('/', 'Auth\LoginController@login')->name('login');
});

Route::group(['prefix' => 'logout','middleware' => 'auth'], function(){
    Route::post('/', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'dashboard','middleware' => 'auth'], function(){
     Route::get('/','DashboardController@home')->name('dashboard');
     Route::get('/reload','DashboardController@reload')->name('reload');
});

Route::group(['prefix' => 'transactions','middleware' => 'auth'], function(){
    Route::get('/index','Transactions\TransactionsController@index')->name('transactions');
    Route::post('/search','Transactions\TransactionsController@search')->name('search');
});

Route::group(['prefix' => 'passengers','middleware' => 'auth'], function(){
    Route::get('/index','passengers\passengersController@index')->name('passengers');
    Route::post('/search','passengers\passengersController@search')->name('search');
    Route::get('/search_java','passengers\passengersController@search_java')->name('search_java');
});





Route::group(['prefix' => 'auth','middleware' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
    Route::get('create', function () { return view('users.create'); });
});


Route::group(['prefix' => 'users','middleware' => 'auth'], function(){
    Route::get('users/index', 'Users\UsersController@index')->name('users');
    Route::get('users/create', 'Users\UsersController@create')->name('create');
    Route::post('users/store', 'Users\UsersController@store')->name('store');
    Route::get('users/view/{id}','Users\UsersController@view')->name('view');
    Route::get('users/edit/{id}','Users\UsersController@edit')->name('edit');
    Route::post('users/update/{id}','Users\UsersController@update')->name('update');
    Route::get('users/delete/{id}', 'Users\UsersController@delete')->name('delete');
});



Route::group(['prefix' => 'categories','middleware' => 'auth'], function(){
    Route::get('/index', 'categories\categoriesController@index')->name('categories');
    Route::get('/create', 'categories\categoriesController@create')->name('create');
    Route::post('/store', 'categories\categoriesController@store')->name('store');
    Route::get('/view/{id}','categories\categoriesController@view')->name('view');
    Route::get('/edit/{id}','categories\categoriesController@edit')->name('edit');
    Route::post('/update/{id}','categories\categoriesController@update')->name('update');
    Route::get('/delete/{id}', 'categories\categoriesController@delete')->name('delete');
});



Route::group(['prefix' => 'products','middleware' => 'auth'], function(){
    Route::get('/index', 'products\productsController@index')->name('products');
    Route::get('/create', 'products\productsController@create')->name('create');
    Route::post('/store', 'products\productsController@store')->name('store');
    Route::post('/addproperty', 'products\productsController@addproperty')->name('addproperty');
    Route::get('/view/{id}','products\productsController@view')->name('view');
    Route::get('/edit/{id}','products\productsController@edit')->name('edit');
    Route::post('/update/{id}','products\productsController@update')->name('update');
    Route::get('/delete/{id}', 'products\productsController@delete')->name('delete');
    Route::get('/deleteproperty/{id}', 'products\productsController@deleteproperty')->name('deleteproperty');
});


Route::group(['prefix' => 'users','middleware' => 'auth'], function(){
    Route::get('role/index', 'role\RoleController@index')->name('role');
    Route::get('role/create', 'role\RoleController@create')->name('create');
    Route::post('role/store', 'role\RoleController@store')->name('store');
    Route::get('role/view/{id}','role\RoleController@view')->name('view');
    Route::get('role/edit/{id}','role\RoleController@edit')->name('edit');
    Route::post('role/update/{id}','role\RoleController@update')->name('update');
    Route::get('role/delete/{id}', 'role\RoleController@delete')->name('delete');
});




Route::group(['prefix' => 'email','middleware' => 'auth'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps','middleware' => 'auth'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components','middleware' => 'auth'], function(){
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

Route::group(['prefix' => 'advanced-ui','middleware' => 'auth'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms','middleware' => 'auth'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts','middleware' => 'auth'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables','middleware' => 'auth'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons','middleware' => 'auth'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general','middleware' => 'auth'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'error','middleware' => 'auth'], function(){
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
