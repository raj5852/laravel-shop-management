<?php

use App\Http\Controllers\AddCategoryController;
use App\Http\Controllers\AddPurchaseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageBrandController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\ManageProduct;
use App\Http\Controllers\ManagPurchaseController;
use App\Http\Controllers\NewBrandController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\PosSelectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SelectProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;



Route::view('/', 'login')->name('login')->middleware('guest');
Route::view('/register', 'register')->name('register')->middleware('guest');
Route::post('custom-register',[LoginController::class,'customRegistration'])->name('customregister');

Route::post('login-post', [LoginController::class, 'customLogin'])->name('loginpost');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('pos', [POSController::class, 'index'])->name('pos');
    Route::get('sales', [SalesController::class, 'index'])->name('sales');
    // Route::get('returns', [ReturnController::class, 'index'])->name('returns');
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
    Route::post('addCustomerPost',[POSController::class,'addCustomerPost'])->name('addCustomerPost');
    Route::get('getProductajax',[POSController::class,'getData'])->name('getProductajax');


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


    Route::post('supplier-create',[SupplierController::class,'index'])->name('suppliercreate');
    Route::get('get-supplier',[SupplierController::class,'getSupplier'])->name('getSupplier');

    Route::get('get-product',[SupplierController::class,'getproduct'])->name('getproduct');
    Route::post('selectproduct',[SelectProductController::class,'index'])->name('selectproduct');
    Route::post('get-selectproduct',[SelectProductController::class,'getselectproduct']);
    Route::post('delteSelectval',[SelectProductController::class,'delteSelectval']);
    
    Route::get('/paymeny-create',[CreateController::class,'index']);
    Route::get('purchases-details',[ManagPurchaseController::class,'details']);
    // Route::get('')


    Route::post('posSelct',[PosSelectController::class,'index']);
    Route::post('posSelctget',[PosSelectController::class,'getData']);

    Route::post('inputUpdate',[PosSelectController::class,'update']);
    Route::post('inputDataDelete',[PosSelectController::class,'inputDataDelete']);

    Route::post('customer-payment',[PosSelectController::class,'payment']);
    Route::get('get-sales',[SalesController::class,'getData'])->name('getsales');
    Route::get('sales-details',[SalesController::class,'selldetails'])->name('selldetails');
    Route::get('/logout',[LoginController::class,'logout']);
});
