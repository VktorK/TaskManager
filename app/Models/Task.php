<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = false;

    const STATUS_SUCCSSES = 1;
    const STATUS_DESTROY = 2;
    const STATUSES = [
        self::STATUS_SUCCSSES => 'Создан',
        self::STATUS_DESTROY => 'Удалено'
    ];
}
