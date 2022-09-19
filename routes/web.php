<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;

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

Route::Get('/', [WebsiteController::class, 'index']);

Route::Get('bid_detail/{bidId}', [WebsiteController::class, 'bidDetail'])->name('bid_detail');
Route::Get('bid_listing', [WebsiteController::class, 'bidListing'])->name('bid_listing');
Route::Get('bid_cat_search/{catId}/{subCat?}', [WebsiteController::class, 'bidListinga'])->name('bid_cat_search');
Route::Get('web_supplier_listing', [WebsiteController::class, 'supplierListing'])->name('web_supplier_listing');
Route::Get('search_home', [WebsiteController::class, 'searchHome'])->name('search_home');
Route::Get('about', [WebsiteController::class, 'about'])->name('about');
Route::Get('contact_us', [WebsiteController::class, 'contactUs'])->name('contact_us');




// Route::get('web_supplier_listing', function () {
//     return view('web-site/supplier_listing');
// })->name('web_supplier_listing');

// Route::get('about', function () {
//     return view('web-site/about');
// })->name('about');

// Route::get('contact_us', function () {
//     return view('web-site/contact_us');
// })->name('contact_us');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::Get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::Get('get_user_contact', [ChatController::class, 'userContact'])->name('get_user_contact');
Route::Get('message_store', [ChatController::class, 'storeMessage'])->name('message_store');

