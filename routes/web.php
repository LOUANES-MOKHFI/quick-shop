<?php

/*admin route*/

Route::group(['middleware' => ['web' , 'admin']], function(){
	Route::get('/admin','AdminController@home')->middleware('auth')->middleware('verified');;
    Route::get('/profil','AdminController@profil')->middleware('auth')->middleware('verified');;
    Route::put('/profil/{id}','AgenceController@update_profil');

	/*Contact*/

	Route::get('/admin/contact','ContactController@index');
    Route::get('/admin/contact/message_lu','ContactController@message_lu');
    Route::get('/admin/contact/message_non_lu','ContactController@message_non_lu');
	Route::get('/admin/contact/corbeille','ContactController@message_deleted');
    Route::get('/admin/contact/{id}','ContactController@show');
	Route::get('/admin/contact/{id}/delete','ContactController@destroy');
    Route::get('/admin/contact/{id}/supprimer','ContactController@delete');
    Route::get('/admin/search-message','ContactController@search_message');
    
     /*admin*/

    Route::resource('/admin/admin','AdminController');
    Route::get('/admin/admin/{id}/delete','AdminController@destroy');
    Route::get('/search-admin','AdminController@search_admin_index');


 /*membre*/

    Route::resource('/admin/membre','MembreController');
    Route::get('/admin/membre/{id}/delete','MembreController@destroy');
    Route::get('/admin/search-membre','MembreController@search_membre_index');



    /*Commandes*/

    Route::get('/admin/commande','CommandeController@all_commande');
    Route::get('/admin/commande/{id}','CommandeController@show_commande');
    Route::get('/admin/valider-commande/{id}/effectuer','CommandeController@effectuer');

    /*demande*/

    Route::get('/admin/demande','AgenceController@demande');
    Route::get('/admin/demande/{id}','AgenceController@show_demande');
    Route::get('/admin/demande/{id}/confirmer','AdminController@confirmer');
    Route::get('/admin/demande/{id}/rejeter','AdminController@rejeter');

    /*Category*/

    Route::resource('admin/category','CategoryController');
    Route::get('admin/category/{id}/delete', 'CategoryController@destroy');
    Route::get('admin/search_category', 'CategoryController@search_category_admin');
    
     /*Sous Category*/

    Route::resource('admin/sous-category','SousCategoryController');
    Route::get('admin/sous-category/{id}/delete', 'SousCategoryController@destroy');
    Route::get('admin/search_sous-category', 'SousCategoryController@search_sous_category_admin');
    

    /*wilaya*/

    Route::resource('admin/wilaya','WilayaController');
    Route::get('admin/wilaya/{id}/delete', 'WilayaController@destroy');
    Route::get('admin/search_wilaya', 'WilayaController@search_wilaya_admin');
   
     /*PRODUIT*/

    Route::resource('admin/product','productController');
    Route::get('admin/product/{id}/delete', 'productController@destroy');
    Route::get('admin/search_product', 'productController@search_product_admin');
    Route::get('admin/product-not-confirmed','productController@product_not_confirmed');
    Route::get('admin/product-not-confirmed/{id}/confirmer','AdminController@confirmation_product');


	/*Membre*/

	 Route::resource('/admin/membre', 'MembreController');
    Route::get('/admin/membre/{id}/delete', 'MembreController@destroy');


    /* parametre de site */

    Route::get('/admin/sitesetting', 'SiteSettingController@index');
    Route::post('/admin/sitesetting', 'SiteSettingController@store');
    Route::post('/admin/sitesetting/{id}', 'SiteSettingController@update');


Route::get('/admin/newsletter','NewsletterController@view');
Route::get('/export_newsletter-excel','NewsletterController@export_excel');



});


/*users route*/
use App\Wilaya;

Route::group(['middleware' => 'web'], function(){
Route::auth();
Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');
Route::get('/my-account', 'HomeController@account');
Route::get('/about', 'HomeController@about');
Route::post('/contact','ContactController@store');
Route::get('/contact', 'HomeController@contact');

Route::get('/all-products', 'ProductController@all_products');
Route::get('/all-products-in-promo', 'ProductController@all_products_in_promo');
Route::get('/search-products', 'ProductController@search_product');
Route::get('/global-search', 'ProductController@search_product');


Route::get('/all-products/{id}/{category}', 'ProductController@get_products_by_category');
Route::get('/all-product/marque/{marque}', 'ProductController@get_products_by_marque');
Route::get('/show-products/{id}/{name}', 'ProductController@show_product');
Route::get('/update_heart_count', 'ProductController@updateheartCount');
Route::get('/all-product-in-sub-category/{id}/{souscategory}', 'ProductController@get_products_by_sub_category');

Route::get('/add-to-cart/{id}','CartController@add');
Route::get('/remove-from-cart/{id}','CartController@remove');
Route::post('/add-to_cart','CartController@addCart');
Route::post('/update-product-in-cart','CartController@update');
Route::get('/cart/','CartController@cart');
Route::get('/checkout/','CommandeController@getcheckout');
Route::post('/checkout/','CommandeController@postcheckout');
Route::get('/get_price', 'WilayaController@getPrice');

Route::post('/check-subscriber-email/','NewsletterController@checksubscribe');

Route::post('/add-subscriber-email/','NewsletterController@addsubscribe');


Route::get('/ajax-wilaya',function(){
$wilaya = $_GET['wilaya'];
  //dd($id_faculte);
  $wilaya = \App\Wilaya::where('wilaya','=',$wilaya)->get();
  return Response::json($wilaya);
});


});