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

Route::get(
    '/', function () {
        return redirect('login');
    }
)->name('home');

Route::group(
    ['namespace' => 'backend', 'middleware' => ['web','guest']], function () {
        Route::get('/login', 'UserController@login')->name('login');
        Route::post('/login', 'UserController@authenticate');        
        Route::get('/forgot', 'UserController@forgot')->name('forgot');        
        Route::post('/forgot', 'UserController@forgotPost')->name('forgot_post');        
        Route::get('/reset/{token}', 'UserController@reset')->name('reset');

        Route::post('/reset/{token}', 'UserController@resetPost')->name('reset_post');        
    }
);

Route::group(
    ['namespace' => 'backend', 'middleware' => 'auth'], function () {
        Route::get('/logout', 'UserController@logout')->name('logout');
        Route::get('/lock', 'UserController@lock')->name('lockscreen');
        Route::resource('user', 'UserController');
        // Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');


    }
);

//
//        Route::get(
//            '/set-locale/{lang}', function ($lang) {
//                //set user wanted locale to session
//                session('user_locale', $lang);
//                dd(session('user_locale'));
//                return redirect()->back();
//            }
//        );
Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        Route::get('/users', 'UsersController@show')->name('show');
        //Class routes
        Route::get('/dashboard', 'DashboardController@index')->name('index');
        Route::get('/class/create', 'classController@index')->name('index');
        Route::post('/class/create', 'classController@create');
        Route::get('/class/list', 'classController@show')->name('show');
        Route::get('/class/edit/{id}', 'classController@edit');
        Route::post('/class/update', 'classController@update');
        Route::get('/class/delete/{id}', 'classController@delete');
        Route::get('/class/getsubjects/{class}', 'classController@getSubjects');
        //class off routes
        Route::get('/class-off', 'attendanceController@classOffIndex');
        Route::post('/class-off/store', 'attendanceController@classOffStore'); 
        Route::get('/class-off/delete/{id}', 'attendanceController@classOffDelete');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Subject routes
        Route::get('/subject/create', 'subjectController@index')->name('index');
        Route::post('/subject/create', 'subjectController@create');
        Route::get('/subject/list', 'subjectController@show')->name('show');
        Route::get('/subject/edit/{id}', 'subjectController@edit');
        Route::post('/subject/update', 'subjectController@update');
        Route::get('/subject/delete/{id}', 'subjectController@delete');
        Route::get('/subject/getmarks/{subject}/{cls}', 'subjectController@getmarks');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Student routes
        Route::get('/student/getRegi/{class}/{session}/{section}', 'studentController@getRegi');
        Route::get('/student/create', 'studentController@index')->name('index');
        Route::post('/student/create', 'studentController@create');
        Route::get('/student/list', 'studentController@show')->name('show');
        Route::post('/student/list', 'studentController@getList');
        Route::get('/student/view/{id}', 'studentController@view');
        Route::get('/student/edit/{id}', 'studentController@edit');
        Route::post('/student/update', 'studentController@update');
        Route::get('/student/delete/{id}', 'studentController@delete');
        Route::get('/student/getList/{class}/{section}/{shift}/{session}', 'studentController@getForMarks');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //student attendance
        Route::get('/attendance/create', 'attendanceController@index')->name('index');
        Route::post('/attendance/create', 'attendanceController@create');
        Route::get('/attendance/create-file', 'attendanceController@index_file')->name('index_file');
        Route::post('/attendance/create-file', 'attendanceController@create_file');
        //Reports Attendence
        Route::get('/attendance/list', 'attendanceController@show')->name('show');
        Route::post('/attendance/list', 'attendanceController@getlist');
        Route::get('/attendance/edit/{id}', 'attendanceController@edit')->name('edit');
        Route::post('/attendance/update', 'attendanceController@update');
        Route::get('/attendance/printlist/{class}/{section}/{shift}/{session}/{date}', 'attendanceController@printlist');
        Route::get('/attendance/report', 'attendanceController@report');
        Route::post('/attendance/report', 'attendanceController@getReport');
        Route::get('/attendance/monthly-report', 'attendanceController@monthlyReport');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Mark routes
        Route::get('/mark/create', 'markController@index')->name('index');
        Route::post('/mark/create', 'markController@create')->name('create');
        Route::get('/mark/list', 'markController@show')->name('show');
        Route::post('/mark/list', 'markController@getlist');
        Route::get('/mark/edit/{id}', 'markController@edit');
        Route::post('/mark/update', 'markController@update');
        Route::get('/mark/delete/{id}', 'markController@delete');
    }
);


Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Markssheet
        Route::get('/result/generate', 'gradesheetController@getgenerate')->name('getgenerate');
        Route::post('/result/generate', 'gradesheetController@postgenerate');

        Route::get('/result/search', 'gradesheetController@search')->name('search');
        Route::post('/result/search', 'gradesheetController@postsearch');

        Route::get('/results', 'gradesheetController@searchpub');
        Route::post('/results', 'gradesheetController@postsearchpub');

        Route::get('/gradesheet', 'gradesheetController@index')->name('index');
        Route::post('/gradesheet', 'gradesheetController@stdlist');
        Route::get('/gradesheet/print/{regiNo}/{exam}/{class}', 'gradesheetController@printsheet');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //promotion
        Route::get('/promotion', 'promotionController@index')->name('index');
        Route::post('/promotion', 'promotionController@store');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
       //Accounting
        Route::get('/accounting/sectors', 'accountingController@sectors')->name('sectors');
        Route::post('/accounting/sectorcreate', 'accountingController@sectorCreate');
        Route::get('/accounting/sectorlist', 'accountingController@sectorList');
        Route::get('/accounting/sectoredit/{id}', 'accountingController@sectorEdit');
        Route::post('/accounting/sectorupdate', 'accountingController@sectorUpdate');
        Route::get('/accounting/sectordelete/{id}', 'accountingController@sectorDelete');

        Route::get('/accounting/income', 'accountingController@income')->name('income');
        Route::post('/accounting/incomecreate', 'accountingController@incomeCreate');
        Route::get('/accounting/incomelist', 'accountingController@incomeList');
        Route::post('/accounting/incomelist', 'accountingController@incomeListPost');
        Route::get('/accounting/incomeedit/{id}', 'accountingController@incomeEdit');
        Route::post('/accounting/incomeupdate', 'accountingController@incomeUpdate');
        Route::get('/accounting/incomedelete/{id}', 'accountingController@incomeDelete');

        Route::get('/accounting/expence', 'accountingController@expence')->name('expence');
        Route::post('/accounting/expencecreate', 'accountingController@expenceCreate');
        Route::get('/accounting/expencelist', 'accountingController@expenceList');
        Route::post('/accounting/expencelist', 'accountingController@expenceListPost');
        Route::get('/accounting/expenceedit/{id}', 'accountingController@expenceEdit');
        Route::post('/accounting/expenceupdate', 'accountingController@expenceUpdate');
        Route::get('/accounting/expencedelete/{id}', 'accountingController@expenceDelete');

        Route::get('/accounting/report', 'accountingController@getReport');
        Route::get('/accounting/reportsum', 'accountingController@getReportsum');

        Route::get('/accounting/reportprint/{rtype}/{fdate}/{tdate}', 'accountingController@printReport');
        Route::get('/accounting/reportprintsum/{fdate}/{tdate}', 'accountingController@printReportsum');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
         //sms Routes

        Route::get('/sms', 'smsController@index');
        Route::post('/sms/create', 'smsController@create');
        Route::get('/sms/list', 'smsController@show');
        Route::get('/sms/edit/{id}', 'smsController@edit');
        Route::post('/sms/update', 'smsController@update');
        Route::get('/sms/delete/{id}', 'smsController@delete');

        Route::get('/sms-bulk', 'smsController@getsmssend');
        Route::post('/sms-bulk/send', 'smsController@postsmssend');
        Route::get('/smslog', 'smsController@getsmsLog');
        Route::post('/smslog', 'smsController@postsmsLog');
        Route::get('/smslog/delete/{id}', 'smsController@deleteLog');
        Route::get('/sms-type-info/{id}', 'smsController@getTypeInfo');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //tabulation sheet
        Route::get('/tabulation', 'tabulationController@index')->name('index');
        Route::post('/tabulation', 'tabulationController@getsheet');
        //barcode generate
        Route::get('/barcode', 'barcodeController@index')->name('index');
        Route::post('/barcode', 'barcodeController@generate');
 
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Reports
        //GPA Routes
        Route::get('/gpa', 'gpaController@index')->name('index');
        Route::post('/gpa/create', 'gpaController@create');
        Route::get('/gpa/list', 'gpaController@show')->name('show');
        Route::get('/gpa/edit/{id}', 'gpaController@edit');
        Route::post('/gpa/update', 'gpaController@update');
        Route::get('/gpa/delete/{id}', 'gpaController@delete');
    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Settings
        Route::get('/settings', 'settingsController@index');
        Route::post('/settings', 'settingsController@save');

        Route::get('/institute', 'instituteController@index');
        Route::post('/institute', 'instituteController@save');


    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Fees Related routes

        Route::get('/fees/setup', 'feesController@getsetup')->name('getsetup');
        Route::post('/fees/setup', 'feesController@postsetup');
        Route::get('/fees/list', 'feesController@getList');
        Route::post('/fees/list', 'feesController@postList');

        Route::get('/fee/edit/{id}', 'feesController@getEdit');
        Route::post('/fee/edit', 'feesController@postEdit');
        Route::get('/fee/delete/{id}', 'feesController@getDelete');

        Route::get('/fee/collection', 'feesController@getCollection');
        Route::post('/fee/collection', 'feesController@postCollection');
        Route::get('/fee/getListjson/{class}/{type}', 'feesController@getListjson');
        Route::get('/fee/getFeeInfo/{id}', 'feesController@getFeeInfo');
        Route::get('/fee/getDue/{class}/{stdId}', 'feesController@getDue');

        Route::get('/fees/view', 'feesController@stdfeeview');
        Route::post('/fees/view', 'feesController@stdfeeviewpost');
        Route::get('/fees/delete/{billNo}', 'feesController@stdfeesdelete');

        Route::get('/fees/report', 'feesController@report');
        Route::get('/fees/report/std/{regiNo}', 'feesController@reportstd');
        Route::get('/fees/report/{sDate}/{eDate}', 'feesController@reportprint');


        Route::get('/fees/details/{billNo}', 'feesController@billDetails');

    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //Admisstion routes
        Route::get('/regonline', 'admissionController@regonline');
        Route::post('/regonline', 'admissionController@Postregonline');
        Route::get('/applicants', 'admissionController@applicants');
        Route::post('/applicants', 'admissionController@postapplicants');
        Route::get('/applicants/view/{id}', 'admissionController@applicantview');
        Route::get('/applicants/payment', 'admissionController@payment');
        Route::get('/applicants/delete/{id}', 'admissionController@delete');
        Route::get('/admitcard', 'admissionController@admitcard');
        Route::post('/printadmitcard', 'admissionController@printAdmitCard');

    }
);
//Employees
Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //teacher routes
        Route::get('/teacher/create', 'teacherController@index');
        Route::post('/teacher/create', 'teacherController@create');
        Route::get('/teacher/list', 'teacherController@show');
        Route::get('/teacher/view/{id}', 'teacherController@view');
        Route::get('/teacher/edit/{id}', 'teacherController@edit');
        Route::post('/teacher/update', 'teacherController@update');
        Route::get('/teacher/delete/{id}', 'teacherController@delete');

        //teacher attendance
        //Route::get('/teacher-attendance/create','teacherController@createAttendance');
        //Route::post('/teacher-attendance/create','teacherController@postCreateAttendance');
        Route::get('/teacher-attendance/list', 'teacherController@attenaceList');
        Route::get(
            '/teacher-attendance/absenteeism-report', 
            'teacherController@absenteeismReport'
        );
        Route::get(
            '/teacher-attendance/monthly-report',
            'teacherController@monthlyAttendanceReport'
        );
        Route::get(
            '/teacher-attendance/monthly-report-2',
            'teacherController@monthlyAttendanceReport2'
        );

        //holyday Routes
        Route::get('/holidays', 'teacherController@holidayIndex');
        Route::post('/holidays/create', 'teacherController@holidayCreate');
        Route::get('/holidays/delete/{id}', 'teacherController@holidayDelete');


        //Leave Routes
        Route::get('/leaves', 'teacherController@leaveIndex');
        Route::get('/leaves/create', 'teacherController@leaveCreate');
        Route::post('/leaves/store', 'teacherController@leaveStore');
        Route::get('/leaves/update/{id}/{status}', 'teacherController@leaveUpdate');
        Route::get('/leaves/delete/{id}', 'teacherController@leaveDelete');


        //Work outside Routes
        Route::get('/workoutside', 'teacherController@workOutsideIndex');
        Route::get('/workoutside/create', 'teacherController@workOutsideCreate');
        Route::post('/workoutside/store', 'teacherController@workOutsideStore');
        Route::get('/workoutside/delete/{id}', 'teacherController@workOutsideDelete');

        //class off Routes
        Route::get('/class-off', 'attendanceController@classOffIndex');
        Route::post('/class-off/store', 'attendanceController@classOffStore');
        Route::get('/class-off/delete/{id}', 'attendanceController@classOffDelete');


    }
);

