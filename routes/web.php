<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
use App\User;

View::composer('*', function ($view) {
    if (Auth::user()) {
        $email = Auth::user()->email;
        $data = User::where('email', $email)->first();
        $view->with(['data' => $data]);
		
    }
});

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

Route::get('/social-setup/{id}/{mid}', 'MiscController@index');

Route::get('/', 'HomeController@index')->name('home');

//Settings
Route::get('/settings', 'HomeController@setting');
Route::post('/settings', array( 'before' => 'csrf', 'as' => 'settings', 'uses' => 'HomeController@setUpdate'));

//Business Section
Route::get('/business', 'BusinessController@index');
//Route::get('/ajax/business/{id}', 'BusinessController@ajaxBus');
Route::get('/business/add', 'BusinessController@addbusiness');
Route::get('/business/{id}/setup', 'BusinessController@show');
Route::get('/business/delete/{id}', 'BusinessController@destroy');
Route::post('/business/add', array( 'before' => 'csrf', 'as' => 'business', 'uses' => 'BusinessController@store'));
Route::post('/business/update/{id}', array( 'before' => 'csrf', 'as' => 'business-update', 'uses' => 'BusinessController@update'));
Route::get('/business/monthly-goal/{id}', 'BusinessController@monthly_goal_form');
Route::get('/business/set-social/{id}', 'BusinessController@social_form');
Route::post('/business/monthly-goal', array( 'before' => 'csrf', 'as' => 'monthly-goal', 'uses' => 'BusinessController@monthly_goal'));
Route::post('/mail-send/{id}', array( 'before' => 'csrf', 'as' => 'mail-send', 'uses' => 'MiscController@mailSend'));
Route::post('/update-goals', array( 'before' => 'csrf', 'as' => 'update-goals', 'uses' => 'BusinessController@updateMG'));


//Groups Section
Route::get('/group', 'GroupController@index');
Route::get('/ajax/group/{id}', 'GroupController@ajaxGrp');
Route::get('/group/add', 'GroupController@addgroup');
Route::get('/group/delete/{id}', 'GroupController@destroy');
Route::post('/group/add', array( 'before' => 'csrf', 'as' => 'group', 'uses' => 'GroupController@store'));
Route::post('/group/update/{id}', array( 'before' => 'csrf', 'as' => 'group-update', 'uses' => 'GroupController@update'));

// Posting Reschedule
Route::get('/posting-schedule', 'BusinessController@all_schedule');
Route::get('/posting-schedule/{id}', 'BusinessController@view_schedule');
Route::post('/posting-schedule/{id}', array( 'before' => 'csrf', 'as' => 'posting-schedule', 'uses' => 'BusinessController@posting_schedule'));

//Single Post Section
Route::get('/posts', 'PostController@index');
Route::get('/post/add-single', 'PostController@addsingle');
Route::get('/post/delete-single/{id}', 'PostController@destroy');
Route::post('/post/update/{id}', array( 'before' => 'csrf', 'as' => 'post-update', 'uses' => 'PostController@update'));
Route::post('/post/add-single', array( 'before' => 'csrf', 'as' => 'add-single', 'uses' => 'PostController@store'));
Route::post('/post/add-image', array( 'before' => 'csrf', 'as' => 'add-image', 'uses' => 'PostController@imageStore'));


//multiple Post Section
Route::get('/post-multiple/add', 'PostController@addmultiple');
Route::get('/ajax/package/{id}', 'PostController@ajaxpack');
Route::get('/ajax/busgrp/{busid}/{grpid}/{packid}', 'PostController@ajaxbusgrp');
Route::get('/post-multiple/add/{id}', 'PostController@schedulemultiple');
Route::post('/post-multiple/add/{id}', array( 'before' => 'csrf', 'as' => 'schedule-multiple', 'uses' => 'PostController@schedulemultipost'));
Route::post('/post-multiple/save', array( 'before' => 'csrf', 'as' => 'add-multiple', 'uses' => 'PostController@addmultipost'));
Route::post('/get-formatted-csv', array('as' => 'get-formatted-csv', 'uses' => 'PostController@csvFormat'));
Route::get('/filetoprev', 'PostController@filetoprev');
Route::post('/fileprev/{busid}/{grpid}', array('as' => 'fileprev', 'uses' =>'PostController@fileprev'));


