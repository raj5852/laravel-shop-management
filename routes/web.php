<?php

use App\Http\Controllers\AddCategoryController;
use App\Http\Controllers\AddPurchaseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageBrandController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageProduct;
use App\Http\Controllers\ManagPurchaseController;
use App\Http\Controllers\NewBrandController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;



Route::view('/', 'login')->name('login');
Route::post('login-post', [LoginController::class, 'customLogin'])->name('loginpost');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('pos', [POSController::class, 'index'])->name('pos');
    Route::get('sales', [SalesController::class, 'index'])->name('sales');
    Route::get('returns', [ReturnController::class, 'index'])->name('returns');
    Route::get('addpurchase', [AddPurchaseController::class, 'index'])->name('addpurchase');
    Route::get('managpurchase', [ManagPurchaseController::class, 'index'])->name('managpurchase');
    Route::get('stock', [StockController::class, 'index'])->name('stock');
    Route::get('addproduct', [ProductController::class, 'index'])->name('addproduct');
    Route::get('manageproduct', [ManageProduct::class, 'index'])->name('manageproduct');
    Route::get('addcategory', [AddCategoryController::class, 'index'])->name('addcategory');
    Route::get('managecategory', [ManageCategoryController::class, 'index'])->name('managecategory');
    Route::get('newbrand', [NewBrandController::class, 'index'])->name('newbrand');
    Route::get('managebrand', [ManageBrandController::class, 'index'])->name('managebrand');


    //ajax customer request
    Route::get('get-customer', [POSController::class, 'getCustomer'])->name('getcustomer');
    Route::post('add-brand', [NewBrandController::class, 'addbrand'])->name('addbrand');
    Route::post('brandUpdate',[ManageBrandController::class,'update'])->name('brandUpdate');
    Route::get('brand-delete/{id}',[ManageBrandController::class,'delete']);

    Route::post('create-categorypost',[AddCategoryController::class,'create'])->name('addcategoryPost');
    Route::post('create-categorypostBrand',[NewBrandController::class,'createBrand'])->name('addBrandPost');
    
    Route::get('getCategory',[ManageCategoryController::class,'getData'])->name('getCategoryYaj');
    Route::post('category-Idget',[ManageCategoryController::class,'getId'])->name('categoryIdget');
    Route::post('categoryUpdate',[ManageCategoryController::class,'update'])->name('categoryUpdate');
    Route::get('get-categoryAjax',[ManageCategoryController::class,'ajax'])->name('getcategoryAjax');
    Route::get('get-brandAjax',[ManageCategoryController::class,'ajaxBrand'])->name('getbrandAjax');

    Route::post('product-post',[ProductController::class,'productCreate'])->name('productCreate');
    Route::get('getProductDetails',[ManageProduct::class,'getProductDetails'])->name('getProductDetails');
    Route::post('getProductIdData',[ManageProduct::class,'getProductIdData'])->name('getProductIdData');
    Route::post('productUpdate',[ManageProduct::class,'productUpdate'])->name('productUpdate');
    Route::post('product-delete',[ManageProduct::class,'productdelete'])->name('productdelete');
});
