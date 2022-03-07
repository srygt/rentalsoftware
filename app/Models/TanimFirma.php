<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimFirma extends Model
{
    use SoftDeletes;
    //Firma Tanımları

    protected $table = 'erp_ik_tanim_firmalar';
    protected $fillable = [
        TanimFirma::COLUMN_ID,
        TanimFirma::COLUMN_ULKE,
        TanimFirma::COLUMN_SEHIR,
        TanimFirma::COLUMN_ILCE,
        TanimFirma::COLUMN_FIRMAKODU,
        TanimFirma::COLUMN_LOGO,
        TanimFirma::COLUMN_UNVANI,
        TanimFirma::COLUMN_ADRES,
        TanimFirma::COLUMN_VD,
        TanimFirma::COLUMN_VERGI_NO,
        TanimFirma::COLUMN_TC_KIMLIK_NO,
        TanimFirma::COLUMN_ADI,
        TanimFirma::COLUMN_SOYADI,
        TanimFirma::COLUMN_EMAIL,
        TanimFirma::COLUMN_GSM,
        TanimFirma::COLUMN_AKTIF,
        TanimFirma::COLUMN_ACIKLAMA,
    ];

    const COLUMN_ID                     = 'id';
    const COLUMN_ULKE                   = 'ulke';
    const COLUMN_SEHIR                  = 'sehir';
    const COLUMN_ILCE                   = 'ilce';
    const COLUMN_FIRMAKODU              = 'firmakodu';
    const COLUMN_LOGO                   = 'logo';
    const COLUMN_UNVANI                 = 'unvani';
    const COLUMN_ADRES                  = 'adres';
    const COLUMN_VD                     = 'vergidairesi';
    const COLUMN_VERGI_NO               = 'vergino';
    const COLUMN_TC_KIMLIK_NO           = 'tcno';
    const COLUMN_ADI                    = 'adi';
    const COLUMN_SOYADI                 = 'soyadi';
    const COLUMN_EMAIL                  = 'email';
    const COLUMN_GSM                    = 'gsm';
    const COLUMN_AKTIF                  = 'aktif';
    const COLUMN_ACIKLAMA               = 'aciklama';
}
