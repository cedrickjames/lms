<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\MailSettingController;
use App\Mail\SampleMail;
use App\Models\MailSetting;
use Illuminate\Support\Facades\Config;
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



;


Route::get('/send-sample-email', function () {
    $settings = MailSetting::first();

    if ($settings) {
        Config::set('mail.mailers.smtp.host', $settings->host);
        Config::set('mail.mailers.smtp.port', $settings->port);
        Config::set('mail.mailers.smtp.username', $settings->username);
        Config::set('mail.mailers.smtp.password', $settings->password);
        Config::set('mail.mailers.smtp.encryption', $settings->encryption);
        Config::set('mail.from.address', $settings->from_address);
        Config::set('mail.from.name', $settings->from_name);
    }

    $details = [
        'subject' => 'Test Email from Laravel',
        'title' => 'Hello from Laravel!',
        'body' => 'This is a test email using SMTP credentials from the database.'
    ];

    Mail::to('mis.dev@glory.com.ph')->send(new SampleMail($details));

    return 'Sample email sent!';
});




Route::get('/admin/mail-settings', [MailSettingController::class, 'edit'])->name('mail.settings.edit');
Route::post('/admin/mail-settings', [MailSettingController::class, 'update'])->name('mail.settings.update');



Route::get('/', function () {
    return view('login');
});
Route::post('/logout',[UserController::class, 'logout']);

Route::get('/home', function () {
    return view('home');
});

Route::post('/submit-loa', [UserController::class, 'submitLoa'])->name('submit.loa');

Route::get('/fileALoa', [UserController::class, 'showFileALoa'], function () {
    return view('fileALoa');
});
Route::get('/listOfLOA',[UserController::class, 'showListOfLoa'], function () {
    return view('listOfLOA');
});
Route::get('/loaDetails', function () {
    return view('loaDetails');
});
Route::get('/approachingTheDeadline', function () {
    return view('approachingTheDeadline');
});
Route::get('/overdue', function () {
    return view('overdue');
});


Route::get('/submitter', function () {
    return view('submitter');
});
Route::get('/register', [UserController::class, 'create'], function () {
    return view('register');
});


Route::post('/login',[UserController::class, 'login']);
Route::post('/register',[UserController::class, 'register']);

Route::get('/approaching-deadline', [DeadlineController::class, 'index'])->name('deadline.index');
Route::get('/approaching-deadline/data', [DeadlineController::class, 'getData'])->name('deadline.data');

