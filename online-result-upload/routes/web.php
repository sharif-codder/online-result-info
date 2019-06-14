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
    return view('result-home');
    //return view('home/index');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

    Route::prefix('admin')->group(function(){

    Route::resource('/batch','AdminBatchController',['except'=>['destroy']]);

    Route::resource('/faculty','AdminFacultyController',['except'=>['destroy']]);
    Route::resource('/student','AdminStudentController',['except'=>['destroy']]);
    Route::resource('/subject','AdminSubjectController',['except'=>['destroy']]);
    Route::resource('/result','AdminResultController',['except'=>['destroy']]);

    Route::get('/','HomeController@index')->name('admin');

    Route::get('/batch/{id}/delete','AdminBatchController@delete')->name('batch.delete');
    Route::get('/faculty/{id}/delete','AdminFacultyController@delete')->name('faculty.delete');
    Route::get('/student/{id}/delete','AdminStudentController@delete')->name('student.delete');
    Route::get('/student/{id}/rsult-info','AdminResultController@admin_student_result_info')->name('student.result.info');
    Route::get('/student/{id}/{ses}/{year}/show','AdminResultController@show_result')->name('student.showresult');
    Route::get('/subject/{id}/delete','AdminSubjectController@delete')->name('subject.delete');
    Route::get('/result/{id}/delete','AdminResultController@delete')->name('result.delete');

    Route::post('/logout','Auth\LoginController@adminLogout')->name('admin.logout');

});

});

 Route::get('faculty/login','Auth\FacultyLoginController@showLoginForm')->name('faculty.login');
 Route::post('faculty/login','Auth\FacultyLoginController@login')->name('faculty.login.sumbit');

Route::group(['middleware' => ['web','auth:faculty'], 'prefix' => 'faculty'], function() {
    Route::get('/', 'FacultyController@index')->name('faculty.home');
    Route::post('/logout','Auth\FacultyLoginController@logout')->name('faculty.logout');
    Route::get('/subject-batch','FacultyController@subject_batch')->name('faculty.subject.batch');

    Route::post('/result-upload','ResutlController@store')->name('result.submit');
    Route::get('/edit-result/{sub_id}/{b_id}','ResutlController@editResult')->name('result.edite');
    Route::post('/update-result/{sub_id}/{b_id}','ResutlController@updateResult')->name('result.update');
    Route::post('/','FacultyController@getStudentList')->name('batchwise.student');

});

Route::get('student/login','Auth\studentLoginController@showLoginForm')->name('student.login');
Route::post('student/login','Auth\studentLoginController@login')->name('student.login.sumbit');

Route::group(['middleware' => ['web','auth:student'], 'prefix' => 'student'], function() {

    Route::get('/', 'studentController@index')->name('student.home');

    Route::get('/{id}', 'AdminResultController@student_result_info')->name('student.result');

    Route::post('/logout','Auth\StudentLoginController@logout')->name('student.logout');

});