Route::middleware(['auth'])->group(function () {
    Route::get('bid_now', [WebsiteController::class, 'bidNow'])->name('bid_now');
    Route::post('bid_now', [WebsiteController::class, 'bidNowStore'])->name('bid_now');
    Route::Get('subscribe_modal', [WebsiteController::class, 'subscribeModal'])->name('subscribe_modal');
    Route::Post('subscribe_store', [WebsiteController::class, 'subscriptionRequestStore'])->name('subscribe_store');

    Route::Get('chat_index', [ChatController::class, 'index'])->name('chat_index');
    Route::Get('add_chat_contact', [ChatController::class, 'create'])->name('add_chat_contact');
    Route::Get('get_chat_user_listing', [ChatController::class, 'getChatUserListing'])->name('get_chat_user_listing');
    Route::Get('add_contact/{id}', [ChatController::class, 'store'])->name('add_contact');
    Route::Get('check_map_chat/{sUserId}/{bUserId}', [ChatController::class, 'checkMapChat'])->name('check_map_chat');
    Route::Get('get_chat_user', [ChatController::class, 'chatUser'])->name('get_chat_user');
    Route::Get('get_message', [ChatController::class, 'message'])->name('get_message');
    Route::Get('change_message_status', [ChatController::class, 'changeMessageStatus'])->name('change_message_status');


    Route::Get('supplier_listing', [SupplierController::class, 'index'])->name('supplier_listing');
    Route::Get('supplier_detail/{userId}/{catId}', [SupplierController::class, 'supplierDetail'])->name('supplier_detail');


    Route::Get('supplier_info', [OrderController::class, 'supplierCreate'])->name('supplier_info');
    Route::Get('supplier_order_status/{status}', [OrderController::class, 'supplierOrderStatus'])->name('supplier_order_status');
    Route::Post('order_delete/{id}', [OrderController::class, 'destroy'])->name('order_delete');
    Route::Post('order_update/{id}', [OrderController::class, 'update'])->name('order_update');
    Route::Get('order_edit', [OrderController::class, 'edit'])->name('order_edit');

    Route::Get('order_status/{status}', [OrderController::class, 'index'])->name('order_status');
    Route::Get('order_complete/{orderId}', [OrderController::class, 'completeOrder'])->name('order_complete');
    Route::Post('order_accept_reject/{id}/{status}', [OrderController::class, 'orderAcceptReject'])->name('order_accept_reject');
    Route::Get('review_create', [OrderController::class, 'reviewCreate'])->name('review_create');
    Route::Post('review_store', [OrderController::class, 'reviewStore'])->name('review_store');

    Route::Get('user_listing/{status}', [UserController::class, 'index'])->name('user_listing');
    Route::Get('user_buyer_show/{id}', [UserController::class, 'buyerShow'])->name('user_buyer_show');
    Route::Get('user_upload_doc', [UserController::class, 'verifyCreate'])->name('user_upload_doc');
    Route::post('user_change_role', [UserController::class, 'changeRole'])->name('user_change_role');
    Route::Post('user_upload_doc', [UserController::class, 'verifyStore'])->name('user_upload_doc');
    Route::Get('user_verify_index', [UserController::class, 'verifyIndex'])->name('user_verify_index');
    Route::Get('user_verify_show/{userId}', [UserController::class, 'documentShow'])->name('user_verify_show');
    Route::Get('user_verify_submit/{userId}', [UserController::class, 'verifySubmit'])->name('user_verify_submit');
    Route::Get('user_subscription_request', [UserController::class, 'subscriptionRequest'])->name('user_subscription_request');
    Route::Get('user_subscription_accept_reject/{userId}/{month}/{status}', [UserController::class, 'subscriptionAcceptReject'])->name('user_subscription_accept_reject');
    
    Route::resource('categories', CategoriesController::class);
    Route::resource('ads', AdsController::class);

    Route::resource('user', UserController::class);
    Route::resource('sub_categories', SubCategoriesController::class);

    Route::Post('product_upload_image', [ProductController::class, 'productUploadImage'])->name('product_upload_image');
    Route::Get('product_delete_image', [ProductController::class, 'productDeleteImage'])->name('product_delete_image');
    Route::Get('product_pending', [ProductController::class, 'productPending'])->name('product_pending');
    Route::Get('product_approved', [ProductController::class, 'productApproved'])->name('product_approved');
    Route::Get('product_accept/{id}', [ProductController::class, 'productAccept'])->name('product_accept');
    Route::Get('product_comment', [ProductController::class, 'productComment'])->name('product_comment');
    Route::Post('product_comment_submit/{ProductId}', [ProductController::class, 'productCommentSubmit'])->name('product_comment_submit');
    Route::Get('product_status/{status}', [ProductController::class, 'index'])->name('product_status');
    Route::resource('product', ProductController::class);


    Route::Post('bid_upload_image', [BidsController::class, 'bidUploadImage'])->name('bid_upload_image');
    Route::Get('bids_order/{id}', [BidsController::class, 'BidOrder'])->name('bids_order');
    Route::Get('bids_review/{id}', [BidsController::class, 'BidReview'])->name('bids_review');
    Route::Get('bid_delete_image', [BidsController::class, 'bidDeleteImage'])->name('bid_delete_image');
    Route::Get('bid_pending', [BidsController::class, 'bidPending'])->name('bid_pending');
    Route::Get('bid_approved', [BidsController::class, 'bidApproved'])->name('bid_approved');
    Route::Get('bid_accept/{id}', [BidsController::class, 'bidAccept'])->name('bid_accept');
    Route::Get('bid_comment', [BidsController::class, 'bidComment'])->name('bid_comment');
    Route::Post('bid_comment_submit/{bitId}', [BidsController::class, 'bidCommentSubmit'])->name('bid_comment_submit');

  
    Route::Get('bid_status/{status}', [BidsController::class, 'index'])->name('bid_status');
    Route::resource('bids', BidsController::class);

    Route::resource('settings', SettingsController::class);
    Route::post('/settings/{id}/updateEmail', [SettingsController::class, 'updateEmail'])->name('updateEmail');
    Route::post('/settings/{id}/updatePassword', [SettingsController::class, 'updatePassword'])->name('updatePassword');
});
Route::Get('sub_categories', [BidsController::class, 'subCategories'])->name('sub_categories');
Route::Get('subscribe_page', [WebsiteController::class, 'subscribePage'])->name('subscribe_page');
require __DIR__ . '/auth.php';
