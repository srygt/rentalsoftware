<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AidatFaturaTuru extends Model
{
    use SoftDeletes;

   // Fatura Başlık
   protected $table = 'aidat_fatura_turu';
   protected $fillable = [
        AidatFaturaTuru::COLUMN_TURID,
        AidatFaturaTuru::COLUMN_BASLIK,
   ];

   const COLUMN_TURID   = 'id';
   const COLUMN_BASLIK  = 'baslik';
}
