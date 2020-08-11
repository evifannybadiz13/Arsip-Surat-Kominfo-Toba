<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteSeviceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

//AUTH

Route::get('/login','Auth\LoginController@index')->name('login');
Route::post('/login-post','Auth\LoginController@post');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/register-create','Auth\RegisterController@index');
Route::post('/register-post','Auth\RegisterController@post');

//verifikasi email user

//home
Route::group(['middleware' => ['auth','CheckRole:admin']], function(){
    Route::get('/home', function () {
        return redirect('/dashboard');
    });
Route::get('/dashboard','DashboardController@index');

//SuratMasuk
Route::get('/surat_masuk','SuratMasukController@index');
Route::get('/createsuratmasuk','SuratMasukController@create');
Route::post('/suratmasuk/store','SuratMasukController@store');
Route::get('/edit-suratmasuk/{id}','SuratMasukController@edit');
Route::patch('/edit_suratmasuk/store/{id}', 'SuratMasukController@update');
Route::get('/suratmasuk/delete/{id}','SuratMasukController@destroy');
Route::get('/view/suratmasuk/{id}','SuratMasukController@show');
Route::get('/surat_masuk/search','SuratMasukController@search');
Route::get('/surat_masuk/cetak_pdf', 'SuratMasukController@generatePDF');

//SuratKeluar
Route::resource('surat_keluar','SuratkeluarController');
Route::get('/surat_keluar','SuratkeluarController@index');
Route::get('/tambah_suratkeluar','SuratkeluarController@create');
Route::post('/suratkeluar/store','SuratkeluarController@store');
Route::get('/edit_suratkeluar/{id}','SuratkeluarController@edit');
Route::patch('/edit_suratkeluar/store/{id}', 'SuratkeluarController@update');
Route::get('/suratkeluar/delete/{id}','SuratkeluarController@destroy');
Route::get('/view/suratkeluar/{id}','SuratkeluarController@show');
Route::get('/surat_keluar/search','SuratkeluarController@search');
Route::get('/surat_keluar_pdf_all','SuratkeluarController@generatePDF1');


//FORM SURAT
Route::resource('form_surat','FormSuratController');
Route::get('/formsurat','FormSuratController@index');
Route::get('/tambah_surat','FormSuratController@create');
Route::post('/formsurat/store','FormSuratController@store');
Route::get('/form_surat/cetak_pdf/{id}', 'FormSuratController@generatePDF');
Route::get('/form_surat_pdf/{id}','FormSuratController@opensurat');


//DISPOSISI
Route::get('/disposisi','DisposisiController@index');
Route::get('/disposisi-create/{id}','DisposisiController@show');
Route::patch('/disposisi-update/{id}','DisposisiController@update');
Route::get('/disposisi-telah','DisposisiController@terdisposisi');
Route::get('/disposisi-surat/{id}','DisposisiController@pdf');
Route::get('/disposisi-pdf/{id}','DisposisiController@pdf_terdisposisi');
Route::get('/disposisi-semua','DisposisiController@dp_all');
Route::get('/disposisi-konfirmasi/{id}','DisposisiController@konfirmasi');

Route::get('/disposisi-show/{id}','DisposisiController@look');
Route::patch('/disposisi-show/konfirmasi/{id}','DisposisiController@konfirmasi2');
Route::delete('/disposisi-delete/{id}','DisposisiController@destroy');



//Akun Pengguna Kabid
Route::get('/kabid','KabidController@index');
Route::get('/kabid/create','KabidController@create');
Route::get('/kabid-view/{id}','KabidController@show');
Route::post('/kabid/store','KabidController@store');
Route::get('/kabid/edit/{id}','KabidController@edit');
Route::patch('/kabid/edit/store/{id}', 'KabidController@update');
Route::delete('/kabid/delete/{id}','KabidController@destroy');


});

