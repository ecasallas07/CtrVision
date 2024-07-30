<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class User extends Authenticatable implements MustVerifyEmail
{
    // use SoftDeletes;
    // use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];




    // TODO: Relation One to One with Phone
    /* TODO: When invoking the user method,
    Eloquent will attempt to find a User model that has an id which matches the user_id column on the Phone model.*/

    public function phone(): HasOne
    {
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
        return $this->hasOne(Phone::class,'user_id','id');
    }


    // TODO: Relation One to Many  with Project
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class,'user_id');
    }

    // TODO: Relation One to Many  with Idea
    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class,'user_id');
    }


    // TODO: Relation One to Many  with ControlTask
    public function controlTasks(): HasMany
    {
        return $this->hasMany(ControlTask::class,'user_id');
    }



}