//Landing Page Section
Route::get('/landing-pages', 'LandingPageController@index');
Route::get('/landing-page/add', 'LandingPageController@landing_form');
Route::post('/landing-page/add', array( 'before' => 'csrf', 'as' => 'add-landing-page', 'uses' => 'LandingPageController@store'));
Route::get('/landing-page/delete/{id}', 'LandingPageController@destroy');


//Leadgen Campaign Section
Route::get('/leadgen-campaign', 'LeadgenCampaignController@index');
Route::get('/leadgen-campaign/add', 'LeadgenCampaignController@addleadgen');
Route::get('/leadgen-campaign/social-setup/{id}', 'LeadgenCampaignController@leadsocialsetup');
Route::post('/leadgen-campaign/social-setup',array( 'before' => 'csrf', 'as' => 'lead-social-setup', 'uses' => 'LeadgenCampaignController@lead_social'));
Route::get('/leadgen-campaign/customize/{id}', 'LeadgenCampaignController@leadcustomize');
Route::post('/leadgen-campaign/customize',array( 'before' => 'csrf', 'as' => 'lead-customize', 'uses' => 'LeadgenCampaignController@lead_customize'));

Route::get('/leadgen-campaign/email-setup/{id}', 'LeadgenCampaignController@leademailsetup');
Route::post('/leadgen-campaign/email-setup',array( 'before' => 'csrf', 'as' => 'lead-email-setup', 'uses' => 'LeadgenCampaignController@leademailsave'));

Route::post('/leadgen-campaign/add', array( 'before' => 'csrf', 'as' => 'add-lead-campaign', 'uses' => 'LeadgenCampaignController@store'));
Route::get('/leadgen-campaign/delete/{id}', 'LeadgenCampaignController@destroy');

//Calendar
Route::get('/calendar', 'CalendarController@index');
Route::get('/ajax/post-business', 'CalendarController@getPost');

//Post Package
Route::get('/post-package/delete/{id}', 'PostController@destroy_package');
Route::post('ajax-add-package', 'PostController@ajaxAddPackage');

//Social Logins
Route::get('facebook/{id}', 'SocialController@fbProvider');
Route::get('fb/callback', 'SocialController@fbCallback');
Route::get('instagram/{id}', 'SocialController@instaProvider');
Route::post('instagram/{id}', array('before' => 'csrf', 'as' => 'instagram', 'uses' =>'InstagramController@save'));
Route::get('tweet/{id}', 'SocialController@twitterProvider');
Route::get('twitter/callback', 'SocialController@twitterCallback');
Route::get('google/{id}', 'SocialController@googleProvider');
Route::get('ggle/callback', 'SocialController@googleCallback');
Route::post('save-google', array('before' => 'csrf', 'as' => 'save-google', 'uses' => 'SocialController@saveGoogle'));

//Social deletes
Route::get('facebook/delete/{id}', 'SocialController@fbDelete');
Route::get('instagram/delete/{id}', 'SocialController@instaDelete');
Route::get('twitter/delete/{id}', 'SocialController@twitterDelete');
Route::get('google/delete/{id}', 'SocialController@googleDelete');

//Delete Social by Business Owner
Route::get('social-facebook/delete/{id}', 'MiscController@fbDelete');
Route::get('social-instagram/delete/{id}', 'MiscController@instaDelete');
Route::get('social-twitter/delete/{id}', 'MiscController@twitterDelete');
Route::get('social-google/delete/{id}', 'MiscController@googleDelete');


//Content Designer
Route::get('content-designer', 'ContentController@index');
Route::post('ajax-content', 'ContentController@ajaxContent');
Route::post('ajax-add-content', 'ContentController@ajaxAddContent');

//Email Open
Route::get('/email-open/{id}', 'MiscController@invitEmailOpen');

//Image WaterMark\
Route::post('logo-upload', array('before' => 'csrf', 'as' => 'logo-upload', 'uses' => 'BusinessController@logo'));

