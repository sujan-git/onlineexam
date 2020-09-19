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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'OnlineExam\FrontendController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
	Route::get('/index','OnlineExam\RoleController@admin')->name('admin.index');
	Route::get('/exam','OnlineExam\ExamController@create')->name('exam');
	Route::post('/exam/post','OnlineExam\ExamController@addExamInfo')->name('exam.post');
	Route::get('/exam/list','OnlineExam\ExamController@list')->name('exam.list');
	Route::any('/exam/delete/','OnlineExam\ExamController@delete')->name('exam.delete');
	Route::get('/exam/edit/','OnlineExam\ExamController@edit')->name('exam.edit');
	Route::post('/exam/update/','OnlineExam\ExamController@addExamInfo')->name('exam.update');
	Route::get('/registration/list','RegistrationController@index')->name('register.index');
	Route::post('/registration/verify','RegistrationController@verify')->name('register.verify');
	Route::get('/registration/check/{id}','RegistrationController@checkDetails')->name('register.check');
	Route::get('/activations/','OnlineExam\ActivationController@index')->name('activation');
	Route::post('/activations/save','OnlineExam\ActivationController@save')->name('activation.save');

});

Route::group(['prefix'=>'teacher','middleware'=>['auth','teacher']],function(){
	Route::get('/index','OnlineExam\RoleController@teacher')->name('teacher.index');
	

});

Route::group(['prefix'=>'question','middleware'=>['auth','admin']],function(){
	Route::get('/','OnlineExam\QuestionController@create')->name('question');
	Route::post('/post','OnlineExam\QuestionController@add')->name('question.post');
	Route::get('/list/{id}','OnlineExam\QuestionController@list')->name('question.list');
	Route::post('/edit','OnlineExam\QuestionController@edit')->name('question.edit');
	Route::post('/update','OnlineExam\QuestionController@update')->name('question.update');
	Route::post('/del/update','OnlineExam\QuestionController@deleteWithUpdate')->name('question.delupdate');
	Route::get('/final/set/{id}','OnlineExam\QuestionController@finalQuestion')->name('question.final');
	Route::any('/final/set/','OnlineExam\QuestionController@finalQuestionSave')->name('question.final.save');

});


/*-------------------Frontend Routes---------------------*/
Route::get('/exam/register','RegistrationController@create')->name('student.register');
Route::post('/student/register','RegistrationController@add')->name('register.add');
Route::get('/register/info','RegistrationController@info')->name('register.info');
Route::get('/register/info','RegistrationController@info')->name('register.info');
Route::get('/register/status','RegistrationController@status')->name('register.status');
Route::post('/register/status','RegistrationController@checkStatus')->name('register.status');
Route::any('/register/edit','RegistrationController@edit')->name('register.edit');
Route::any('/register/update','RegistrationController@add')->name('register.update');

Route::get('/exam/day/', 'OnlineExam\QuestionController@getFinalQuestionForExam');
Route::get('/my/exam', 'OnlineExam\FrontendController@examView');
/*-------------------Frontend Routes---------------------*/