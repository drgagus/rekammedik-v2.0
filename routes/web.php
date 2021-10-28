<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/odontogram', 'odontogram\OdontogramController@index');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'aplikasi\HomeController@index')->name('home');

Route::get('/', 'aplikasi\HomeController@index');

Route::get('/tentang', function () {
    return view('aplikasi/about');
})->name('about');

// ===================================================================================================

Route::middleware('auth')->group(function(){

    Route::get('/akun', 'akun\AccountController@index');
    Route::get('/akun/password', 'akun\AccountController@editpassword');
    Route::patch('/akun/password', 'akun\AccountController@updatepassword');
    Route::get('/akun/name', 'akun\AccountController@editname');
    Route::patch('/akun/name', 'akun\AccountController@updatename');
    
    
    });
// ===================================================================================================

Route::middleware('auth','CEO')->group(function(){

Route::get('/CEO', 'CEO\CEOController@index');
Route::delete('/CEO/medicinerecords', 'CEO\CEOController@medicinerecords');
Route::delete('/CEO/medicines', 'CEO\CEOController@medicines');
Route::delete('/CEO/labrecords', 'CEO\CEOController@labrecords');
Route::delete('/CEO/labs', 'CEO\CEOController@labs');
Route::delete('/CEO/medicalrecords', 'CEO\CEOController@medicalrecords');
Route::delete('/CEO/diags', 'CEO\CEOController@diags');
Route::delete('/CEO/members', 'CEO\CEOController@members');
Route::delete('/CEO/heads', 'CEO\CEOController@heads');

Route::get('/CEO/user', 'CEO\CEOController@akun');
Route::get('/CEO/user/create', 'CEO\CEOController@create');
Route::post('/CEO/user', 'CEO\CEOController@store');
Route::get('/CEO/user/{id}/edit', 'CEO\CEOController@edit');
Route::patch('/CEO/user/{id}/edit', 'CEO\CEOController@update');
Route::delete('/CEO/user/{id}', 'CEO\CEOController@destroy');


});
// ===================================================================================================

Route::middleware('auth','kasir')->group(function(){

    Route::get('/kasir', 'kasir\PaymentController@index');

});
// ===================================================================================================

Route::middleware('auth','pendaftaran')->group(function(){

Route::get('/pendaftaran', 'pendaftaran\PatientController@index');

Route::get('/pendaftaran/kepalakeluarga', 'pendaftaran\HeadController@index');
Route::get('/pendaftaran/kepalakeluarga/create', 'pendaftaran\HeadController@create');
Route::post('/pendaftaran/kepalakeluarga/', 'pendaftaran\HeadController@store');
Route::get('/pendaftaran/kepalakeluarga/{id}', 'pendaftaran\HeadController@show');
Route::get('/pendaftaran/kepalakeluarga/{id}/edit', 'pendaftaran\HeadController@edit');
Route::patch('/pendaftaran/kepalakeluarga/{id}/edit', 'pendaftaran\HeadController@update');

Route::get('/pendaftaran/anggotakeluarga', 'pendaftaran\MemberController@index');
Route::get('/pendaftaran/anggotakeluarga/create/{id}', 'pendaftaran\MemberController@create');
Route::post('/pendaftaran/anggotakeluarga', 'pendaftaran\MemberController@store');
Route::get('/pendaftaran/anggotakeluarga/{id}', 'pendaftaran\MemberController@show');
Route::get('/pendaftaran/anggotakeluarga/{id}/edit', 'pendaftaran\MemberController@edit');
Route::patch('/pendaftaran/anggotakeluarga/{id}/edit', 'pendaftaran\MemberController@update');
Route::delete('/pendaftaran/anggotakeluarga/{id}', 'pendaftaran\MemberController@destroy');

Route::get('/pendaftaran/pasien', 'pendaftaran\PatientController@index');
Route::post('/pendaftaran/pasien', 'pendaftaran\PatientController@store');
Route::delete('/pendaftaran/pasien/{id}', 'pendaftaran\PatientController@destroy');
Route::delete('/pendaftaran/pasien', 'pendaftaran\PatientController@destroyall');

});
// ===================================================================================================

