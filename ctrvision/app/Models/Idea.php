<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idea extends Model
{
    // use SoftDeletes;


    protected $fillable = [
        'title',
        'tag',
        'description',
        'tool',
        'user_id',
    ];

    use HasFactory;

    // TODO: Se escribe belongs to en la tabla q tenga la llave foranea
    public function user(): BelongsTo
    {
        return $this->belonsTo(User::class);
    }
}
