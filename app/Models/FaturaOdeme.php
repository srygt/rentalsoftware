<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaturaOdeme extends Model
{
    use SoftDeletes;
    //Fatura Ödeme Listesi
    protected $table = 'fatura_odemeleri';
    protected $fillable = [
        FaturaOdeme::COLUMN_ID,
        FaturaOdeme::COLUMN_UUID,
        FaturaOdeme::COLUMN_FATURAID,
        FaturaOdeme::COLUMN_DETAY,
        FaturaOdeme::COLUMN_ODEMEDURUMU,
        FaturaOdeme::COLUMN_ODEMETARIHI,
        FaturaOdeme::COLUMN_ODEMENOTU,
        FaturaOdeme::COLUMN_ODEMETUTARI,
        FaturaOdeme::COLUMN_FATURATARIHI,
        FaturaOdeme::COLUMN_SONODEMETARIHI,
        FaturaOdeme::COLUMN_TURU,
        FaturaOdeme::COLUMN_FATURANOTU,
        FaturaOdeme::COLUMN_ABONEID,
    ];

    const COLUMN_ID             = 'id';
    const COLUMN_UUID           = 'uuid';
    const COLUMN_FATURAID       = 'fatura_no';
    const COLUMN_DETAY          = 'fatura_detay';
    const COLUMN_ODEMEDURUMU    = 'odemedurumu';
    const COLUMN_ODEMETARIHI    = 'odemetarihi';
    const COLUMN_ODEMENOTU      = 'odemenotu';
    const COLUMN_ODEMETUTARI    = 'odemetutari';
    const COLUMN_FATURATARIHI   = 'faturatarihi';
    const COLUMN_SONODEMETARIHI = 'sonodemetarihi';
    const COLUMN_TURU           = 'turu';
    const COLUMN_FATURANOTU     = 'faturanotu';
    const COLUMN_ABONEID        = 'aboneid';
}
