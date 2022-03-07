<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimKolTipi extends Model
{
    use SoftDeletes;
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tanim_kol_tipi';
    protected $fillable = [
        TanimKolTipi::COLUMN_TITLE,
    ];

    const COLUMN_TITLE = 'title';
}
