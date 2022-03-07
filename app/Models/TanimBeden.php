<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TanimBeden extends Model
{
    use softDeletes;
    //Bedenler
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tanim_beden';
    protected $fillable = [
        TanimBeden::COLUMN_BODY,
        TanimBeden::COLUMN_BUST,
        TanimBeden::COLUMN_WAIST,
        TanimBeden::COLUMN_HIP,
    ];

    const COLUMN_BODY   = 'body';//Gövde
    const COLUMN_BUST   = 'bust';// Göğüs
    const COLUMN_WAIST  = 'waist';//Bel
    const COLUMN_HIP    = 'hip';// Kalça
}