Route::group(
    ['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        //library routes
        Route::get('/library/addbook', 'libraryController@getAddbook');
        Route::post('/library/addbook', 'libraryController@postAddbook');
        Route::get('/library/view', 'libraryController@getviewbook');

        Route::get('/library/view-show', 'libraryController@postviewbook');

        Route::get('/library/edit/{id}', 'libraryController@getBook');
        Route::post('/library/update', 'libraryController@postUpdateBook');
        Route::get('/library/delete/{id}', 'libraryController@deleteBook');
        Route::get('/library/issuebook', 'libraryController@getissueBook');

        //check availabe book
        Route::get('/library/issuebook-availabe/{code}/{quantity}', 'libraryController@checkBookAvailability');
        Route::post('/library/issuebook', 'libraryController@postissueBook');

        Route::get('/library/issuebookview', 'libraryController@getissueBookview');
        Route::post('/library/issuebookview', 'libraryController@postissueBookview');
        Route::get('/library/issuebookupdate/{id}', 'libraryController@getissueBookupdate');
        Route::post('/library/issuebookupdate', 'libraryController@postissueBookupdate');
        Route::get('/library/issuebookdelete/{id}', 'libraryController@deleteissueBook');

        Route::get('/library/search', 'libraryController@getsearch');
        Route::get('/library/search2', 'libraryController@getsearch');
        Route::post('/library/search', 'libraryController@postsearch');
        Route::post('/library/search2', 'libraryController@postsearch2');

        Route::get('/library/reports', 'libraryController@getReports');
        Route::get('/library/reports/fine', 'libraryController@getReportsFine');

        Route::get('/library/reportprint/{do}', 'libraryController@Reportprint');
        Route::get('/library/reports/fine/{month}', 'libraryController@ReportsFineprint');
        
    }
);

