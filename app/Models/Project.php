<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{

    // When models are soft deleted, they are not actually removed from your database. Instead, a deleted_at attribute is set on the model indicating the date and time at which the model was "deleted".
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'title',
        'stack',
        'description',
        'link_repo',
        'activity',
        'user_id', 
    ];

    // TODO: Relation One to Many with User, in tis case in inverse

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
