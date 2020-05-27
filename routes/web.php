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

//employer register
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');

//HIRING EMPLOYER from a COMPANY
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('cover.photo');
Route::post('user/logo/delete','CompanyController@delete_elogo')->name('elogo.delete');
Route::post('user/coverphoto/delete','CompanyController@delete_ecover')->name('ecover.delete');

//See all companies
Route::get('/companies','CompanyController@company')->name('company');

//SEEKER
Route::get('user/profile','UserController@index')->name('user.profile');
Route::post('user/profile/create','UserController@store')->name('profile.create');
//Route::post('user/coverletter','UserController@coverletter')->name('cover.letter');
Route::post('user/resume','UserController@resume')->name('resume');
Route::post('user/profile_pic','UserController@profile_pic')->name('profile_pic');
Route::post('user/profile_pic/delete','UserController@delete_spic')->name('spic.delete');
Route::post('user/resume/delete','UserController@delete_resume')->name('resume.delete');
Route::get('/user/{id}','UserController@show_profile')->name('user.show');
//user work,education history
Route::get('user/profile/history','UserController@history')->name('user.history');

// Education Controller
Route::post('/profile/education/store', 'EducationController@storeEducation');
Route::post('/profile/education/update', 'EducationController@updateEducation');
Route::post('/profile/education/delete', 'EducationController@deleteEducation');

// Work Controller
Route::post('/profile/work/store', 'WorkController@storeWork');
Route::post('/profile/work/update', 'WorkController@updateWork');
Route::post('/profile/work/delete', 'WorkController@deleteWork');

//LOCATION controller
Route::get('/getStates/{id}', 'LocationController@getStates');
Route::get('/getCities/{id}', 'LocationController@getCities');

//SKILL Controller
Route::post('/profile/skills/store', 'SkillController@storeSkill');
Route::post('/profile/skills/edit', 'SkillController@editSkill');

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
Route::group(['middleware' => 'check_role:admin,employer' ], function() {
    Route::get('/seekers','SeekerController@index')->name('seeker.index');
    Route::get('/seeker/{id}','SeekerController@show_profile')->name('seeker.show');
});

//VOLUNTEER
Route::view('volunteer/register','auth.volunteer-register')->name('volunteer.register');
Route::post('volunteer/register','VolunteerRegisterController@volunteerRegister')->name('vol.register');

Route::get('volunteer/profile','VolunteerController@index')->name('volunteer.profile');
Route::post('user/volunteer/create','VolunteerController@store')->name('volunteer.store');
Route::post('volunteer/profile_pic','VolunteerController@vprofile_pic')->name('vprofile_pic');
Route::post('volunteer/profile_pic/delete','VolunteerController@delete_vpic')->name('vpic.delete');
Route::get('volunteer/{id}','VolunteerController@show')->name('volunteer.show');

Route::get('/vseekers','VolunteerController@listseekers')->name('vseeker.index');
Route::get('/vseeker/{id}','VolunteerController@show_profile')->name('vseeker.show');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


