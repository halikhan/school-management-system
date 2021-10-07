<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistraionFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;

use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSallaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeMonthlySalaryController;




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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [Admincontroller::class, 'logout' ])->name('admin.logout');


// Route for redirect to login if you are not loging and paste any URL of the project
Route::group(['middleware' =>'auth'],function(){


// All Routes regarding User Management

Route::prefix('users')->group(function(){

    Route::get('/veiw', [UserController::class, 'UserView' ])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd' ])->name('user.add');
    Route::post('/store', [UserController::class, 'UserStore' ])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit' ])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate' ])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete' ])->name('user.delete');
    
}); // End of User


// All Routes regarding Profile and Password

Route::prefix('profile')->group(function(){

    Route::get('/veiw', [ProfileController::class, 'ProfileView' ])->name('profile.veiw');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit' ])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore' ])->name('profile.store');
    Route::get('/password/veiw', [ProfileController::class, 'PasswordView' ])->name('password.veiw');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate' ])->name('password.update');
   
}); // End of profile


// All Routes regarding Setup Management

Route::prefix('setups')->group(function(){

    Route::get('/student/class/veiw', [StudentClassController::class, 'VeiwStudent' ])->name('student.class.veiw');
    Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd' ])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore' ])->name('store.student.class');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit' ])->name('student.class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate' ])->name('update.student.class');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete' ])->name('student.class.delete');
   
// All routes about Student Year 
    
    Route::get('/student/year/veiw', [StudentYearController::class, 'VeiwYear' ])->name('student.year.veiw');
    Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd' ])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class, 'StudentYearStore' ])->name('store.student.year');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit' ])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate' ])->name('update.student.Year');
    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete' ])->name('student.year.delete');
   
// All routes about Student Group

    Route::get('/student/group/veiw', [StudentGroupController::class, 'VeiwGroup' ])->name('student.group.veiw');
    Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd' ])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class, 'StudentGroupStore' ])->name('store.student.group');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit' ])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate' ])->name('update.student.group');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete' ])->name('student.group.delete');

// All routes about Student Shift

    Route::get('/student/Shift/veiw', [StudentShiftController::class, 'VeiwShift' ])->name('student.Shift.veiw');
    Route::get('/student/Shift/add', [StudentShiftController::class, 'StudentShiftAdd' ])->name('student.Shift.add');
    Route::post('/student/Shift/store', [StudentShiftController::class, 'StudentShiftStore' ])->name('store.student.Shift');
    Route::get('/student/Shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit' ])->name('student.Shift.edit');
    Route::post('/student/Shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate' ])->name('update.student.Shift');
    Route::get('/student/Shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete' ])->name('student.Shift.delete');

// All routes about Fee Category

    Route::get('/Fee/Category/veiw', [FeeCategoryController::class, 'VeiwFeeCategory' ])->name('Fee.Category.veiw');
    Route::get('/Fee/Category/add', [FeeCategoryController::class, 'FeeCategoryAdd' ])->name('Fee.Category.add');
    Route::post('/Fee/Category/store', [FeeCategoryController::class, 'FeeCategoryStore' ])->name('store.Fee.Category');
    Route::get('/Fee/Category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit' ])->name('Fee.Category.edit');
    Route::post('/Fee/Category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate' ])->name('update.Fee.Category');
    Route::get('/Fee/Category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete' ])->name('Fee.Category.delete');


// All routes about Fee Category Amount

    Route::get('/Fee/Amount/veiw', [FeeAmountController::class, 'VeiwFeeAmount' ])->name('Fee.Amount.veiw');
    Route::get('/Fee/Amount/add', [FeeAmountController::class, 'FeeAmountAdd' ])->name('Fee.Amount.add');
    Route::post('/Fee/Amount/store', [FeeAmountController::class, 'FeeAmountStore' ])->name('store.Fee.Amount');
    Route::get('/Fee/Amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit' ])->name('Fee.Amount.edit');
    Route::post('/Fee/Amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate' ])->name('update.Fee.Amount');
    Route::get('/Fee/Amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails' ])->name('Fee.Amount.details');
//Route::get('/Fee/Amount/delete/{id}', [FeeAmountController::class, 'FeeAmountDelete' ])->name('Fee.Amount.delete');


// All routes about Exam Type

    Route::get('/Exam/Type/veiw', [ExamTypeController::class, 'VeiwExamType' ])->name('Exam.Type.veiw');
    Route::get('/Exam/Type/add', [ExamTypeController::class, 'ExamTypeAdd' ])->name('Exam.Type.add');
    Route::post('/Exam/Type/store', [ExamTypeController::class, 'ExamTypeStore' ])->name('store.Exam.Type');
    Route::get('/Exam/Type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit' ])->name('Exam.Type.edit');
    Route::post('/Exam/Type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate' ])->name('update.Exam.Type');
    Route::get('/Exam/Type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete' ])->name('Exam.Type.delete');



