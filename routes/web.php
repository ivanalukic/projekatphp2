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

Route::get('/', 'Front\JobOfferController@getJobOffers');//ovde treba da se gadja novi metod koji radi sa oglasima koji se nalazi u front delu i izvodi se iz front kontrolera
//ruta koja prikazuje formu za kreiranje oglasa
Route::get('/createForm/{id?}','Back\JobOfferController@jobOfferForm')->name('createForm');
//ruta koja menja uslove oglasa kada se promeni profesija
Route::get('/createForm/profession/{id}','Back\JobOfferController@jobOfferFormProfession');
//ruta koja radi insert oglasa
Route::post('/create','Back\JobOfferController@save')->name('createJobOffer');
//ruta koja vraca sve oglase ulogovanog korisnika
Route::get('/my_job_offers/{id}','Back\JobOfferController@getJobOffers')->name('myOffers');
Route::get('api/my_job_offers/{id}','API\JobOfferController@show');
//ruta koja radi gasenje oglasa ili za aktiviranje ugasenog oglasa
Route::put('job_offer/edit/{id}','Back\JobOfferController@edit')->name('jobOfferEdit');
//ruta koja radi brisanje oglasa
Route::delete('job_offer/destroy/{id}','Back\JobOfferController@destroy');

//Route::resource('back\offer','Back\OfferController'); pokusaj resource kontrolera
//ruta koja radi dohvatanje oglasa kompanije
Route::get('/company_job_offers/{id}','Back\CompanyJobOffer@index')->name('company_job_offers');

//ovo su rute koje moram da imam da bi mi se view trenutno prikazivao bez gresaka treba ih popraviti
Route::get('/all','Back\ProfessionController@index')->name('all_job_offers');
//ovo je ruta za prikaz forme za prijavu na oglas
Route::get('/form/job_offer/{id?}',function (){return view('pages.Form.form_job_offer');})->name('formJobOffer');
Route::resource('/formFields','Back\FormController');