Route::middleware('auth','pemeriksaan')->group(function(){

Route::get('/pemeriksaanawal', 'pemeriksaanawal\PatientController@index');

Route::get('/pemeriksaanawal/pasien', 'pemeriksaanawal\PatientController@index');
Route::get('/pemeriksaanawal/pasien/{id}', 'pemeriksaanawal\PatientController@show');
Route::get('/pemeriksaanawal/pasien/{id}/edit', 'pemeriksaanawal\PatientController@edit');
Route::patch('/pemeriksaanawal/pasien/{id}/edit', 'pemeriksaanawal\PatientController@update');

});
// ===================================================================================================

Route::middleware('auth','poliumum')->group(function(){

Route::get('/poliumum', 'poliumum\MedicalrecordController@index');

Route::get('/poliumum/pasien', 'poliumum\MedicalrecordController@index');
Route::get('/poliumum/pasien/create/{id}', 'poliumum\MedicalrecordController@create');
Route::post('/poliumum/pasien', 'poliumum\MedicalrecordController@store');
Route::get('/poliumum/pasien/{id}', 'poliumum\MedicalrecordController@show');
Route::get('/poliumum/pasien/{id}/edit', 'poliumum\MedicalrecordController@edit');
Route::patch('/poliumum/pasien/{id}/edit', 'poliumum\MedicalrecordController@update');
Route::delete('/poliumum/pasien/{id}', 'poliumum\MedicalrecordController@destroy');

Route::get('/poliumum/ceklab', 'poliumum\LabrecordController@index');
Route::get('/poliumum/ceklab/create/{id}', 'poliumum\LabrecordController@create');
Route::post('/poliumum/ceklab', 'poliumum\LabrecordController@store');
Route::get('/poliumum/ceklab/{id}', 'poliumum\LabrecordController@show');
Route::get('/poliumum/ceklab/{id}/edit', 'poliumum\LabrecordController@edit');
Route::patch('/poliumum/ceklab/{id}/edit', 'poliumum\LabrecordController@update');

});
// ===================================================================================================

Route::middleware('auth','poligigi')->group(function(){

Route::get('/poligigi', 'poligigi\MedicalrecordController@index');

Route::get('/poligigi/pasien', 'poligigi\MedicalrecordController@index');
Route::get('/poligigi/pasien/create/{id}', 'poligigi\MedicalrecordController@create');
Route::post('/poligigi/pasien', 'poligigi\MedicalrecordController@store');
Route::get('/poligigi/pasien/{id}', 'poligigi\MedicalrecordController@show');
Route::get('/poligigi/pasien/{id}/edit', 'poligigi\MedicalrecordController@edit');
Route::patch('/poligigi/pasien/{id}/edit', 'poligigi\MedicalrecordController@update');
Route::delete('/poligigi/pasien/{id}', 'poligigi\MedicalrecordController@destroy');

Route::get('/poligigi/ceklab', 'poligigi\LabrecordController@index');
Route::get('/poligigi/ceklab/create/{id}', 'poligigi\LabrecordController@create');
Route::post('/poligigi/ceklab', 'poligigi\LabrecordController@store');
Route::get('/poligigi/ceklab/{id}', 'poligigi\LabrecordController@show');
Route::get('/poligigi/ceklab/{id}/edit', 'poligigi\LabrecordController@edit');
Route::patch('/poligigi/ceklab/{id}/edit', 'poligigi\LabrecordController@update');


Route::get('/poligigi/odontogram/create/{id}', 'poligigi\OdontogramController@create');
Route::post('/poligigi/odontogram', 'poligigi\OdontogramController@store');
Route::get('/poligigi/odontogram/{id}/edit', 'poligigi\OdontogramController@edit');
Route::patch('/poligigi/odontogram/{id}/edit', 'poligigi\OdontogramController@update');

});
// ===================================================================================================

