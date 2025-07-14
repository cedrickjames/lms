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
Route::post('/approve-user/{id}', [UserController::class, 'approveUser'])->name('approve.user');

Route::post('/logout',[UserController::class, 'logout']);

// Route::get('/home',[DashBoardController::class, 'showListOfLoa'], function () {
//     return view('home');
// });


Route::get('/home', [DashBoardController::class, 'showListOfLoa'])->middleware('auth');

Route::post('/submit-loa', [UserController::class, 'submitLoa'])->name('submit.loa');
Route::post('/edit-loa', [LoaController::class, 'editLoa'])->name('edit.loa');
Route::post('/submit-requirement', [LoaController::class, 'submitRequirement'])->name('submit.requirement');
Route::post('/confirm-requirement', [LoaController::class, 'confirmRequirement'])->name('confirm.requirement');



// Route::get('/fileALoa', [UserController::class, 'showFileALoa'], function () {
//     return view('fileALoa');
// });


Route::get('/fileALoa', [UserController::class, 'showFileALoa'])
    ->middleware(['auth', 'admin'])
    ->name('fileALoa');

// Route::get('/listOfLOA',[UserController::class, 'showListOfLoa'], function () {
//     return view('listOfLOA');
// });
Route::get('/listOfLOA',[UserController::class, 'showListOfLoa'])->middleware('auth');


// Route::get('/listOfLOASubmitter',[UserController::class, 'showListOfLoaAccountHolder'], function () {
//     return view('listOfLOASubmitter');
// });

Route::get('/listOfLOASubmitter',[UserController::class, 'showListOfLoaAccountHolder'])->middleware('auth');

// Route::get('/loaDetails/{id}/{requirement?}', [LoaController::class, 'show'])->name('loa.details');

Route::get('/loaDetails/{id}/{requirement?}', [LoaController::class, 'show'])
    ->middleware('auth')
    ->name('loa.details');


// Route::get('/settings/{settings}', [Settings::class, 'settings'])->name('lms.settings');
Route::get('/settings/{settings}', [Settings::class, 'settings'])
    ->middleware('auth')
    ->name('lms.settings');


// Route::get('/settings',[Settings::class,'settings'], function(){
//     return view('settings');
// });
// Route::get('/approachingTheDeadline',[tablesController::class, 'showListOfLoaApproaching'], function () {
//     return view('approachingTheDeadline');
// });

Route::get('/approachingTheDeadline',[tablesController::class, 'showListOfLoaApproaching'])->middleware('auth');


// Route::get('/approachingTheDeadlineSubmitter',[tablesController::class, 'showListOfLoaApproachingSubmitter'], function () {
//     return view('approachingTheDeadlineSubmitter');
// });

Route::get('/approachingTheDeadlineSubmitter',[tablesController::class, 'showListOfLoaApproachingSubmitter'])->middleware('auth');

// Route::get('/overdue',[tablesController::class, 'showListOfLoaOverDue'], function () {
//     return view('overdue');
// });

Route::get('/overdue',[tablesController::class, 'showListOfLoaOverDue'])->middleware('auth');



// Route::get('/overdueSubmitter',[tablesController::class, 'showListOfLoaOverDueSubmitter'], function () {
//     return view('overdueSubmitter');
// });

Route::get('/overdueSubmitter',[tablesController::class, 'showListOfLoaOverDueSubmitter'])->middleware('auth');

// Route::get('/submitter',[SubmitterDashboardController::class,'showListOfLoa'], function () {
//     return view('submitter');
// });
Route::get('/submitter',[SubmitterDashboardController::class,'showListOfLoa'])->middleware('auth');



Route::get('/register', [UserController::class, 'create'], function () {
    return view('register');
});

Route::post('/updateUsersInfo', [Settings::class, 'updateAccountAdmin'], function () {
    return view('settings');
});
Route::post('/updateLoaInfo', [Settings::class, 'updateLoaInformation'], function () {
    return view('loaDetails');
});


Route::post('/submitAccountUpdate', [Settings::class, 'updateAccount'], function () {
    return view('settings');
});
Route::post('/submitSupplierUpdate', [Settings::class, 'updateSupplier'], function () {
    return view('settings');
});
Route::post('/submitSupplierAdd', [Settings::class, 'addSupplier'], function () {
    return view('settings');
});

Route::post('/submitRequirementAdd', [Settings::class, 'addRequirement'], function () {
    return view('settings');
});

Route::post('/submitRequirementEdit', [Settings::class, 'updateRequirements'], function () {
    return view('settings');
});
Route::post('/submitTypeOfLoaAdd', [Settings::class, 'addTypeOfLOA'], function () {
    return view('settings');
});







Route::post('/login',[UserController::class, 'login']);
Route::post('/register',[UserController::class, 'register']);

Route::get('/approaching-deadline', [DeadlineController::class, 'index'])->name('deadline.index');
Route::get('/approaching-deadline/data', [DeadlineController::class, 'getData'])->name('deadline.data');