// All routes about School Subject

    Route::get('/School/Subject/veiw', [SchoolSubjectController::class, 'VeiwSchoolSubject' ])->name('School.Subject.veiw');
    Route::get('/School/Subject/add', [SchoolSubjectController::class, 'SchoolSubjectAdd' ])->name('School.Subject.add');
    Route::post('/School/Subject/store', [SchoolSubjectController::class, 'SchoolSubjectStore' ])->name('store.School.Subject');
    Route::get('/School/Subject/edit/{id}', [SchoolSubjectController::class, 'SchoolSubjectEdit' ])->name('School.Subject.edit');
    Route::post('/School/Subject/update/{id}', [SchoolSubjectController::class, 'SchoolSubjectUpdate' ])->name('update.School.Subject');
    Route::get('/School/Subject/delete/{id}', [SchoolSubjectController::class, 'SchoolSubjectDelete' ])->name('School.Subject.delete');



// All routes about Fee Category Amount

    Route::get('/Assign/Subject/veiw', [AssignSubjectController::class, 'VeiwAssignSubject' ])->name('Assign.Subject.veiw');
    Route::get('/Assign/Subject/add', [AssignSubjectController::class, 'AssignSubjectAdd' ])->name('Assign.Subject.add');
    Route::post('/Assign/Subject/store', [AssignSubjectController::class, 'AssignSubjectStore' ])->name('store.Assign.Subject');
    Route::get('/Assign/Subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit' ])->name('Assign.Subject.edit');
    Route::post('/Assign/Subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate' ])->name('update.Assign.Subject');
    Route::get('/Assign/Subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetails' ])->name('Assign.Subject.details');

    
// All routes about School Subject

    Route::get('/Designation/veiw', [DesignationController::class, 'VeiwDesignation' ])->name('Designation.veiw');
    Route::get('/Designation/add', [DesignationController::class, 'DesignationAdd' ])->name('Designation.add');
    Route::post('/Designation/store', [DesignationController::class, 'DesignationStore' ])->name('store.Designation');
    Route::get('/Designation/edit/{id}', [DesignationController::class, 'DesignationEdit' ])->name('Designation.edit');
    Route::post('/Designation/update/{id}', [DesignationController::class, 'DesignationUpdate' ])->name('update.Designation');
    Route::get('/Designation/delete/{id}', [DesignationController::class, 'DesignationDelete' ])->name('Designation.delete');



    
});  // End of setups

// All Routes regarding Student Management

Route::prefix('students')->group(function(){

    Route::get('/reg/veiw', [StudentRegController::class, 'StudentRegView' ])->name('student.reg.veiw');
    Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd' ])->name('Student.reg.add');
    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore' ])->name('store.student.reg');
    Route::get('/Year/class/wise', [StudentRegController::class, 'StudentYearclasswise' ])->name('Student.Year.class.wise');
    Route::get('/Student/reg/edit/{student_id}',[StudentRegController::class, 'StudentRegEdit' ])->name('Student.reg.edit');
    Route::post('/Student/reg/update/{student_id}',[StudentRegController::class, 'StudentRegUpdate' ])->name('update.student.reg');
    Route::get('/Student/reg/promotion/{student_id}',[StudentRegController::class, 'StudentRegPromotion' ])->name('Student.reg.promotion');
    Route::post('/Student/promotion/update/{student_id}',[StudentRegController::class, 'StudentPromotionUpdate' ])->name('promotion.student.reg');
    Route::get('/Student/reg/details/{student_id}',[StudentRegController::class, 'StudentRegDetails' ])->name('Student.reg.details');
    
   // All Routes regarding Roll Generate

    Route::get('/roll/veiw', [StudentRollController::class, 'RollGenerateView' ])->name('roll.generate.veiw');
    Route::get('/roll/getstudents', [StudentRollController::class, 'GetStudents' ])->name('student.registration.getstudents');
    Route::post('/roll/generate/store', [StudentRollController::class, 'RollGenerateStore' ])->name('roll.generate.store');
    

    // All Routes regarding Student Registraion Fee

    Route::get('/registration/fee/veiw', [RegistraionFeeController::class, 'RegFeeView' ])->name('registration.fee.veiw');
    Route::get('/registration/fee/classwise', [RegistraionFeeController::class, 'RegFeeClassWise' ])->name('registration.fee.classwise.get');
    Route::get('/registration/fee/payslip', [RegistraionFeeController::class, 'RegFeePaySlip' ])->name('registration.fee.payslip');
  
    // All Routes regarding Student Monthly Fee

     Route::get('/monthly/fee/veiw', [MonthlyFeeController::class, 'MonthlyFeeView' ])->name('monthly.fee.veiw');
     Route::get('/monthly/fee/classwise', [MonthlyFeeController::class, 'MonthlyFeeClassWise' ])->name('monthly.fee.classwise.get');
     Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePaySlip' ])->name('monthly.fee.payslip');
   
    // All Routes regarding Student Monthly Fee

     Route::get('/exam/fee/veiw', [ExamFeeController::class, 'ExamFeeView' ])->name('exam.fee.veiw');
     Route::get('/exam/fee/classwise', [ExamFeeController::class, 'ExamFeeClassWise' ])->name('exam.fee.classwise.get');
     Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePaySlip' ])->name('exam.fee.payslip');
  
    
}); // End of students


