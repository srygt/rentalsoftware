<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TanimYakaTipi extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['creadet_at','updated_at','deleted_at'];
    protected $table = 'tanim_yaka_tipi';
    protected $fillable = [
        TanimYakaTipi::COLUMN_TITLE,
    ];

    const COLUMN_TITLE = 'title';

}
