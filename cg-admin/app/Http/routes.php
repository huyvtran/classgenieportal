<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    return Redirect::to('login');
});

/*** Routes For Login Modules */
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'LoginController@checkLogin');

Route::resource('/home', 'HomeController');
  
/***  Routes Start For Change Password */
Route::get('/change_password', function(){
  return view('change_password.change_password');
});

Route::post('change_password', 'ChangePasswordController@changePassword');
/***  Routes End For Change Password */

Route::get('/logout', 'LoginController@checkLogout');

/*********  Routes Start For Clanguage ********/
Route::get('/language', function() {
	return view('language');
});
Route::post('language', 'LanguageController@updatelanguage');

Route::post('lang_ajax', 'LanguageController@languagechange');

//***********ROUTING FOR CONTENT MANAGEMENET******************//
Route::post('contentlist/save','contentController@saveEditor');
Route::get('contentlist',function(){

return view('contentManagement.contentListing');	
});
Route::get('contentlist/{id}','contentController@getData');
Route::get('deleteContent/{id}','contentController@deleteContent');
Route::get('searchcontent/{where}','contentController@getSearchData');

//***********ROUTING FOR CONTENT MANAGEMENET******************//


Route::get('superuser',function(){
return view('super');
});

/***  Routes For Staff Management Modules */
Route::resource('rolemanagement','RolemangController');

/***  Routes For Admin User Management Modules */
Route::resource('usermanagement','UsermangController');


/***  Routes Start For Testing Ajax */
Route::get('/testing', function(){
  return view('testing.testing');
});
//Route::get('testing','testingController@getData');
Route::get('testing/{id}','TestingController@getData');
Route::post('testing', 'TestingController@testAjax');
//****Routes For Email Content Section******/

/*Route::get('EmailContent',function(){
return view('email');
});
*/
Route::get('emailcontent',function(){return view('emailmanagement.email');}) ;
Route::post('emailcontent/save','EmailContentController@saveData');
Route::get('emaillist', function(){return view('emailmanagement.emaillist');});	
Route::get('emailcontent/{id}','EmailContentController@editData');
Route::post('searchemailcontent/list','EmailContentController@showData');	
Route::post('emaillist/export','EmailContentController@export');	

//Route::get('databyid/{where}','EmailContentController@databyid');

/***  Routes End For Testing Ajax */

/***  Routes For ClassimageController Modules */
Route::resource('imagemanagement/class','ClassimageController');

/***  Routes For StudentimageController Modules */
Route::resource('imagemanagement/student','StudentimageController');

/***  Routes For StudentimageskillController Modules */
Route::resource('imagemanagement/skill','StudentskillController');

/***  Routes For CustomizeSkill Modules */
Route::resource('imagemanagement/customizeskill','CustomizeskillController');

/***  Routes For Schools Modules */
Route::resource('schools','SchoolsController');
Route::resource('schools/list','SchoolsController@schools_list');
Route::post('get_email/{school_id}','SchoolsController@get_email');
Route::post('update_school/{school_id}','SchoolsController@update_school');
Route::post('delete_school/{school_id}','SchoolsController@destroy');
Route::post('sendmail_school/{email}','SchoolsController@sendmail');
Route::post('views_school/{school_id}','SchoolsController@views');


/*** Routes For Teacherstatus Modules ***/
Route::resource('teacherstatus','TeacherstatusController');
Route::resource('teacherstatus/list','TeacherstatusController@listdata');
Route::post('deactivate_teacher_status/{member_no}','TeacherstatusController@deactivate_teacher_status');
//Route::post('activate_teacher_status/{member_no}','TeacherstatusController@activate_teacher_status');

/*** Routes For Blog Modules ***/
Route::resource('bloglist','BlogController');
Route::resource('blogs_list','BlogController@blogs_list');
Route::resource('blog/create','BlogController@create');
Route::resource('blog/save','BlogController@saveblog');
Route::post('delete_blog/{blog_id}','BlogController@destroy');

/*** Routes For TeacherList Modules ***/
Route::resource('teacherlist','TeacherlistController');
Route::resource('teacherlist/list','TeacherlistController@listdata');
Route::resource('update_status/{id}','TeacherlistController@update_status');
Route::resource('delete_status/{id}','TeacherlistController@update_status');
Route::post('update_teacher_status/{id}','TeacherlistController@update_teacher_status');
Route::resource('delete_teacher_status/{id}','TeacherlistController@delete_teacher_status');
Route::resource('sendmail/{email}','TeacherlistController@sendmail');
Route::resource('sendmaildelete/{email}','TeacherlistController@sendmaildelete');




