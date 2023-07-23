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
Route::get('/signup', 'MyAuthController@register');
Route::get('/register', 'MyAuthController@register');
Route::post('/register', 'MyAuthController@store')->name('register');
// Auth Routes =======================================================

Route::get('/', 'HomeController@index')->name('home');
Route::get('landing','HomeController@landing');
Route::get('/learning', 'HomeController@learning')->name('learning');
Route::get('/course-details/{id}', 'HomeController@courseDetail')->name('learning.detail');
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

Route::get('/faqs', 'FaqsController@fronFaq')->name('front.faqs');
// Route::get('categories', 'CategoriesController@index')->name('categories');
Route::get('blogs', 'BlogsController@frontBlogs')->name('front.blogs');
Route::get('blogs/{id}', 'BlogsController@frontBlogsSingle')->name('front.blogs.solo');

Route::get('/privacy-policy','PagesController@privacy_policy')->name('privacy-policy');
Route::get('/terms-and-conditions','PagesController@terms_and_conditions')->name('terms-and-conditions');


//login for ajax
Route::post('admin/login', 'UserController@loginAjax')->name('login.ajax');
//signup for ajax
Route::post('admin/register', 'UserController@registerAjax')->name('register.ajax');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::post('/enroll-course', 'EnrolledCoursesController@enrollCourseAjax')->name('enroll.course');
    Route::get('/all/enrolled-courses', 'EnrolledCoursesController@index')->name('enrolled.all');
    

    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/add', 'UserController@create')->name('users.create');
    Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::get('users/{user}/detail', 'UserController@show')->name('users.detail');
    Route::post('users/store', 'UserController@store')->name('users.store');
    Route::post('users/{user}/update', 'UserController@update')->name('users.update');
    Route::get('users/{user}/delete', 'UserController@destroy')->name('users.delete');
    
    Route::get('categories', 'CategoriesController@index')->name('categories');
    Route::get('categories/add', 'CategoriesController@create')->name('categories.add');
    Route::post('categories/store', 'CategoriesController@store')->name('categories.store');
    Route::get('categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::post('categories/{id}/update', 'CategoriesController@update')->name('categories.update');
    Route::get('categories/{id}/destroy', 'CategoriesController@destroy')->name('categories.delete');
    
    Route::get('blogs', 'BlogsController@index')->name('blogs');
    Route::get('blogs/add', 'BlogsController@create')->name('blogs.add');
    Route::post('blogs/store', 'BlogsController@store')->name('blogs.store');
    Route::get('blogs/{id}/edit', 'BlogsController@show')->name('blogs.edit');
    Route::post('blogs/{id}/update', 'BlogsController@update')->name('blogs.update');
    Route::get('blogs/{id}/destroy', 'BlogsController@destroy')->name('blogs.delete');
    
    Route::get('webinars', 'WebinarController@index')->name('webinars');
    Route::get('webinars/add', 'WebinarController@create')->name('webinars.add');
    Route::post('webinars/store', 'WebinarController@store')->name('webinars.store');
    Route::get('webinars/{id}/edit', 'WebinarController@show')->name('webinars.edit');
    Route::post('webinars/{id}/update', 'WebinarController@update')->name('webinars.update');
    Route::get('webinars/{id}/destroy', 'WebinarController@destroy')->name('webinars.delete');
    
    Route::get('events', 'EventsController@index')->name('events');
    Route::get('events/add', 'EventsController@create')->name('events.add');
    Route::post('events/store', 'EventsController@store')->name('events.store');
    Route::get('events/{id}/edit', 'EventsController@show')->name('events.edit');
    Route::post('events/{id}/update', 'EventsController@update')->name('events.update');
    Route::get('events/{id}/destroy', 'EventsController@destroy')->name('events.delete');

    
    Route::get('courses', 'CoursesController@index')->name('courses');
    Route::get('courses/add', 'CoursesController@create')->name('courses.add');
    Route::post('courses/store', 'CoursesController@store')->name('courses.store');
    Route::get('courses/{id}/edit', 'CoursesController@show')->name('courses.edit');
    Route::post('courses/{id}/update', 'CoursesController@update')->name('courses.update');
    Route::get('courses/{id}/destroy', 'CoursesController@destroy')->name('courses.delete');
    
    Route::get('/faqs', 'FaqsController@index')->name('faqs');
    Route::get('faqs/add', 'FaqsController@create')->name('faqs.add');
    Route::post('faqs/store', 'FaqsController@store')->name('faqs.store');
    Route::get('faqs/{id}/edit', 'FaqsController@show')->name('faqs.edit');
    Route::post('faqs/{id}/update', 'FaqsController@update')->name('faqs.update');
    Route::get('faqs/{id}/destroy', 'FaqsController@destroy')->name('faqs.delete');

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


