<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class limitConfirm extends Model
{
    use HasFactory;

    protected $table = 'limit_user_confirm';
    protected $fillable = [
        'start',
        'end'
    ];
}
