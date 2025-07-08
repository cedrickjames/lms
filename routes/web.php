<?php

use App\Mail\SampleMail;
use App\Models\MailSetting;

use App\Mail\RequirementMail;

use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

use App\Http\Controllers\LoaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\tablesController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\MailSettingController;
use App\Http\Controllers\SubmitterDashboardController;
use App\Http\Controllers\SendEmailNotificationController;
use App\Http\Controllers\SendEmailNotificationControllerDaily;
use App\Http\Controllers\SendEmailNotificationControllerWeekly;
use App\Http\Controllers\SendEmailNotificationControllerMonthly;

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





Route::get('/emailNotificationOverDue', [SendEmailNotificationController::class, 'showPage']);

Route::get('/emailNotificationDaily', [SendEmailNotificationControllerDaily::class, 'showPage']);

Route::get('/emailNotificationWeekly', [SendEmailNotificationControllerWeekly::class, 'showPage']);
Route::get('/emailNotificationMonthly', [SendEmailNotificationControllerMonthly::class, 'showPage']);





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

Route::get('/home',[DashBoardController::class, 'showListOfLoa'], function () {
    return view('home');
});

Route::post('/submit-loa', [UserController::class, 'submitLoa'])->name('submit.loa');
Route::post('/submit-requirement', [LoaController::class, 'submitRequirement'])->name('submit.requirement');
Route::post('/confirm-requirement', [LoaController::class, 'confirmRequirement'])->name('confirm.requirement');



Route::get('/fileALoa', [UserController::class, 'showFileALoa'], function () {
    return view('fileALoa');
});
Route::get('/listOfLOA',[UserController::class, 'showListOfLoa'], function () {
    return view('listOfLOA');
});
Route::get('/listOfLOASubmitter',[UserController::class, 'showListOfLoaAccountHolder'], function () {
    return view('listOfLOASubmitter11');
});


Route::get('/loaDetails/{id}/{requirement?}', [LoaController::class, 'show'])->name('loa.details');
Route::get('/settings/{settings}', [Settings::class, 'settings'])->name('lms.settings');


// Route::get('/settings',[Settings::class,'settings'], function(){
//     return view('settings');
// });
Route::get('/approachingTheDeadline',[tablesController::class, 'showListOfLoaApproaching'], function () {
    return view('approachingTheDeadline');
});

Route::get('/approachingTheDeadlineSubmitter',[tablesController::class, 'showListOfLoaApproachingSubmitter'], function () {
    return view('approachingTheDeadlineSubmitter');
});
Route::get('/overdue',[tablesController::class, 'showListOfLoaOverDue'], function () {
    return view('overdue');
});
Route::get('/overdueSubmitter',[tablesController::class, 'showListOfLoaOverDueSubmitter'], function () {
    return view('overdueSubmitter');
});

Route::get('/submitter',[SubmitterDashboardController::class,'showListOfLoa'], function () {
    return view('submitter');
});
Route::get('/register', [UserController::class, 'create'], function () {
    return view('register');
});
Route::post('/submitAccountUpdate', [Settings::class, 'updateAccount'], function () {
    return view('settings');
});

Route::post('/login',[UserController::class, 'login']);
Route::post('/register',[UserController::class, 'register']);

Route::get('/approaching-deadline', [DeadlineController::class, 'index'])->name('deadline.index');
Route::get('/approaching-deadline/data', [DeadlineController::class, 'getData'])->name('deadline.data');

