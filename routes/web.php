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
/********** FrontEnd ***************************************************/
Route::get('/', 'FrontEndController@index');

/********** Login *******************************************************/
Route::get('/admin-login', 'AdminController@index');
Route::post('/admin', 'AdminController@adminLogin');
Route::get('/dashboard','SuperAdminController@index');
Route::get('/logout','SuperAdminController@logOut');

/********* category ******************************************************/
Route::get('/add-category','SuperAdminController@addCategory');
Route::post('/save-category','SuperAdminController@saveCategoryData');
Route::get('/view-category','SuperAdminController@viewCategoryData');
Route::get('/unpublish-category/{id}','SuperAdminController@unpublishCategoryById');
Route::get('/publish-category/{id}','SuperAdminController@publishCategoryById');
Route::get('/delete-category/{id}','SuperAdminController@deleteCategoryById');
Route::get('/edit-category/{id}','SuperAdminController@editCategoryById');
Route::post('/update-category','SuperAdminController@updateCategoryData');

/********* Manufacturer ******************************************************/
Route::get('/add-manufacturer','SuperAdminController@addManufacturer');
Route::post('/save-manufacturer','SuperAdminController@saveManufacturerData');
Route::get('/view-manufacturer','SuperAdminController@viewManufacturerData');
Route::get('/unpublish-manufacturer/{id}','SuperAdminController@unpublishManufacturerById');
Route::get('/publish-manufacturer/{id}','SuperAdminController@publishManufacturerById');
Route::get('/delete-manufacturer/{id}','SuperAdminController@deleteManufacturerById');
Route::get('/edit-manufacturer/{id}','SuperAdminController@editManufacturerById');
Route::post('/update-manufacturer','SuperAdminController@updateManufacturerData');

/********* products ******************************************************/
Route::get('/add-products','SuperAdminController@addProducts');
Route::post('/save-products','SuperAdminController@saveProducts');
Route::get('/view-products','SuperAdminController@viewProductsData');
Route::get('/unpublish-product/{id}','SuperAdminController@unpublishProductById');
Route::get('/publish-product/{id}','SuperAdminController@publishProductById');
Route::get('/delete-product/{id}','SuperAdminController@deleteProductById');
Route::get('/edit-product/{id}','SuperAdminController@editProductById');
Route::post('/update-product','SuperAdminController@updateProductData');

/********** Cart *********************************************************/