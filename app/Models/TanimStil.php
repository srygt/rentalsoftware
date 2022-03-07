<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimStil extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tanim_stil';
    protected $fillable = [
        TanimStil::COLUMN_TITLE,
    ];
    
    const COLUMN_TITLE = 'title';
}