// All Routes regarding Employee Management

Route::prefix('employees')->group(function(){

    // All Routes regarding Employee Registrations

    Route::get('/reg/employee/veiw', [EmployeeRegController::class, 'EmployeeRegView' ])->name('employee.reg.veiw');
    Route::get('/reg/employee/add', [EmployeeRegController::class, 'EmployeeRegAdd' ])->name('employee.reg.add');
    Route::post('/reg/employee/store', [EmployeeRegController::class, 'EmployeeRegStore' ])->name('store.employee.reg');
    Route::get('/reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeRegEdit' ])->name('employee.reg.edit');
    Route::post('/reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeRegUpdate' ])->name('employee.reg.update');
    Route::get('/reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeRegDetails' ])->name('employee.reg.details');
    

    // All Routes regarding Employee Sallary


    Route::get('salary/employee/veiw', [EmployeeSallaryController::class, 'EmployeeSalaryView' ])->name('employee.salary.veiw');
    Route::get('salary/employee/increment/{id}', [EmployeeSallaryController::class, 'EmployeeSalaryIncrement' ])->name('employee.salary.increment');
    Route::post('salary/employee/store/{id}', [EmployeeSallaryController::class, 'EmployeeStoretUpdate' ])->name('update.store.increment');
    Route::get('salary/employee/details/{id}', [EmployeeSallaryController::class, 'EmployeeIncrementDetails' ])->name('employee.increment.details');
    


    // All Routes regarding Employee Leave


    Route::get('leave/employee/veiw', [EmployeeLeaveController::class, 'EmployeeLeaveView' ])->name('employee.leave.veiw');
    Route::get('leave/employee/Add', [EmployeeLeaveController::class, 'EmployeeLeaveAdd' ])->name('employee.leave.add');
    Route::post('leave/employee/store', [EmployeeLeaveController::class, 'EmployeeLeaveStore' ])->name('store.employee.leave'); 
    Route::get('leave/employee/edit/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveEdit' ])->name('employee.leave.edit');
    Route::post('leave/employee/update/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveUpdate' ])->name('update.employee.leave');
    Route::get('leave/employee/delete/{id}', [EmployeeLeaveController::class, 'EmployeeLeaveDelete' ])->name('employee.leave.delete');



   
    // All Routes regarding Employee attendance


    Route::get('attendance/employee/veiw', [EmployeeAttendanceController::class, 'EmpAttendanceView' ])->name('employee.attendance.veiw');
    Route::get('attendance/employee/Add', [EmployeeAttendanceController::class, 'EmpAttendanceAdd' ])->name('employee.attendence.add');
    Route::post('attendance/employee/Store', [EmployeeAttendanceController::class, 'EmpAttendanceStore' ])->name('store.employee.attendence');
    Route::get('attendance/employee/Edit/{date}', [EmployeeAttendanceController::class, 'EmpAttendanceEdit' ])->name('employee.attendence.edit');
    Route::get('attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'EmpAttendanceDetails' ])->name('employee.attendence.details');
    
    
    // All Routes regarding Employee monthly Salary

    Route::get('monthly/Salary/veiw', [EmployeeMonthlySalaryController::class, 'MonthlySalaryView' ])->name('monthly.salary.veiw');
    Route::get('monthly/Salary/get', [EmployeeMonthlySalaryController::class, 'MonthlySalaryGet' ])->name('employee.monthly.salary.get');
    Route::get('monthly/Salary/payslip', [EmployeeMonthlySalaryController::class, 'MonthlySalaryPayslip' ])->name('employee.monthly.salary.payslip');
    
    

    
    








}); // End of employees 








}); // End of Middleware Auth Route