Route::middleware('auth','polikia')->group(function(){

Route::get('/polikia', 'polikia\MedicalrecordController@index');

Route::get('/polikia/pasien', 'polikia\MedicalrecordController@index');
Route::get('/polikia/pasien/create/{id}', 'polikia\MedicalrecordController@create');
Route::post('/polikia/pasien', 'polikia\MedicalrecordController@store');
Route::get('/polikia/pasien/{id}', 'polikia\MedicalrecordController@show');
Route::get('/polikia/pasien/{id}/edit', 'polikia\MedicalrecordController@edit');
Route::patch('/polikia/pasien/{id}/edit', 'polikia\MedicalrecordController@update');
Route::delete('/polikia/pasien/{id}', 'polikia\MedicalrecordController@destroy');

Route::get('/polikia/ceklab', 'polikia\LabrecordController@index');
Route::get('/polikia/ceklab/create/{id}', 'polikia\LabrecordController@create');
Route::post('/polikia/ceklab', 'polikia\LabrecordController@store');
Route::get('/polikia/ceklab/{id}', 'polikia\LabrecordController@show');
Route::get('/polikia/ceklab/{id}/edit', 'polikia\LabrecordController@edit');
Route::patch('/polikia/ceklab/{id}/edit', 'polikia\LabrecordController@update');

Route::get('/polikia/kartuibu/create/{id}', 'polikia\MomcardController@create');
Route::post('/polikia/kartuibu', 'polikia\MomcardController@store');
Route::get('/polikia/kartuibu/{id}', 'polikia\MomcardController@show');
Route::get('/polikia/kartuibu/{id}/edit', 'polikia\MomcardController@edit');
Route::patch('/polikia/kartuibu/{id}/edit', 'polikia\MomcardController@update');
Route::delete('/polikia/kartuibu/{id}', 'polikia\MomcardController@destroy');

});
// ===================================================================================================

Route::middleware('auth','apotek')->group(function(){

Route::get('/apotek', 'apotek\MedicinerecordController@index');

Route::get('/apotek/pasien', 'apotek\MedicinerecordController@index');
Route::get('/apotek/pasien/create/{id}', 'apotek\MedicinerecordController@create');
Route::post('/apotek/pasien', 'apotek\MedicinerecordController@store');
Route::get('/apotek/pasien/{id}', 'apotek\MedicinerecordController@show');
Route::get('/apotek/pasien/{id}/edit', 'apotek\MedicinerecordController@edit');
Route::patch('/apotek/pasien/{id}/edit', 'apotek\MedicinerecordController@update');


Route::get('/apotek/obat', 'apotek\MedicineController@index');
Route::get('/apotek/obat/create', 'apotek\MedicineController@create');
Route::post('/apotek/obat', 'apotek\MedicineController@store');
Route::get('/apotek/obat/{id}/edit', 'apotek\MedicineController@edit');
Route::patch('/apotek/obat/{id}/edit', 'apotek\MedicineController@update');
Route::delete('/apotek/obat/{id}', 'apotek\MedicineController@destroy');

});
// ===================================================================================================

Route::middleware('auth','laboratorium')->group(function(){

Route::get('/laboratorium', 'laboratorium\LabrecordController@index');

Route::get('/laboratorium/pasien', 'laboratorium\LabrecordController@index');
Route::get('/laboratorium/pasien/create/{id}', 'laboratorium\LabrecordController@create');
Route::post('/laboratorium/pasien', 'laboratorium\LabrecordController@store');
Route::get('/laboratorium/pasien/{id}', 'laboratorium\LabrecordController@show');
Route::get('/laboratorium/pasien/{id}/edit', 'laboratorium\LabrecordController@edit');
Route::patch('/laboratorium/pasien/{id}/edit', 'laboratorium\LabrecordController@update');


Route::get('/laboratorium/pemeriksaan', 'laboratorium\LabController@index');
Route::get('/laboratorium/pemeriksaan/create', 'laboratorium\LabController@create');
Route::post('/laboratorium/pemeriksaan', 'laboratorium\LabController@store');
Route::get('/laboratorium/pemeriksaan/{id}/edit', 'laboratorium\LabController@edit');
Route::patch('/laboratorium/pemeriksaan/{id}/edit', 'laboratorium\LabController@update');
Route::delete('/laboratorium/pemeriksaan/{id}', 'laboratorium\LabController@destroy');

});
// ===================================================================================================

