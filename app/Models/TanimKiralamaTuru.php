<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimKiralamaTuru extends Model
{  
    use SoftDeletes;
    // Gelinlik Türünü
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tanim_kiralama_turu';
    protected $fillable = [
        TanimKiralamaTuru::COLUMN_TITLE,
    ];

    const COLUMN_TITLE      = 'title';
}
