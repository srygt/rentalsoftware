<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KdvTuru extends Model
{
    use SoftDeletes;

   // Kdv Türü Başlık
   protected $table = 'kdv_turu';
   protected $fillable = [
        KdvTuru::COLUMN_TURID,
        KdvTuru::COLUMN_ORAN,
   ];

   const COLUMN_TURID   = 'id';
   const COLUMN_ORAN    = 'oran';
}
