<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasAccess($permissions)
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Always capitalize the first name when we retrieve it
     * @param string $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Always capitalize the last name when we retrieve it
     * @param string $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return ucfirst($this->last_name) . ' ' . ucfirst($this->first_name);
    }

    /**
     * status activation user
     * @return bool
     */
    public function completed(User $user)
    {
        $activation = Activation::where('user_id', $user->getKey())
            ->where('completed', true)
            ->first();

        return $activation ?: false;
    }
}
