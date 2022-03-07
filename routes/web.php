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

Route::get('/', 'AuthController@redirectToLogin');

Route::prefix('panel')->middleware('logincontrol')->group(function (){
    Route::get('giris', 'AuthController@index')
        ->name('Login');
    Route::post('giris', 'AuthController@LoginPost')
        ->name('Login.post');
});


Route::prefix('panel')->middleware('AuthControl')->group(function (){
    Route::get('anasayfa','MainController@Home')
        ->name('home');
    Route::get('panel/cikis','AuthController@logout')
        ->name('cikis');

    // Menü Listesi

    // Kiralama Türü İşlemleri
    Route::get('tanim/kiralamaturu','TanimKiralamaTuruController@index')
        ->name('tanim.kiralamaturu.liste');
    Route::get('tanim/kiralamaturu/ekle','TanimKiralamaTuruController@storeGet')
        ->name('tanim.kiralamaturu.store.get');
    Route::post('tanim/kiralamaturu','TanimKiralamaTuruController@storePost')
        ->name('tanim.kiralamaturu.store.post');        
    Route::get('tanim/kiralamaturu/{id}','TanimKiralamaTuruController@guncelleGet')
        ->name('tanim.kiralamaturu.guncelle.get')
        ->where(['id' => '[0-9]+']);
    Route::delete('tanim/kiralamaturu/{id}','TanimKiralamaTuruController@destroy')
        ->name('tanim.kiralamaturu.destroy')
        ->where(['id' => '[0-9]+']);
    Route::post('tanim/kiralamaturu/{id}','TanimKiralamaTuruController@update')
        ->name('tanim.kiralamaturu.update')
        ->where(['id' => '[0-9]+']);   
    // Kiralama Türü İşlemleri
    Route::get('tanim/yakatipi','TanimYakaTipiController@index')
    ->name('tanim.yakatipi.liste');
    Route::get('tanim/yakatipi/ekle','TanimYakaTipiController@storeGet')
    ->name('tanim.yakatipi.store.get');
    Route::post('tanim/yakatipi','TanimYakaTipiController@storePost')
    ->name('tanim.yakatipi.store.post');        
    Route::get('tanim/yakatipi/{id}','TanimYakaTipiController@guncelleGet')
    ->name('tanim.yakatipi.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/yakatipi/{id}','TanimYakaTipiController@destroy')
    ->name('tanim.yakatipi.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/yakatipi/{id}','TanimYakaTipiController@update')
    ->name('tanim.yakatipi.update')
    ->where(['id' => '[0-9]+']);   
    // Beden İşlemleri
    Route::get('tanim/beden','TanimBedenController@index')
    ->name('tanim.beden.liste');
    Route::get('tanim/beden/ekle','TanimBedenController@storeGet')
    ->name('tanim.beden.store.get');
    Route::post('tanim/beden','TanimBedenController@storePost')
    ->name('tanim.beden.store.post');        
    Route::get('tanim/beden/{id}','TanimBedenController@guncelleGet')
    ->name('tanim.beden.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/beden/{id}','TanimBedenController@destroy')
    ->name('tanim.beden.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/beden/{id}','TanimBedenController@update')
    ->name('tanim.beden.update')
    ->where(['id' => '[0-9]+']); 
    // Vücut Tipi İşlemleri
    Route::get('tanim/vucuttipi','TanimVucutTipiController@index')
    ->name('tanim.vucuttipi.liste');
    Route::get('tanim/vucuttipi/ekle','TanimVucutTipiController@storeGet')
    ->name('tanim.vucuttipi.store.get');
    Route::post('tanim/vucuttipi','TanimVucutTipiController@storePost')
    ->name('tanim.vucuttipi.store.post');        
    Route::get('tanim/vucuttipi/{id}','TanimVucutTipiController@guncelleGet')
    ->name('tanim.vucuttipi.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/vucuttipi/{id}','TanimVucutTipiController@destroy')
    ->name('tanim.vucuttipi.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/vucuttipi/{id}','TanimVucutTipiController@update')
    ->name('tanim.vucuttipi.update')
    ->where(['id' => '[0-9]+']);  
    // Renkler
    Route::get('tanim/renk','TanimRenkController@index')
    ->name('tanim.renk.liste');
    Route::get('tanim/renk/ekle','TanimRenkController@storeGet')
    ->name('tanim.renk.store.get');
    Route::post('tanim/renk','TanimRenkController@storePost')
    ->name('tanim.renk.store.post');        
    Route::get('tanim/renk/{id}','TanimRenkController@guncelleGet')
    ->name('tanim.renk.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/renk/{id}','TanimRenkController@destroy')
    ->name('tanim.renk.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/renk/{id}','TanimRenkController@update')
    ->name('tanim.renk.update')
    ->where(['id' => '[0-9]+']);    
    // Markalar
    Route::get('tanim/marka','TanimMarkaController@index')
    ->name('tanim.marka.liste');
    Route::get('tanim/marka/ekle','TanimMarkaController@storeGet')
    ->name('tanim.marka.store.get');
    Route::post('tanim/marka','TanimMarkaController@storePost')
    ->name('tanim.marka.store.post');        
    Route::get('tanim/marka/{id}','TanimMarkaController@guncelleGet')
    ->name('tanim.marka.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/marka/{id}','TanimMarkaController@destroy')
    ->name('tanim.marka.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/marka/{id}','TanimMarkaController@update')
    ->name('tanim.marka.update')
    ->where(['id' => '[0-9]+']);    
    // Materyaller
    Route::get('tanim/materyal','TanimMateryalController@index')
    ->name('tanim.materyal.liste');
    Route::get('tanim/materyal/ekle','TanimMateryalController@storeGet')
    ->name('tanim.materyal.store.get');
    Route::post('tanim/materyal','TanimMateryalController@storePost')
    ->name('tanim.materyal.store.post');        
    Route::get('tanim/materyal/{id}','TanimMateryalController@guncelleGet')
    ->name('tanim.materyal.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/materyal/{id}','TanimMateryalController@destroy')
    ->name('tanim.materyal.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/materyal/{id}','TanimMateryalController@update')
    ->name('tanim.materyal.update')
    ->where(['id' => '[0-9]+']);    
    // Kesim Tipleri
    Route::get('tanim/kesimtipi','TanimKesimTipiController@index')
    ->name('tanim.kesimtipi.liste');
    Route::get('tanim/kesimtipi/ekle','TanimKesimTipiController@storeGet')
    ->name('tanim.kesimtipi.store.get');
    Route::post('tanim/kesimtipi','TanimKesimTipiController@storePost')
    ->name('tanim.kesimtipi.store.post');        
    Route::get('tanim/kesimtipi/{id}','TanimKesimTipiController@guncelleGet')
    ->name('tanim.kesimtipi.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/kesimtipi/{id}','TanimKesimTipiController@destroy')
    ->name('tanim.kesimtipi.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/kesimtipi/{id}','TanimKesimTipiController@update')
    ->name('tanim.kesimtipi.update')
    ->where(['id' => '[0-9]+']);    
    // Stil Tipleri
    Route::get('tanim/stil','TanimStilController@index')
    ->name('tanim.stil.liste');
    Route::get('tanim/stil/ekle','TanimStilController@storeGet')
    ->name('tanim.stil.store.get');
    Route::post('tanim/stil','TanimStilController@storePost')
    ->name('tanim.stil.store.post');        
    Route::get('tanim/stil/{id}','TanimStilController@guncelleGet')
    ->name('tanim.stil.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/stil/{id}','TanimStilController@destroy')
    ->name('tanim.stil.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/stil/{id}','TanimStilController@update')
    ->name('tanim.stil.update')
    ->where(['id' => '[0-9]+']);    
    // Etek kesimi
    Route::get('tanim/etekkesimi','TanimEtekKesimiController@index')
    ->name('tanim.etekkesimi.liste');
    Route::get('tanim/etekkesimi/ekle','TanimEtekKesimiController@storeGet')
    ->name('tanim.etekkesimi.store.get');
    Route::post('tanim/etekkesimi','TanimEtekKesimiController@storePost')
    ->name('tanim.etekkesimi.store.post');        
    Route::get('tanim/etekkesimi/{id}','TanimEtekKesimiController@guncelleGet')
    ->name('tanim.etekkesimi.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/etekkesimi/{id}','TanimEtekKesimiController@destroy')
    ->name('tanim.etekkesimi.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/etekkesimi/{id}','TanimEtekKesimiController@update')
    ->name('tanim.etekkesimi.update')
    ->where(['id' => '[0-9]+']);    
    // Etek kesimi
    Route::get('tanim/koltipi','TanimKolTipiController@index')
    ->name('tanim.koltipi.liste');
    Route::get('tanim/koltipi/ekle','TanimKolTipiController@storeGet')
    ->name('tanim.koltipi.store.get');
    Route::post('tanim/koltipi','TanimKolTipiController@storePost')
    ->name('tanim.koltipi.store.post');        
    Route::get('tanim/koltipi/{id}','TanimKolTipiController@guncelleGet')
    ->name('tanim.koltipi.guncelle.get')
    ->where(['id' => '[0-9]+']);
    Route::delete('tanim/koltipi/{id}','TanimKolTipiController@destroy')
    ->name('tanim.koltipi.destroy')
    ->where(['id' => '[0-9]+']);
    Route::post('tanim/koltipi/{id}','TanimKolTipiController@update')
    ->name('tanim.koltipi.update')
    ->where(['id' => '[0-9]+']);    
                                                                      
    // KDV Türü İşlemleri
    Route::get('kdvturu','KdvTuruController@index')
        ->name('kdvturu.liste');
    Route::get('kdvturu/ekle','KdvTuruController@storeGet')
        ->name('kdvturu.store.get');
    Route::post('kdvturu','KdvTuruController@storePost')
        ->name('kdvturu.store.post');        
    Route::get('kdvturu/{id}','KdvTuruController@guncelleGet')
        ->name('kdvturu.guncelle.get')
        ->where(['id' => '[0-9]+']);
    Route::delete('kdvturu/{id}','KdvTuruController@destroy')
        ->name('kdvturu.destroy')
        ->where(['id' => '[0-9]+']);
    Route::post('kdvturu/{id}','KdvTuruController@update')
        ->name('kdvturu.update')
        ->where(['id' => '[0-9]+']);   

    // Fatura Aidat Türü İşlemleri
    Route::get('aidatfaturaturu','AidatFaturaTuruController@index')
        ->name('aidatfaturaturu.liste');
    Route::get('aidatfaturaturu/ekle','AidatFaturaTuruController@storeGet')
        ->name('aidatfaturaturu.store.get');
    Route::post('aidatfaturaturu','AidatFaturaTuruController@storePost')
        ->name('aidatfaturaturu.store.post');        
    Route::get('aidatfaturaturu/{id}','AidatFaturaTuruController@guncelleGet')
        ->name('aidatfaturaturu.guncelle.get')
        ->where(['id' => '[0-9]+']);
    Route::delete('aidatfaturaturu/{id}','AidatFaturaTuruController@destroy')
        ->name('aidatfaturaturu.destroy')
        ->where(['id' => '[0-9]+']);
    Route::post('aidatfaturaturu/{id}','AidatFaturaTuruController@update')
        ->name('aidatfaturaturu.update')
        ->where(['id' => '[0-9]+']);   
    // Fatura Ödemeleri
    
    Route::get('faturaodeme','FaturaOdemeController@index')
        ->name('faturaodeme.liste');
    Route::get('faturaodeme/ekle','FaturaOdemeController@storeGet')
        ->name('faturaodeme.store.get');
    Route::post('faturaodeme','FaturaOdemeController@storePost')
        ->name('faturaodeme.store.post');          
    Route::delete('faturaodeme/{id}','FaturaOdemeController@destroy')
        ->name('faturaodeme.destroy')
        ->where(['id' => '[0-9]+']);        
    Route::post('faturaodeme/{id}','FaturaOdemeController@update')
        ->name('faturaodeme.update')
        ->where(['id' => '[0-9]+']);
    Route::get('faturaodeme/{id}','FaturaOdemeController@guncelleGet')
        ->name('faturaodeme.guncelle.get')
        ->where(['id' => '[0-9]+']);                   
    // Mükellef İşlemleri
    Route::get('mukellefler/ekle','MukellefController@ekleGet')
        ->name('mukellef.ekle.get');
    Route::post('mukellefler/ekle','MukellefController@eklePost')
        ->name('mukellef.ekle.post');
    Route::post('mukellefler/pasiflestir','MukellefController@pasiflestir')
        ->name('mukellef.pasiflestir');
    Route::get('mukellefler/{id}','MukellefController@guncelleGet')
        ->name('mukellef.guncelle.get')
        ->where(['id' => '[0-9]+']);
    Route::get('mukellefler','MukellefController@index')
        ->name('mukellef.liste');

    // Abone İşlemleri
    Route::get('aboneler/ekle','AboneController@ekleGet')
        ->name('abone.ekle.get');
    Route::post('aboneler/ekle','AboneController@eklePost')
        ->name('abone.ekle.post');
    Route::get('aboneler/{id}','AboneController@guncelleGet')
        ->name('abone.guncelle.get')
        ->where(['id' => '[0-9]+']);
    Route::get('aboneler','AboneController@index')
        ->name('aboneler.liste');

    // Fatura İşlemleri
    Route::get('faturalar/ekle','FaturaTaslakController@ekleGet')
        ->name('faturataslak.ekle.get');
    Route::post('faturalar/ekle','FaturaTaslakController@eklePost')
        ->name('faturataslak.ekle.post');
    Route::post('faturalar','FaturaController@store')
        ->name('fatura.ekle.post');
    Route::get('faturalar','FaturaController@index')
        ->name('fatura.liste');
    Route::get('faturalar/pdf/{appType}/{uuid}','FaturaController@download')
        ->name('fatura.detay');
    Route::get('faturalar/gelen','FaturaController@gelenFaturalar')
        ->name('fatura.gelen.liste');
    Route::get('faturalar/giden-rapor','FaturaController@gidenFaturaRaporlari')
        ->name('fatura.giden.rapor');

    // Genel Ayarlar
    Route::get('ayarlar/genel','GenelAyarController@index')
        ->name('ayar.genel.index');
    Route::post('ayarlar/genel','GenelAyarController@update')
        ->name('ayar.genel.update');

    // Ek Kalem Ayarları
    Route::get('ayarlar/ek-kalemler','AyarEkKalemController@index')
        ->name('ayar.ek-kalem.index');
    Route::get('ayarlar/ek-kalemler/{id}','AyarEkKalemController@show')
        ->name('ayar.ek-kalem.show')
        ->where(['id' => '[0-9]+']);
    Route::get('ayarlar/ek-kalemler/ekle','AyarEkKalemController@storeGet')
        ->name('ayar.ek-kalem.store.get');
    Route::post('ayarlar/ek-kalemler/{id}','AyarEkKalemController@update')
        ->name('ayar.ek-kalem.update')
        ->where(['id' => '[0-9]+']);
    Route::post('ayarlar/ek-kalemler','AyarEkKalemController@storePost')
        ->name('ayar.ek-kalem.store.post');
    Route::delete('ayarlar/ek-kalemler/{id}','AyarEkKalemController@destroy')
        ->name('ayar.ek-kalem.destroy')
        ->where(['id' => '[0-9]+']);

    // Import
    Route::get('import/fatura/upload','Import\FaturaUploadController@index')
        ->name('import.fatura.upload.get');
    Route::post('import/fatura/upload','Import\FaturaUploadController@store')
        ->name('import.fatura.upload.post');
    Route::get('import/fatura/upload/{fatura_file}','Import\FaturaUploadController@show')
        ->name('import.fatura.upload.detay')
        ->where(['id' => '[0-9]+']);

    Route::get('import/fatura/validation/{fatura_file}','Import\FaturaValidationController@show')
        ->name('import.fatura.validation')
        ->where(['id' => '[0-9]+']);

    Route::post('import/fatura/import/{fatura_file}','Import\FaturaImportController@store')
        ->name('import.fatura.import.post')
        ->where(['id' => '[0-9]+']);
    Route::get('import/fatura','Import\FaturaImportController@index')
        ->name('import.fatura.liste');
    Route::get('import/fatura/{imported_fatura}','Import\FaturaImportController@show')
        ->name('import.fatura.detay');
    Route::post('import/fatura/sil','Import\FaturaImportController@delete')
        ->name('import.fatura.sil');

    // Api
    Route::get('mukellefler/api/{id}','MukellefController@detayApi')
        ->name('mukellef.detay')
        ->where(['id' => '[0-9]+']);
    Route::get('faturalar/api/son-fatura','FaturaApiController@sonFaturaDetay')
        ->name('fatura.api.son-fatura');
    Route::post('faturalar/api/okuma-durumu','FaturaApiController@okumaDurumu')
        ->name('fatura.api.okuma-durumu');
});

