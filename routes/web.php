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

Route::get('/', 'ShopController@index')->name('shop.index');
Route::get('/404', 'ShopController@notfound')->name('shop.notfound');
Route::get('/lien-he', 'ShopController@contact')->name('shop.contact');
Route::post('/lien-he', 'ShopController@postContact')->name('shop.postContact');

Route::get('/danh-sach-san-pham/{slug}', 'ShopController@category')->name('shop.category');
Route::get('/chi-tiet-san-pham/{slug}', 'ShopController@detailProduct')->name('shop.productDetail');
Route::get('/thuong-hieu/{slug}', 'ShopController@brand')->name('shop.brand');

// Danh sách sản phẩm trong giỏ hàng
Route::get('/gio-hang', 'CartController@index')->name('shop.cart');

// Thêm sản phẩm vào giỏ hàng
Route::get('/gio-hang/them-sp-vao-gio-hang/{product_id}', 'CartController@addToCart')->name('shop.cart.add-to-cart');

// Xóa SP khỏi giỏ hàng
Route::get('/gio-hang/xoa-sp-gio-hang/{id}', 'CartController@removeToCart')->name('shop.cart.remove-to-cart');
// Cập nhật giỏ hàng
Route::post('/gio-hang/cap-nhat-so-luong-sp{id}', 'CartController@updateToCart')->name('shop.cart.update-to-cart');
// Hủy đơn đặt hàng
Route::get('/gio-hang/huy-don-hang', 'CartController@destroy')->name('shop.cart.destroy');

Route::get('/dat-hang', 'CartController@order')->name('shop.cart.order');

Route::post('/dat-hang', 'CartController@postOrder')->name('shop.cart.postOrder');

Route::get('/dat-hang/hoan-tat-dat-hang', 'CartController@completedOrder')->name('shop.cart.completedOrder');

Route::get('/thanh-toan', 'CartController@checkout')->name('shop.cart.checkout');
Route::get('/gioi-thieu', 'ShopController@about')->name('shop.about');
Route::get('/chinh-sach-bao-mat', 'ShopController@private')->name('shop.privacy_policy');
Route::get('/tin-tuc', 'ShopController@article')->name('shop.article');
Route::get('/danh-muc-tin-tuc/{slug}', 'ShopController@articleCategory')->name('shop.articleCategory');
Route::get('/tin-tuc-chi-tiet/{slug}', 'ShopController@articleDetail')->name('shop.articleDetail.detail');
// Tim kiem san pham , tin tuc
Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');
Route::get('/tim-kiem-tin-tuc', 'ShopController@searchArticles')->name('shop.searchArticles');
// Mặc định
Route::get('/admin', 'AdminController@login')->name('admin.index');

Route::get('/admin/login', 'AdminController@login')->name('admin.login');

Route::post('/admin/login', 'AdminController@postLogin')->name('admin.postLogin');

Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => 'checkLogin'],function (){

    Route::resource('banner', 'BannerController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('vendor', 'VendorController');
    Route::resource('category', 'CategoryController');
    Route::resource('brand', 'BrandController');
    Route::resource('article', 'ArticleController');
    Route::resource('setting', 'SettingController');
    Route::resource('user', 'UserController');
    Route::resource('contact', 'ContactController');
    Route::resource('dashboard', 'DashboardController');
    Route::resource('Cart', 'CartController');
    // Ql Đơn hàng
    Route::resource('order', 'OrderController');
    Route::post('order/remove-to-cart', 'OrderController@removeToCart')->name('order.remove');

}); // 2


Route::resource('home', 'HomeController');




















/*Route::get('/', 'ShopController@index')->name('shop.index');
Route::get('/404', 'ShopController@notfound')->name('shop.notfound');
Route::get('/lien-he', 'ShopController@contact')->name('shop.contact');
Route::post('/lien-he', 'ShopController@postContact')->name('shop.postContact');

Route::get('/san-pham', 'ShopController@product')->name('shop.product');
Route::get('/chi-tiet-sp/{slug}', 'ShopController@detailProduct')->name('shop.productDetail');

Route::get('/danh-muc/{slug}', 'ShopController@category')->name('shop.category');

Route::get('/thuong-hieu/{slug}', 'ShopController@brand')->name('shop.brand');

Route::get('/gio-hang', 'CartController@index')->name('shop.cart');

// Thêm sản phẩm vào giỏ hàng
Route::get('/gio-hang/them-sp-vao-gio-hang/{product_id}', 'CartController@addToCart')->name('shop.cart.add-to-cart');

// Xóa SP khỏi giỏ hàng
Route::get('/gio-hang/xoa-sp-gio-hang/{id}', 'CartController@removeToCart')->name('shop.cart.remove-to-cart');
// Cập nhật giỏ hàng
Route::get('/gio-hang/cap-nhat-so-luong-sp', 'CartController@updateToCart')->name('shop.cart.update-to-cart');
// Hủy đơn đặt hàng
Route::get('/gio-hang/huy-don-hang', 'CartController@destroy')->name('shop.cart.destroy');

Route::get('/dat-hang', 'CartController@order')->name('shop.cart.order');
Route::post('/dat-hang', 'CartController@postOrder')->name('shop.cart.postOrder');
Route::get('/dat-hang/hoan-tat-dat-hang', 'CartController@completedOrder')->name('shop.cart.completedOrder');


Route::get('/thanh-toan', 'CartController@checkout')->name('shop.cart.checkout');

Route::get('/gioi-thieu', 'ShopController@about')->name('shop.about');
Route::get('/chinh-sach-bao-mat', 'ShopController@private')->name('shop.privacy_policy');

Route::get('/tin-tuc', 'ShopController@article')->name('shop.article');
Route::get('/danh-muc-tin-tuc/{slug}', 'ShopController@articleCategory')->name('shop.articleCategory');
Route::get('/tin-tuc-chi-tiet/{slug}', 'ShopController@articleDetail')->name('shop.articleDetail.detail');

// Tim kiem san pham , tin tuc
Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');
Route::get('/tim-kiem-tin-tuc', 'ShopController@searchArticles')->name('shop.searchArticles');

// Mặc định
Route::get('/admin', 'AdminController@login')->name('admin.index');
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => 'checkLogin'],function (){
    Route::resource('banner', 'BannerController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('vendor', 'VendorController');
    Route::resource('category', 'CategoryController');
    Route::resource('brand', 'BrandController');
    Route::resource('article', 'ArticleController');
    Route::resource('setting', 'SettingController');
    Route::resource('user', 'UserController');
    Route::resource('contact', 'ContactController');
    // Ql Đơn hàng
    Route::resource('order', 'OrderController');
    Route::post('order/remove-to-cart', 'OrderController@removeToCart')->name('order.remove');
});

Route::resource('home', 'HomeController');


*/

