<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;


    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $guarded = false;

    const STATUS_SUCCESS = 1;
    const STATUS_FAIL = 2;
    const STATUS_DESTROY = 3;
    const STATUSES = [
        self::STATUS_SUCCESS => 'Создан',
        self::STATUS_FAIL => 'Исполнено',
        self::STATUS_DESTROY => 'Удален'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
