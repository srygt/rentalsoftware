<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimEtekKesimi extends Model
{
    use SoftDeletes;
    // Kesim Tipi
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tanim_etek_kesimi';
    protected $fillable = [
        TanimEtekKesimi::COLUMN_TITLE,
    ];

    const COLUMN_TITLE      = 'title';
}
