<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'country_extension',
        'phone_number',
        'user_id',
    ];

    use HasFactory;

    // TODO:  Relation One to One with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
