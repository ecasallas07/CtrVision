<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControlTask extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'day',
        'activity',
        'time_activity',
        'user_id',
    ];


    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
