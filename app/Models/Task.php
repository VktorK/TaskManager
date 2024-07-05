<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'deleted_at' => 'datetime:Y-m-d H:m:s',
    ];

    protected $guarded = false;

    const STATUS_SUCCESS = 1;
    const STATUS_FAIL = 2;
    const STATUS_DESTROY = 3;
    const STATUSES = [
        self::STATUS_SUCCESS => 'Создан',
        self::STATUS_FAIL => 'Не выполнено',
        self::STATUS_DESTROY => 'Удален'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
