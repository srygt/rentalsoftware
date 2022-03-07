<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimRenk extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tanim_renk';
    protected $fillable = [
        TanimRenk::COLUMN_TITLE,
    ];
    
    const COLUMN_TITLE = 'title';
}