Route::group(['middleware' => ['auth','CheckRole:admin,skdi,aplikasi,statistik,sekdis,kadis']], function(){


    //Bar Chart
    Route::get('/home', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard','DashboardController@index');

    //SuratMasuk
    Route::get('/surat_masuk','SuratMasukController@index');
    Route::get('/createsuratmasuk','SuratMasukController@create');
    Route::post('/suratmasuk/store','SuratMasukController@store');
    Route::get('/edit-suratmasuk/{id}','SuratMasukController@edit');
    Route::patch('/edit_suratmasuk/store/{id}', 'SuratMasukController@update');
    Route::get('/suratmasuk/delete/{id}','SuratMasukController@destroy');
    Route::get('/view/suratmasuk/{id}','SuratMasukController@show');
    Route::get('/surat_masuk/search','SuratMasukController@search');
    Route::get('/surat_masuk/cetak_pdf', 'SuratMasukController@generatePDF');
    Route::delete('/delete-suratmasuk/{id}','SuratMasukController@destroy');


    //SuratKeluar
    Route::resource('surat_keluar','SuratkeluarController');
    Route::get('/surat_keluar','SuratkeluarController@index');
    Route::get('/tambah_suratkeluar','SuratkeluarController@create');
    Route::post('/suratkeluar/store','SuratkeluarController@store');
    Route::get('/edit_suratkeluar/{id}','SuratkeluarController@edit');
    Route::patch('/edit_suratkeluar/store/{id}', 'SuratkeluarController@update');
    Route::get('/suratkeluar/delete/{id}','SuratkeluarController@destroy');
    Route::get('/view/suratkeluar/{id}','SuratkeluarController@show');
    Route::get('/surat_keluar_search','SuratkeluarController@search');
    Route::get('/surat_keluar/cetak_pdf', 'SuratkeluarController@generatePDF');

    //FORM SURAT
    Route::resource('form_surat','FormSuratController');
    Route::get('/form_surat_search','FormSuratController@search');
    Route::get('/formsurat','FormSuratController@index');
    Route::get('/tambah_surat','FormSuratController@create');
    Route::post('/formsurat/store','FormSuratController@store');
    Route::get('/form_surat/cetak_pdf/{id}', 'FormSuratController@generatePDF');
    Route::get('/form_surat_pdf/{id}','FormSuratController@opensurat');




    //DISPOSISI
    Route::get('/disposisi','DisposisiController@index');
    Route::get('/disposisi-create/{id}','DisposisiController@show');
    Route::patch('/disposisi-update/{id}','DisposisiController@update');
    Route::get('/disposisi-telah','DisposisiController@terdisposisi');
    Route::get('/disposisi-surat/{id}','DisposisiController@pdf');
    Route::get('/disposisi-pdf/{id}','DisposisiController@pdf_terdisposisi');
    Route::get('/disposisi-semua','DisposisiController@dp_all');
    Route::patch('/disposisi-konfirmasi/{id}','DisposisiController@konfirmasi');
    Route::get('/disposisi-show/{id}','DisposisiController@look');
    Route::get('/disposisi-view/{id}','DisposisiController@view');
    Route::get('/disposisi-print/{id}','DisposisiController@print_view');
    Route::delete('/disposisi-delete/{id}','DisposisiController@destroy');
    //Bar Chart

    //Disposisi-SKDI
    Route::get('/disposisi-konfirmasi/{id}','DisposisiController@show_konfir');

    //DISPOSISI SEARCH
    Route::get('/disposisi/search','DisposisiController@search');
    Route::get('/disposisi-terdisposisi/search','DisposisiController@search_terdispo');
    Route::get('/disposisi-aplikasi/search','DisposisiController@search_aplikasi');
    Route::get('/disposisi-all/search','DisposisiController@search_all');
    Route::get('/disposisi-skdi/search','DisposisiController@search_skdi');
    Route::get('/disposisi-statistik/search','DisposisiController@search_statistik');



    //KHUSUS AGENDA
    Route::get('/agenda_masuk','AgendaSuratController@index');
    Route::get('/agenda_masuk/cetak_pdf', 'AgendaSuratController@generatePDF');
    Route::get('/agenda_masuk/search','AgendaSuratController@search');
    Route::get('/agenda_keluar','AgendaSuratController@index1');
    Route::get('/agenda_keluar/cetak_pdf', 'AgendaSuratController@generatePDF1');
    Route::get('/agenda_keluar/search','AgendaSuratController@search1');


    });
