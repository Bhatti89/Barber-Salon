<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student6A_Controller;
use App\Http\Controllers\bookformcontroller;
use App\Http\Controllers\Student_Controller;
use App\Http\Controllers\Flower_Controller;
use App\Http\Controllers\Barber_Controller;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\Order_Controller;
use App\Http\Controllers\Client_Controller;
use App\Http\Controllers\City_Controller;
use App\Http\Controllers\Department_Controller;
use App\Http\Controllers\citycontroller;
use App\Mail\form_mail;
use App\Http\Controllers\mailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
  //                           <------ MAIL ------->

Route::get('/send_mail', function(){
  // Mail::to('maazrehan@ciitwah.edu.pk')
  Mail::to('malikfaizkhan1@gmail.com')
  ->send(new form_mail());
  });

Route::get('/mail_form', 
[mailController::class, 'open_form' ])
->name('mail_form');

Route::post('/send_mail', 
[mailController::class, 'send_mail'])
->name('send_mail');

Route::get('/show_data', [mailController::class, 'show_file_data']);
Route::get('/view_file/{id}', [mailController::class, 'file_view']);   
Route::get('/download_file/{file}', [mailController::class, 'file_download']);


 //                           <------ CLIENT ------->

 Route::get('client/read', 
 [Client_Controller::class, 'readClients']);
 
 Route::get('client/create',
 [Client_Controller::class, 'create'])
 ->name('client.create');
 
 Route::post('client/store', 
 [Client_Controller::class, 'store'])
 ->name('client.store');  

 Route::post('client/read/{id}', 
[Client_Controller::class,'destroy'])
->name('client.destroy');

Route::post('client/update/{id}',
 [Client_Controller::class,'edit'])
 ->name('clients.edit');
Route::post('client/updated/{id}', [Client_Controller::class,'update'])->name('client.update');

 //                           <------ ORDER ------->

 Route::get('order/read', 
 [Order_Controller::class, 'order']);
 Route::post('order/reads', 
 [Order_Controller::class, 'read'])->name('order.mail');
 Route::get('order/create',
 [Order_Controller::class, 'create'])
 ->name('order.create');
 
 Route::post('order/store', 
 [Order_Controller::class, 'store'])
 ->name('order.store');

 Route::post('order/read/{id}', 
[Order_Controller::class,'destroy'])
->name('order.destroy');

Route::post('order/update/{id}',
 [Order_Controller::class,'edit'])
 ->name('orders.edit');
Route::post('order/updated/{id}', [Order_Controller::class,'update'])->name('order.update');



 //                           <------ PRODUCT------->
      
 Route::get('product/read', 
 [Product_Controller::class, 'readProducts']);
 
 Route::get('product/create',
 [Product_Controller::class, 'create'])
 ->name('product.create');
 
 Route::post('product/store', 
 [Product_Controller::class, 'store'])
 ->name('product.store');

 Route::post('product/read/{id}', 
[Product_Controller::class,'destroy'])
->name('product.destroy');

Route::post('product/update/{id}',
 [Product_Controller::class,'edit'])
 ->name('products.edit');
Route::post('product/updated/{id}', [Product_Controller::class,'update'])->name('product.update');


 //                           <------ BARBER------->

 Route::get('barber/read', 
 [Barber_Controller::class, 'readBarber']);
 
 Route::get('barber/create',
 [Barber_Controller::class, 'create'])
 ->name('barber.create');
 
 Route::post('barber/store', 
 [Barber_Controller::class, 'store'])
 ->name('barber.store');

//                            <------ FLOWER------->
Route::get('flower/read', 
[Flower_Controller::class, 'readFlowers']);

Route::get('flower/create',
[Flower_Controller::class, 'create'])
->name('flower.create');

Route::post('flower/store', 
[Flower_Controller::class, 'store'])
->name('flower.store');

Route::post('flower/delete', 
[Flower_Controller::class, 'deleterecord'])
->name('flower.delete');

Route::get('flower/delete',
[Flower_Controller::class, 'delete'])
->name('flower.deletes');

// Route::post('flower/read/{type}', 
// [Flower_Controller::class,'destroy'])
// ->name('flowers.destroy');

Route::post('flower/update/{type}',
 [Flower_Controller::class,'edit'])
 ->name('flowers.edit');

// Route::post('/flower/read', [bookformcontroller::class, 'Flower_Controller'])->name('flower.read');


 //                  <------ BOOK FORM------->

Route::get('bookform/read', 
[bookformcontroller::class, 'read']);

Route::get('bookform/create',
[bookformcontroller::class, 'create'])
->name('bookform.create');

Route::post('bookform/store', 
[bookformcontroller::class, 'store'])
->name('bookform.store');



 //                         <------ STUDENT------->
Route::get('student6A/read', 
[Student6A_Controller::class, 'readStudents6A']);

Route::get('student6A/create',
[Student6A_Controller::class, 'create'])
->name('student.create');

Route::post('student6A/store', 
[Student6A_Controller::class, 'store'])
->name('student.store');

Route::post('student6A/delete', 
[Student6A_Controller::class, 'deleterecord'])
->name('student.delete');

Route::get('student6A/delete',
[Student6A_Controller::class, 'delete'])
->name('student.deletes');

Route::post('student6A/read/{registration_no}', 
[Student6A_Controller::class,'destroy'])
->name('students.destroy');

Route::post('student6A/update/{registration_no}',
 [Student6A_Controller::class,'edit'])
 ->name('students.edit');
Route::post('student6A/updated/{registration_no}', [Student6A_Controller::class,'update'])->name('student.update');


//                           <------ DEPARTMENT ------->

Route::get('department/read', 
[Department_Controller::class, 'readDepartments']);

Route::get('department/create',
[Department_Controller::class, 'create'])
->name('department.create');

Route::post('department/store', 
[Department_Controller::class, 'store'])
->name('department.store');

Route::post('department/read/{id}', 
[Department_Controller::class,'destroy'])
->name('department.destroy');

Route::post('department/update/{id}',
[Department_Controller::class,'edit'])
->name('departments.edit');
Route::post('department/updated/{id}', [Department_Controller::class,'update'])->name('department.update');


//                           <------ CITY ------->

Route::get('/', function () {
    return view('welcome');
});

Route::get('city/read', 
 [City_Controller::class, 'readCitys']);
 
 Route::get('cityy/create',
 [City_Controller::class, 'city'])
 ->name('city.create');
 
 Route::post('cityy/store', 
 [City_Controller::class, 'store'])
 ->name('city.store');

 Route::post('city/read/{user_name}', 
[City_Controller::class,'destroy'])
->name('city.destroy');

Route::post('city/update/{user_name}',
 [City_Controller::class,'edit'])
 ->name('citys.edit');
Route::post('city/updated/{user_name}', [City_Controller::class,'update'])->name('city.update');

                         //Foreign Key

Route::get('city/create',
[citycontroller::class, 'create'])
->name('city.create');
                         
Route::post('city/store', 
[citycontroller::class, 'store'])
->name('city.store');

