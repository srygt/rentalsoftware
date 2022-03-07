<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimVucutTipi extends Model
{
    use SoftDeletes;
    //Vucut Tipi
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tanim_vucut_tipi';
    protected $fillable = [
        TanimVucutTipi::COLUMN_TITLE,
    ];

    const COLUMN_TITLE                     = 'title';
}
