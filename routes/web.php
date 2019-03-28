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
//ruta koja radi gasenje oglasa ili za aktiviranje ugasenog oglasa
Route::put('job_offer/edit/{id}','Back\JobOfferController@edit')->name('jobOfferEdit');
//ruta koja radi brisanje oglasa
Route::delete('job_offer/destroy/{id}','Back\JobOfferController@destroy');

//Route::resource('back\offer','Back\OfferController'); pokusaj resource kontrolera
//ruta koja radi dohvatanje oglasa kompanije
Route::get('/company_job_offers/{id}','Back\CompanyJobOffer@index')->name('company_job_offers');

Route::get('/all','Back\ProfessionController@index')->name('all_job_offers');
//ovo je ruta za prikaz forme za prijavu na oglas
Route::resource('/formFields','Back\FormController')->except(['index']);
Route::get('/form/job_offer/{id?}','Back\FormController@index')->name('formJobOffer');
// ruta koja prikazuje formu za odredjeni oglas
Route::get('/form_view/{id}','Front\FormController@index')->name('getForm');
//ruta za prijavu tj pravljenje korisnika
Route::resource('/candidates','Front\CandidateController')->except(['store']);
Route::post('/candidates','Front\CandidateController@store')->name('candidateStore');
//ruta za povezivanje
Route::get('/logIn','LogInController@logIn');

