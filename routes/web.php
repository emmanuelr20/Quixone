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

Route::get('/', 'HomeController@index')->name('index');
Auth::routes();
Route::get('/register/activate/{email}/{token}', 'Auth\RegisterController@activate')->name('activate');
Route::get('/register/resend/activation', 'Auth\RegisterController@getResendActivationMail')->name('resend_activation');
Route::post('/register/resend/activation', 'Auth\RegisterController@resendActivationMail')->name('resend_activation');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/broswer/failure', function () {
    return view('no_js');
})->name('no_js');

Auth::routes();

Route::get('/register/{referrer?}', 'Auth\RegisterController@showRegistrationForm')->name('refer');

Route::group(['prefix' => 'quiz', 'middleware' => 'auth'], function (){
    Route::post('/{id}/next', 'QuizController@next')->name('next_quiestion');
    Route::get('/select/{quiz_type}', 'QuizController@select')->name('select_subject');
    Route::get('/{id}/resume', 'QuizController@resume')->name('resume_quiz');
    Route::get('/result/{quiz}', 'QuizController@result')->name('quiz_result');
    Route::post('/start/{quiz_type}', 'QuizController@playNow')->name('start_quiz');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function (){
    Route::get('/deposit', 'PaymentController@deposit')->name('deposit');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::post('/password/change', 'UserController@changePassword')->name('change_password');
    Route::post('/bank/update', 'UserController@updateBankDetails')->name('update_bank_details');
    Route::get('/profile/update', 'UserController@updateShowProfile')->name('update_profile');
    Route::post('/profile/update', 'UserController@updateProfile')->name('update_profile');
    Route::post('/testimony/add', 'TestimonyController@create')->name('add_testimony');
});

Route::post('/payment/{method?}', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback')->name('pay_callback');
Route::get('/payment/callback_cheetahpay', 'PaymentController@handleGatewayCallbackCheetahPay')->name('pay_callback_ch');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('/ticket/all', 'AdminController@showAllTicket');
    Route::get('/question/index/{filter?}', 'QuestionController@index');
    Route::get('/question/add', 'QuestionController@create')->name('add_question');
    Route::get('/question/delete/{question}', 'QuestionController@delete')->name('delete_question');
    Route::post('/question/add', 'QuestionController@store')->name('add_question');
    Route::get('/subject/delete/{subject}', 'SubjectController@delete')->name('delete_subject');
    Route::post('/subject/add', 'SubjectController@create')->name('add_subject');
    Route::post('/question/delete/{question}', 'QuestionController@store');
    Route::get('/winners/unpaid/{quiz_type?}', 'AdminController@showAllToPay')->name('unpaid_winners');
    Route::get('/winners/paid/{quiz_type?}', 'AdminController@showAllPaid')->name('paid_winners');
    Route::get('/winners/quiz/paid/{quiz}', 'AdminController@markAsPaid')->name('mark_paid');
    Route::get('/activate/{quiz_type}', 'QuizTypeController@activate')->name('activate_qt');
    Route::get('/deactivate/{quiz_type}', 'QuizTypeController@deactivate')->name('deactivate_qt');
    Route::post('/quiz_type/toggle/{quiz_type}', 'QuizTypeController@toggle')->name('toggle_qt');
});