Route::middleware('auth','igd')->group(function(){

Route::get('/igd', 'igd\MedicalrecordController@search');

Route::get('/igd/pasien', 'igd\MedicalrecordController@index');
Route::post('/igd', 'igd\MedicalrecordController@resultsearch');
Route::get('/igd/pasien/create/{id}', 'igd\MedicalrecordController@create');
Route::post('/igd/pasien', 'igd\MedicalrecordController@store');
Route::get('/igd/pasien/{id}', 'igd\MedicalrecordController@show');
Route::get('/igd/pasien/{id}/edit', 'igd\MedicalrecordController@edit');
Route::patch('/igd/pasien/{id}/edit', 'igd\MedicalrecordController@update');
Route::delete('/igd/pasien/{id}', 'igd\MedicalrecordController@destroy');

Route::get('/igd/obat', 'igd\MedicineController@index');
Route::get('/igd/obat/create', 'igd\MedicineController@create');
Route::post('/igd/obat', 'igd\MedicineController@store');
Route::get('/igd/obat/{id}/edit', 'igd\MedicineController@edit');
Route::patch('/igd/obat/{id}/edit', 'igd\MedicineController@update');

Route::get('/igd/obatpasien/create/{id}', 'igd\MedicinerecordController@create');
Route::post('/igd/obatpasien', 'igd\MedicinerecordController@store');
Route::get('/igd/obatpasien/{id}', 'igd\MedicinerecordController@show');
Route::get('/igd/obatpasien/{id}/edit', 'igd\MedicinerecordController@edit');
Route::patch('/igd/obatpasien/{id}/edit', 'igd\MedicinerecordController@update');

Route::get('/igd/lab/create/{id}', 'igd\LabrecordController@create');
Route::post('/igd/lab', 'igd\LabrecordController@store');
Route::get('/igd/lab/{id}/edit', 'igd\LabrecordController@edit');
Route::patch('/igd/lab/{id}/edit', 'igd\LabrecordController@update');
Route::delete('/igd/lab/{id}', 'igd\LabrecordController@destroy');

});
// ===================================================================================================

Route::middleware('auth','admin')->group(function(){

Route::get('/admin', 'admin\UserController@index');

Route::get('/admin/user', 'admin\UserController@index');
Route::get('/admin/user/create', 'admin\UserController@create');
Route::post('/admin/user', 'admin\UserController@store');
Route::get('/admin/user/{id}/edit', 'admin\UserController@edit');
Route::patch('/admin/user/{id}/edit', 'admin\UserController@update');
Route::delete('/admin/user/{id}', 'admin\UserController@destroy');
Route::patch('/admin/user/{id}/reset', 'admin\UserController@reset');

Route::get('/admin/desa', 'admin\VillageController@index');
Route::post('/admin/desa', 'admin\VillageController@store');
Route::get('/admin/desa/{id}/edit', 'admin\VillageController@edit');
Route::patch('/admin/desa/{id}/edit', 'admin\VillageController@update');
Route::delete('/admin/desa/{id}', 'admin\VillageController@destroy');

Route::get('/admin/diagnosa', 'admin\DiagController@index');
Route::post('/admin/diagnosa', 'admin\DiagController@store');
Route::get('/admin/diagnosa/{id}/edit', 'admin\DiagController@edit');
Route::patch('/admin/diagnosa/{id}/edit', 'admin\DiagController@update');
Route::delete('/admin/diagnosa/{id}', 'admin\DiagController@destroy');

Route::get('/admin/poli', 'admin\RoomController@index');
Route::post('/admin/poli', 'admin\RoomController@store');
Route::get('/admin/poli/{id}/edit', 'admin\RoomController@edit');
Route::patch('/admin/poli/{id}/edit', 'admin\RoomController@update');
Route::delete('/admin/poli/{id}', 'admin\RoomController@destroy');

Route::get('/admin/poliumum', 'admin\MedicalrecordController@poliumum');
Route::get('/admin/poligigi', 'admin\MedicalrecordController@poligigi');
Route::get('/admin/polikia', 'admin\MedicalrecordController@polikia');
Route::get('/admin/igd', 'admin\MedicalrecordController@igd');
Route::get('/admin/laboratorium', 'admin\LabrecordController@index');
Route::get('/admin/apotek', 'admin\MedicinerecordController@index');
});
// ===================================================================================================