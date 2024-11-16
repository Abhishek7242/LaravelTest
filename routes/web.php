<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ImageController;
use App\Models\Customers;
use App\Http\Controllers\YourControllerName;
// Route::get('/{name?}', function ($name=null) {
//     $data = compact('name');

//     return view('home')->with($data);
// });

Route::group(['prefix'=>'/customers'],function()  {
    
    Route::get('/', [DemoController::class,'index']);
    Route::get('/', [CustomersController::class,'index']);
    Route::post('/', [CustomersController::class,'store']);
    Route::get('/delete/{id}', [CustomersController::class, 'delete'])->name('customer.delete');
    Route::get('/permanentDelete/{id}', [CustomersController::class, 'forceDelete'])->name('customer.forceDelete');
    Route::get('/edit/{id}', [CustomersController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}', [CustomersController::class, 'update'])->name('customer.update');
    Route::get('/restore/{id}', [CustomersController::class, 'restore'])->name('customer.restore');
    
    Route::get('/view', [CustomersController::class,'view'])->name('customer.view');
    Route::get('/wtrash', [CustomersController::class,'trash'])->name('customer.trash');
    Route::post('/uplaod', [ImageController::class,'upload'])->name('image.upload');
})
    // Route::post('/reg', [DemoController::class,'register']);
    // Route::get('/about', [DemoController::class,'about']);
// Route::get('/customer', function(){
// $customers = Customers::all();
// echo '<pre>';
// print_r($customers->toArray());
// });


// Route::get('/contact', SingleActionController::class); //single action invokable function
// Route::resource('/photo', ResourseController::class); //single action invokable function


// Route::any('/demo', function () {
//     return view('demo');
// });
// Route::any('/', function () {
//     return view('demoHome');
// });
// Route::any('/about', function () {
//     return view('about');
// });
// Route::any('/upload', function () {
//     return view('imageUpload');
// });
// Route::any('/demo/{name}/{id?}', function ($name,$id=1) {
//     // echo $name,$id;eee
//     $data = compact('name','id');
//     return view('demo')->with($data);
// });
?>