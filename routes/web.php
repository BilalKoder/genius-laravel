<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
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

// Auth Routes =======================================================
// Auth::routes();
Route::get('/login', 'MyAuthController@login')->name('login');
Route::get('/register', 'MyAuthController@register');
Route::post('/register', 'MyAuthController@store');
// Auth Routes =======================================================

Route::get('/', 'HomeController@index')->name('home');
Route::get('landing','HomeController@landing');
Route::get('/know-your-customer/{id}', 'HomeController@knowYourCustomer')->name('know-your-customer');
// Route::get('/home', 'HomeController@index')->name('home');

Route::post('submit/form', 'UserController@submitForm')->name('submit.form');
Route::post('payment/submit','PagesController@submitPayment')->name('payment-submit');

Route::get('/thank-you', 'PagesController@thankyou')->name('thank-you');
Route::get('/document', 'PagesController@send_document_link')->name('send-document-link');
Route::get('/payment-successfull','PagesController@payment_successfull')->name('payment-successfull');
Route::get('/deposit-successfull','PagesController@deposit_successfull')->name('deposit-successfull');
Route::get('/send-interview-invitation/{id}','PagesController@sendInterviewInvitation')->name('send-interview-invitation');
Route::post('submit/interview','PagesController@submitInterviewInvitation')->name('submit.interview-invitation');

Route::get('/faqs', 'PagesController@faqs')->name('faqs');
Route::get('/privacy-policy','PagesController@privacy_policy')->name('privacy-policy');
Route::get('/terms-and-conditions','PagesController@terms_and_conditions')->name('terms-and-conditions');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/add', 'UserController@create')->name('users.create');
    Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::get('users/{user}/detail', 'UserController@show')->name('users.detail');
    Route::post('users/store', 'UserController@store')->name('users.store');
    Route::post('users/{user}/update', 'UserController@update')->name('users.update');
    Route::get('users/{user}/delete', 'UserController@destroy')->name('users.delete');
    Route::get('users', 'UserController@index')->name('users');



    Route::get('interviews', 'PagesController@interviews')->name('interviews');
    Route::get('interview-status/{id}/{status}', 'PagesController@interview_status')->name('interview.status');

   
    Route::get('packages', 'PackageController@index')->name('packages');
    Route::get('packages/add', 'PackageController@create')->name('packages.create');
    Route::get('packages/{package}/edit', 'PackageController@edit')->name('packages.edit');
    Route::get('packages/{package}/detail', 'PackageController@show')->name('packages.detail');
    Route::post('packages/store', 'PackageController@store')->name('packages.store');
    Route::post('packages/{package}/update', 'PackageController@update')->name('packages.update');
    Route::get('packages/{package}/delete', 'PackageController@destroy')->name('packages.delete');

    Route::get('settings', 'SettingController@index')->name('settings');
    Route::get('settings/add', 'SettingController@create')->name('settings.create');
    Route::get('settings/{setting}/edit', 'SettingController@edit')->name('settings.edit');
    Route::get('settings/{setting}/detail', 'SettingController@show')->name('settings.detail');
    Route::post('settings/store', 'SettingController@store')->name('settings.store');
    Route::post('settings/{setting}/update', 'SettingController@update')->name('settings.update');
    Route::get('settings/{setting}/delete', 'SettingController@destroy')->name('settings.delete');
});


