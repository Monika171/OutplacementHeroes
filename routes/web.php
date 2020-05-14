<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//dummy example (ignore)
Route::view('demo','demo');

//jobsController for this JobPortal. Basically used to post anything on welcome page. eg: blog, testimonial (irrelevant name sorry!)
Route::get('/','JobController@index');

//Route::get('/jobs/create','JobController@create')->name('job.create');

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');


//company
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');

//candidate (just one blade.php file. I know I know I have to add more pages like profile! ..later)
Route::get('user/profile','UserController@index')->name('user.profile');
Route::post('user/profile/create','UserController@store')->name('profile.create');
Route::post('user/coverletter','UserController@coverletter')->name('cover.letter');
Route::post('user/resume','UserController@resume')->name('resume');
Route::post('user/profile_pic','UserController@profile_pic')->name('profile_pic');
Route::get('/user/{id}','UserController@show_profile')->name('user.show');
//Route::get('/user/{id}', ['uses' => UserController@show_profile, 'middleware' => 'OnlyEmployerAndOwner']);

//employer
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');

//See all companies
Route::get('/companies','CompanyController@company')->name('company');

//admin (Only can post something now! Will add more)
Route::get('/dashboard','DashboardController@index')->middleware('admin');
Route::get('/dashboard/create','DashboardController@create')->middleware('admin');
Route::post('/dashboard/create','DashboardController@store')->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy','DashboardController@destroy')->name('post.delete')->middleware('admin');
Route::get('/dashboard/{id}/edit','DashboardController@edit')->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/update','DashboardController@update')->name('post.update')->middleware('admin');
Route::get('/dashboard/trash','DashboardController@trash')->middleware('admin');
Route::get('/dashboard/{id}/trash','DashboardController@restore')->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/toggle','DashboardController@toggle')->name('post.toggle')->middleware('admin');
Route::get('/posts/{id}/{slug}','DashboardController@show')->name('post.show');
Route::get('/show_All','DashboardController@show_All')->name('post.show_All');


//display all seekers
Route::get('/seekers','SeekerController@index')->name('seeker.index');
Route::get('/seeker/{id}','SeekerController@show_profile')->name('seeker.show');

//volunteer
Route::view('volunteer/register','auth.volunteer-register')->name('volunteer.register');
Route::post('volunteer/register','VolunteerRegisterController@volunteerRegister')->name('vol.register');

Route::get('volunteer/profile','VolunteerController@index')->name('volunteer.profile');
Route::post('user/volunteer/create','VolunteerController@store')->name('volunteer.store');



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
